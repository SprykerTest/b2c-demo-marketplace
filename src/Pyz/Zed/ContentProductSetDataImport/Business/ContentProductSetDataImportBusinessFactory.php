<?php


namespace Pyz\Zed\ContentProductSetDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\ContentProductSetDataImport\Business\ContentProductSetDataImportBusinessFactory as SprykerContentProductSetDataImportBusinessFactory;

class ContentProductSetDataImportBusinessFactory extends SprykerContentProductSetDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
