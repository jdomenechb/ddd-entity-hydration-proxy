<?php

/**
 * This file is part of the ddd-entity-hydration-proxy package.
 *
 * (c) Jordi Domènech Bonilla
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
require_once __DIR__ . '/../vendor/autoload.php';

use DDDHydration\Infrastructure\Commands\GetAllPostsCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new GetAllPostsCommand());

$application->run();
