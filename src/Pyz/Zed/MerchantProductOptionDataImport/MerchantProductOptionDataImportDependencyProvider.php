<?php


namespace Pyz\Zed\MerchantProductOptionDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\MerchantProductOptionDataImport\MerchantProductOptionDataImportDependencyProvider as SprykerMerchantProductOptionDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class MerchantProductOptionDataImportDependencyProvider extends SprykerMerchantProductOptionDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
