<?php


namespace Pyz\Zed\ProductListDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\ProductListDataImport\ProductListDataImportDependencyProvider as SprykerProductListDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ProductListDataImportDependencyProvider extends SprykerProductListDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
