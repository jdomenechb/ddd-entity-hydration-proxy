<?php

/**
 * This file is part of the ddd-entity-hydration-proxy package.
 *
 * (c) Jordi Domènech Bonilla
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DDDHydration\Infrastructure\Domain\Hydrators;

abstract class ArrayHydrator
{
    protected function hydrateBySetMethods($obj, $data)
    {
        foreach ($data as $key => $value) {
            $setter = 'set' . ucfirst($key);
            $obj->{$setter}($value);
        }
    }
}
