<?php
declare(strict_types=1);

namespace App\Domain;

use App\Support\LoggerTrait;

class User
{
    use LoggerTrait;

    public string $name;
    public int $age;

    public function __construct(
        string $name,
        int $age
    ) {
        if (trim($name) === '' || $age < 0) {
            throw new \InvalidArgumentException('Nom ou âge invalide.');
        }
        $this->name = $name;
        $this->age = $age;
        $this->log("Utilisateur créé : {$name}");
    }
}
