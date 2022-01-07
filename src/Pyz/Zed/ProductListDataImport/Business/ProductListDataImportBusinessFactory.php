<?php


namespace Pyz\Zed\ProductListDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\ProductListDataImport\Business\ProductListDataImportBusinessFactory as SprykerProductListDataImportBusinessFactory;

class ProductListDataImportBusinessFactory extends SprykerProductListDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
