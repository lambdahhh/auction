<?php

use App\Entity\User\Email;
use App\Entity\User\Id;
use App\Entity\User\Token;
use App\Entity\User\User;
use Ramsey\Uuid\Uuid;

class ConfirmTest extends \PHPUnit\Framework\TestCase
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

        self::assertTrue($user->isWait());
        self::assertFalse($user->isActive());

        $user->confirmJoin(
            $token->getValue(),
            $token->getExpires()->modify('-1 day')
        );


    }
}
