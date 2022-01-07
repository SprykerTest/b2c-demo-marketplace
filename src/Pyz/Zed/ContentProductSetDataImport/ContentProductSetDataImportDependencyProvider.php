<?php


namespace Pyz\Zed\ContentProductSetDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\ContentProductSetDataImport\ContentProductSetDataImportDependencyProvider as SprykerContentProductSetDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ContentProductSetDataImportDependencyProvider extends SprykerContentProductSetDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
