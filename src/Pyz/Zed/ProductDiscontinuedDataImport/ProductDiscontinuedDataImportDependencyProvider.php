<?php


namespace Pyz\Zed\ProductDiscontinuedDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\ProductDiscontinuedDataImport\ProductDiscontinuedDataImportDependencyProvider as SprykerProductDiscontinuedDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ProductDiscontinuedDataImportDependencyProvider extends SprykerProductDiscontinuedDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
