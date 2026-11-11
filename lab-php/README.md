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

Réaliser les travaux suivants. Garder un exemple autonome pour chaque notion ; ne pas regrouper les notions dans une seule application.

1. Créer et exécuter un exemple PHP qui lève puis intercepte une exception lorsqu’une donnée invalide est fournie. Vérifier le résultat avec une donnée valide et une donnée invalide.
2. Créer et exécuter un exemple PHP distinct qui déclare des classes dans des namespaces et les utilise correctement.
3. Créer et exécuter un autre exemple PHP distinct qui partage une méthode entre plusieurs classes avec un trait.

**Ressources du lab :**
- [Introduction](./1-introduction.md)
- [Définitions](./2-definition.md)
- [Pratique détaillée](./3-practical.md)
- [Présentation Marp](./4-presentation.md)
- [Prompt de contenu à exécuter plus tard](./PROMPT-CONTENU.md)
- [Exemple sur les exceptions](./exemples/exceptions/)
- [Exemple sur les namespaces](./exemples/namespaces/)
- [Exemple sur les traits](./exemples/traits/)
