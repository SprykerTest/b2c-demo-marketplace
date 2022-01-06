<?php


namespace Pyz\Zed\MerchantOpeningHoursDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\MerchantOpeningHoursDataImport\MerchantOpeningHoursDataImportDependencyProvider as SprykerMerchantOpeningHoursDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class MerchantOpeningHoursDataImportDependencyProvider extends SprykerMerchantOpeningHoursDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
