<?php

namespace App\Auth\Command\JoinByEmail\Request;

use App\Entity\User\UserRepository;
use Ramsey\Uuid\Uuid;

class Handler
{
    private UserRepository $users;
    private Flusher $flusher;

    public function __construct(UserRepository $users, Flusher $flusher)
    {
        $this->users = $users;
        $this->flusher = $flusher;
    }

    public function handle(Command $command): void
    {
        if (!$user = $this->users->findByConfirmToken($command->token)) {
            throw new \DomainException('Incorrect token');
        }

        $user->getJoinConfirmToken($command->token, new \DateTimeImmutable());

        $this->flusher->flush();
    }
}
