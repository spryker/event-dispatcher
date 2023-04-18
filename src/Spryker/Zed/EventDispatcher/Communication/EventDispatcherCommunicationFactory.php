<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\EventDispatcher\Communication;

use Spryker\Shared\EventDispatcher\EventDispatcher;
use Spryker\Shared\EventDispatcher\EventDispatcherInterface;
use Spryker\Zed\EventDispatcher\EventDispatcherDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

/**
 * @method \Spryker\Zed\EventDispatcher\EventDispatcherConfig getConfig()
 */
class EventDispatcherCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return array<\Spryker\Shared\EventDispatcherExtension\Dependency\Plugin\EventDispatcherPluginInterface>
     */
    public function getEventDispatcherPlugins(): array
    {
        return $this->getProvidedDependency(EventDispatcherDependencyProvider::PLUGINS_EVENT_DISPATCHER_PLUGINS);
    }

    /**
     * @return array<\Spryker\Shared\EventDispatcherExtension\Dependency\Plugin\EventDispatcherPluginInterface>
     */
    public function getBackendGatewayEventDispatcherPlugins(): array
    {
        return $this->getProvidedDependency(EventDispatcherDependencyProvider::PLUGINS_BACKEND_GATEWAY_EVENT_DISPATCHER_PLUGINS);
    }

    /**
     * @return array<\Spryker\Shared\EventDispatcherExtension\Dependency\Plugin\EventDispatcherPluginInterface>
     */
    public function getBackendApiEventDispatcherPlugins(): array
    {
        return $this->getProvidedDependency(EventDispatcherDependencyProvider::PLUGINS_BACKEND_API_EVENT_DISPATCHER_PLUGINS);
    }

    /**
     * @return array<\Spryker\Shared\EventDispatcherExtension\Dependency\Plugin\EventDispatcherPluginInterface>
     */
    public function getMerchantPortalEventDispatcherPlugins(): array
    {
        return $this->getProvidedDependency(EventDispatcherDependencyProvider::PLUGINS_MP_EVENT_DISPATCHER_PLUGINS);
    }

    /**
     * @return \Spryker\Shared\EventDispatcher\EventDispatcherInterface
     */
    public function createEventDispatcher(): EventDispatcherInterface
    {
        return new EventDispatcher();
    }
}
