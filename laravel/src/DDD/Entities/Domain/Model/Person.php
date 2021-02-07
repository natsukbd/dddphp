<?php

declare(strict_types=1);

namespace DDD\Entities\Domain\Model;

final class Person
{

    /**
     * Person constructor.
     * @param string $id
     * @param string $firstName
     * @param string $lastName
     */
    public function __construct(
        private string $id, // ID で識別される
        private string $firstName, // 名前が変わっても同一人物であることに変わりはない
        private string $lastName
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
