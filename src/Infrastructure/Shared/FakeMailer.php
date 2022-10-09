<?php

declare(strict_types=1);

namespace App\Infrastructure\Shared;

use App\Domain\Shared\Mailer;

class FakeMailer implements Mailer
{
    public function send(string $mailAddress, string $subject, string $body): void
    {
        echo "Sends e-mail to " . $mailAddress . "\n";
    }
}
