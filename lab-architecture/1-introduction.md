# Introduction

## Contexte

Dans les projets web en PHP, mélanger dans un même fichier ou dans une même fonction la réception des requêtes, l'affichage HTML, les règles de calcul et les requêtes de base de données produit un code monolithique difficile à lire, à maintenir et à tester. Ce lab aborde la structuration en couches logicielles à travers l'Architecture 3-tiers, le patron DAO (Data Access Object), la couche Service et la classe réutilisable BaseService.

## Importance du sujet

Adopter une architecture en couches et des patrons de conception éprouvés est indispensable pour tout développeur back-end. Cette séparation des responsabilités permet d'isoler les règles métier des technologies de persistance (base de données SQL, mémoire, API) et des interfaces de présentation (page web, API REST, console CLI). Elle facilite également le travail en équipe, la réutilisation de composants et la mise en place de tests unitaires.

## Objectifs pédagogiques

À la fin de ce lab, l'apprenant sera capable de :
- Identifier les rôles respectifs des couches Présentation, Métier (Service) et Données (DAO) dans une Architecture 3-tiers.
- Créer une interface et une implémentation de DAO pour encapsuler l'accès aux données.
- Concevoir un Service contenant des règles métier et des validations sans couplage direct avec le stockage.
- Développer une classe abstraite BaseService pour factoriser la gestion des erreurs, des validations et de la journalisation.
- Exécuter et valider chaque notion dans des scripts autonomes via PHP CLI.

## Parcours du lab

1. Découvrir les définitions et concepts architecturaux clés.
2. Étudier et exécuter l'exemple autonome d'Architecture 3-tiers.
3. Mettre en œuvre le patron DAO avec une interface et une persistance isolée.
4. Implémenter une classe Service appliquant des règles métier strictes.
5. Factoriser les traitements partagés au sein d'une classe BaseService.
6. Valider les acquis à l'aide des critères d'acceptation et du défi facultatif.
