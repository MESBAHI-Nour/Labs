---
marp: true
theme: default
size: 16:9
paginate: true
---

![Logo OFPPT](images/ofppt-logo.png) ![Logo SoliCode](images/solicode-logo.png)

# Lab 05 — Approfondir la POO en PHP

Six notions · six exemples autonomes

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

Approfondir les mécanismes objet en PHP.
Observer chaque notion dans un script séparé.

---

## Problématique

des notions de la programmation orientée objet (POO) en PHP ne sont pas encore étudiées dans les tutoriels :

- Classe abstraite · Interface · Héritage
- Polymorphisme · Encapsulation
- Méthodes et propriétés statiques

---

## Solution

Six notions, six scripts autonomes et exécutables.

---

## Mini-définition

Des mécanismes pour définir des contrats, réutiliser et contrôler des comportements d’objets.

---

## Hello World

`pratique/hello-world/index.php`

```php
<?php

echo 'Bonjour POO en PHP !' . PHP_EOL;
```

---

## Quick Start — classe abstraite

`pratique/classe-abstraite/index.php`

```php
abstract class Forme
{
    abstract public function aire(): float;
}

class Rectangle extends Forme
{
    public function aire(): float
    {
        return $this->largeur * $this->hauteur;
    }
}
```

---

## Quick Start — interface

`pratique/interface/index.php`

```php
interface Exportable
{
    public function exporter(): string;
}

class Rapport implements Exportable
{
    public function exporter(): string
    {
        return 'Rapport exporté';
    }
}
```

---

## Quick Start — héritage

`pratique/heritage/index.php`

```php
class Vehicule
{
    public function demarrer(): string
    {
        return 'Le véhicule démarre.';
    }
}

class Voiture extends Vehicule
{
    public function klaxonner(): string
    {
        return 'La voiture klaxonne.';
    }
}
```

---

## Quick Start — polymorphisme

`pratique/polymorphisme/index.php`

```php
function afficher(Descriptible $objet): void
{
    echo $objet->decrire() . PHP_EOL;
}

afficher(new Article('Guide PHP'));
afficher(new Produit('Clavier'));
```

---

## Quick Start — encapsulation

`pratique/encapsulation/index.php`

```php
class Compte
{
    private float $solde = 0.0;

    public function retirer(float $montant): void
    {
        if ($montant <= 0 || $montant > $this->solde) {
            throw new InvalidArgumentException('Retrait impossible.');
        }

        $this->solde -= $montant;
    }
}
```

---

## Quick Start — éléments statiques

`pratique/statique/index.php`

```php
class Visiteur
{
    private static int $nombre = 0;

    public function __construct()
    {
        self::$nombre++;
    }

    public static function nombreCree(): int
    {
        return self::$nombre;
    }
}
```

---

## Quick Start — utiliser le compteur

`pratique/statique/index.php`

```php
new Visiteur();
new Visiteur();
echo 'Visiteurs créés : ' . Visiteur::nombreCree() . PHP_EOL;
```

---

## Vérifier les exemples

Depuis chaque dossier d’exemple :

```powershell
php .\index.php
```

- PHP 8.0 ou ultérieur
- Aucun paquet externe
- Une exécution par notion
