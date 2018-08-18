<?php

/**
 * This file is part of the ddd-entity-hydration-proxy package.
 *
 * (c) Jordi Domènech Bonilla
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DDDHydration\Infrastructure\Domain\Presenters;

use DDDHydration\Domain\Entities\Post;
use DDDHydration\Domain\Presenters\PostPresenter;

class StdClassPostPresenter implements PostPresenter
{
    /**
     * @param Post $post
     *
     * @return \stdClass
     */
    public function write(Post $post): \stdClass
    {
        // Present comments
        $commentsObj = [];

        foreach ($post->comments() as $comment) {
            $commentObj = new \stdClass();
            $commentObj->author = $comment->author();
            $commentObj->content = $comment->content();

            $commentsObj[] = $commentObj;
        }

        // Present object
        $obj = new \stdClass();
        $obj->title = $post->title();
        $obj->comments = $commentsObj;

        return $obj;
    }
}
