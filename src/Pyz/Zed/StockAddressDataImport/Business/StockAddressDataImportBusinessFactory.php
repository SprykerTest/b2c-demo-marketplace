<?php


namespace Pyz\Zed\StockAddressDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\StockAddressDataImport\Business\StockAddressDataImportBusinessFactory as SprykerStockAddressDataImportBusinessFactory;

class StockAddressDataImportBusinessFactory extends SprykerStockAddressDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
