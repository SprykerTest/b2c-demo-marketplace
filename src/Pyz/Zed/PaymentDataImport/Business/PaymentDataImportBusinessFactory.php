<?php


namespace Pyz\Zed\PaymentDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\PaymentDataImport\Business\PaymentDataImportBusinessFactory as SprykerPaymentDataImportBusinessFactory;

class PaymentDataImportBusinessFactory extends SprykerPaymentDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
