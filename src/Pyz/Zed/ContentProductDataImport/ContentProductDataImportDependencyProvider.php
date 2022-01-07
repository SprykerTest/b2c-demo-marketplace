<?php


namespace Pyz\Zed\ContentProductDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\ContentProductDataImport\ContentProductDataImportDependencyProvider as SprykerContentProductDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ContentProductDataImportDependencyProvider extends SprykerContentProductDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
