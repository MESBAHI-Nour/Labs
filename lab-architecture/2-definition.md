# Définition

## Mini-définition

Une architecture logicielle en couches organise le code en blocs spécialisés et indépendants : la couche Présentation interagit avec l'utilisateur, la couche Service porte la logique métier, et le DAO gère l'accès aux données.

## Concepts clés et terminologie

- **Architecture 3-tiers :** modèle d'organisation logicielle découpé en trois niveaux logiques stricts :
  1. *Couche Présentation (Tier 1) :* capture les entrées utilisateur et affiche les réponses ou interfaces.
  2. *Couche Métier / Logique applicative (Tier 2) :* applique les règles de gestion, calculs et validations métier (Service).
  3. *Couche Données (Tier 3) :* interroge, persiste et extrait les données sans se soucier des règles métier (DAO).
- **DAO (Data Access Object) :** patron de conception qui encapsule et isole tous les mécanismes d'accès à la source de données (requêtes SQL, lecture de fichiers, stockage en mémoire). Le reste de l'application manipule des entités sans connaître les détails de persistance.
- **Service (Couche Métier) :** classe contenant les règles de gestion, les vérifications d'invariants métier et l'orchestration des opérations. Un service délègue la persistance au DAO et transmet des données prêtes à être exploitées à la présentation.
- **BaseService :** classe de base (souvent abstraite) dont héritent les services métier pour réutiliser des fonctionnalités communes telles que la collecte d'erreurs, la validation générique de champs ou la journalisation d'événements.
- **Séparation des responsabilités (SoC) :** principe de conception stipulant que chaque classe ou module doit être responsable d'une tâche unique et bien délimitée.
- **Injection de dépendances :** mécanisme consistant à passer à une classe les objets dont elle a besoin (par exemple injecter le DAO dans le Service via son constructeur), réduisant ainsi le couplage fort.

## Distinctions utiles

- **DAO vs Service :**
  - Le **DAO** répond à la question : *« Comment stocker ou retrouver les données ? »* (ex: exécuter un `SELECT`, un `INSERT`, interroger un tableau). Il n'applique aucune règle métier.
  - Le **Service** répond à la question : *« Quelles sont les règles à appliquer ? »* (ex: vérifier qu'un client a 18 ans, que le montant est positif, calculer une taxe). Il s'appuie sur le DAO pour lire ou écrire.
- **BaseService vs Service concret :**
  - **BaseService** ne traite aucun domaine métier particulier ; il offre des outils transverses (tableau d'erreurs, journalisation, statut de réussite).
  - Un **Service concret** (ex: `InscriptionService`, `ProduitService`) hérite de ces outils transverses et se concentre exclusivement sur les règles spécifiques à son domaine.
- **Architecture 3-tiers vs Script spaghetti :**
  - Dans un script non structuré, la connexion PDO, la requête SQL, les vérifications `if` et le code HTML/JSON sont mélangés dans le même fichier.
  - Dans une architecture 3-tiers, modifier la base de données ne demande de toucher qu'au DAO, tandis que modifier une règle de calcul n'impacte que le Service.

## Petit repère de structure en PHP

```text
Application PHP
│
├── Présentation (ex: Contrôleur CLI ou Web)
│     │  Appelle le Service
│     ▼
├── Couche Métier
│     ├── BaseService (classe abstraite : erreurs, logs, validations communes)
│     └── ProduitService (hérite de BaseService, valide et calcule)
│           │  Appelle le DAO via une interface
│           ▼
└── Couche Données
      ├── ProduitDaoInterface (contrat)
      └── ProduitMemoryDao (implémentation concrète de la persistance)
```

