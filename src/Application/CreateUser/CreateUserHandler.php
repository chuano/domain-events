<?php

declare(strict_types=1);

namespace App\Application\CreateUser;

use App\Domain\Shared\Logger;
use App\Domain\Shared\Mailer;
use App\Domain\User\User;
use App\Domain\User\UserRepository;

class CreateUserHandler
{
    private UserRepository $userRepository;
    private Mailer $mailer;
    private Logger $logger;

    public function __construct(UserRepository $userRepository, Mailer $mailer, Logger $logger)
    {
        $this->userRepository = $userRepository;
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    public function __invoke(CreateUserCommand $command): void
    {
        $user = new User($command->getId(), $command->getEmail());
        $this->userRepository->save($user);

        $this->mailer->send(
            $user->getEmail(),
            'Bienvenido',
            'Bienvenido a nuestro sistema.'
        );

        $this->logger->save('User created with id ' . $user->getId());
    }
}
