<?php

/**
 * This file is part of the ddd-entity-hydration-proxy package.
 *
 * (c) Jordi Domènech Bonilla
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DDDHydration\Infrastructure\Domain\Repositories;

use DDDHydration\Domain\Repositories\PostRepository;
use DDDHydration\Infrastructure\Domain\Hydrators\ArrayPostHydrator;

class InMemoryPostRepository implements PostRepository
{
    public function all(): array
    {
        // Here we would retrieve data form our database. Instead, we will use a predefined set of values.
        $rawPosts = [
            [
                'id' => 'p1',
                'title' => 'A title 1',
                'comments' => [],
            ],
            [
                'id' => 'p2',
                'title' => 'A title 2',
                'comments' => [
                    [
                        'id' => 'c1',
                        'author' => 'Author Authory',
                        'content' => 'This is a comment 1.',
                    ],
                    [
                        'id' => 'c2',
                        'author' => 'Billy Bobbins',
                        'content' => 'This is a comment 2.',
                    ],
                ],
            ],
        ];

        // From here, we create the objects
        $postHydrator = new ArrayPostHydrator();
        $newPosts = [];

        foreach ($rawPosts as $rawPost) {
            $newPosts[] = $postHydrator->hydrate($rawPost);
        }

        return $newPosts;
    }
}
