<?php


namespace Pyz\Zed\ProductAlternativeDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\ProductAlternativeDataImport\ProductAlternativeDataImportDependencyProvider as SprykerProductAlternativeDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ProductAlternativeDataImportDependencyProvider extends SprykerProductAlternativeDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
