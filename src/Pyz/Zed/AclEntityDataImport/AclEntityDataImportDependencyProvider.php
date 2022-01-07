<?php


namespace Pyz\Zed\AclEntityDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\AclEntityDataImport\AclEntityDataImportDependencyProvider as SprykerAclEntityDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class AclEntityDataImportDependencyProvider extends SprykerAclEntityDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
