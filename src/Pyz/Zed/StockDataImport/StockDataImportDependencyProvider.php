<?php


namespace Pyz\Zed\StockDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\StockDataImport\StockDataImportDependencyProvider as SprykerStockDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class StockDataImportDependencyProvider extends SprykerStockDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
