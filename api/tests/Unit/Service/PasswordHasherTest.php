<?php

namespace Test\Unit\Service;

use App\Service\PasswordHasher;
use PHPUnit\Framework\TestCase;

/**
 * @covers PasswordHasher
 */
class PasswordHasherTest extends TestCase
{
    public function testSuccess(): void
    {
        $passwordHasher = new PasswordHasher(3);
        $password = 'new-password';

        $hash = $passwordHasher->hash($password);

        self::assertNotEmpty($hash);
        self::assertNotEquals($password, $hash);
        self::assertTrue($passwordHasher->validate($password, $hash));
        self::assertFalse($passwordHasher->validate('wrong-password', $hash));

    }
}
