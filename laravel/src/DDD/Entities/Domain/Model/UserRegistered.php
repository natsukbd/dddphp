<?php

declare(strict_types=1);

namespace DDD\Entities\Domain\Model;

use DDD\Entities\Domain\Event\DomainEvent;

final class UserRegistered implements DomainEvent
{

    /**
     * UserRegistered constructor.
     * @param UserId $userId
     */
    public function __construct(\DDD\Entities\Domain\Model\UserId $userId)
    {
    }
}
