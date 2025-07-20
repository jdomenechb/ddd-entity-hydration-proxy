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

use DDDHydration\Domain\ValueObjects\CommentId;
use Ramsey\Uuid\Uuid;

class Comment
{
    /** @var CommentId */
    protected $id;

    /** @var string */
    protected $author;

    /** @var string */
    protected $content;

    /**
     *
     * @param CommentId $id
     * @param string    $author
     * @param string    $content
     */
    private function __construct(CommentId $id, string $author, string $content)
    {
        $this->id = $id;
        $this->author = $author;
        $this->content = $content;
    }

    /**
     * @param string $author
     * @param string $content
     *
     *
     * @return Comment
     */
    public static function create(string $author, string $content)
    {
        return new self(new CommentId(Uuid::uuid4()), $author, $content,);
    }

    /**
     * @return string
     */
    public function author(): string
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function content(): string
    {
        return $this->content;
    }
}
