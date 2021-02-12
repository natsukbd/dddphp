<?php

declare(strict_types=1);

namespace DDD\Services\Application\Services;


use DDD\Services\Domain\Model\User\User;
use DDD\Services\Domain\Model\User\UserAlreadyExistsException;
use DDD\Services\Domain\Model\User\UserRepository;
use DDD\Services\Presentation\SignUpUserRequest;
use DDD\Services\Presentation\SignUpUserResponse;

final class SignUpUserService
{
    /**
     * SignUpUserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(
        private UserRepository $userRepository
    ) {
    }

    /**
     * @param SignUpUserRequest $request
     * @throws UserAlreadyExistsException
     */
    public function execute(SignUpUserRequest $request): SignUpUserResponse
    {
        $user = $this->userRepository->userOfEmail($request->email);
        if ($user) {
            throw new UserAlreadyExistsException();
        }

        $user = new User(
            $this->userRepository->nextIdentity(),
            $request->email,
            $request->password
        );

        $this->userRepository->add($user);

        return new SignUpUserResponse($user);
    }
}
