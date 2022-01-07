<?php


namespace Pyz\Zed\CmsSlotDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\CmsSlotDataImport\Business\CmsSlotDataImportBusinessFactory as SprykerCmsSlotDataImportBusinessFactory;

class CmsSlotDataImportBusinessFactory extends SprykerCmsSlotDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
