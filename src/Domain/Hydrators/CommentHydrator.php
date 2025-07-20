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

namespace DDDHydration\Domain\Hydrators;

use DDDHydration\Domain\Entities\Comment;

interface CommentHydrator
{
    /**
     * @param Comment $post
     *
     * @return mixed
     */
    public function extract(Comment $post);

    /**
     * @param mixed $data
     *
     * @return Comment
     */
    public function hydrate($data): Comment;
}
