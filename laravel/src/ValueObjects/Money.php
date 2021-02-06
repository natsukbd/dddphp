<?php

declare(strict_types=1);

namespace DDD\ValueObjects;

use JetBrains\PhpStorm\Pure;

final class Money
{
    /**
     * Money constructor.
     * @param int $amount
     * @param Currency $currency
     */
    public function __construct(private int $amount, private Currency $currency)
    {
    }

    public function amount(): int
    {
        return $this->amount;
    }

    public function currency(): Currency
    {
        return $this->currency;
    }

    #[Pure] public function fromMoney(Money $money): Money
    {
        return new Money(
            $money->amount(),
            $money->currency(),
        );
    }

    #[Pure] public static function ofCurrency(Currency $currency): Money
    {
        return new Money(0, $currency);
    }

    #[Pure] public function increaseAmountBy(int $amount): Money
    {
        return new Money(
            $this->amount() + $amount,
            $this->currency(),
        );
    }

    #[Pure] public function equals(Money $money): bool
    {
        return $money->currency()->equals($this->currency()) &&
            $money->amount() === $this->amount();
    }
}
