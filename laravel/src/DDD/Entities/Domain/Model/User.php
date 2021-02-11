<?php

declare(strict_types=1);

namespace DDD\Entities\Domain\Model;

use DDD\Entities\Domain\Event\DomainEventPublisher;

final class User
{

    /**
     * User constructor.
     * @param UserId $userId
     * @param string $email
     * @param string $password
     */
    public function __construct(
        private UserId $userId,
        private string $email,
        private string $password
    ) {
        // インスタンスが生成されたときのドメインイベント
        DomainEventPublisher::instance()->publish(
            new UserRegistered(
                $this->userId
            )
        );
    }
}
