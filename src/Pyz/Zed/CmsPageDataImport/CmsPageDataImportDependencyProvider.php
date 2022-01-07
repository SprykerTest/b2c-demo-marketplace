<?php


namespace Pyz\Zed\CmsPageDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\CmsPageDataImport\CmsPageDataImportDependencyProvider as SprykerCmsPageDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class CmsPageDataImportDependencyProvider extends SprykerCmsPageDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
