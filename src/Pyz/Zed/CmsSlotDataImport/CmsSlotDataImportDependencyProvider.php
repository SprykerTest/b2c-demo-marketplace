<?php


namespace Pyz\Zed\CmsSlotDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\CmsSlotDataImport\CmsSlotDataImportDependencyProvider as SprykerCmsSlotDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class CmsSlotDataImportDependencyProvider extends SprykerCmsSlotDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
