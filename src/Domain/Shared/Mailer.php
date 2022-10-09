<?php

namespace App\Domain\Shared;

interface Mailer
{
    public function send(string $mailAddress, string $subject, string $body): void;
}
