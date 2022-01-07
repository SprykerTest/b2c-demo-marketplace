<?php


namespace Pyz\Zed\ShipmentDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\ShipmentDataImport\Business\ShipmentDataImportBusinessFactory as SprykerShipmentDataImportBusinessFactory;

class ShipmentDataImportBusinessFactory extends SprykerShipmentDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
