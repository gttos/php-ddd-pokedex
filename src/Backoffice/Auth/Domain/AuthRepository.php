<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Auth\Domain;

interface AuthRepository
{
    public function search(AuthUsername $username): ?AuthUser;
}
