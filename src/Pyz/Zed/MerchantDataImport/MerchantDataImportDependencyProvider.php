<?php


namespace Pyz\Zed\MerchantDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\MerchantDataImport\MerchantDataImportDependencyProvider as SprykerMerchantDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class MerchantDataImportDependencyProvider extends SprykerMerchantDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
