<?php

declare(strict_types=1);

namespace App\Infrastructure\User;

use App\Domain\User\User;
use App\Domain\User\UserRepository;

class InMemoryUserRepository implements UserRepository
{
    private array $users = [];

    public function find(string $id): User
    {
        return $this->users[$id];
    }

    public function save(User $user): void
    {
        $this->users[$user->getId()] = $user;
        echo "Saves user\n";
    }
}
