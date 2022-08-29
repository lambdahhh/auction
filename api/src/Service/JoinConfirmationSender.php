<?php

namespace App\Service;

use App\Entity\User\Email;
use App\Entity\User\Token;

interface JoinConfirmationSender
{
    public function send(Email $email, Token $token): void;
}
