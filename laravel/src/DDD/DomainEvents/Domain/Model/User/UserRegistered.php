<?php

declare(strict_types=1);

namespace DDD\DomainEvents\Domain\Model\User;

use DateTimeImmutable;
use DDD\DomainEvents\Domain\DomainEvent;
use JetBrains\PhpStorm\Immutable;

#[Immutable]
final class UserRegistered implements DomainEvent
{
    /**
     * @var DateTimeImmutable
     */
    private DateTimeImmutable $occurredOn;

    /**
     * UserRegistered constructor.
     * @param UserId $userId
     * @param string $userEmail
     */
    public function __construct(
        private UserId $userId,
        private string $userEmail
    ) {
        // 発生日時をもつ
        $this->occurredOn = new DateTimeImmutable();
    }

    public function userId(): UserId
    {
        return $this->userId;
    }

    public function userEmail(): string
    {
        return $this->userEmail;
    }

    public function occurredOn(): DateTimeImmutable
    {
        return $this->occurredOn;
    }
}
