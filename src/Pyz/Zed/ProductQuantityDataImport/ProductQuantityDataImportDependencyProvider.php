<?php


namespace Pyz\Zed\ProductQuantityDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\ProductQuantityDataImport\ProductQuantityDataImportDependencyProvider as SprykerProductQuantityDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ProductQuantityDataImportDependencyProvider extends SprykerProductQuantityDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
