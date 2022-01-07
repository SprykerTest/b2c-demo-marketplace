<?php


namespace Pyz\Zed\ContentNavigationDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\ContentNavigationDataImport\ContentNavigationDataImportDependencyProvider as SprykerContentNavigationDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ContentNavigationDataImportDependencyProvider extends SprykerContentNavigationDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
