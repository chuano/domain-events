<?php

use App\Application\CreateUser\CreateUserCommand;
use App\Application\CreateUser\CreateUserHandler;
use App\Infrastructure\Shared\FakeLogger;
use App\Infrastructure\Shared\FakeMailer;
use App\Infrastructure\User\InMemoryUserRepository;

require "vendor/autoload.php";

$repository = new InMemoryUserRepository();
$mailer = new FakeMailer();
$logger = new FakeLogger();

$command = new CreateUserCommand($argv[1], $argv[2]);
$handler = new CreateUserHandler($repository, $mailer, $logger);

$handler($command);
