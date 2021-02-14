<?php

declare(strict_types=1);

namespace DDD\DomainEvents\Domain;

use Carbon\CarbonImmutable;

interface DomainEvent
{
    public function occurredOn(): CarbonImmutable;
}
