<?php


namespace Pyz\Zed\SalesReturnDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\SalesReturnDataImport\Business\SalesReturnDataImportBusinessFactory as SprykerSalesReturnDataImportBusinessFactory;

class SalesReturnDataImportBusinessFactory extends SprykerSalesReturnDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
