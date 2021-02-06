<?php

declare(strict_types=1);

namespace DDD\ValueObjects;

use InvalidArgumentException;
use JetBrains\PhpStorm\Pure;

final class Currency
{
    /**
     * Currency constructor.
     * @param string $isoCode
     */
    public function __construct(private string $isoCode)
    {
        $this->validateCode();
    }

    private function validateCode()
    {
        if (!preg_match('/^[A-Z]{3}$', $this->isoCode)) {
            throw new InvalidArgumentException();
        }
    }

    public function isoCode(): string
    {
        return $this->isoCode;
    }

    #[Pure] public function equals(Currency $currency): bool
    {
        return $currency->isoCode() === $this->isoCode();
    }
}
