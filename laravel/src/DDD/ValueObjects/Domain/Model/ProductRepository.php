<?php

declare(strict_types=1);

namespace DDD\ValueObjects\Domain\Model;

interface ProductRepository
{
    public function add(Product $product): void;
}
