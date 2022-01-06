<?php


namespace Pyz\Zed\ProductRelationDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\ProductRelationDataImport\ProductRelationDataImportDependencyProvider as SprykerProductRelationDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ProductRelationDataImportDependencyProvider extends SprykerProductRelationDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
