<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\MerchantOms;

use Spryker\Zed\MerchantOms\MerchantOmsConfig as SprykerMerchantOmsConfig;

class MerchantOmsConfig extends SprykerMerchantOmsConfig
{
    protected const MAIN_MERCHANT_OMS_PROCESS_NAME = 'MainMerchantStateMachine';
    protected const MAIN_MERCHANT_STATE_MACHINE_INITIAL_STATE = 'created';

    /**
     * @return string[]
     */
    public function getMerchantProcessInitialStateMap(): array
    {
        return array_merge(
            parent::getMerchantProcessInitialStateMap(),
            [
                static::MAIN_MERCHANT_OMS_PROCESS_NAME => static::MAIN_MERCHANT_STATE_MACHINE_INITIAL_STATE,
            ]
        );
    }

    /**
     * @api
     *
     * @return string[]
     */
    public function getMerchantOmsProcesses(): array
    {
        return array_merge(
            parent::getMerchantOmsProcesses(),
            [
                static::MAIN_MERCHANT_OMS_PROCESS_NAME,
            ]
        );
    }
}
