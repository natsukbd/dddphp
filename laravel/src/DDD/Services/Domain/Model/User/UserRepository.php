<?php

namespace DDD\Services\Domain\Model\User;

interface UserRepository
{
    public function nextIdentity(): int;

    public function userOfEmail(string $email): User;

    public function add(User $user): void;
}
