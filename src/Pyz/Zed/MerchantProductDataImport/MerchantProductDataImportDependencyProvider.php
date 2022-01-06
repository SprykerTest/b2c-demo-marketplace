<?php


namespace Pyz\Zed\MerchantProductDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\MerchantProductDataImport\MerchantProductDataImportDependencyProvider as SprykerMerchantProductDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class MerchantProductDataImportDependencyProvider extends SprykerMerchantProductDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
