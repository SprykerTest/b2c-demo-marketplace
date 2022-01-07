<?php


namespace Pyz\Zed\MerchantProductDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\MerchantProductDataImport\Business\MerchantProductDataImportBusinessFactory as SprykerMerchantProductDataImportBusinessFactory;

class MerchantProductDataImportBusinessFactory extends SprykerMerchantProductDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
