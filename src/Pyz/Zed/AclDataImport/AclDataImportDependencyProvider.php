<?php


namespace Pyz\Zed\AclDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\AclDataImport\AclDataImportDependencyProvider as SprykerAclDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class AclDataImportDependencyProvider extends SprykerAclDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
