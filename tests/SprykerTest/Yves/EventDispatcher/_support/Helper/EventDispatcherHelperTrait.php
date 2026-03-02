<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Yves\EventDispatcher\Helper;

use Codeception\Module;

trait EventDispatcherHelperTrait
{
    protected function getEventDispatcherHelper(): EventDispatcherHelper
    {
        /** @var \SprykerTest\Yves\EventDispatcher\Helper\EventDispatcherHelper $eventDispatcherHelper */
        $eventDispatcherHelper = $this->getModule('\\' . EventDispatcherHelper::class);

        return $eventDispatcherHelper;
    }

    abstract protected function getModule(string $name): Module;
}
