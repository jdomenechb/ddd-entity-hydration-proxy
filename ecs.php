<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return ECSConfig::configure()
    ->withPaths([
        __DIR__ . '/bin',
        __DIR__ . '/src',
    ])
    ->withRootFiles()

    // add a single rule
    ->withPhpCsFixerSets(perCS: true, perCSRisky: true)

    // add sets - group of rules, from easiest to more complex ones
    // uncomment one, apply one, commit, PR, merge and repeat
    ->withPreparedSets(
        psr12: true,
        //      spaces: true,
        //      namespaces: true,
        //      docblocks: true,
        //      arrays: true,
        //      comments: true,
    )
;
