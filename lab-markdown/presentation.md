---
marp: true
theme: default
paginate: true
size: 16:9
style: |
  section {
    background: #111827;
    color: #f9fafb;
    font-family: Inter, system-ui, sans-serif;
    padding: 48px 64px;
  }
  section.light {
    background: #f8fafc;
    color: #172033;
  }
  h1, h2, h3 {
    font-family: Anton, Impact, sans-serif;
    color: #38bdf8;
  }
  section.light h1, section.light h2, section.light h3 {
    color: #0369a1;
  }
  a {
    color: #38bdf8;
  }
  section.light a {
    color: #0369a1;
  }
  code {
    background: #484f59;
  }
---

# Markdown
Encadrant : ES-SARRAJ Fouad

---

<!-- _class: light -->

## Lab Plan

1. Introduction
2. Problems Encountered
3. Solutions Implemented

---

## Introduction

### Qu'est-ce que Markdown ?

Markdown est un langage de balisage léger qui permet de formater du texte avec une syntaxe simple et lisible.

### Objectifs du lab

- Structurer un document avec des titres et des paragraphes.
- Mettre en forme du texte et créer des listes.
- Ajouter des liens, des images et du code.
- Produire un fichier facile à lire et à partager.

---

<!-- _class: light -->

## Problems Encountered

Dans cet exercice d'initiation, aucun problème bloquant n'est signalé. Quelques erreurs fréquentes sont toutefois à surveiller :

- Oublier l'espace après les `#` d'un titre.
- Utiliser une indentation incohérente dans une liste imbriquée.
- Oublier les lignes de délimitation d'un bloc de code.
- Indiquer un mauvais chemin ou texte alternatif pour une image.

---

## Solutions Implemented

- Ajouter un espace après les symboles de titre : `## Mon titre`.
- Indenter régulièrement les sous-listes, de préférence avec deux espaces.
- Encadrer le code par trois accents graves et préciser le langage.
- Vérifier le chemin de l'image et renseigner une description utile.
- Prévisualiser le fichier pour contrôler le rendu final.

---

<!-- _class: light -->

## Titres et texte

Le nombre de `#` détermine le niveau du titre. Utilisez les niveaux dans l'ordre pour garder une structure claire.

```markdown
# Titre principal
## Section
### Sous-section
```

Markdown permet aussi de mettre du texte en forme :

```markdown
**Texte en gras**
*Texte en italique*
***Gras et italique***
```

---

## Listes

### Liste non ordonnée

```markdown
- HTML
- CSS
- JavaScript
```

### Liste ordonnée et liste imbriquée

```markdown
1. Préparer le document
2. Ajouter le contenu

- Frontend
  - HTML
  - CSS
```

---

<!-- _class: light -->

## Liens et images

Un lien associe un texte descriptif à une adresse :

```markdown
[Documentation Markdown](https://www.markdownguide.org/)
```

Une image utilise une syntaxe similaire, avec un texte alternatif :

```markdown
![Description de l'image](images/exemple.jpg)
```

Le chemin de l'image peut être relatif au fichier Markdown.

---

## Blocs de code

Les accents graves délimitent un bloc de code. Le nom du langage active sa coloration syntaxique dans les outils compatibles.

````markdown
```javascript
console.log("Hello World");
```
````

Exemple rendu :

```javascript
console.log("Hello World");
```

---

<!-- _class: light -->

## À retenir

- Markdown rend les documents simples à écrire et à relire.
- Une syntaxe régulière améliore la lisibilité et évite les erreurs de rendu.
- Les titres, listes, liens, images et blocs de code couvrent les besoins essentiels.
- Une prévisualisation permet de vérifier le résultat avant de partager le document.
