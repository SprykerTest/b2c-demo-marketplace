<?php


namespace Pyz\Zed\MerchantProfileDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\MerchantProfileDataImport\Business\MerchantProfileDataImportBusinessFactory as SprykerMerchantProfileDataImportBusinessFactory;

class MerchantProfileDataImportBusinessFactory extends SprykerMerchantProfileDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
