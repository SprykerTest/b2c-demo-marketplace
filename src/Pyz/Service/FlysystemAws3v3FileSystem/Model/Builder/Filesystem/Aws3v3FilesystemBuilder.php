<?php


namespace Pyz\Service\FlysystemAws3v3FileSystem\Model\Builder\Filesystem;

use Pyz\Service\FlysystemAws3v3FileSystem\Model\Builder\Adapter\Aws3v3AdapterBuilder;
use Spryker\Service\FlysystemAws3v3FileSystem\Model\Builder\Filesystem\Aws3v3FilesystemBuilder as SprykerAws3v3FilesystemBuilder;

class Aws3v3FilesystemBuilder extends SprykerAws3v3FilesystemBuilder
{
    /**
     * @return \Spryker\Service\FlysystemAws3v3FileSystem\Model\Builder\Adapter\AdapterBuilderInterface
     */
    protected function createAdapterBuilder()
    {
        $adapterConfigTransfer = $this->buildAdapterConfig();

        return new Aws3v3AdapterBuilder($adapterConfigTransfer);
    }
}
