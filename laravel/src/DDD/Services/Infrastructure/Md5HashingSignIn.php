<?php

declare(strict_types=1);

namespace DDD\Services\Infrastructure;

use DDD\Services\Domain\Model\User\BadCredentialsException;
use DDD\Services\Domain\Model\User\User;
use DDD\Services\Domain\Model\User\UserRepository;
use DDD\Services\Domain\Service\SignIn;
use InvalidArgumentException;
use JetBrains\PhpStorm\Pure;

final class Md5HashingSignIn implements SignIn
{
    private const SALT = 'S0m3S41T';

    /**
     * Md5HashingSignIn constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function authenticate(string $username, string $password): User
    {
        if ($this->userRepository->has($username)) {
            throw new InvalidArgumentException(
                sprintf(
                    'The user "%s" does not exist.',
                    $username
                )
            );
        }

        $user = $this->userRepository->byUserName($username);

        if ($this->isPasswordInvalidFor($user, $password)) {
            throw new BadCredentialsException(
                $user,
                $password
            );
        }
        return $user;
    }

    #[Pure] private function salt(): string
    {
        return md5(self::SALT);
    }

    private function isPasswordInvalidFor(User $user, string $unencryptedPassword): bool
    {
        $encryptedPassword = md5($unencryptedPassword . '_' . $this->salt());

        return $user->hash() !== $encryptedPassword;
    }
}
