<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\DataImport;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3DependencyProviderTrait;
use Pyz\Zed\MerchantProductOfferDataImport\Communication\Plugin\CombinedMerchantProductOfferDataImportPlugin;
use Pyz\Zed\MerchantProductOfferDataImport\Communication\Plugin\CombinedMerchantProductOfferStoreDataImportPlugin;
use Pyz\Zed\PriceProductOfferDataImport\Communication\Plugin\CombinedPriceProductOfferDataImportPlugin;
use Pyz\Zed\ProductOfferStockDataImport\Communication\Plugin\CombinedProductOfferStockDataImportPlugin;
use Pyz\Zed\ProductOfferValidityDataImport\Communication\Plugin\CombinedProductOfferValidityDataImportPlugin;
use Spryker\Zed\AclDataImport\Communication\Plugin\AclGroupDataImportPlugin;
use Spryker\Zed\AclDataImport\Communication\Plugin\AclGroupRoleDataImportPlugin;
use Spryker\Zed\AclDataImport\Communication\Plugin\AclRoleDataImportPlugin;
use Spryker\Zed\AclEntityDataImport\Communication\Plugin\AclEntityRuleDataImportPlugin;
use Spryker\Zed\AclEntityDataImport\Communication\Plugin\AclEntitySegmentConnectorDataImportPlugin;
use Spryker\Zed\AclEntityDataImport\Communication\Plugin\AclEntitySegmentDataImportPlugin;
use Spryker\Zed\CategoryDataImport\Communication\Plugin\CategoryDataImportPlugin;
use Spryker\Zed\CategoryDataImport\Communication\Plugin\DataImport\CategoryStoreDataImportPlugin;
use Spryker\Zed\CmsPageDataImport\Communication\Plugin\CmsPageDataImportPlugin;
use Spryker\Zed\CmsPageDataImport\Communication\Plugin\CmsPageStoreDataImportPlugin;
use Spryker\Zed\CmsSlotBlockDataImport\Communication\Plugin\CmsSlotBlockDataImportPlugin;
use Spryker\Zed\CmsSlotDataImport\Communication\Plugin\CmsSlotDataImportPlugin;
use Spryker\Zed\CmsSlotDataImport\Communication\Plugin\CmsSlotTemplateDataImportPlugin;
use Spryker\Zed\ConfigurableBundleDataImport\Communication\Plugin\ConfigurableBundleTemplateDataImportPlugin;
use Spryker\Zed\ConfigurableBundleDataImport\Communication\Plugin\ConfigurableBundleTemplateImageDataImportPlugin;
use Spryker\Zed\ConfigurableBundleDataImport\Communication\Plugin\ConfigurableBundleTemplateSlotDataImportPlugin;
use Spryker\Zed\ContentBannerDataImport\Communication\Plugin\ContentBannerDataImportPlugin;
use Spryker\Zed\ContentNavigationDataImport\Communication\Plugin\DataImport\ContentNavigationDataImportPlugin;
use Spryker\Zed\ContentProductDataImport\Communication\Plugin\ContentProductAbstractListDataImportPlugin;
use Spryker\Zed\ContentProductSetDataImport\Communication\Plugin\ContentProductSetDataImportPlugin;
use Spryker\Zed\DataImport\Communication\Plugin\DataImportEventBehaviorPlugin;
use Spryker\Zed\DataImport\Communication\Plugin\DataImportPublisherPlugin;
use Spryker\Zed\DataImport\DataImportDependencyProvider as SprykerDataImportDependencyProvider;
use Spryker\Zed\FileManagerDataImport\Communication\Plugin\FileManagerDataImportPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\MerchantCategoryDataImport\Communication\Plugin\DataImport\MerchantCategoryDataImportPlugin;
use Spryker\Zed\MerchantDataImport\Communication\Plugin\MerchantDataImportPlugin;
use Spryker\Zed\MerchantDataImport\Communication\Plugin\MerchantStoreDataImportPlugin;
use Spryker\Zed\MerchantOmsDataImport\Communication\Plugin\DataImport\MerchantOmsProcessDataImportPlugin;
use Spryker\Zed\MerchantOpeningHoursDataImport\Communication\Plugin\MerchantOpeningHoursDateScheduleDataImportPlugin;
use Spryker\Zed\MerchantOpeningHoursDataImport\Communication\Plugin\MerchantOpeningHoursWeekdayScheduleDataImportPlugin;
use Spryker\Zed\MerchantProductDataImport\Communication\Plugin\MerchantProductDataImportPlugin;
use Spryker\Zed\MerchantProductOfferDataImport\Communication\Plugin\DataImport\MerchantProductOfferDataImportPlugin;
use Spryker\Zed\MerchantProductOfferDataImport\Communication\Plugin\DataImport\MerchantProductOfferStoreDataImportPlugin;
use Spryker\Zed\MerchantProductOptionDataImport\Communication\Plugin\DataImport\MerchantProductOptionGroupDataImportPlugin;
use Spryker\Zed\MerchantProfileDataImport\Communication\Plugin\MerchantProfileAddressDataImportPlugin;
use Spryker\Zed\MerchantProfileDataImport\Communication\Plugin\MerchantProfileDataImportPlugin;
use Spryker\Zed\MerchantStockDataImport\Communication\Plugin\MerchantStockDataImportPlugin;
use Spryker\Zed\PaymentDataImport\Communication\Plugin\PaymentMethodDataImportPlugin;
use Spryker\Zed\PaymentDataImport\Communication\Plugin\PaymentMethodStoreDataImportPlugin;
use Spryker\Zed\PriceProductDataImport\Communication\Plugin\PriceProductDataImportPlugin;
use Spryker\Zed\PriceProductOfferDataImport\Communication\Plugin\PriceProductOfferDataImportPlugin;
use Spryker\Zed\PriceProductScheduleDataImport\Communication\Plugin\PriceProductScheduleDataImportPlugin;
use Spryker\Zed\ProductAlternativeDataImport\Communication\Plugin\ProductAlternativeDataImportPlugin;
use Spryker\Zed\ProductDiscontinuedDataImport\Communication\Plugin\ProductDiscontinuedDataImportPlugin;
use Spryker\Zed\ProductLabelDataImport\Communication\Plugin\ProductLabelDataImportPlugin;
use Spryker\Zed\ProductLabelDataImport\Communication\Plugin\ProductLabelStoreDataImportPlugin;
use Spryker\Zed\ProductListDataImport\Communication\Plugin\ProductListCategoryDataImportPlugin;
use Spryker\Zed\ProductListDataImport\Communication\Plugin\ProductListDataImportPlugin;
use Spryker\Zed\ProductListDataImport\Communication\Plugin\ProductListProductConcreteDataImportPlugin;
use Spryker\Zed\ProductOfferStockDataImport\Communication\Plugin\ProductOfferStockDataImportPlugin;
use Spryker\Zed\ProductOfferValidityDataImport\Communication\DataImport\ProductOfferValidityDataImportPlugin;
use Spryker\Zed\ProductQuantityDataImport\Communication\Plugin\ProductQuantityDataImportPlugin;
use Spryker\Zed\ProductRelationDataImport\Communication\Plugin\ProductRelationDataImportPlugin;
use Spryker\Zed\ProductRelationDataImport\Communication\Plugin\ProductRelationStoreDataImportPlugin;
use Spryker\Zed\SalesOrderThresholdDataImport\Communication\Plugin\DataImport\SalesOrderThresholdDataImportPlugin;
use Spryker\Zed\SalesReturnDataImport\Communication\Plugin\ReturnReasonDataImportPlugin;
use Spryker\Zed\ShipmentDataImport\Communication\Plugin\ShipmentDataImportPlugin;
use Spryker\Zed\ShipmentDataImport\Communication\Plugin\ShipmentMethodPriceDataImportPlugin;
use Spryker\Zed\ShipmentDataImport\Communication\Plugin\ShipmentMethodStoreDataImportPlugin;
use Spryker\Zed\StockAddressDataImport\Communication\Plugin\DataImport\StockAddressDataImportPlugin;
use Spryker\Zed\StockDataImport\Communication\Plugin\StockDataImportPlugin;
use Spryker\Zed\StockDataImport\Communication\Plugin\StockStoreDataImportPlugin;

class DataImportDependencyProvider extends SprykerDataImportDependencyProvider
{
    use FlysystemS3DependencyProviderTrait;

    public const FACADE_AVAILABILITY = 'availability facade';
    public const FACADE_CATEGORY = 'category facade';
    public const FACADE_PRODUCT_BUNDLE = 'product bundle facade';
    public const FACADE_PRODUCT_RELATION = 'product relation facade';
    public const FACADE_PRODUCT_SEARCH = 'product search facade';
    public const FACADE_CURRENCY = 'FACADE_CURRENCY';
    public const FACADE_PRICE_PRODUCT = 'FACADE_PRICE_PRODUCT';
    public const FACADE_STOCK = 'FACADE_STOCK';
    public const FACADE_STORE = 'FACADE_STORE';
    public const FACADE_MERCHANT_USER = 'FACADE_MERCHANT_USER';

    public const SERVICE_FLYSYSTEM = 'SERVICE_FLYSYSTEM';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addAvailabilityFacade($container);
        $container = $this->addCategoryFacade($container);
        $container = $this->addProductBundleFacade($container);
        $container = $this->addProductRelationFacade($container);
        $container = $this->addProductSearchFacade($container);
        $container = $this->addCurrencyFacade($container);
        $container = $this->addPriceProductFacade($container);
        $container = $this->addStockFacade($container);
        $container = $this->addStoreFacade($container);
        $container = $this->addMerchantUserFacade($container);
        $container = $this->addFlysystemService($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addMerchantUserFacade(Container $container)
    {
        $container->set(static::FACADE_MERCHANT_USER, function (Container $container) {
            return $container->getLocator()->merchantUser()->facade();
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addAvailabilityFacade(Container $container)
    {
        $container[static::FACADE_AVAILABILITY] = function (Container $container) {
            return $container->getLocator()->availability()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCategoryFacade(Container $container)
    {
        $container->set(static::FACADE_CATEGORY, function (Container $container) {
            return $container->getLocator()->category()->facade();
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductBundleFacade(Container $container)
    {
        $container->set(static::FACADE_PRODUCT_BUNDLE, function (Container $container) {
            return $container->getLocator()->productBundle()->facade();
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductSearchFacade(Container $container)
    {
        $container->set(static::FACADE_PRODUCT_SEARCH, function (Container $container) {
            return $container->getLocator()->productSearch()->facade();
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addProductRelationFacade(Container $container)
    {
        $container[static::FACADE_PRODUCT_RELATION] = function (Container $container) {
            return $container->getLocator()->productRelation()->facade();
        };

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCurrencyFacade(Container $container): Container
    {
        $container->set(static::FACADE_CURRENCY, function (Container $container) {
            return $container->getLocator()->currency()->facade();
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addPriceProductFacade(Container $container): Container
    {
        $container->set(static::FACADE_PRICE_PRODUCT, function (Container $container) {
            return $container->getLocator()->priceProduct()->facade();
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addStockFacade(Container $container): Container
    {
        $container->set(static::FACADE_STOCK, function (Container $container) {
            return $container->getLocator()->stock()->facade();
        });

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addStoreFacade(Container $container): Container
    {
        $container->set(static::FACADE_STORE, function (Container $container) {
            return $container->getLocator()->store()->facade();
        });

        return $container;
    }

    /**
     * @return array
     */
    protected function getDataImporterPlugins(): array
    {
        return [
            new CategoryDataImportPlugin(),
            new ContentBannerDataImportPlugin(),
            new ContentProductAbstractListDataImportPlugin(),
            new ContentProductSetDataImportPlugin(),
            new CmsPageDataImportPlugin(),
            new CmsPageStoreDataImportPlugin(),
            new AclGroupDataImportPlugin(),
            new AclRoleDataImportPlugin(),
            new AclGroupRoleDataImportPlugin(),
            new AclEntityRuleDataImportPlugin(),
            new AclEntitySegmentDataImportPlugin(),
            new AclEntitySegmentConnectorDataImportPlugin(),
            new PriceProductDataImportPlugin(),
            new ProductDiscontinuedDataImportPlugin(),
            new ProductAlternativeDataImportPlugin(),
            new SalesOrderThresholdDataImportPlugin(),
            new FileManagerDataImportPlugin(),
            new PriceProductScheduleDataImportPlugin(),
            new ProductQuantityDataImportPlugin(),
            new CmsSlotTemplateDataImportPlugin(),
            new CmsSlotDataImportPlugin(),
            new CmsSlotBlockDataImportPlugin(),
            new ShipmentDataImportPlugin(),
            new ShipmentMethodPriceDataImportPlugin(),
            new ShipmentMethodStoreDataImportPlugin(),
            new StockDataImportPlugin(),
            new StockStoreDataImportPlugin(),
            new PaymentMethodDataImportPlugin(),
            new PaymentMethodStoreDataImportPlugin(),
            new ProductListDataImportPlugin(),
            new ProductListProductConcreteDataImportPlugin(),
            new ProductListCategoryDataImportPlugin(),
            new ConfigurableBundleTemplateDataImportPlugin(),
            new ConfigurableBundleTemplateSlotDataImportPlugin(),
            new ConfigurableBundleTemplateImageDataImportPlugin(),
            new ProductRelationDataImportPlugin(),
            new ProductRelationStoreDataImportPlugin(),
            new ProductLabelDataImportPlugin(),
            new ProductLabelStoreDataImportPlugin(),
            new ReturnReasonDataImportPlugin(),
            new ContentNavigationDataImportPlugin(),
            new StockAddressDataImportPlugin(),
            new CategoryStoreDataImportPlugin(),
            new MerchantDataImportPlugin(),
            new MerchantStoreDataImportPlugin(),
            new MerchantProfileDataImportPlugin(),
            new MerchantProfileAddressDataImportPlugin(),
            new MerchantProductOfferDataImportPlugin(),
            new MerchantProductOfferStoreDataImportPlugin(),
            new ProductOfferValidityDataImportPlugin(),
            new PriceProductOfferDataImportPlugin(),
            new MerchantStockDataImportPlugin(),
            new ProductOfferStockDataImportPlugin(),
            new MerchantOmsProcessDataImportPlugin(),
            new MerchantProductDataImportPlugin(),
            new MerchantOpeningHoursDateScheduleDataImportPlugin(),
            new MerchantOpeningHoursWeekdayScheduleDataImportPlugin(),
            new MerchantProductOptionGroupDataImportPlugin(),
            new CombinedMerchantProductOfferDataImportPlugin(),
            new CombinedMerchantProductOfferStoreDataImportPlugin(),
            new CombinedPriceProductOfferDataImportPlugin(),
            new CombinedProductOfferValidityDataImportPlugin(),
            new CombinedProductOfferStockDataImportPlugin(),
            new MerchantCategoryDataImportPlugin(),
        ];
    }

    /**
     * @return array
     */
    protected function getDataImportBeforeImportHookPlugins(): array
    {
        return [
            new DataImportEventBehaviorPlugin(),
        ];
    }

    /**
     * @return array
     */
    protected function getDataImportAfterImportHookPlugins(): array
    {
        return [
            new DataImportEventBehaviorPlugin(),
            new DataImportPublisherPlugin(),
        ];
    }
}
