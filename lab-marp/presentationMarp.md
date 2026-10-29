---
marp: true
theme: default
paginate: true
size: 16:9
style: |
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&family=JetBrains+Mono:wght@400;600&display=swap');

  section {
    font-family: 'Inter', system-ui, -apple-system, sans-serif;
    font-size: 26px;
    padding: 48px 64px;
    background-color: #0b1120;
    color: #e2e8f0;
  }

  section.light {
    background-color: #f8fafc;
    color: #0f172a;
  }

  section.lead {
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  h1 {
    font-size: 2.2em;
    font-weight: 900;
    color: #38bdf8;
    margin-bottom: 0.3em;
    letter-spacing: -0.02em;
  }

  section.light h1 {
    color: #0284c7;
  }

  h2 {
    font-size: 1.5em;
    font-weight: 700;
    color: #a5b4fc;
    border-bottom: 2px solid #334155;
    padding-bottom: 8px;
    margin-top: 0;
    margin-bottom: 0.6em;
  }

  section.light h2 {
    color: #4338ca;
    border-bottom: 2px solid #e2e8f0;
  }

  h3 {
    font-size: 1.15em;
    font-weight: 600;
    color: #38bdf8;
    margin-bottom: 0.3em;
  }

  section.light h3 {
    color: #0369a1;
  }

  p, li {
    line-height: 1.5;
    color: #cbd5e1;
  }

  section.light p, section.light li {
    color: #334155;
  }

  ul, ol {
    margin-top: 0.4em;
    margin-bottom: 0.6em;
  }

  li {
    margin-bottom: 0.3em;
  }

  code {
    font-family: 'JetBrains Mono', monospace;
    background: #1e293b;
    color: #38bdf8;
    padding: 0.15em 0.4em;
    border-radius: 6px;
    font-size: 0.88em;
  }

  section.light code {
    background: #e2e8f0;
    color: #0369a1;
  }

  pre {
    background: #0f172a !important;
    border: 1px solid #334155;
    border-radius: 10px;
    padding: 16px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
  }

  section.light pre {
    background: #1e293b !important;
    border: 1px solid #cbd5e1;
  }

  pre code {
    background: transparent !important;
    padding: 0;
    color: #f1f5f9 !important;
    font-size: 0.82em;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 0.6em;
    margin-bottom: 0.6em;
    font-size: 0.88em;
  }

  th {
    background-color: #1e293b;
    color: #38bdf8;
    padding: 10px 14px;
    font-weight: 700;
    border-bottom: 2px solid #475569;
  }

  section.light th {
    background-color: #e2e8f0;
    color: #0369a1;
    border-bottom: 2px solid #cbd5e1;
  }

  td {
    padding: 9px 14px;
    border-bottom: 1px solid #334155;
  }

  section.light td {
    border-bottom: 1px solid #e2e8f0;
  }

  .grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
  }

  .card {
    background: #1e293b;
    border: 1px solid #334155;
    border-radius: 12px;
    padding: 16px 20px;
  }

  section.light .card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  }

  .badge {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 9999px;
    font-size: 0.72em;
    font-weight: 700;
    text-transform: uppercase;
    background: rgba(56, 189, 248, 0.15);
    color: #38bdf8;
    border: 1px solid rgba(56, 189, 248, 0.3);
  }

  footer {
    font-size: 0.6em;
    color: #64748b;
  }
---

<!-- _class: lead -->

# Découverte de Marp
Encadrant : ES-SARRAJ Fouad

---

<!-- _class: light -->

## Lab Plan

1. Introduction
2. Problems Encountered
3. Solutions Implemented

---

## Introduction

### Objectifs et Contexte du Lab
Le but de ce lab est de maîtriser **Marp** (*Markdown Presentation Ecosystem*), un outil moderne permettant de concevoir des diaporamas professionnels et versionnables directement en syntaxe **Markdown**.

<div class="grid-2">
<div class="card">

### Compétences Clés
- Structuration par diapositives avec le séparateur `---`
- Hiérarchie des titres (`#`, `##`, `###`) et typographie
- Listes à puces, ordonnées et incrémentales
- Intégration avancée et dimensionnement d'images
- Utilisation des thèmes (`default`, `gaia`, `uncover`)
</div>
<div class="card">

### L'Écosystème Marp
- **Marp Core** : Moteur de rendu étendant le standard CommonMark
- **Marp CLI** : Ligne de commande pour compiler en HTML, PDF et PPTX
- **Marp for VS Code** : Extension d'édition et de prévisualisation en direct
</div>
</div>

---

<!-- _class: light -->

## Problems Encountered

Lors de la transition d'un document Markdown standard vers une présentation de diapositives Marp, plusieurs difficultés techniques apparaissent fréquemment :

1. **Dépassement de Contenu (Content Overflow) :**
   Contrairement à une page web à défilement infini, une diapositive possède une hauteur fixe (ratio 16:9). Tout surplus de texte ou grand tableau est masqué ou tronqué.

2. **Dimensionnement et Positionnement des Images :**
   En Markdown standard `![alt](url)`, la taille intrinsèque de l'image est imposée, provoquant souvent des débordements massifs sur les diapositives.

3. **Portée des Directives (Directives Scoping) :**
   Confusion entre les directives globales (qui impactent l'ensemble de la présentation) et les directives locales appliquées à une diapositive unique (`_class`, `_paginate`, `_header`).

4. **Gestion des Thèmes et Rendu Graphique Incohérent :**
   Incompatibilité des styles par défaut sur certains projecteurs sans configuration d'un rythme visuel adapté (alternance de contrastes sombres/clairs).

---

## Solutions Implemented

Pour résoudre ces contraintes et produire des livrables professionnels, les solutions suivantes ont été appliquées :

<div class="grid-2">
<div class="card">

### 1. Segmentation Rigoureuse
- Découpage atomique des idées : **une idée par slide**.
- Usage strict du séparateur `---` dès que le volume d'information dépasse la zone visible.

### 2. Directives d'Images Marp
- Utilisation des attributs de redimensionnement : `![w:450px]` ou `![h:300px]`.
- Utilisation des images d'arrière-plan (`bg`) et filtres (`fit`, `contain`).
</div>
<div class="card">

### 3. Directives Locales Préfixées
- Application du préfixe underscore `_` (ex. `<!-- _class: light -->`) pour modifier uniquement la diapositive courante sans altérer le flux global.

### 4. Personnalisation CSS & Thème
- Définition d'un thème avec classes réutilisables (`.card`, `.grid-2`, `.badge`) dans la section `style:` du frontmatter.
- Alternance de rythme visuel (diapositives sombres / diapositives claires).
</div>
</div>

---

<!-- _class: light -->

## Structure Fondamentale et Frontmatter

Une présentation Marp s'amorce systématiquement avec un en-tête **YAML Frontmatter** définissant les propriétés globales.

```yaml
---
marp: true              # Active le compilateur Marp
theme: default          # Thème de base (default, gaia, uncover)
paginate: true          # Numérotation automatique des diapositives
size: 16:9              # Format d'affichage (16:9 ou 4:3)
header: "Lab Marp"      # En-tête affiché sur chaque slide
footer: "Documentation" # Pied de page
style: |                # Injection CSS personnalisée
  section { font-family: 'Inter', sans-serif; }
---
```

Chaque nouvelle diapositive est ensuite délimitée par trois tirets horizontaux `---`.

---

## Titres, Hiérarchie et Typographie

Marp adapte automatiquement l'échelle des titres pour une lecture optimale à distance.

<div class="grid-2">
<div class="card">

### Échelle Markdown Standard
- `# Titre 1` : Réservé aux titres majeurs de section ou slide de garde.
- `## Titre 2` : Titre standard d'une diapositive.
- `### Titre 3` : Sous-titre ou intitulé de carte / module.
- `#### Titre 4` : Légendes et annotations.

```markdown
# Slide de Couverture
---
## Titre de Slide Régulière
### Bloc Fonctionnel A
```
</div>
<div class="card">

### Bonnes Pratiques Typographiques
- **Breveté :** Privilégier des titres percutants de 3 à 6 mots.
- **Constance :** Conserver la même hiérarchie d'une diapositive à l'autre.
- **Contraste :** Utiliser des couleurs distinctes entre le titre principal et le texte courant.
- **Ponctuation :** Éviter les points finaux dans les titres.
</div>
</div>

---

<!-- _class: light -->

## Listes et Présentation de Données

Les listes permettent de structurer la transmission d'informations concises.

<div class="grid-2">
<div class="card">

### Types de Listes Prises en Charge
- **Listes à puces** : énumérations simples
  ```markdown
  * Syntaxe simple et intuitive
  * Rendu vectoriel SVG net
  * Portable sous Git
  ```
- **Listes numérotées** : séquences ou étapes
  ```markdown
  1. Initialiser le fichier `.md`
  2. Ajouter `marp: true`
  3. Compiler via Marp CLI
  ```
- **Listes de tâches** :
  ```markdown
  - [x] Frontmatter configuré
  - [x] Alternance de styles validée
  ```
</div>
<div class="card">

### Listes Incrémentales
Marp permet de faire apparaître les éléments un à un lors de la présentation grâce à l'astérisque précédé d'un point :

```markdown
* Element permanent
* Point initial
*-> Deuxième point révélé au clic
```

> **Astuce :** Limiter chaque diapositive à **4 ou 5 puces maximum** pour préserver l'attention de l'auditoire.
</div>
</div>

---

## Gestion Avancée des Images avec Marp

Marp enrichit la syntaxe standard Markdown avec des fonctionnalités de dimensionnement et de mise en arrière-plan.

| Fonctionnalité | Syntaxe Marp | Description |
| :--- | :--- | :--- |
| **Largeur explicite** | `![w:320px](image.png)` | Fixe une largeur en pixels ou pourcentage |
| **Hauteur explicite** | `![h:200px](image.png)` | Fixe une hauteur maximale |
| **Arrière-plan complet** | `![bg](background.jpg)` | Couvre la totalité de la diapositive |
| **Arrière-plan divisé** | `![bg left:40%](photo.jpg)` | Place l'image sur 40% de la largeur à gauche |
| **Filtres graphiques** | `![bg blur:5px invert](bg.png)` | Applique des filtres CSS natifs |

```markdown
<!-- Exemple de mise en page avec image fractionnée -->
![bg right:35% https://picsum.photos/600/800](Illustration)

## Diapositive avec Volet Visuel
Le texte s'organise naturellement à gauche tandis que l'image occupe 35% de l'espace à droite.
```

---

<!-- _class: light -->

## Les Directives Marp : Globales vs Locales

Les directives contrôlent le comportement du moteur de rendu.

<div class="grid-2">
<div class="card">

### Directives Globales (Tout le diaporama)
Déclarées dans le frontmatter ou n'importe où sans underscore :

```markdown
<!-- paginate: true -->
<!-- theme: gaia -->
<!-- header: "Atelier Markdown" -->
<!-- footer: "Année 2026" -->
```
Elles s'appliquent à l'ensemble des diapositives suivantes.
</div>
<div class="card">

### Directives Locales (Slide Courante)
Déclarées avec un underscore `_` :

```markdown
<!-- _class: light -->
<!-- _paginate: false -->
<!-- _header: "" -->
<!-- _backgroundColor: "#1e1e2e" -->
```
Elles n'affectent **exclusivement** que la diapositive où elles sont insérées.
</div>
</div>

---

## Comparatif des Thèmes Intégrés

Marp Core propose trois thèmes de base répondant à différents contextes de diffusion :

| Thème | Ambiance Visuelle | Usage Recommandé | Caractéristiques |
| :--- | :--- | :--- | :--- |
| `default` | Minimaliste & Pro | Conférences techniques, cours, lab | Typographie épurée, fond clair ou sombre (`invert`) |
| `gaia` | Corporate & Élégant | Présentations d'entreprise, pitchs | Polices à empattement doux, palette chaude |
| `uncover` | Fort Impact Visuel | Keynotes, annonces clés | Texte centré par défaut, grands titres dynamiques |

```markdown
<!-- Basculer sur une diapositive en mode inversé sans changer de thème -->
<!-- _class: invert -->

## Diapositive d'Accentuation
Le modificateur `invert` bascule automatiquement le contraste.
```

---

<!-- _class: light -->

## Compilation et Exportation avec Marp CLI

L'outil **Marp CLI** permet d'automatiser la génération de livrables dans divers formats de diffusion standard.

### Installation Rapide
```bash
npm install -g @marp-team/marp-cli
```

### Commandes Usuelles de Compilation
```bash
# Générer une présentation HTML interactive avec mode présentateur
marp lab-marp.md --html -o lab-marp.html

# Exporter au format PDF imprimable
marp lab-marp.md --pdf --allow-local-files -o lab-marp.pdf

# Exporter au format PowerPoint éditable (PPTX)
marp lab-marp.md --pptx -o lab-marp.pptx

# Lancer un serveur de développement avec rechargement à chaud
marp -s -w .
```

---

## Bonnes Pratiques pour des Présentations Impactantes

<div class="grid-2">
<div class="card">

### Ce qu'il faut faire
- **Règle 6x6 :** Maximum 6 lignes par diapositive, 6 mots par ligne.
- **Rythme Visuel :** Varier les sections sombres et claires pour relancer l'attention.
- **Code Lisible :** Toujours spécifier le langage de coloration syntaxique.
- **Contraste Élevé :** Tester la visibilité sur différents écrans et vidéoprojecteurs.
</div>
<div class="card">

### Ce qu'il faut éviter
- Les blocs de texte denses non aérés.
- Multiplier les polices et couleurs hétérogènes.
- Utiliser des images de faible résolution sans ratio fixé.
- Oublier la numérotation des slides en réunion technique.
</div>
</div>

---

<!-- _class: lead -->

# Conclusion

Marp réconcilie l'efficacité de la rédaction en Markdown avec l'élégance d'une présentation soignée.

Le fichier de présentation `lab-marp.md` constitue un livrable autonome, portable et traçable sous Git.