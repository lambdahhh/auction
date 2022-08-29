<?php

namespace App\Auth\Command\JoinByEmail\Request;

use Ramsey\Uuid\Uuid;

class Handler
{
    public function handle(Command $command): void
    {
        $user = new User(
            Uuid::uuid4()->toString(),
            new \DateTimeImmutable(),
            mb_strtolower($command->email),
            password_hash($command->password, PASSWORD_BCRYPT)
        );
    }
}

class User
{
    private string $id;
    private \DateTimeImmutable $date;
    private string $email;
    private string $hash;
    private string $token;

    public function __construct(
        string $id,
        \DateTimeImmutable $date,
        string $email,
        string $hash,
        string $token
    )
    {
        $this->id = $id;
        $this->date = $date;
        $this->email = $email;
        $this->hash = $hash;
        $this->token = $token;
    }

    public function getId(): string
    {
        return $this->id;
    }
}
