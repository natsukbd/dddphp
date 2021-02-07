<?php

declare(strict_types=1);

namespace Tests\DDD\Domain\Model;

use DDD\ValueObjects\Domain\Model\Currency;
use DDD\ValueObjects\Domain\Model\Money;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    /**
     * @test
     */
    public function copiedMoneyShouldRepresentSameValue()
    {
        $money = new Money(100, new Currency('USD'));
        $copiedMoney = Money::fromMoney($money);
        $this->assertTrue($money->equals($copiedMoney));
    }

    /**
     * @test
     */
    public function originalMoneyShouldNotBeModifiedOnAddition()
    {
        $money = new Money(100, new Currency('USD'));
        $money->add(new Money(20, new Currency('USD')));
        $this->assertSame(100, $money->amount());
    }

    /**
     * @test
     */
    public function moniesShouldBeAdded()
    {
        $money = new Money(100, new Currency('USD'));
        $newMoney = $money->add(new Money(20, new Currency('USD')));
        $this->assertSame(120, $newMoney->amount());
    }
}
