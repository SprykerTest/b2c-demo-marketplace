<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ShopApplication;

use Spryker\Yves\ErrorHandler\Plugin\Application\ErrorHandlerApplicationPlugin;
use Spryker\Yves\EventDispatcher\Plugin\Application\EventDispatcherApplicationPlugin;
use Spryker\Yves\Form\Plugin\Application\FormApplicationPlugin;
use Spryker\Yves\Http\Plugin\Application\HttpApplicationPlugin;
use Spryker\Yves\Locale\Plugin\Application\LocaleApplicationPlugin;
use Spryker\Yves\Messenger\Plugin\Application\FlashMessengerApplicationPlugin;
use Spryker\Yves\Router\Plugin\Application\RouterApplicationPlugin;
use Spryker\Yves\Security\Plugin\Application\SecurityApplicationPlugin;
use Spryker\Yves\Session\Plugin\Application\SessionApplicationPlugin;
use Spryker\Yves\Store\Plugin\Application\StoreApplicationPlugin;
use Spryker\Yves\Translator\Plugin\Application\TranslatorApplicationPlugin;
use Spryker\Yves\Twig\Plugin\Application\TwigApplicationPlugin;
use Spryker\Yves\Validator\Plugin\Application\ValidatorApplicationPlugin;
use SprykerShop\Yves\AgentWidget\Widget\AgentControlBarWidget;
use SprykerShop\Yves\AvailabilityNotificationWidget\Widget\AvailabilityNotificationSubscriptionWidget;
use SprykerShop\Yves\BarcodeWidget\Widget\BarcodeWidget;
use SprykerShop\Yves\CartCodeWidget\Widget\CartCodeFormWidget;
use SprykerShop\Yves\CartNoteWidget\Plugin\ShopApplication\CartItemNoteFormWidgetCacheKeyGeneratorStrategyPlugin;
use SprykerShop\Yves\CartNoteWidget\Widget\CartItemNoteFormWidget;
use SprykerShop\Yves\CartNoteWidget\Widget\CartNoteFormWidget;
use SprykerShop\Yves\CartPage\Widget\AddItemsFormWidget;
use SprykerShop\Yves\CartPage\Widget\AddToCartFormWidget;
use SprykerShop\Yves\CartPage\Widget\CartAddProductAsSeparateItemWidget;
use SprykerShop\Yves\CartPage\Widget\CartChangeQuantityFormWidget;
use SprykerShop\Yves\CartPage\Widget\ProductAbstractAddToCartButtonWidget;
use SprykerShop\Yves\CartPage\Widget\RemoveFromCartFormWidget;
use SprykerShop\Yves\CategoryImageStorageWidget\Widget\CategoryImageStorageWidget;
use SprykerShop\Yves\CheckoutWidget\Widget\CheckoutBreadcrumbWidget;
use SprykerShop\Yves\CheckoutWidget\Widget\ProceedToCheckoutButtonWidget;
use SprykerShop\Yves\ConfigurableBundleNoteWidget\Widget\ConfiguredBundleNoteWidget;
use SprykerShop\Yves\ConfigurableBundleWidget\Widget\QuoteConfiguredBundleWidget;
use SprykerShop\Yves\CurrencyWidget\Widget\CurrencyWidget;
use SprykerShop\Yves\CustomerPage\Plugin\Application\CustomerConfirmationUserCheckerApplicationPlugin;
use SprykerShop\Yves\CustomerPage\Widget\CustomerNavigationWidget;
use SprykerShop\Yves\CustomerReorderWidget\Plugin\CustomerPage\CustomerReorderFormWidget;
use SprykerShop\Yves\CustomerReorderWidget\Plugin\CustomerPage\CustomerReorderItemCheckboxWidget;
use SprykerShop\Yves\CustomerReorderWidget\Plugin\CustomerPage\CustomerReorderItemsFormWidget;
use SprykerShop\Yves\DiscountPromotionWidget\Plugin\ShopApplication\CartDiscountPromotionProductListWidgetCacheKeyGeneratorStrategyPlugin;
use SprykerShop\Yves\DiscountPromotionWidget\Widget\CartDiscountPromotionProductListWidget;
use SprykerShop\Yves\LanguageSwitcherWidget\Widget\LanguageSwitcherWidget;
use SprykerShop\Yves\MerchantOpeningHoursWidget\Widget\MerchantOpeningHoursWidget;
use SprykerShop\Yves\MerchantProductOfferWidget\Widget\MerchantProductOfferWidget;
use SprykerShop\Yves\MerchantProductWidget\Widget\MerchantProductWidget;
use SprykerShop\Yves\MerchantSalesReturnWidget\Plugin\MerchantSalesReturnCreateFormWidgetCacheKeyGeneratorStrategyPlugin;
use SprykerShop\Yves\MerchantSalesReturnWidget\Widget\MerchantSalesReturnCreateFormWidget;
use SprykerShop\Yves\MerchantWidget\Widget\SoldByMerchantWidget;
use SprykerShop\Yves\MoneyWidget\Widget\CurrencyIsoCodeWidget;
use SprykerShop\Yves\NewsletterWidget\Widget\NewsletterSubscriptionSummaryWidget;
use SprykerShop\Yves\NewsletterWidget\Widget\NewsletterSubscriptionWidget;
use SprykerShop\Yves\OrderCancelWidget\Widget\OrderCancelButtonWidget;
use SprykerShop\Yves\OrderCustomReferenceWidget\Widget\OrderCustomReferenceWidget;
use SprykerShop\Yves\PriceProductVolumeWidget\Widget\CurrentProductPriceVolumeWidget;
use SprykerShop\Yves\PriceProductWidget\Widget\PriceProductWidget;
use SprykerShop\Yves\PriceWidget\Widget\PriceModeSwitcherWidget;
use SprykerShop\Yves\ProductAlternativeWidget\Widget\ProductAlternativeListWidget;
use SprykerShop\Yves\ProductAlternativeWidget\Widget\ShoppingListProductAlternativeWidget;
use SprykerShop\Yves\ProductAlternativeWidget\Widget\WishlistProductAlternativeWidget;
use SprykerShop\Yves\ProductBarcodeWidget\Widget\ProductBarcodeWidget;
use SprykerShop\Yves\ProductBundleWidget\Widget\ProductBundleCartItemsListWidget;
use SprykerShop\Yves\ProductBundleWidget\Widget\ProductBundleItemCounterWidget;
use SprykerShop\Yves\ProductBundleWidget\Widget\ProductBundleItemsMultiCartItemsListWidget;
use SprykerShop\Yves\ProductBundleWidget\Widget\ProductBundleMultiCartItemsListWidget;
use SprykerShop\Yves\ProductCategoryWidget\Widget\ProductBreadcrumbsWithCategoriesWidget;
use SprykerShop\Yves\ProductDiscontinuedWidget\Widget\ProductDiscontinuedNoteWidget;
use SprykerShop\Yves\ProductDiscontinuedWidget\Widget\ProductDiscontinuedWidget;
use SprykerShop\Yves\ProductGroupWidget\Widget\ProductGroupColorWidget;
use SprykerShop\Yves\ProductGroupWidget\Widget\ProductGroupWidget;
use SprykerShop\Yves\ProductLabelWidget\Widget\ProductAbstractLabelWidget;
use SprykerShop\Yves\ProductLabelWidget\Widget\ProductConcreteLabelWidget;
use SprykerShop\Yves\ProductOptionWidget\Widget\ProductOptionConfiguratorWidget;
use SprykerShop\Yves\ProductRelationWidget\Widget\SimilarProductsWidget;
use SprykerShop\Yves\ProductRelationWidget\Widget\UpSellingProductsWidget;
use SprykerShop\Yves\ProductReplacementForWidget\Widget\ProductReplacementForListWidget;
use SprykerShop\Yves\ProductReviewWidget\Widget\DisplayProductAbstractReviewWidget;
use SprykerShop\Yves\ProductReviewWidget\Widget\ProductDetailPageReviewWidget;
use SprykerShop\Yves\ProductReviewWidget\Widget\ProductRatingFilterWidget;
use SprykerShop\Yves\ProductReviewWidget\Widget\ProductReviewDisplayWidget;
use SprykerShop\Yves\ProductSearchWidget\Widget\ProductConcreteAddWidget;
use SprykerShop\Yves\ProductSearchWidget\Widget\ProductConcreteSearchGridWidget;
use SprykerShop\Yves\ProductSearchWidget\Widget\ProductConcreteSearchWidget;
use SprykerShop\Yves\ProductWidget\Widget\CatalogPageProductWidget;
use SprykerShop\Yves\ProductWidget\Widget\CmsProductGroupWidget;
use SprykerShop\Yves\ProductWidget\Widget\CmsProductWidget;
use SprykerShop\Yves\ProductWidget\Widget\PdpProductRelationWidget;
use SprykerShop\Yves\ProductWidget\Widget\PdpProductReplacementForListWidget;
use SprykerShop\Yves\ProductWidget\Widget\ProductAlternativeWidget;
use SprykerShop\Yves\SalesConfigurableBundleWidget\Widget\OrderItemsConfiguredBundleWidget;
use SprykerShop\Yves\SalesOrderThresholdWidget\Widget\SalesOrderThresholdWidget;
use SprykerShop\Yves\SalesProductBundleWidget\Widget\OrderItemsProductBundleWidget;
use SprykerShop\Yves\ShopApplication\Plugin\Application\ShopApplicationApplicationPlugin;
use SprykerShop\Yves\ShopApplication\ShopApplicationDependencyProvider as SprykerShopApplicationDependencyProvider;
use SprykerShop\Yves\TabsWidget\Widget\FullTextSearchTabsWidget;
use SprykerShop\Yves\WebProfilerWidget\Plugin\Application\WebProfilerApplicationPlugin;
use SprykerShop\Yves\WishlistWidget\Widget\WishlistMenuItemWidget;

/**
 * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
 */
class ShopApplicationDependencyProvider extends SprykerShopApplicationDependencyProvider
{
    /**
     * @return string[]
     */
    protected function getGlobalWidgets(): array
    {
        return [
            AgentControlBarWidget::class,
            CartDiscountPromotionProductListWidget::class,
            CartCodeFormWidget::class,
            CartItemNoteFormWidget::class,
            CartNoteFormWidget::class,
            CatalogPageProductWidget::class,
            CheckoutBreadcrumbWidget::class,
            CmsProductGroupWidget::class,
            CmsProductWidget::class,
            CurrencyWidget::class,
            CurrencyIsoCodeWidget::class,
            CustomerNavigationWidget::class,
            CustomerReorderItemCheckboxWidget::class,
            DisplayProductAbstractReviewWidget::class,
            ProductGroupColorWidget::class,
            LanguageSwitcherWidget::class,
            NewsletterSubscriptionWidget::class,
            NewsletterSubscriptionSummaryWidget::class,
            PdpProductRelationWidget::class,
            PdpProductReplacementForListWidget::class,
            ProductReplacementForListWidget::class,
            PriceModeSwitcherWidget::class,
            ProductAbstractLabelWidget::class,
            ProductAlternativeListWidget::class,
            ProductAlternativeWidget::class,
            ProductBarcodeWidget::class,
            ProductBreadcrumbsWithCategoriesWidget::class,
            ProductBundleCartItemsListWidget::class,
            ProductBundleItemCounterWidget::class,
            ProductBundleItemsMultiCartItemsListWidget::class,
            ProductBundleMultiCartItemsListWidget::class,
            ProductConcreteLabelWidget::class,
            ProductDetailPageReviewWidget::class,
            ProductDiscontinuedNoteWidget::class,
            ProductDiscontinuedWidget::class,
            ProductGroupWidget::class,
            ProductOptionConfiguratorWidget::class,
            CurrentProductPriceVolumeWidget::class,
            ProductRatingFilterWidget::class,
            ProductReviewDisplayWidget::class,
            SalesOrderThresholdWidget::class,
            ShoppingListProductAlternativeWidget::class,
            SimilarProductsWidget::class,
            UpSellingProductsWidget::class,
            WishlistMenuItemWidget::class,
            WishlistProductAlternativeWidget::class,
            FullTextSearchTabsWidget::class,
            ProceedToCheckoutButtonWidget::class,
            ProductConcreteSearchWidget::class,
            ProductConcreteSearchGridWidget::class,
            PriceProductWidget::class,
            CategoryImageStorageWidget::class,
            AvailabilityNotificationSubscriptionWidget::class,
            ProductConcreteAddWidget::class,
            QuoteConfiguredBundleWidget::class,
            ConfiguredBundleNoteWidget::class,
            OrderCustomReferenceWidget::class,
            OrderItemsConfiguredBundleWidget::class,
            BarcodeWidget::class,
            AddToCartFormWidget::class,
            AddItemsFormWidget::class,
            CartChangeQuantityFormWidget::class,
            CustomerReorderFormWidget::class,
            CustomerReorderItemsFormWidget::class,
            OrderItemsProductBundleWidget::class,
            RemoveFromCartFormWidget::class,
            ProductAbstractAddToCartButtonWidget::class,
            OrderCancelButtonWidget::class,
            CartAddProductAsSeparateItemWidget::class,
            MerchantProductOfferWidget::class,
            SoldByMerchantWidget::class,
            CurrentProductPriceVolumeWidget::class,
            SoldByMerchantWidget::class,
            MerchantProductWidget::class,
            MerchantOpeningHoursWidget::class,
            MerchantSalesReturnCreateFormWidget::class,
        ];
    }

    /**
     * @return \SprykerShop\Yves\ShopApplicationExtension\Dependency\Plugin\WidgetCacheKeyGeneratorStrategyPluginInterface[]
     */
    protected function getWidgetCacheKeyGeneratorStrategyPlugins(): array
    {
        return [
            new CartDiscountPromotionProductListWidgetCacheKeyGeneratorStrategyPlugin(),
            new CartItemNoteFormWidgetCacheKeyGeneratorStrategyPlugin(),
            new MerchantSalesReturnCreateFormWidgetCacheKeyGeneratorStrategyPlugin(),
        ];
    }

    /**
     * @return \Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface[]
     */
    protected function getApplicationPlugins(): array
    {
        $applicationPlugins = [
            new TwigApplicationPlugin(),
            new EventDispatcherApplicationPlugin(),
            new ShopApplicationApplicationPlugin(),
            new StoreApplicationPlugin(),
            new LocaleApplicationPlugin(),
            new TranslatorApplicationPlugin(),
            new RouterApplicationPlugin(),
            new SessionApplicationPlugin(),
            new HttpApplicationPlugin(),
            new ErrorHandlerApplicationPlugin(),
            new FlashMessengerApplicationPlugin(),
            new FormApplicationPlugin(),
            new ValidatorApplicationPlugin(),
            new SecurityApplicationPlugin(),
            new CustomerConfirmationUserCheckerApplicationPlugin(),
        ];

        if (class_exists(WebProfilerApplicationPlugin::class)) {
            $applicationPlugins[] = new WebProfilerApplicationPlugin();
        }

        return $applicationPlugins;
    }
}
