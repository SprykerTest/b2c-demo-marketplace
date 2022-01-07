<?php


namespace Pyz\Zed\ContentBannerDataImport\Business;

use Pyz\Zed\CsvReader\Dependency\FlysystemS3BusinessFactoryTrait;
use Spryker\Zed\ContentBannerDataImport\Business\ContentBannerDataImportBusinessFactory as SprykerContentBannerDataImportBusinessFactory;

class ContentBannerDataImportBusinessFactory extends SprykerContentBannerDataImportBusinessFactory
{
    use FlysystemS3BusinessFactoryTrait;
}
