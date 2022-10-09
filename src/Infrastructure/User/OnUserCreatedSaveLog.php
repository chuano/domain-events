<?php

declare(strict_types=1);

namespace App\Infrastructure\User;

use App\Domain\Shared\Logger;
use App\Domain\User\UserCreated;

class OnUserCreatedSaveLog
{
    private Logger $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(UserCreated $event): void
    {
        $this->logger->save('User created with id ' . $event->getPayload()->getId());
    }
}
