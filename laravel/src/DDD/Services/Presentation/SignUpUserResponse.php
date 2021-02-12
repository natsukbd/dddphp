<?php

declare(strict_types=1);

namespace DDD\Services\Presentation;

use DDD\Services\Domain\Model\User\User;

final class SignUpUserResponse
{
    /**
     * SignUpUserResponse constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->id = $user->id();
        $this->email = $user->email();
    }
}
