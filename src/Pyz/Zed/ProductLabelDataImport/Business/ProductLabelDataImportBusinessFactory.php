<?php


namespace Pyz\Zed\ProductLabelDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\ProductLabelDataImport\Business\ProductLabelDataImportBusinessFactory as SprykerProductLabelDataImportBusinessFactory;

class ProductLabelDataImportBusinessFactory extends SprykerProductLabelDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
