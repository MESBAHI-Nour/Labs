# Lab 06 — Découvrir les architectures PHP

## 1. Besoin du projet technique

Le projet technique fait face à des difficultés d'organisation et de maintenabilité de son code PHP. La problématique est la suivante :

> Le code n'est pas bien organisé  
> On n'utilise pas :  
> - Architecture 3-tiers  
> - DAO (Data Access Object)  
> - Service  
> - BaseService  

Ce lab est nécessaire pour structurer les applications PHP selon des standards professionnels. Il permet de séparer clairement les responsabilités (présentation, règles métier et accès aux données) afin de rendre l'application plus modulaire, plus facile à maintenir et à tester.

**Type :** technique  
**Modules/unités :** 3.0.U2 — POO essentielle / 6.1.U5 — Abstraction et architecture par interface

## 2. Notions et techniques à apprendre

- Comprendre et appliquer le découpage en couches avec l'Architecture 3-tiers (Présentation, Métier / Service, Accès aux données / DAO).
- Découpler la persistance et les requêtes du reste de l'application grâce au patron DAO (Data Access Object) et ses interfaces.
- Isoler les règles de gestion et l'orchestration des données dans des classes Service.
- Mutualiser la logique transverse (gestion d'erreurs, journalisation, validation commune) dans une classe abstraite BaseService.
- Organiser le code en favorisant le couplage faible et l'injection de dépendances simple en PHP.

**Prérequis :** bases de la POO en PHP (classes, objets, interfaces, héritage, typage PHP 8) ; disposer de PHP 8.0 ou ultérieur et d'un terminal en ligne de commande.

## 3. Réalisation attendue

Concevoir, exécuter et vérifier un exemple PHP autonome pour chacune des quatre notions fondamentales : Architecture 3-tiers, patron DAO, classe Service et factorisation avec BaseService. Les exemples sont isolés dans des dossiers distincts sous `pratique/` et s'exécutent directement en ligne de commande sans dépendance externe.

**Ressources du lab :**
- [Introduction](./1-introduction.md)
- [Définitions](./2-definition.md)
- [Pratique détaillée](./3-practical.md)
- [Présentation Marp](./4-presentation.md)
- [Exemple : Architecture 3-tiers](./pratique/architecture-3-tiers/index.php)
- [Exemple : DAO (Data Access Object)](./pratique/dao/index.php)
- [Exemple : Service](./pratique/service/index.php)
- [Exemple : BaseService](./pratique/base-service/index.php)
