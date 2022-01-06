<?php


namespace Pyz\Zed\SalesReturnDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\SalesReturnDataImport\SalesReturnDataImportDependencyProvider as SprykerSalesReturnDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class SalesReturnDataImportDependencyProvider extends SprykerSalesReturnDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
