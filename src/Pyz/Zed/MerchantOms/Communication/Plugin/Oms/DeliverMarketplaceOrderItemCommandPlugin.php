<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\MerchantOms\Communication\Plugin\Oms;

class DeliverMarketplaceOrderItemCommandPlugin extends AbstractTriggerOmsEventCommandPlugin
{
    protected const EVENT_DELIVER = 'deliver';

    /**
     * @return string
     */
    public function getEventName(): string
    {
        return static::EVENT_DELIVER;
    }
}
