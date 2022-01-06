<?php


namespace Pyz\Zed\SalesOrderThresholdDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\SalesOrderThresholdDataImport\SalesOrderThresholdDataImportDependencyProvider as SprykerSalesOrderThresholdDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class SalesOrderThresholdDataImportDependencyProvider extends SprykerSalesOrderThresholdDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
