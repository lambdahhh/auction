<?php

use App\Entity\User\Email;
use App\Entity\User\Id;
use App\Entity\User\Token;
use App\Entity\User\User;
use Ramsey\Uuid\Uuid;

class RequestTest extends \PHPUnit\Framework\TestCase
{
    public function testSuccess(): void
    {
        $user = new User(
            $id = Id::generate(),
            $date = new DateTimeImmutable(),
            $email = new Email('mail@example.com'),
            $hash = 'hash',
            $token = new Token(Uuid::uuid4()->toString(), new DateTimeImmutable())
        );

        self::assertEquals($id, $user->getId());
        self::assertEquals($date, $user->getDate());
        self::assertEquals($email, $user->getEmail());
        self::assertEquals($hash, $user->getPasswordHash());
        self::assertEquals($token, $user->getJoinConfirmToken());
    }
}
