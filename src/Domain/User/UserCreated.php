<?php

declare(strict_types=1);

namespace App\Domain\User;

use App\Domain\Event\Event;

class UserCreated implements Event
{
    private UserCreatedPayload $payload;

    public function __construct(UserCreatedPayload $payload)
    {
        $this->payload = $payload;
    }

    public function getName(): string
    {
        return 'user.created';
    }

    public function getPayload(): UserCreatedPayload
    {
        return $this->payload;
    }
}
