<?php


namespace Pyz\Service\FlysystemAws3v3FileSystem\Model\Builder\Adapter;


use League\Flysystem\AwsS3v3\AwsS3Adapter;
use Spryker\Service\FlysystemAws3v3FileSystem\Exception\NoBucketException;
use Spryker\Service\FlysystemAws3v3FileSystem\Model\Builder\Adapter\Aws3v3AdapterBuilder as SprykerAws3v3AdapterBuilder;

class Aws3v3AdapterBuilder extends SprykerAws3v3AdapterBuilder
{
    /**
     * @throws \Spryker\Service\FlysystemAws3v3FileSystem\Exception\NoBucketException
     *
     * @return $this
     */
    protected function buildAdapter()
    {
        $bucket = $this->adapterConfig->getBucket();
        if ($bucket === null) {
            throw new NoBucketException('Bucket not set in adapter configuration.');
        }
        $this->adapter = new AwsS3Adapter($this->client, $bucket, false, [], false);

        return $this;
    }
}
