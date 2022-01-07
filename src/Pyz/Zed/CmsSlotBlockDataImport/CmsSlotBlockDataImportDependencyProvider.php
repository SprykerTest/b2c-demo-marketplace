<?php


namespace Pyz\Zed\CmsSlotBlockDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\CmsSlotBlockDataImport\CmsSlotBlockDataImportDependencyProvider as SprykerCmsSlotBlockDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class CmsSlotBlockDataImportDependencyProvider extends SprykerCmsSlotBlockDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
