<?php

declare(strict_types=1);

namespace DDD\ValueObjects\Domain\Model;

final class Product
{
    /**
     * Product constructor.
     * @param int $productId
     * @param string $name
     * @param Money $price
     */
    public function __construct(
        private int $productId,
        private string $name,
        private Money $price,
    ) {
    }
}
