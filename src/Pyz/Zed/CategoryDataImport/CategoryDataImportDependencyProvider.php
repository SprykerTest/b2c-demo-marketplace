<?php


namespace Pyz\Zed\CategoryDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\CategoryDataImport\CategoryDataImportDependencyProvider as SprykerCategoryDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class CategoryDataImportDependencyProvider extends SprykerCategoryDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
