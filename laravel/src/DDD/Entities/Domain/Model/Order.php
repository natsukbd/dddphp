<?php

declare(strict_types=1);

namespace DDD\Entities\Domain\Model;

final class Order
{
    /**
     * Order constructor.
     * @param string $id
     * @param int $amount
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(
        private string $id, // IDで識別される
        private int $amount, // 数が変更されてもIDが同じであれば同じ注文である
        private string $firstName,
        private string $lastName,
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function firstName(): string
    {
        return $this->firstName;
    }

    public function lastName(): string
    {
        return $this->lastName;
    }
}
