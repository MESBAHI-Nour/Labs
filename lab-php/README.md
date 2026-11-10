# Lab 04 — Gestion des erreurs, namespaces et traits en PHP

## 1. Besoin du projet technique

Le projet technique doit pouvoir traiter les erreurs de façon contrôlée, organiser ses classes et partager du code entre plusieurs classes. Le lab répond à la problématique suivante : « manque de gestion des erreurs, Namespace, ne connais pas comment partager du code entre plusieurs classes ».

Ce lab est nécessaire pour apprendre à signaler et traiter les données invalides sans laisser le programme échouer de manière imprévisible, et pour structurer le code à mesure que le projet grandit. Il apporte une première mise en pratique réutilisable : des exceptions pour les erreurs métier, des namespaces pour organiser les classes et un trait pour partager un comportement sans duplication.

**Type :** technique  
**Modules/unités :** à préciser

## 2. Notions et techniques à apprendre

- Distinguer une exception d’une erreur de programmation.
- Signaler une donnée invalide avec `throw` et une exception adaptée.
- Intercepter et traiter une exception avec `try` et `catch`.
- Déclarer et utiliser des namespaces pour organiser les classes PHP.
- Réutiliser des méthodes dans plusieurs classes avec un trait.
- Appliquer ces notions dans des classes simples, avec des propriétés typées.

**Prérequis :** savoir créer une classe, une propriété et une méthode PHP ; disposer de PHP 7.4 ou ultérieur et pouvoir utiliser un terminal.

## 3. Réalisation attendue

L’exemple pratique attendu est une petite application PHP exécutable en ligne de commande qui inscrit un utilisateur. Elle doit être organisée en plusieurs classes et montrer concrètement les trois notions du lab :

```text
exemples/quick-start/
├── index.php
└── src/
    ├── Domain/
    │   └── User.php
    ├── Service/
    │   └── UserService.php
    └── Support/
        └── LoggerTrait.php
```

- Les classes métier et service utilisent des namespaces.
- `User` valide les données et lève une exception si elles sont invalides.
- `User` et `UserService` réutilisent le même trait de journalisation.
- `index.php` charge les fichiers, exécute une inscription et intercepte l’exception.
- Le cas valide affiche la confirmation ; avec un nom vide ou un âge négatif, le point d’entrée affiche un message de refus.
- L’exemple fonctionne sans dépendance Composer et peut être testé depuis le terminal.

**Parcours :** vérifier PHP en ligne de commande, examiner les classes du Quick Start, puis lancer l’exemple avec une entrée valide et une entrée invalide.

**Ressources du lab :**
- [Introduction](./1-introduction.md)
- [Définitions](./2-definition.md)
- [Pratique détaillée](./3-practical.md)
- [Présentation Marp](./4-presentation.md)
- [Prompt de contenu à exécuter plus tard](./PROMPT-CONTENU.md)
- [Exemple PHP exécutable](./exemples/quick-start/)
