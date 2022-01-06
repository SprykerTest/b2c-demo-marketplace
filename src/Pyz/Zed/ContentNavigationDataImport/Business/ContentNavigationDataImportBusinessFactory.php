<?php


namespace Pyz\Zed\ContentNavigationDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\ContentNavigationDataImport\Business\ContentNavigationDataImportBusinessFactory as SprykerContentNavigationDataImportBusinessFactory;

class ContentNavigationDataImportBusinessFactory extends SprykerContentNavigationDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
