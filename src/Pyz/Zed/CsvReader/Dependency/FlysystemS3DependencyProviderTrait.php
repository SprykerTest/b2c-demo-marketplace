<?php


namespace Pyz\Zed\CsvReader\Dependency;


use Pyz\Zed\DataImport\DataImportDependencyProvider;
use Spryker\Service\Flysystem\FlysystemServiceInterface;
use Spryker\Zed\Kernel\Container;

trait FlysystemS3DependencyProviderTrait
{
    /**
     * @param Container $container
     *
     * @return Container
     */
    private function addFlysystemService(Container $container): Container
    {
        $container->set(DataImportDependencyProvider::SERVICE_FLYSYSTEM, function (Container $container): FlysystemServiceInterface {
            return $container->getLocator()->flysystem()->service();
        });

        return $container;
    }
}
