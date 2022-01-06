<?php


namespace Pyz\Zed\MerchantCategoryDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\MerchantCategoryDataImport\Business\MerchantCategoryDataImportBusinessFactory as SprykerMerchantCategoryDataImportBusinessFactory;

class MerchantCategoryDataImportBusinessFactory extends SprykerMerchantCategoryDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
