<?php

declare(strict_types=1);

namespace DDD\ValueObjects;

final class Banking
{
    public function doSomething()
    {
        $money = new Money(100, new Currency('USD'));
        // add メソッドが可変であるため amount が 最後まで 100 であることは保証されない
        $this->otherMethod($money);
    }
}
