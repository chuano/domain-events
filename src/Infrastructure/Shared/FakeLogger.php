<?php

declare(strict_types=1);

namespace App\Infrastructure\Shared;

use App\Domain\Shared\Logger;

class FakeLogger implements Logger
{
    public function save(string $message): void
    {
        echo "Save log: " . $message . "\n";
    }
}
