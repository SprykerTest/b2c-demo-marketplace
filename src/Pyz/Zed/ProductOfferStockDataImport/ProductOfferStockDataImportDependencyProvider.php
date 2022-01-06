<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductOfferStockDataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\ProductOfferStockDataImport\ProductOfferStockDataImportDependencyProvider as SprykerProductOfferStockDataImportDependencyProvider;

class ProductOfferStockDataImportDependencyProvider extends SprykerProductOfferStockDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }
}
