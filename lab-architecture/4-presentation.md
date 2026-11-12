---
marp: true
theme: default
size: 16:9
paginate: true
---

![Logo OFPPT](images/ofppt-logo.png) ![Logo SoliCode](images/solicode-logo.png)

# Lab 06 — Découvrir les architectures PHP

Architecture 3-tiers · DAO · Service · BaseService

**Présenté par** : Mesbahi Nour  
**Encadré par** : ES-Sarraj Fouad

---

## Plan de la présentation

- Introduction
- Problématique
- Solution
- Définition
- Quick Start

---

## Introduction

- Structurer le code PHP selon des standards professionnels.
- Séparer la présentation, la logique métier et les données.
- Améliorer la lisibilité, la maintenabilité et les tests.

---

## Problématique

Le code n'est pas bien organisé.

On n'utilise pas :
- Architecture 3-tiers
- DAO (Data Access Object)
- Service
- BaseService

---

## Solution

Quatre piliers pour organiser une application PHP :

- Découper l'application en trois couches indépendantes.
- Isoler l'accès aux données avec le patron DAO.
- Centraliser les règles métier dans des Services.
- Mutualiser la logique transverse dans BaseService.

---

## Architecture 3-tiers

- **Rôle :** découper l'application en Présentation, Métier et Données.
- **Importance :** empêcher le mélange des responsabilités dans un script unique.
- **Bénéfice :** couches remplaçables sans impacter le reste du système.

---

## DAO (Data Access Object)

- **Rôle :** encapsuler les opérations de lecture et écriture.
- **Importance :** abstraire la technologie de stockage derrière une interface.
- **Bénéfice :** le métier manipule des objets sans connaître le stockage.

---

## Couche Service

- **Rôle :** héberger les calculs, règles et validations métier.
- **Importance :** garantir l'intégrité du domaine applicatif.
- **Bénéfice :** logique métier réutilisable depuis toute interface (CLI, Web).

---

## BaseService

- **Rôle :** classe de base abstraite partagée par les services.
- **Importance :** mutualiser la gestion des erreurs et de la journalisation.
- **Bénéfice :** éviter la duplication de code technique dans les services.

---

## Définition

Une architecture en couches organise le code en modules spécialisés où chaque composant assume une responsabilité unique et bien délimitée.

---

## Quick Start — Vue d'ensemble

Quatre exemples autonomes sous `pratique/` :

- `architecture-3-tiers` : flux complet Présentation → Service → DAO.
- `dao` : interface et persistance isolée en mémoire.
- `service` : validation et règles d'inscription métier.
- `base-service` : gestion commune des erreurs et des journaux.

---

## Quick Start — 3-tiers : DAO et Service

`pratique/architecture-3-tiers/index.php`

```php
class ProduitDao
{
    private array $tableProduits = [];
    public function findById(int $id): ?Produit {
        return $this->tableProduits[$id] ?? null;
    }
}

class ProduitService
{
    public function __construct(private ProduitDao $produitDao) {}
    public function calculerPrixRemise(int $id, float $remise): ?float {
        $produit = $this->produitDao->findById($id);
        return $produit ? $produit->prix * (1 - ($remise / 100)) : null;
    }
}
```

---

## Quick Start — 3-tiers : Présentation

`pratique/architecture-3-tiers/index.php`

```php
class ProduitController
{
    public function __construct(private ProduitService $produitService) {}

    public function afficherCatalogue(): void
    {
        echo "=== Catalogue des produits (Couche Présentation) ===" . PHP_EOL;
        $produits = $this->produitService->getCatalogue();
        foreach ($produits as $produit) {
            $promo = $this->produitService->calculerPrixRemise($produit->id, 10.0);
            echo "- {$produit->nom} : {$produit->prix} MAD (Remise : {$promo} MAD)" . PHP_EOL;
        }
    }
}
```

---

## Lancement — Architecture 3-tiers

Exécution depuis le répertoire de l'exemple :

```powershell
Push-Location .\lab-architecture\pratique\architecture-3-tiers
php .\index.php
Pop-Location
```

Résultat attendu :
- Catalogue formaté par la couche Présentation.
- Prix remisés calculés par le Service à partir du DAO.

---

## Quick Start — DAO : Interface et Entité

`pratique/dao/index.php`

```php
class Etudiant
{
    public function __construct(
        public ?int $id,
        public string $nom,
        public string $email,
        public string $filiere
    ) {}
}

interface EtudiantDaoInterface
{
    public function create(Etudiant $etudiant): Etudiant;
    public function findById(int $id): ?Etudiant;
    public function findAll(): array;
    public function delete(int $id): bool;
}
```

---

## Quick Start — DAO : Implémentation

`pratique/dao/index.php`

```php
class EtudiantMemoryDao implements EtudiantDaoInterface
{
    private array $data = [];
    private int $autoIncrementId = 1;

    public function create(Etudiant $etudiant): Etudiant {
        $id = $this->autoIncrementId++;
        $etudiant->id = $id;
        $this->data[$id] = $etudiant;
        return $etudiant;
    }

    public function findById(int $id): ?Etudiant {
        return $this->data[$id] ?? null;
    }
}
```

---

## Lancement — Patron DAO

Exécution depuis le répertoire de l'exemple :

```powershell
Push-Location .\lab-architecture\pratique\dao
php .\index.php
Pop-Location
```

Résultat attendu :
- Insertion d'étudiants avec identifiant automatique.
- Recherche par ID et suppression réussies sans exposer le tableau.

---

## Quick Start — Service : Règles métier

`pratique/service/index.php`

```php
class InscriptionService
{
    public function __construct(private UtilisateurDao $utilisateurDao) {}

    public function inscrire(string $nom, string $email, int $age): Utilisateur
    {
        if (trim($nom) === '') {
            throw new InvalidArgumentException("Le nom ne peut pas être vide.");
        }
        if ($age < 18) {
            throw new DomainException("L'utilisateur doit être majeur (minimum 18 ans).");
        }
        if ($this->utilisateurDao->findByEmail($email) !== null) {
            throw new DomainException("L'email est déjà utilisé par un autre compte.");
        }
        return $this->utilisateurDao->save(new Utilisateur(null, $nom, $email, $age));
    }
}
```

---

## Lancement — Couche Service

Exécution depuis le répertoire de l'exemple :

```powershell
Push-Location .\lab-architecture\pratique\service
php .\index.php
Pop-Location
```

Résultat attendu :
- Inscription validée pour un utilisateur majeur.
- Rejet immédiat par exception pour un mineur (< 18 ans).
- Blocage des doublons sur l'adresse email.

---

## Quick Start — BaseService : Classe abstraite

`pratique/base-service/index.php`

```php
abstract class BaseService
{
    protected array $errors = [];
    protected array $logs = [];

    protected function addError(string $message): void {
        $this->errors[] = $message;
    }
    public function hasErrors(): bool {
        return count($this->errors) > 0;
    }
    public function getErrors(): array {
        return $this->errors;
    }
    protected function log(string $action): void {
        $this->logs[] = sprintf("[%s] %s", date('H:i:s'), $action);
    }
}
```

---

## Quick Start — BaseService : Service dérivé

`pratique/base-service/index.php`

```php
class ArticleService extends BaseService
{
    public function creerArticle(string $titre, float $prix): ?array
    {
        $this->clearErrors();
        if (trim($titre) === '') {
            $this->addError("Le champ 'titre' est obligatoire.");
        }
        if ($prix <= 0) {
            $this->addError("Le prix doit être strictement supérieur à 0.");
        }
        if ($this->hasErrors()) {
            $this->log("Échec de création de l'article '{$titre}'");
            return null;
        }
        $this->log("Article '{$titre}' créé avec succès.");
        return ['titre' => $titre, 'prix' => $prix];
    }
}
```

---

## Lancement — BaseService

Exécution depuis le répertoire de l'exemple :

```powershell
Push-Location .\lab-architecture\pratique\base-service
php .\index.php
Pop-Location
```

Résultat attendu :
- Détection et collecte des erreurs via `hasErrors()` et `getErrors()`.
- Traçabilité et journalisation partagées via `getLogs()`.
