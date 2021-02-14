<?php

declare(strict_types=1);

namespace DDD\DomainEvents\Domain\Model\User;

use Carbon\CarbonImmutable;
use DDD\DomainEvents\Domain\DomainEvent;
use JetBrains\PhpStorm\Immutable;
use JetBrains\PhpStorm\Pure;

#[Immutable]
final class UserRegistered implements DomainEvent
{
    /**
     * @var CarbonImmutable
     */
    private CarbonImmutable $occurredOn;

    /**
     * UserRegistered constructor.
     * @param UserId $userId
     */
    #[Pure] public function __construct(private UserId $userId) // Entity を識別するために ID をもつ
    {
        // 発生日時をもつ
        $this->occurredOn = new CarbonImmutable();
    }

    public function userId(): UserId
    {
        return $this->userId;
    }

    public function occurredOn(): CarbonImmutable
    {
        return $this->occurredOn;
    }
}
