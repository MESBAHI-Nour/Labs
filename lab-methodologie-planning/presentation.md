---
marp: true
theme: default
size: 16:9
paginate: true
---

# Lab 03 — Planification d'un Lab

## Méthodologie et architecture d'apprentissage SoliCode

---

## Plan de la présentation

- Introduction & Définition
- Problématique & Solution
- Outils & Concepts clés
- Première pratique : Cadrage
- Quick Start : Planification complète

---

## Introduction

Cette présentation expose la méthode standard pour concevoir un lab d'apprentissage autonome. Nous explorerons son organisation en quatre temps et ses six fichiers clés.

---

## Mini-définition

Un lab pédagogique est un parcours guidé orienté action, reliant théorie, validation minimale et projet concret.

---

## Problématique

- Documentations techniques trop denses
- Absence d'étapes de validation intermédiaire
- Perte de temps et abandon fréquent

---

## Solution apportée

- Parcours balisé en 4 étapes progressives
- Séparation stricte entre théorie, pratique et slides
- Autonomie complète pour l'apprenant

---

## Objectifs du lab

- **Maîtriser** la structure en 6 fichiers
- **Appliquer** la progression en 4 étapes
- **Concevoir** une présentation Marp épurée

---

## Concepts clés et outils

- **Ordre d'or** : Définition → Outils → Hello → Quick Start
- **6 Fichiers** : README, intro, def, practical, slides, prompt
- **Outils** : Éditeur Markdown et extension Marp

---

## Installation — étapes

1. Ouvrir l'éditeur de code (VS Code / IDE)
2. Installer l'extension `Marp for VS Code`
3. Vérifier la présence du dossier racine `labs/`

---

## Première pratique — Cadrage express

1. Définir le titre du lab cible
2. Associer les 4 étapes en 4 lignes
3. Vérifier le rendu dans la prévisualisation Marp

---

## Quick Start — 1. Dossier et index

```bash
# Chemin : labs/
mkdir labs/lab-sujet-nom
```

- Créer un dossier unique en minuscules
- Inscrire le lab dans `labs/README.md`

---

## Quick Start — 2. Les 6 fichiers clés

```text
Chemin : labs/lab-sujet-nom/
├── README.md
├── 1-introduction.md
├── 2-definition.md
├── 3-practical.md
├── 4-presentation.md
└── PROMPT-CONTENU.md
```

- Placer tous les fichiers au même niveau

---

## Quick Start — 3. Règle d'or de la présentation

- **Slide 2** : Plan de la présentation obligatoire
- **Visuel épuré** : 3 puces maximum par diapositive
- **Dernière partie** : Quick Start clôture la présentation
