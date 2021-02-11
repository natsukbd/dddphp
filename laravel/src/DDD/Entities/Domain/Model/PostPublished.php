<?php

declare(strict_types=1);

namespace DDD\Entities\Domain\Model;

use DDD\Entities\Domain\Event\DomainEvent;

final class PostPublished implements DomainEvent
{
    /**
     * PostPublished constructor.
     * @param $id
     */
    public function __construct($id)
    {
    }
}
