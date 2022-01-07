<?php


namespace Pyz\Service\FlysystemAws3v3FileSystem\Plugin\Flysystem;


use Generated\Shared\Transfer\FlysystemConfigTransfer;
use Spryker\Service\FlysystemAws3v3FileSystem\Plugin\Flysystem\Aws3v3FilesystemBuilderPlugin as SprykerAws3v3FilesystemBuilderPlugin;

/**
 * @method \Spryker\Service\FlysystemAws3v3FileSystem\FlysystemAws3v3FileSystemServiceFactory getFactory()
 */
class Aws3v3FilesystemBuilderPlugin extends SprykerAws3v3FilesystemBuilderPlugin
{
    /**
     * @param \Generated\Shared\Transfer\FlysystemConfigTransfer $configTransfer
     * @param \League\Flysystem\PluginInterface[] $flysystemPluginCollection
     *
     * @return \League\Flysystem\Filesystem
     */
    public function build(FlysystemConfigTransfer $configTransfer, array $flysystemPluginCollection = [])
    {
        return $this->getFactory()
            ->createFlysystemAws3v3FileSystemBuilder($configTransfer, $flysystemPluginCollection)
            ->build();
    }
}
