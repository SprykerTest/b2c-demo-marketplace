<?php


namespace Pyz\Zed\CsvReader\Dependency;


use Generated\Shared\Transfer\DataImporterReaderConfigurationTransfer;
use Pyz\Zed\CsvReader\Business\Reader\CsvReader;
use Pyz\Zed\CsvReader\Business\Reader\CsvReaderConfiguration;
use Pyz\Zed\DataImport\DataImportDependencyProvider;
use Spryker\Service\Flysystem\FlysystemServiceInterface;
use Spryker\Zed\DataImport\Business\Model\DataReader\CsvReader\CsvReaderConfigurationInterface;

/**
 * @method \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface createDataSet()
 * @method \Spryker\Zed\DataImport\Business\Model\DataReader\FileResolver\FileResolverInterface createFileResolver()
 * @method \Spryker\Service\Flysystem\FlysystemServiceInterface getProvidedDependency(string $key)
 */
trait FlysystemS3BusinessFactoryTrait
{

    /**
     * @param \Pyz\Zed\CsvReader\Business\Reader\CsvReaderConfigurationInterface $csvReaderConfiguration
     *
     * @return \Spryker\Zed\DataImport\Business\Model\DataReader\CsvReader\CsvReader|\Spryker\Zed\DataImport\Business\Model\DataReader\DataReaderInterface
     */
    public function createCsvReader(CsvReaderConfigurationInterface $csvReaderConfiguration)
    {
        return new CsvReader(
            $csvReaderConfiguration,
            $this->getFlysystemService(),
            $this->createDataSet()
        );
    }

    /**
     * @param \Generated\Shared\Transfer\DataImporterReaderConfigurationTransfer $dataImporterReaderConfigurationTransfer
     *
     * @return \Spryker\Zed\DataImport\Business\Model\DataReader\DataReaderInterface
     */
    public function createCsvReaderFromConfig(DataImporterReaderConfigurationTransfer $dataImporterReaderConfigurationTransfer)
    {
        $csvReaderConfiguration = new CsvReaderConfiguration(
            $dataImporterReaderConfigurationTransfer,
            $this->createFileResolver()
        );

        return $this->createCsvReader($csvReaderConfiguration);
    }

    /**
     * @return \Spryker\Service\Flysystem\FlysystemServiceInterface
     */
    private function getFlysystemService(): FlysystemServiceInterface
    {
        return $this->getProvidedDependency(DataImportDependencyProvider::SERVICE_FLYSYSTEM);
    }

}
