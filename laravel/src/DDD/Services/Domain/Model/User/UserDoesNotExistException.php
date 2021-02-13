<?php

declare(strict_types=1);

namespace DDD\Services\Domain\Model\User;

use Exception;
use JetBrains\PhpStorm\Pure;

final class UserDoesNotExistException extends Exception
{
    #[Pure] public static function fromUsername(string $username): UserDoesNotExistException
    {
        return new UserDoesNotExistException($username);
    }
}
