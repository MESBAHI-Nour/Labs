---
marp: true
theme: default
paginate: true
---

# Projet technique : Streamix

**Présenté par :** Mesbahi Nour  
**Encadrant :** ES-SARRAJ Fouad  

---

## Plan

1. **Stack technique**
2. **Définitions et concepts clés**
3. **Problème et besoin**
4. **Solution et mise en pratique**
5. **Résultats et démonstration**
6. **Conclusion et apprentissages**

---

## Stack technique

### Frontend
- **HTML** : structure des pages
- **JavaScript** : actions sur les pages
- **Tailwind CSS** : style de l'interface

### Backend
- **PHP** : traitement des demandes

### Communication
- **Fetch API** : échange des données entre JavaScript et PHP

### Stockage
- **JSON** : enregistrement des données

---

## Définitions

**Frontend**
- Partie visible par l'utilisateur.
- Elle contient les pages et les actions.

**Backend**
- Partie qui traite les demandes.
- Elle utilise PHP dans Streamix.

---

**Fetch API**
- Outil JavaScript pour envoyer une demande.
- Il permet de recevoir une réponse du serveur.

**JSON**
- Format simple pour organiser les données.
- Streamix l'utilise pour stocker les données.

---

## Problème et besoin

### Problème identifié
- Les utilisateurs ont besoin d'une plateforme pour consulter des films.
- Les informations des films doivent être bien organisées.
- Il faut pouvoir retrouver les films par leur genre et leur réalisateur.

### Besoins identifiés
✓ Afficher les films  
✓ Présenter les informations de chaque film  
✓ Classer les films par genre  
✓ Relier chaque film à son réalisateur  
✓ Organiser les données dans des fichiers JSON  

--- 

### Utilité du projet
- Créer une plateforme de films.
- Organiser les informations.
- Mettre en pratique HTML, JavaScript, Tailwind CSS et PHP.

---

## Solution et pratique

### Structure des données

Streamix utilise trois tables principales :

```text
Réalisateur
    |
    | 1
    |
    | plusieurs
Film
    |
    | plusieurs
    |
    | 1
Genre cinématographique
```

---

- **Réalisateur** : contient les réalisateurs.
- **Film** : table principale avec les informations des films.
- **Genre cinématographique** : permet de classer les films.

---

## Solution et pratique (suite)

### Organisation de l'application

```text
Streamix/
├── frontend/
│   ├── index.html
│   ├── css/
│   └── js/
│
├── backend/
│   └── films.php
│
└── data/
    ├── films.json
    ├── realisateurs.json
    └── genres.json
```

Cette organisation est un exemple simple de structure pour le projet.

---

## Solution et pratique (suite)

### Étapes de réalisation

1. **Créer les pages**
   - Préparer la structure avec HTML.
   - Ajouter le style avec Tailwind CSS.

2. **Ajouter les actions**
   - Utiliser JavaScript pour les actions de la page.

---

1. **Créer le traitement serveur**
   - Utiliser PHP pour lire et traiter les données.

2. **Préparer le stockage**
   - Organiser les films, les réalisateurs et les genres en JSON.

3. **Relier les parties**
   - Utiliser Fetch API pour communiquer avec PHP.

---

## Solution et pratique (suite)

### Exemple : lire les films avec PHP

```php
<?php

$fichier = '../data/films.json';

$films = json_decode(
    file_get_contents($fichier),
    true
);

header('Content-Type: application/json');

echo json_encode($films);

?>
```


---

## Solution et pratique (suite)

### Exemple : demander les films avec Fetch API

```javascript
fetch('../backend/films.php')
    .then(response => response.json())
    .then(films => {
        console.log(films);
    })
    .catch(error => {
        console.log('Erreur :', error);
    });
```


---

## Solution et pratique (suite)

### Fonctionnalités du projet

- **Films**
  - Afficher la liste des films.
  - Consulter les informations d'un film.

- **Réalisateurs**
  - Organiser les informations des réalisateurs.
  - Relier les réalisateurs aux films.

- **Genres cinématographiques**
  - Organiser les genres.
  - Classer les films par genre.

---

## Résultats et démonstration

### Captures d'écran

**Page d'accueil**
- Présentation de la plateforme Streamix.
- Affichage des films.

**Page d'un film**
- Affichage des informations du film.
- Présentation du réalisateur et du genre.

> Ajouter ici les captures réelles de votre projet.

---

## Résultats et démonstration (suite)

### Tests à effectuer

| Test | Résultat attendu |
|------|------------------|
| Lire les films depuis JSON | Les films sont reçus |
| Afficher les films | La liste apparaît |
| Ouvrir un film | Ses informations apparaissent |
| Lire les réalisateurs | Les données sont reçues |
| Lire les genres | Les données sont reçues |
| Communication avec Fetch API | La réponse de PHP est reçue |

---

## Conclusion et apprentissages

### Objectifs du projet
- Créer une plateforme de films.
- Organiser les films, les réalisateurs et les genres.
- Relier JavaScript au backend PHP.
- Utiliser JSON pour stocker les données.

### Compétences à développer
- **HTML** : créer la structure des pages.
- **JavaScript** : ajouter les actions.
- **Tailwind CSS** : créer le style.

---

- **PHP** : traiter les demandes.
- **Fetch API** : échanger les données.
- **JSON** : organiser les données.

---

## Conclusion et apprentissages (suite)

### Difficultés possibles et solutions

**Difficulté 1 : Lire un fichier JSON**
- Vérifier le chemin du fichier.
- Vérifier le format JSON.

**Difficulté 2 : Recevoir les données avec Fetch API**
- Vérifier l'adresse du fichier PHP.
- Vérifier la réponse du serveur.

**Difficulté 3 : Relier un film à son genre et à son réalisateur**
- Vérifier les identifiants des données.
- Vérifier les liens entre les trois tables.

---

## Améliorations futures

### Idées d'amélioration
- Ajouter une recherche de films.
- Ajouter des filtres par genre.
- Ajouter une recherche par réalisateur.
- Améliorer l'affichage des films.
- Ajouter de nouvelles fonctions selon les besoins du projet.

---

## Conclusion finale

### Ce que ce projet permet d'apprendre

Ce projet permet de :
- Créer une plateforme web.
- Organiser les données des films.
- Utiliser PHP pour traiter les demandes.
- Utiliser Fetch API pour échanger les données.
- Stocker les données dans des fichiers JSON.

### Message final

**Streamix** est une plateforme pour organiser et consulter des films.

---
**Merci pour votre attention !**

Questions ?
