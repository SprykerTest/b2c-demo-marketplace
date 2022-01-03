<?php


namespace Pyz\Zed\CsvReader\Business\Reader;


use Countable;
use Exception;
use Generated\Shared\Transfer\DataImporterReaderConfigurationTransfer;
use Spryker\Service\FileSystem\Dependency\Exception\FileSystemReadException;
use Spryker\Service\FileSystem\Dependency\Exception\FileSystemStreamException;
use Spryker\Service\Flysystem\FlysystemServiceInterface;
use Spryker\Zed\DataImport\Business\Exception\DataReaderException;
use Spryker\Zed\DataImport\Business\Exception\DataSetWithHeaderCombineFailedException;
use Spryker\Zed\DataImport\Business\Model\DataReader\ConfigurableDataReaderInterface;
use Spryker\Zed\DataImport\Business\Model\DataReader\DataReaderInterface;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;

class CsvReader implements DataReaderInterface, ConfigurableDataReaderInterface, Countable
{
    /**
     * @var resource
     */
    protected $fileObject;

    /**
     * @var array|null
     */
    protected $dataSetKeys;

    /**
     * @var \Pyz\Zed\CsvReader\Business\Reader\CsvReaderConfigurationInterface
     */
    protected $csvReaderConfiguration;

    /**
     * @var \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface
     */
    protected $dataSet;

    /**
     * @var int|null
     */
    protected $offset;

    /**
     * @var int|null
     */
    protected $limit;

    /**
     * @var int Count of lines in file
     */
    protected $count;

    /**
     * @var int
     */
    protected $key = 0;

    /**
     * @var int Key of the row that we need to import
     */
    protected $importableKey = 0;

    /**
     * @var FlysystemServiceInterface
     */
    protected $flysystemService;

    /**
     * @param \Pyz\Zed\CsvReader\Business\Reader\CsvReaderConfigurationInterface $csvReaderConfiguration
     * @param FlysystemServiceInterface $flysystemService
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     */
    public function __construct(
        CsvReaderConfigurationInterface $csvReaderConfiguration,
        FlysystemServiceInterface $flysystemService,
        DataSetInterface $dataSet
    ) {
        $this->csvReaderConfiguration = $csvReaderConfiguration;
        $this->dataSet = $dataSet;
        $this->flysystemService = $flysystemService;
        $this->configureReader();
    }

    /**
     * @return void
     */
    protected function configureReader()
    {
        $this->createFileObject();
        $this->setDataSetKeys();
        $this->setOffsetAndLimit();
    }

    /**
     * @return void
     * @throws \Spryker\Zed\DataImport\Business\Exception\DataReaderException
     *
     */
    protected function createFileObject()
    {
        $fileSystemName = $this->csvReaderConfiguration->getFileSystem();
        $fileName = $this->csvReaderConfiguration->getFileName();
        try {
            if (!$this->flysystemService->has($fileSystemName, $fileName)) {
                throw new DataReaderException(sprintf('File "%s" could not be found or is not readable.', $fileName));
            }
        } catch (FileSystemReadException $exception) {
            $message = sprintf('File "%s" could not be found or is not readable: ' . $exception->getMessage(), $fileName);
            throw new DataReaderException($message, $exception->getCode(), $exception);
        }

        try {
            $this->fileObject = $this->flysystemService->readStream($fileSystemName, $fileName);
        } catch (FileSystemStreamException $exception) {
            $message = sprintf('File "%s" can not be streamed: ' . $exception->getMessage(), $fileName);
            throw new DataReaderException($message, $exception->getCode(), $exception);
        }
    }

    /**
     * @param \Generated\Shared\Transfer\DataImporterReaderConfigurationTransfer $dataImportReaderConfigurationTransfer
     *
     * @return $this
     */
    public function configure(DataImporterReaderConfigurationTransfer $dataImportReaderConfigurationTransfer)
    {
        $this->csvReaderConfiguration->setDataImporterReaderConfigurationTransfer($dataImportReaderConfigurationTransfer);

        $this->configureReader();

        return $this;
    }

    /**
     * @return void
     */
    protected function setDataSetKeys()
    {
        if ($this->csvReaderConfiguration->hasHeader()) {
            $this->dataSetKeys = $this->getRowAndGoNext();
        }
    }

    /**
     * @return void
     */
    protected function setOffsetAndLimit()
    {
        $this->offset = $this->csvReaderConfiguration->getOffset();
        $this->limit = $this->csvReaderConfiguration->getLimit();
    }

    /**
     * @return array|null
     */
    protected function getRow(): ?array
    {
        $row = fgetcsv(
            $this->fileObject,
            0,
            $this->csvReaderConfiguration->getDelimiter(),
            $this->csvReaderConfiguration->getEnclosure(),
            $this->csvReaderConfiguration->getEscape()
        );

        if (!$row) {
            return null;
        }

        return $row;
    }

    /**
     * @return array|null
     */
    protected function getCurrentRow(): ?array
    {
        $currentPosition = ftell($this->fileObject);
        $row = $this->getRow();
        fseek($this->fileObject, $currentPosition);

        return $row;
    }

    /**
     * @return array|null
     */
    protected function getRowAndGoNext(): ?array
    {
        $this->incrementKey();

        return $this->getRow();
    }

    /**
     * @return \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface
     * @throws \Spryker\Zed\DataImport\Business\Exception\DataSetWithHeaderCombineFailedException
     *
     */
    public function current(): DataSetInterface
    {
        $dataSet = null;
        while ($this->valid()) {
            $dataSet = $this->getCurrentRow();

            if (!$this->isEmpty($dataSet)) {
                break;
            }

            $this->next();
        }

        $this->incrementImportableKey();

        if ($this->dataSetKeys) {
            $dataSetBeforeCombine = $dataSet;
            try {
                $dataSet = array_combine($this->dataSetKeys, $dataSet);
            } catch (Exception $e) {
                throw new DataSetWithHeaderCombineFailedException(sprintf(
                    'Can not combine data set header with current data set. Keys: "%s", Values "%s"',
                    implode(', ', $this->dataSetKeys),
                    implode(', ', array_values($dataSetBeforeCombine))
                ), 0, $e);
            }
        }

        $this->dataSet->exchangeArray($dataSet);

        return $this->dataSet;
    }

    /**
     * @return void
     */
    public function next()
    {
        $this->getRowAndGoNext();
    }

    /**
     * @return int
     */
    public function count(): int
    {
        if (!$this->count) {
            $this->calculateCount();
        }

        return $this->count;
    }

    /**
     * @return void
     */
    protected function calculateCount()
    {
        $this->count = 0;

        $this->rewind();

        while (($row = $this->getRowAndGoNext()) !== null) {
            if ($this->isEmpty($row)) {
                continue;
            }

            $this->count++;
        }

        $this->rewind();
    }

    /**
     * @param array $row
     *
     * @return bool
     */
    protected function isEmpty(array $row): bool
    {
        if (count($row) == 1 && $row[0] == '') {
            return true;
        }

        return false;
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->key;
    }

    /**
     * @return void
     */
    protected function incrementKey()
    {
        $this->key++;
    }

    /**
     * @return void
     */
    protected function incrementImportableKey()
    {
        $this->importableKey++;
    }

    /**
     * @return void
     */
    protected function resetKeys()
    {
        $this->key = 0;
        $this->importableKey = 0;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        if ($this->limit !== null && $this->limit !== 0) {
            if ($this->offset !== null) {
                return ($this->key() < $this->offset + $this->limit);
            }
        }

        return $this->importableKey < $this->count;
    }

    /**
     * @return void
     */
    public function rewind()
    {
        rewind($this->fileObject);
        $this->resetKeys();

        if ($this->offset) {
            fseek($this->fileObject, $this->offset - 1);
        }

        if ($this->csvReaderConfiguration->hasHeader()) {
            $this->next();
        }
    }
}
