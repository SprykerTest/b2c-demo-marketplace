<?php


namespace Pyz\Zed\CmsPageDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\CmsPageDataImport\Business\CmsPageDataImportBusinessFactory as SprykerCmsPageDataImportBusinessFactory;

class CmsPageDataImportBusinessFactory extends SprykerCmsPageDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
