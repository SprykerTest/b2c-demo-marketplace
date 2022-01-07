<?php


namespace Pyz\Zed\MerchantProfileDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\MerchantProfileDataImport\MerchantProfileDataImportDependencyProvider as SprykerMerchantProfileDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class MerchantProfileDataImportDependencyProvider extends SprykerMerchantProfileDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
