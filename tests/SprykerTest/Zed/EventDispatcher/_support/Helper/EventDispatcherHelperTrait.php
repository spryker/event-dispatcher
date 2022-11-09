<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\EventDispatcher\Helper;

use Codeception\Module;

trait EventDispatcherHelperTrait
{
    /**
     * @return \SprykerTest\Zed\EventDispatcher\Helper\EventDispatcherHelper
     */
    protected function getEventDispatcherHelper(): EventDispatcherHelper
    {
        /** @var \SprykerTest\Zed\EventDispatcher\Helper\EventDispatcherHelper $eventDispatcherHelper */
        $eventDispatcherHelper = $this->getModule('\\' . EventDispatcherHelper::class);

        return $eventDispatcherHelper;
    }

    /**
     * @param string $name
     *
     * @return \Codeception\Module
     */
    abstract protected function getModule(string $name): Module;
}
