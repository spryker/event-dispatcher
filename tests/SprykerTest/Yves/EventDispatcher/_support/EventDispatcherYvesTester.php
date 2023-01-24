<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Yves\EventDispatcher;

use Codeception\Actor;
use Codeception\Stub;
use Spryker\Service\Container\ContainerInterface;
use Spryker\Shared\EventDispatcherExtension\Dependency\Plugin\EventDispatcherPluginInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher;
use Symfony\Component\Stopwatch\Stopwatch;

/**
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
 */
class EventDispatcherYvesTester extends Actor
{
    use _generated\EventDispatcherYvesTesterActions;

    /**
     * @var string
     */
    protected const SERVICE_DISPATCHER = 'dispatcher';

    /**
     * @var string
     */
    protected const SERVICE_STOPWATCH = 'stopwatch';

    /**
     * @param \Spryker\Service\Container\ContainerInterface $container
     *
     * @return \Spryker\Service\Container\ContainerInterface
     */
    public function provideTraceableEventDispatcher(ContainerInterface $container): ContainerInterface
    {
        $eventDispatcher = new EventDispatcher();
        $traceableEventDispatcher = new TraceableEventDispatcher($eventDispatcher, new Stopwatch());

        $container->set(static::SERVICE_DISPATCHER, function () use ($traceableEventDispatcher) {
            return $traceableEventDispatcher;
        });

        $container->set(static::SERVICE_STOPWATCH, function () {
            return new Stopwatch();
        });

        return $container;
    }

    /**
     * @return \Spryker\Shared\EventDispatcherExtension\Dependency\Plugin\EventDispatcherPluginInterface
     */
    public function mockEventDispatcherPlugin(): EventDispatcherPluginInterface
    {
        /** @var \Spryker\Shared\EventDispatcherExtension\Dependency\Plugin\EventDispatcherPluginInterface $eventDispatcherPluginMock */
        $eventDispatcherPluginMock = Stub::makeEmpty(EventDispatcherPluginInterface::class, [
            'extend' => function (EventDispatcher $eventDispatcher) {
                $eventDispatcher->addListener('foo', function () {
                    return 'bar';
                });

                return $eventDispatcher;
            },
        ]);

        return $eventDispatcherPluginMock;
    }
}
