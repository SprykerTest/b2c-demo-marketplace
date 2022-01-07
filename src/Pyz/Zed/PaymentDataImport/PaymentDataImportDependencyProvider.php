<?php


namespace Pyz\Zed\PaymentDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\PaymentDataImport\PaymentDataImportDependencyProvider as SprykerPaymentDataImportDependencyProvider;
use Spryker\Zed\Kernel\Container;

class PaymentDataImportDependencyProvider extends SprykerPaymentDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

}
