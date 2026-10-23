# Introduction

## Contexte
Les environnements de développement intégrant des agents d'intelligence artificielle autonomes (comme Antigravity, Gemini ou Claude Code) transforment la manière de programmer. Toutefois, un modèle de langage générique ne connaît ni les conventions internes d'une équipe, ni les règles d'architecture d'un projet, ni les workflows spécifiques d'un centre comme SoliCode Tanger. Les **Skills** (compétences d'agent) comblent ce fossé en fournissant des guides opératoires spécialisés et activables à la demande.

## Importance du sujet
Pour un apprenant ou un développeur, savoir concevoir un Skill pour un agent IA permet de standardiser des processus répétitifs, de documenter des exigences de qualité logicielle directement exploitables par la machine, et de concevoir des flux de travail fiables. Au lieu de répéter sans cesse les mêmes consignes dans le prompt, le développeur encapsule son expertise dans un composant modulaire, versionné et réutilisable dans le dépôt de code.

## Objectifs pédagogiques
- Identifier le mécanisme de découverte et de chargement d'un Skill par un agent IA.
- Écrire un fichier `SKILL.md` syntaxiquement valide avec ses métadonnées obligatoires (`name`, `description`).
- Formuler des instructions directes et non ambiguës orientant les actions de l'agent.
- Construire une première compétence minimale pour valider la prise en compte locale.
- Réaliser un Quick Start autonome créant un Skill complet de génération de messages de commit selon la convention Conventional Commits.

## Parcours du lab
Définition → Outils/installation → Hello World ou première pratique → Quick Start

Le parcours est structuré pour une appropriation progressive :
1. **Définition** : Découvrir la terminologie propre aux compétences d'agents (Skills, YAML frontmatter, triggers, context injection).
2. **Outils et installation** : Mettre en place l'arborescence standard `.agent/skills/` dans le projet.
3. **Hello World** : Concevoir une mini-compétence de salutation/signature pour tester l'indexation.
4. **Quick Start** : Concevoir le Skill opérationnel `commit-helper`, documenté avec règles de décision et exemples réels.
