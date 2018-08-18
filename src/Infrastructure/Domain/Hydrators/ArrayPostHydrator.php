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

use DDDHydration\Domain\Entities\Post;
use DDDHydration\Domain\Hydrators\PostHydrator;
use DDDHydration\Domain\ValueObjects\PostId;
use DDDHydration\Infrastructure\Domain\Entities\Proxies\PostProxy;

class ArrayPostHydrator extends ArrayHydrator implements PostHydrator
{
    public function extract(Post $post)
    {
        // TODO: Implement extract() method.
    }

    public function hydrate($data): Post
    {
        $obj = new PostProxy();

        // Treat comments separately
        $newComments = [];

        if ($data['comments']) {
            // This can be perfectly a dependency of the class, in order to use different hydrators in different cases
            $commentHydrator = new ArrayCommentHydrator();

            foreach ($data['comments'] as $comment) {
                $newComments[] = $commentHydrator->hydrate($comment);
            }
        }

        $obj->setComments($newComments);

        unset($data['comments']);

        // Treat ID separately
        $obj->setId(new PostId($data['id']));
        unset($data['id']);

        $this->hydrateBySetMethods($obj, $data);

        return $obj;
    }
}
