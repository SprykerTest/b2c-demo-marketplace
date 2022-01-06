<?php


namespace Pyz\Zed\FileManagerDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\FileManagerDataImport\FileManagerDataImportDependencyProvider as SprykerFileManagerDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class FileManagerDataImportDependencyProvider extends SprykerFileManagerDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
