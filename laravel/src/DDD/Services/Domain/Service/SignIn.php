<?php

declare(strict_types=1);

namespace DDD\Services\Domain\Service;

interface SignIn
{
    public function authenticate(string $username, string $password);
}
