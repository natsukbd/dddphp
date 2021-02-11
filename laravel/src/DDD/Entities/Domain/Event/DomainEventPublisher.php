<?php

declare(strict_types=1);

namespace DDD\Entities\Domain\Event;

use DDD\Entities\Domain\Model\PostPublished;
use JetBrains\PhpStorm\Pure;

final class DomainEventPublisher
{

    #[Pure] public static function instance(): DomainEventPublisher
    {
        return new DomainEventPublisher();
    }

    public function publish(DomainEvent $param)
    {
    }
}
