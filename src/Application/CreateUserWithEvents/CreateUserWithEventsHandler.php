<?php

declare(strict_types=1);

namespace App\Application\CreateUserWithEvents;

use App\Domain\Event\EventBus;
use App\Domain\User\User;
use App\Domain\User\UserRepository;

class CreateUserWithEventsHandler
{
    private UserRepository $userRepository;
    private EventBus $eventBus;

    public function __construct(UserRepository $userRepository, EventBus $eventBus)
    {
        $this->userRepository = $userRepository;
        $this->eventBus = $eventBus;
    }

    public function __invoke(CreateUserWithEventsCommand $command): void
    {
        $user = new User($command->getId(), $command->getEmail());
        $this->userRepository->save($user);

        $this->eventBus->dispatchAll($user->getEvents());
    }
}
