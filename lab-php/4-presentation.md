---
marp: true
theme: default
size: 16:9
paginate: true
---

# Lab 04 — Gestion des erreurs, namespaces et traits en PHP

Exceptions · organisation · réutilisation

---

## Plan de la présentation

- Introduction
- Problématique
- Solution
- Définition
- Hello World
- Quick Start

---

## Introduction

Fiabiliser et organiser des classes PHP.
Partager un comportement commun.

---

## Problématique

Manque de gestion des erreurs, Namespace, ne connais pas comment partager du code entre plusieurs classes.

---

## Solution

Exceptions traitées · classes nommées · trait réutilisé

---

## Mini-définition

Exceptions traitées, namespaces organisés, méthodes partagées par traits.

---

## Hello World

```powershell
php -r "echo 'Bonjour PHP', PHP_EOL;"
```

---

## Quick Start — fichiers

Exécution dans `exemples/quick-start/`

---

## Quick Start — trait partagé

`exemples/quick-start/src/Support/LoggerTrait.php`

```php
namespace App\Support;

trait LoggerTrait
{
    protected function log(string $message): void
    {
        echo "[INFO] {$message}" . PHP_EOL;
    }
}
```

---

## Quick Start — classe métier

`exemples/quick-start/src/Domain/User.php` · partie 1/2

```php
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
```

---

## Quick Start — validation

`exemples/quick-start/src/Domain/User.php` · partie 2/2

À assembler après la partie 1.

```php
        if (trim($name) === '' || $age < 0) {
            throw new \InvalidArgumentException('Nom ou âge invalide.');
        }
        $this->name = $name;
        $this->age = $age;
        $this->log("Utilisateur créé : {$name}");
    }
}
```

---

## Quick Start — service

`exemples/quick-start/src/Service/UserService.php`

```php
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
```

---

## Quick Start — point d’entrée 1/2

`exemples/quick-start/index.php` · chargement

```php
<?php
declare(strict_types=1);

use App\Service\UserService;

require_once __DIR__ . '/src/Support/LoggerTrait.php';
require_once __DIR__ . '/src/Domain/User.php';
require_once __DIR__ . '/src/Service/UserService.php';
```

---

## Quick Start — point d’entrée 2/2

`exemples/quick-start/index.php` · traitement
Assembler après la partie 1.

```php
try {
    $service = new UserService();
    $user = $service->register('Amina', 22);
    echo "Inscrit : {$user->name}" . PHP_EOL;
} catch (\InvalidArgumentException $exception) {
    fwrite(STDERR, $exception->getMessage() . PHP_EOL);
    exit(1);
}
```

---

## Quick Start — tests

```powershell
Set-Location .\labs\lab-php-erreurs-namespaces-traits\exemples\quick-start
php index.php
```

- Essayez ensuite un âge négatif.
- Vérifiez le message et le code retour.
