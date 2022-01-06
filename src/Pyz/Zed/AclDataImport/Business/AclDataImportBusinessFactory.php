<?php


namespace Pyz\Zed\AclDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\AclDataImport\Business\AclDataImportBusinessFactory as SprykerAclDataImportBusinessFactory;

class AclDataImportBusinessFactory extends SprykerAclDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
