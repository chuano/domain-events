<?php

declare(strict_types=1);

namespace App\Domain\User;

class User
{
    private array $events;
    private string $id;
    private string $email;

    public function __construct(string $id, string $email)
    {
        $this->id = $id;
        $this->email = $email;
        $this->events[] = new UserCreated(
            new UserCreatedPayload($id)
        );
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getEvents(): array
    {
        return $this->events;
    }
}
