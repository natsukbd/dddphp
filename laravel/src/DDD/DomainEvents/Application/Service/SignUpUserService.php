<?php

declare(strict_types=1);

namespace DDD\DomainEvents\Application\Service;

use DDD\DomainEvents\Domain\Model\User\UserAlreadyExistsException;
use DDD\DomainEvents\Domain\Model\User\UserFactory;
use DDD\DomainEvents\Domain\Model\User\UserRepository;
use DDD\DomainEvents\Domain\Model\User\UserTransformer;
use DDD\DomainEvents\Presentation\SignUpUserRequest;

final class SignUpUserService implements ApplicationService
{
    /**
     * SignUpUserService constructor.
     * @param UserRepository $userRepository
     * @param UserFactory $userFactory
     * @param UserTransformer $userTransformer
     */
    public function __construct(
        private UserRepository $userRepository,
        private UserFactory $userFactory,
        private UserTransformer $userTransformer,
    ) {
    }

    /**
     * @param SignUpUserRequest $request
     * @throws UserAlreadyExistsException
     */
    public function execute(SignUpUserRequest $request)
    {
        $email = $request->email();
        $password = $request->password();

        $user = $this->userRepository->userOfEmail($email);
        if ($user) {
            throw new UserAlreadyExistsException();
        }

        $user = $this->userFactory->build(
            $this->userRepository->nextIdentity(),
            $email,
            $password,
        );
        $this->userRepository->add($user);
        $this->userTransformer->write($user);
    }
}
