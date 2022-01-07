<?php


namespace Pyz\Service\FlysystemAws3v3FileSystem;

use Generated\Shared\Transfer\FlysystemConfigTransfer;
use Pyz\Service\FlysystemAws3v3FileSystem\Model\Builder\Filesystem\Aws3v3FilesystemBuilder;
use Spryker\Service\FlysystemAws3v3FileSystem\FlysystemAws3v3FileSystemServiceFactory as SprykerFlysystemAws3v3FileSystemServiceFactory;

/**
 * @method \Spryker\Service\FlysystemAws3v3FileSystem\FlysystemAws3v3FileSystemConfig getConfig()
 */
class FlysystemAws3v3FileSystemServiceFactory extends SprykerFlysystemAws3v3FileSystemServiceFactory
{
    /**
     * @param \Generated\Shared\Transfer\FlysystemConfigTransfer $configTransfer
     * @param \League\Flysystem\PluginInterface[] $flysystemPluginCollection
     *
     * @return \Spryker\Service\FlysystemAws3v3FileSystem\Model\Builder\Filesystem\Aws3v3FilesystemBuilder
     */
    public function createFlysystemAws3v3FileSystemBuilder(FlysystemConfigTransfer $configTransfer, array $flysystemPluginCollection = [])
    {
        return new Aws3v3FilesystemBuilder($configTransfer);
    }
}
