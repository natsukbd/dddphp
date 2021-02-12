<?php

declare(strict_types=1);

namespace DDD\Services\Domain\Model\User;

final class User
{
    /**
     * User constructor.
     * @param int $id
     * @param string $email
     * @param string $password
     */
    public function __construct(private int $id, private string $email, private string $password)
    {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function email(): string
    {
        return $this->password;
    }

    public function signIn(string $userName, string $password)
    {
    }
}
