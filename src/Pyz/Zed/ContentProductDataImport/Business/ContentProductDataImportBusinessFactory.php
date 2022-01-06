<?php


namespace Pyz\Zed\ContentProductDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\ContentProductDataImport\Business\ContentProductDataImportBusinessFactory as SprykerContentProductDataImportBusinessFactory;

class ContentProductDataImportBusinessFactory extends SprykerContentProductDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
