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

use DDDHydration\Domain\Entities\Comment;
use DDDHydration\Domain\Hydrators\CommentHydrator;
use DDDHydration\Domain\ValueObjects\CommentId;
use DDDHydration\Infrastructure\Domain\Entities\Proxies\CommentProxy;

class ArrayCommentHydrator extends ArrayHydrator implements CommentHydrator
{
    public function extract(Comment $post) {}

    public function hydrate($data): Comment
    {
        $obj = new CommentProxy();

        // Treat ID separately
        $obj->setId(new CommentId($data['id']));
        unset($data['id']);

        $this->hydrateBySetMethods($obj, $data);

        return $obj;
    }
}
