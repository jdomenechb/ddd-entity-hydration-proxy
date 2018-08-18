<?php

/**
 * This file is part of the ddd-entity-hydration-proxy package.
 *
 * (c) Jordi Domènech Bonilla
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DDDHydration\Domain\Presenters;

use DDDHydration\Domain\Entities\Post;

interface PostPresenter
{
    /**
     * @param Post $post
     *
     * @return mixed
     */
    public function write(Post $post);
}
