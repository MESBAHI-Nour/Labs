---
marp: true
theme: default
size: 16:9
paginate: true
---

# Lab 02 — Skills pour Agents IA
Conception et automatisation modulaire

---

## Plan de la présentation

- Introduction et définition
- Problématique et solution
- Outils et structure
- Hello World
- Quick Start Commit Helper

---

## Introduction

Apprendre à créer des Skills pour personnaliser le comportement des agents d'IA.

---

## Mini-définition

Un Skill est un dossier d'instructions standardisées guidant un agent d'intelligence artificielle.

---

## Problématique

- Répétition manuelle des consignes complexes
- Réponses d'agents parfois imprécises
- Absence de standards d'équipe partagés

---

## Solution apportée

- Consignes centralisées dans le dépôt
- Déclenchement automatique selon le besoin
- Formatage rigoureux et reproductible

---

## Objectifs du lab

- Comprendre l'architecture d'un Skill
- Maîtriser le fichier `SKILL.md`
- Développer une compétence opérationnelle

---

## Concepts clés et outils

- **Frontmatter YAML** : métadonnées `name` et `description`
- **Trigger** : mot-clé déclenchant l'activation
- **Agent IA** : assistant autonome outillé

---

## Installation — étapes

1. Ouvrir le répertoire du projet
2. Créer le dossier `.agent/skills/`
3. Vérifier la détection par l'agent

---

## Hello World — étapes à suivre

1. Créer le sous-dossier `hello-helper/`
2. Rédiger un fichier `SKILL.md` minimal
3. Tester avec un message de salutation

---

## Quick Start — Présentation

- Créer la compétence `commit-helper`
- Automatiser la norme Conventional Commits
- Fichier unique réutilisable par l'équipe

---

## Quick Start — Étape 1 : Dossier

`.agent/skills/commit-helper/`

```bash
mkdir -p .agent/skills/commit-helper
touch .agent/skills/commit-helper/SKILL.md
```

---

## Quick Start — Étape 2 : Frontmatter

`.agent/skills/commit-helper/SKILL.md (partie 1/2)`

```yaml
---
name: commit-helper
description: Génère des messages de commit conformes à Conventional Commits lors d'un commit Git.
---
```

---

## Quick Start — Étape 3 : Consignes

`.agent/skills/commit-helper/SKILL.md (partie 2/2)`

```markdown
# Règles de commit
Format : `<type>(<portée>): <description>`

Types : feat, fix, docs, refactor, chore.
Règle : impératif, minuscule, sans point final.
```

---

## Quick Start — Étape 4 : Test

1. Demander un message de commit à l'agent
2. Vérifier la détection du Skill
3. Valider le respect du format imposé
