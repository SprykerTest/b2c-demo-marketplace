<?php


namespace Pyz\Zed\CmsSlotBlockDataImport\Business;


use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\CmsSlotBlockDataImport\Business\CmsSlotBlockDataImportBusinessFactory as SprykerCmsSlotBlockDataImportBusinessFactory;

class CmsSlotBlockDataImportBusinessFactory extends SprykerCmsSlotBlockDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
