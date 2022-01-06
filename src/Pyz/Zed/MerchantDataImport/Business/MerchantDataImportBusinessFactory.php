<?php


namespace Pyz\Zed\MerchantDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\MerchantDataImport\Business\MerchantDataImportBusinessFactory as SprykerMerchantDataImportBusinessFactory;

class MerchantDataImportBusinessFactory extends SprykerMerchantDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
