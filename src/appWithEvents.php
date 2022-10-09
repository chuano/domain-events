<?php

use App\Application\CreateUserWithEvents\CreateUserWithEventsCommand;
use App\Application\CreateUserWithEvents\CreateUserWithEventsHandler;
use App\Infrastructure\Event\InMemoryEventBus;
use App\Infrastructure\Shared\FakeLogger;
use App\Infrastructure\Shared\FakeMailer;
use App\Infrastructure\User\InMemoryUserRepository;

require "vendor/autoload.php";

$repository = new InMemoryUserRepository();
$mailer = new FakeMailer();
$logger = new FakeLogger();

$eventBus = new InMemoryEventBus($repository, $mailer, $logger);

$command = new CreateUserWithEventsCommand($argv[1], $argv[2]);
$handler = new CreateUserWithEventsHandler($repository, $eventBus);

$handler($command);
