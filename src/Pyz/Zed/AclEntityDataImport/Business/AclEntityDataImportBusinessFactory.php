<?php

namespace Pyz\Zed\AclEntityDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\AclEntityDataImport\Business\AclEntityDataImportBusinessFactory as SprykerAclEntityDataImportBusinessFactory;

/**
 * @method \Spryker\Zed\AclEntityDataImport\AclEntityDataImportConfig getConfig()
 */
class AclEntityDataImportBusinessFactory extends SprykerAclEntityDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
