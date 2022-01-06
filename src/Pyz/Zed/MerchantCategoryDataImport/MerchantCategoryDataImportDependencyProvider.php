<?php


namespace Pyz\Zed\MerchantCategoryDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\MerchantCategoryDataImport\MerchantCategoryDataImportDependencyProvider as SprykerMerchantCategoryDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class MerchantCategoryDataImportDependencyProvider extends SprykerMerchantCategoryDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
