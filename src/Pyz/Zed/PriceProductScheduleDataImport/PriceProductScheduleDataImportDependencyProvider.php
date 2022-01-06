<?php


namespace Pyz\Zed\PriceProductScheduleDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\PriceProductScheduleDataImport\PriceProductScheduleDataImportDependencyProvider as SprykerPriceProductScheduleDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class PriceProductScheduleDataImportDependencyProvider extends SprykerPriceProductScheduleDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
