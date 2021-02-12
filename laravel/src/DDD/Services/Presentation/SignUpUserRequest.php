<?php

declare(strict_types=1);

namespace DDD\Services\Presentation;


final class SignUpUserRequest
{
    /**
     * SignUpUserRequest constructor.
     * @param string $email
     * @param string $password
     */
    public function __construct(public string $email, public string $password)
    {
    }
}
