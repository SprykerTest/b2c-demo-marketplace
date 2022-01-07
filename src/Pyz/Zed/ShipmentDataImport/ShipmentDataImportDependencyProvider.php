<?php


namespace Pyz\Zed\ShipmentDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\ShipmentDataImport\ShipmentDataImportDependencyProvider as SprykerShipmentDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class ShipmentDataImportDependencyProvider extends SprykerShipmentDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
