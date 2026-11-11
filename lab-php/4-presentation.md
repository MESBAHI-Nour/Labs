---
marp: true
theme: default
size: 16:9
paginate: true
---
![Logo OFPPT](images/ofppt-logo.png) ![Logo SoliCode](images/solicode-logo.png)

# Lab 04 — Gestion des erreurs, namespaces et traits en PHP

Exceptions · organisation · réutilisation

**Présenté par** : Mesbahi Nour  
**Encadré par** : ES-Sarraj Fouad

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

## Quick Start — exceptions

`lab-php/exemples/exceptions/index.php`

```php
try {
    if ($age === false || $age < 0) {
        throw new InvalidArgumentException('Âge invalide.');
    }

    echo "Âge accepté : {$age}" . PHP_EOL;
} catch (InvalidArgumentException $exception) {
    fwrite(STDERR, $exception->getMessage() . PHP_EOL);
    exit(1);
}
```

---

## Quick Start — classe namespacée

`lab-php/exemples/namespaces/src/Domain/Article.php`

```php
namespace App\Domain;

class Article
{
    public string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }
}
```

---

## Quick Start — utilisation du namespace

`lab-php/exemples/namespaces/index.php`

```php
use App\Domain\Article;
use App\Service\ArticleSummary;

$article = new Article('PHP et les namespaces');
echo ArticleSummary::format($article) . PHP_EOL;
```

---

## Quick Start — trait autonome

`lab-php/exemples/traits/index.php`

```php
trait GreetingTrait
{
    public function greet(): string
    {
        return "Bonjour, {$this->name}";
    }
}

class Student
{
    use GreetingTrait;
    public string $name = 'Amina';
}
```

---

## Quick Start — vérifier séparément

```powershell
php .\lab-php\exemples\exceptions\index.php 22
php .\lab-php\exemples\exceptions\index.php -1
php .\lab-php\exemples\namespaces\index.php
php .\lab-php\exemples\traits\index.php
```

- Chaque exemple est autonome.
- Aucun programme ne regroupe les trois notions.
