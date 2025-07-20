<?php

/**
 * This file is part of the ddd-entity-hydration-proxy package.
 *
 * (c) Jordi Domènech Bonilla
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DDDHydration\Application;

use DDDHydration\Domain\Presenters\PostPresenter;
use DDDHydration\Domain\Repositories\PostRepository;

class GetAllPostsService
{
    /** @var PostRepository */
    private $postRepository;

    /**
     *
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @param PostPresenter $postPresenter
     *
     * @return array
     */
    public function handle(PostPresenter $postPresenter)
    {
        $posts = $this->postRepository->all();

        $presentedPosts = [];

        foreach ($posts as $post) {
            $presentedPosts[] = $postPresenter->write($post);
        }

        return $presentedPosts;
    }
}
