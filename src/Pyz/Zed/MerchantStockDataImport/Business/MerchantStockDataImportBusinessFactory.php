<?php


namespace Pyz\Zed\MerchantStockDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\MerchantStockDataImport\Business\MerchantStockDataImportBusinessFactory as SprykerMerchantStockDataImportBusinessFactory;

class MerchantStockDataImportBusinessFactory extends SprykerMerchantStockDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
