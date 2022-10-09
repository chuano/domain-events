<?php

namespace App\Domain\User;

interface UserRepository
{
    public function find(string $id): User;

    public function save(User $user): void;
}
