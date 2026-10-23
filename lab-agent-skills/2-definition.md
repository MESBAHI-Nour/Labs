# Définition

## Mini-définition
Un **Skill pour agent IA** est un dossier de configuration modulaire contenant un fichier descriptif `SKILL.md`, qui fournit à un assistant de programmation les instructions, les règles méthodologiques et les outils nécessaires pour exécuter une tâche spécialisée.

## Concepts clés et terminologie

- **Agent IA de programmation :** Modèle d'intelligence artificielle doté d'outils lui permettant d'interagir avec le système de fichiers, d'exécuter des commandes de terminal et d'automatiser des workflows de développement.
- **Fichier `SKILL.md` :** Point d'entrée obligatoire d'une compétence. Il contient :
  - **Le frontmatter YAML :** En-tête délimité par `---` contenant obligatoirement `name` (identifiant unique) et `description` (résumé clair utilisé par l'agent pour décider quand activer la compétence).
  - **Le corps Markdown :** Instructions pas-à-pas, contraintes obligatoires, exemples d'utilisation et cas d'erreur.
- **Mécanisme d'activation (Triggering) :** Processus par lequel l'agent analyse la demande de l'utilisateur et consulte les descriptions des Skills disponibles pour charger en mémoire le guide opératoire pertinent.
- **Règle de non-ambiguïté :** Principe de conception stipulant qu'une description de Skill doit préciser explicitement quand l'activer et quand ne pas l'activer afin d'éviter les déclenchements parasites.

## Exemple simple ou distinction utile

- **Prompt ponctuel dans le chat vs Skill de dépôt :**
  - *Prompt ponctuel :* « N'oublie pas d'utiliser le format conventional commit quand tu commites mon code. » (Information volatile, perdue lors d'une nouvelle session ou avec un autre collaborateur).
  - *Skill versionné (`.agent/skills/commit-helper/SKILL.md`) :* La règle est inscrite au sein du dépôt Git. L'agent détecte automatiquement la compétence à chaque fois qu'un commit doit être produit, garantissant une cohérence absolue pour toute l'équipe.
