<?php


namespace Pyz\Zed\FileManagerDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\FileManagerDataImport\Business\FileManagerDataImportBusinessFactory as SprykerFileManagerDataImportBusinessFactory;

class FileManagerDataImportBusinessFactory extends SprykerFileManagerDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
