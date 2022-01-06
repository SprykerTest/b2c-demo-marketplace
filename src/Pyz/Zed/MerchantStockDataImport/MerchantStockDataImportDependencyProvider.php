<?php


namespace Pyz\Zed\MerchantStockDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\MerchantStockDataImport\MerchantStockDataImportDependencyProvider as SprykerMerchantStockDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class MerchantStockDataImportDependencyProvider extends SprykerMerchantStockDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
