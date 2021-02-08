<?php

declare(strict_types=1);

namespace DDD\Entities\Domain\Model;

use JetBrains\PhpStorm\Pure;

final class Status
{
    private const PUBLISHED = 10;
    private const DRAFT = 20;

    /**
     * Status constructor.
     * @param int $status
     */
    public function __construct(private int $status)
    {
    }

    #[Pure] public static function published(): Status
    {
        return new Status(self::PUBLISHED);
    }

    #[Pure] public static function draft(): Status
    {
        return new Status(self::DRAFT);
    }

    public function equalTo(self $status): bool
    {
        return $this->status === $status->status;
    }
}
