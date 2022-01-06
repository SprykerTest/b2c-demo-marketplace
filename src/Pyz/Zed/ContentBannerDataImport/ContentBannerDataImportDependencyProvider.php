<?php


namespace Pyz\Zed\ContentBannerDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\ContentBannerDataImport\ContentBannerDataImportDependencyProvider as SprykerContentBannerDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ContentBannerDataImportDependencyProvider extends SprykerContentBannerDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
