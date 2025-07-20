<?php

/**
 * This file is part of the ddd-entity-hydration-proxy package.
 *
 * (c) Jordi Domènech Bonilla
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DDDHydration\Domain\Entities;

use DDDHydration\Domain\ValueObjects\PostId;
use Ramsey\Uuid\Uuid;

class Post
{
    /** @var PostId */
    protected $id;

    /** @var string */
    protected $title;

    /** @var Comment[] */
    protected $comments;

    /**
     *
     * @param PostId    $id
     * @param string    $title
     * @param Comment[] $comments
     */
    private function __construct(PostId $id, string $title, array $comments)
    {
        $this->id = $id;
        $this->title = $title;
        $this->comments = $comments;
    }

    /**
     * @return PostId
     */
    public function id(): PostId
    {
        return $this->id;
    }

    /**
     * @param PostId $id
     */
    public function setId(PostId $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }

    /**
     * @return Comment[]
     */
    public function comments(): array
    {
        return $this->comments;
    }

    /**
     * @param string $title
     *
     *
     * @return Post
     */
    public static function create(string $title)
    {
        return new self(new PostId(Uuid::uuid4()), $title, [],);
    }
}
