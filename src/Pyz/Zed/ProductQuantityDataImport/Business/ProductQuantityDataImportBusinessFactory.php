<?php


namespace Pyz\Zed\ProductQuantityDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\ProductQuantityDataImport\Business\ProductQuantityDataImportBusinessFactory as SprykerProductQuantityDataImportBusinessFactory;

class ProductQuantityDataImportBusinessFactory extends SprykerProductQuantityDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
