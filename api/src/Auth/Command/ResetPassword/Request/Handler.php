<?php

namespace App\Auth\Command\Request\ResetPassword;

use App\Auth\Command\JoinByEmail\Request\Command;
use App\Entity\User\Email;
use App\Entity\User\UserRepository;
use App\Service\Tokenizer;
use Ramsey\Uuid\Uuid;

class Handler
{
    private UserRepository $users;
    private Tokenizer $tokenizer;
    private Flusher $flusher;
    private PasswordResetTokenSender $sender;

    public function __construct(
        UserRepository $users,
        Tokenizer $tokenizer,
        Flusher $flusher,
        PasswordResetTokenSender $sender,
    )
    {
        $this->users = $users;
        $this->tokenizer = $tokenizer;
        $this->sender = $sender;
        $this->flusher = $flusher;
    }

    public function handle(Command $command): void
    {
        $email = new Email($command->email);

        $user = $this->users->getByEmail($email);

        $date = new \DateTimeImmutable();

        $token = $this->tokenizer->generate($date);

        $user->requestPasswordReset(
            $token = $this->tokenizer->generate($date),
            $date
        );

        $this->flusher->flush();

        $this->sender->send($email, $token);
    }
}
