<?php


namespace Pyz\Zed\StockAddressDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\StockAddressDataImport\StockAddressDataImportDependencyProvider as SprykerStockAddressDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class StockAddressDataImportDependencyProvider extends SprykerStockAddressDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
