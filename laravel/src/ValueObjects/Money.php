<?php

declare(strict_types=1);

namespace DDD\ValueObjects;

use InvalidArgumentException;
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

    // 不変でない状態
    // 予期せぬ呼び出しにより値が変更される可能性がある為
    // 値の状態を常に気にする必要がある
    public function add(Money $money)
    {
        if (!$money->currency()->equals($this->currency())) {
            throw new InvalidArgumentException();
        }
        $this->amount += $money->amount();
    }

    #[Pure] public function equals(Money $money): bool
    {
        return $money->currency()->equals($this->currency()) &&
            $money->amount() === $this->amount();
    }
}
