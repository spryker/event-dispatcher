<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

declare(strict_types = 1);

namespace Spryker\Yves\EventDispatcher\Plugin\Console;

use Spryker\Service\Container\ContainerInterface;
use Spryker\Shared\ApplicationExtension\Dependency\Plugin\ApplicationPluginInterface;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Spryker\Yves\EventDispatcher\EventDispatcherFactory getFactory()
 * @method \Spryker\Yves\EventDispatcher\EventDispatcherConfig getConfig()
 */
class EventDispatcherApplicationPlugin extends AbstractPlugin implements ApplicationPluginInterface
{
    /**
     * {@inheritDoc}
     * - Adds an EventDispatcher service to the container.
     *
     * @api
     */
    public function provide(ContainerInterface $container): ContainerInterface
    {
        $container->set('event_dispatcher', function (ContainerInterface $container) {
            return $this->getFactory()->createEventDispatcher();
        });

        return $container;
    }
}
