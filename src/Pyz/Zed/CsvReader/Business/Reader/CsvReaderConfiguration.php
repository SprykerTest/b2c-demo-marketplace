<?php


namespace Pyz\Zed\CsvReader\Business\Reader;

use Spryker\Zed\DataImport\Business\Model\DataReader\CsvReader\CsvReaderConfiguration as SprykerCsvReaderConfiguration;

class CsvReaderConfiguration extends SprykerCsvReaderConfiguration implements CsvReaderConfigurationInterface
{
    protected const DEFAULT_FILE_SYSTEM = 's3-import';

    /**
     * @return string
     */
    public function getFileSystem(): string
    {
        return static::DEFAULT_FILE_SYSTEM;
    }
}
