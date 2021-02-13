<?php

declare(strict_types=1);

namespace DDD\Services\Infrastructure;

use DDD\Services\Domain\Model\User\BadCredentialsException;
use DDD\Services\Domain\Model\User\User;
use DDD\Services\Domain\Model\User\UserDoesNotExistException;
use DDD\Services\Domain\Model\User\UserRepository;
use DDD\Services\Domain\Service\SignIn;

final class DefaultHashingSignIn implements SignIn
{
    /**
     * DefaultHashingSignIn constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(private UserRepository $userRepository)
    {
    }

    /**
     * @param string $username
     * @param string $password
     * @throws UserDoesNotExistException|BadCredentialsException
     */
    public function authenticate(string $username, string $password)
    {
        if (!$this->userRepository->has($username)) {
            throw UserDoesNotExistException::fromUsername($username);
        }

        $user = $this->userRepository->byUserName($username);

        if (!$this->isPasswordValidForUser($user, $password)) {
            throw new BadCredentialsException();
        }
    }

    private function isPasswordValidForUser(User $user, string $unencryptedPassword): bool
    {
        return password_verify(
            $user,
            $unencryptedPassword,
        );
    }
}
