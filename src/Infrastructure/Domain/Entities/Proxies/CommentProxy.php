<?php

/**
 * This file is part of the ddd-entity-hydration-proxy package.
 *
 * (c) Jordi Domènech Bonilla
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DDDHydration\Infrastructure\Domain\Entities\Proxies;

use DDDHydration\Domain\Entities\Comment;
use DDDHydration\Domain\ValueObjects\CommentId;

/**
 * Class CommentProxy.
 *
 * @method void setId(CommentId $commentId)
 */
class CommentProxy extends Comment
{
    use HydratableTrait;
}
