<?php

declare(strict_types=1);

/**
 * This file is part of the ddd-entity-hydration-proxy package.
 *
 * (c) Jordi Domènech Bonilla
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DDDHydration\Infrastructure\Domain\Entities\Proxies;

trait HydratableTrait
{
    public function __construct() {}

    public function __call($name, $arguments)
    {
        // Assure it starts with set
        if (0 !== \strpos($name, 'set')) {
            throw new \BadMethodCallException('The method "' . $name . '" does not exist');
        }

        // Assure we only have one argument
        if (1 !== \count($arguments)) {
            throw new \InvalidArgumentException('Only one argument allowed for method "' . $name, '"');
        }

        $property = \lcfirst(\substr($name, 3));

        // Assure the property exists
        if (!property_exists($this, $property)) {
            throw new \BadMethodCallException(
                'The property "' . $property . '" does not exist for method call "' . $name . '"',
            );
        }

        // Ignore the property if it already has value
        if (!empty($this->{$property})) {
            return;
        }

        $this->{$property} = $arguments[0];
    }
}
