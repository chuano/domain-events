<?php

declare(strict_types=1);

namespace App\Infrastructure\Event;

use App\Domain\Event\Event;
use App\Domain\Event\EventBus;
use App\Domain\Shared\Logger;
use App\Domain\Shared\Mailer;
use App\Domain\User\UserRepository;
use App\Infrastructure\Shared\FakeLogger;
use App\Infrastructure\Shared\FakeMailer;
use App\Infrastructure\User\InMemoryUserRepository;
use App\Infrastructure\User\OnUserCreatedSaveLog;
use App\Infrastructure\User\OnUserCreatedSendEmail;

class InMemoryEventBus implements EventBus
{
    private array $subscribers;

    public function __construct(UserRepository $userRepository, Mailer $mailer, Logger $logger)
    {
        $this->subscribers = [
            'user.created' => [
                new OnUserCreatedSendEmail($userRepository, $mailer),
                new OnUserCreatedSaveLog($logger),
            ],
        ];
    }

    public function dispatchAll(array $events): void
    {
        /** @var Event $event */
        foreach ($events as $event) {
            foreach ($this->subscribers[$event->getName()] as $subscriber) {
                ($subscriber)($event);
            }
        }
    }
}
