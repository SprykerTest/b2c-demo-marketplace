<?php


namespace Pyz\Zed\MerchantOmsDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\MerchantOmsDataImport\Business\MerchantOmsDataImportBusinessFactory as SprykerMerchantOmsDataImportBusinessFactory;

class MerchantOmsDataImportBusinessFactory extends SprykerMerchantOmsDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
