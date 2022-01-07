<?php


namespace Pyz\Zed\MerchantOmsDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\MerchantOmsDataImport\MerchantOmsDataImportDependencyProvider as SprykerMerchantOmsDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class MerchantOmsDataImportDependencyProvider extends SprykerMerchantOmsDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
