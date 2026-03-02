<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Glue\EventDispatcher;

use Spryker\Glue\EventDispatcher\Extender\EventDispatcherExtender;
use Spryker\Glue\EventDispatcher\Extender\EventDispatcherExtenderInterface;
use Spryker\Glue\Kernel\AbstractFactory;
use Spryker\Shared\EventDispatcher\EventDispatcher;
use Spryker\Shared\EventDispatcher\EventDispatcherInterface;

class EventDispatcherFactory extends AbstractFactory
{
    /**
     * @return array<\Spryker\Shared\EventDispatcherExtension\Dependency\Plugin\EventDispatcherPluginInterface>
     */
    public function getEventDispatcherPlugins(): array
    {
        return $this->getProvidedDependency(EventDispatcherDependencyProvider::PLUGINS_EVENT_DISPATCHER);
    }

    /**
     * @return array<\Spryker\Shared\EventDispatcherExtension\Dependency\Plugin\EventDispatcherPluginInterface>
     */
    public function getBackendEventDispatcherPlugins(): array
    {
        return $this->getProvidedDependency(EventDispatcherDependencyProvider::PLUGINS_BACKEND_EVENT_DISPATCHER);
    }

    /**
     * @return array<\Spryker\Shared\EventDispatcherExtension\Dependency\Plugin\EventDispatcherPluginInterface>
     */
    public function getStorefrontEventDispatcherPlugins(): array
    {
        return $this->getProvidedDependency(EventDispatcherDependencyProvider::PLUGINS_STOREFRONT_EVENT_DISPATCHER);
    }

    public function createStorefrontEventDispatcherExtender(): EventDispatcherExtenderInterface
    {
        return new EventDispatcherExtender($this->createEventDispatcher(), $this->getStorefrontEventDispatcherPlugins());
    }

    public function createBackendEventDispatcherExtender(): EventDispatcherExtenderInterface
    {
        return new EventDispatcherExtender($this->createEventDispatcher(), $this->getBackendEventDispatcherPlugins());
    }

    public function createEventDispatcher(): EventDispatcherInterface
    {
        return new EventDispatcher();
    }
}
