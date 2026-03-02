<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\EventDispatcher\Communication\Plugin\Application;

use Spryker\Service\Container\ContainerInterface;
use Spryker\Shared\EventDispatcher\EventDispatcherInterface;

/**
 * @method \Spryker\Zed\EventDispatcher\Communication\EventDispatcherCommunicationFactory getFactory()
 * @method \Spryker\Zed\EventDispatcher\EventDispatcherConfig getConfig()
 */
class BackendApiEventDispatcherApplicationPlugin extends EventDispatcherApplicationPlugin
{
    protected function extendEventDispatcher(EventDispatcherInterface $eventDispatcher, ContainerInterface $container): EventDispatcherInterface
    {
        foreach ($this->getFactory()->getBackendApiEventDispatcherPlugins() as $eventDispatcherPlugin) {
            $eventDispatcher = $eventDispatcherPlugin->extend($eventDispatcher, $container);
        }

        return $eventDispatcher;
    }
}
