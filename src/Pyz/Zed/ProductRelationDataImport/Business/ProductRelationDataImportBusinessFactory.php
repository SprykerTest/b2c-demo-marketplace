<?php


namespace Pyz\Zed\ProductRelationDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\ProductRelationDataImport\Business\ProductRelationDataImportBusinessFactory as SprykerProductRelationDataImportBusinessFactory;

class ProductRelationDataImportBusinessFactory extends SprykerProductRelationDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
