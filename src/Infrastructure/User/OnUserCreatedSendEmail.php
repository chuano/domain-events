<?php

declare(strict_types=1);

namespace App\Infrastructure\User;

use App\Domain\Shared\Mailer;
use App\Domain\User\UserCreated;
use App\Domain\User\UserRepository;

class OnUserCreatedSendEmail
{
    private UserRepository $userRepository;
    private Mailer $mailer;

    public function __construct(UserRepository $userRepository, Mailer $mailer)
    {
        $this->userRepository = $userRepository;
        $this->mailer = $mailer;
    }

    public function __invoke(UserCreated $event): void
    {
        $user = $this->userRepository->find($event->getPayload()->getId());

        $this->mailer->send(
            $user->getEmail(),
            'Bienvenido',
            'Bienvenido a nuestro sistema.'
        );
    }
}
