<?php


namespace Pyz\Zed\ProductDiscontinuedDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\ProductDiscontinuedDataImport\Business\ProductDiscontinuedDataImportBusinessFactory as SprykerProductDiscontinuedDataImportBusinessFactory;

class ProductDiscontinuedDataImportBusinessFactory extends SprykerProductDiscontinuedDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}