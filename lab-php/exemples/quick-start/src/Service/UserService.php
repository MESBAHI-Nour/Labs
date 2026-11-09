<?php
declare(strict_types=1);

namespace App\Service;

use App\Domain\User;
use App\Support\LoggerTrait;

class UserService
{
    use LoggerTrait;

    public function register(string $name, int $age): User
    {
        $user = new User($name, $age);
        $this->log("Inscription terminée pour {$name}");
        return $user;
    }
}
