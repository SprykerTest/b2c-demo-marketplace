<?php


namespace Pyz\Zed\PriceProductDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\PriceProductDataImport\PriceProductDataImportDependencyProvider as SprykerPriceProductDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class PriceProductDataImportDependencyProvider extends SprykerPriceProductDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
