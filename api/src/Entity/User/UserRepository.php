<?php

namespace App\Entity\User;

interface UserRepository
{
    public function hasByEmail(Email $email): bool;
    public function add(User $user): void;
}
