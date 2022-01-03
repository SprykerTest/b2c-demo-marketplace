<?php


namespace Pyz\Zed\CsvReader\Business\Reader;

use Spryker\Zed\DataImport\Business\Model\DataReader\CsvReader\CsvReaderConfigurationInterface as SprykerCsvReaderConfigurationInterface;

interface CsvReaderConfigurationInterface extends SprykerCsvReaderConfigurationInterface
{
    /**
     * @return string
     */
    public function getFileSystem(): string;
}
