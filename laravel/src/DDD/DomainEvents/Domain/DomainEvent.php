<?php

declare(strict_types=1);

namespace DDD\DomainEvents\Domain;

use DateTimeImmutable;

interface DomainEvent
{
    public function occurredOn(): DateTimeImmutable;
}
