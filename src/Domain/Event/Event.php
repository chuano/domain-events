<?php

namespace App\Domain\Event;

interface Event
{
    public function getName(): string;

    public function getPayload(): object;
}
