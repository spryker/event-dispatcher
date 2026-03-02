<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Yves\EventDispatcher;

use Spryker\Yves\Kernel\AbstractBundleDependencyProvider;
use Spryker\Yves\Kernel\Container;

/**
 * @method \Spryker\Yves\EventDispatcher\EventDispatcherConfig getConfig()
 */
class EventDispatcherDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const PLUGINS_EVENT_DISPATCHER_PLUGINS = 'PLUGINS_EVENT_DISPATCHER_PLUGINS';

    public function provideDependencies(Container $container): Container
    {
        $container = $this->addEventDispatcherPlugins($container);

        return $container;
    }

    protected function addEventDispatcherPlugins(Container $container): Container
    {
        $container->set(static::PLUGINS_EVENT_DISPATCHER_PLUGINS, function (Container $container) {
            return $this->getEventDispatcherPlugins();
        });

        return $container;
    }

    /**
     * @return array<\Spryker\Shared\EventDispatcherExtension\Dependency\Plugin\EventDispatcherPluginInterface>
     */
    protected function getEventDispatcherPlugins(): array
    {
        return [];
    }
}
