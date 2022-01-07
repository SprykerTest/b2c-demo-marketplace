<?php


namespace Pyz\Zed\StockDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\StockDataImport\Business\StockDataImportBusinessFactory as SprykerStockDataImportBusinessFactory;

class StockDataImportBusinessFactory extends SprykerStockDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
