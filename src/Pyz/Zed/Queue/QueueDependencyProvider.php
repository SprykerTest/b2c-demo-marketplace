<?php

namespace Pyz\Zed\Queue;

use SprykerEngine\Zed\Kernel\Container;
use SprykerFeature\Zed\Queue\Dependency\Plugin\TaskPluginInterface;
use SprykerFeature\Zed\Queue\QueueDependencyProvider as CoreQueueDependencyProvider;

class QueueDependencyProvider extends CoreQueueDependencyProvider
{

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideBusinessLayerDependencies(Container $container)
    {
        parent::provideBusinessLayerDependencies($container);

        $container[self::WORKER_TASKS] = function (Container $container) {
            return $this->getMaiQueueTaskPlugins($container);
        };

        return $container;
    }

    /**
     * @param Container $container
     *
     * @return Container
     */
    public function provideCommunicationLayerDependencies(Container $container)
    {
        parent::provideCommunicationLayerDependencies($container);

        return $container;
    }

    /**
     * @param Container $container
     *
     * @return TaskPluginInterface[]
     */
    protected function getMaiQueueTaskPlugins(Container $container)
    {
        $plugins[] = $container->getLocator()->mailQueue()->pluginMailQueueTaskWorkerPlugin();

        return $plugins;
    }

}
