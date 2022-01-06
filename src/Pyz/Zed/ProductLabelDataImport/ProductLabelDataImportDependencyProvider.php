<?php


namespace Pyz\Zed\ProductLabelDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\ProductLabelDataImport\ProductLabelDataImportDependencyProvider as SprykerProductLabelDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ProductLabelDataImportDependencyProvider extends SprykerProductLabelDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
