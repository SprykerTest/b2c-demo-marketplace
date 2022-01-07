<?php


namespace Pyz\Zed\MerchantOpeningHoursDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\MerchantOpeningHoursDataImport\Business\MerchantOpeningHoursDataImportBusinessFactory as SprykerMerchantOpeningHoursDataImportBusinessFactory;

class MerchantOpeningHoursDataImportBusinessFactory extends SprykerMerchantOpeningHoursDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}