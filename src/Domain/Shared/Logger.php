<?php

namespace App\Domain\Shared;

interface Logger
{
    public function save(string $message): void;
}
