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

use DDDHydration\Domain\Entities\Post;
use DDDHydration\Domain\ValueObjects\PostId;

/**
 * Class PostProxy.
 *
 * @method void setId(PostId $commentId)
 * @method void setComments(array $comments)
 */
class PostProxy extends Post
{
    use HydratableTrait;
}
