<?php


namespace Pyz\Zed\ConfigurableBundleDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\ConfigurableBundleDataImport\ConfigurableBundleDataImportDependencyProvider as SprykerConfigurableBundleDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ConfigurableBundleDataImportDependencyProvider extends SprykerConfigurableBundleDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
