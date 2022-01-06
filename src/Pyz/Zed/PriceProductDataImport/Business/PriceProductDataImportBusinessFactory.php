<?php


namespace Pyz\Zed\PriceProductDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\PriceProductDataImport\Business\PriceProductDataImportBusinessFactory as SprykerPriceProductDataImportBusinessFactory;

class PriceProductDataImportBusinessFactory extends SprykerPriceProductDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
