# Pratique détaillée

> Pour chaque étape, expliquer l’action, comment la réaliser, pourquoi elle est importante, le résultat attendu et comment le vérifier.

## 1. Outils, installation et vérification

### Étape 1.1 — Vérification de l'arborescence des compétences locales

- **Action :** Créer et vérifier l'existence du répertoire de personnalisation des compétences `.agent/skills/` à la racine du projet.
- **Comment :**
  Dans le terminal à la racine de votre dépôt, exécutez la commande suivante :
  ```bash
  mkdir -p .agent/skills
  ```
- **Pourquoi et importance :**
  Les environnements d'agents IA (notamment Antigravity) analysent par convention ce répertoire précis pour répertorier les compétences propres à l'espace de travail. Sans ce dossier, l'agent ne peut pas découvrir vos compétences locales.
- **Résultat attendu :**
  Le dossier `.agent/skills/` est présent à la racine du projet.
- **Vérification :**
  Exécutez `ls -la .agent` (ou `Get-ChildItem .agent` sous PowerShell) pour vous assurer que le sous-dossier `skills/` existe sans erreur de droits.

---

### Étape 1.2 — Compréhension des métadonnées requises pour un Skill

- **Action :** Identifier les deux métadonnées obligatoires de tout fichier `SKILL.md`.
- **Comment :**
  Tout fichier de compétence débute par un bloc YAML strict :
  ```yaml
  ---
  name: nom-du-skill
  description: Description précise indiquant à l'agent QUAND et POURQUOI utiliser cette compétence.
  ---
  ```
- **Pourquoi et importance :**
  Le champ `name` sert d'identifiant unique dans l'index de l'agent. Le champ `description` est capital : c'est le texte que le moteur de l'agent lit pour savoir s'il doit activer ce Skill lorsqu'un utilisateur pose une question.
- **Résultat attendu :**
  Comprendre que le bloc YAML est indispensable et doit obligatoirement être délimité par `---`.
- **Vérification :**
  Valider que le séparateur d'en-tête ne contient aucun espace avant ou après les trois tirets.

---

## 2. Hello World ou première pratique

### Étape 2.1 — Création d'une compétence minimale de salutation

- **Action :** Créer un premier Skill simple nommé `hello-helper` pour valider la chaîne d'indexation.
- **Comment :**
  Créez le sous-dossier et le fichier `SKILL.md` :
  ```bash
  mkdir -p .agent/skills/hello-helper
  ```
  Éditez `.agent/skills/hello-helper/SKILL.md` avec ce contenu minimal :
  ```markdown
  ---
  name: hello-helper
  description: Répondre de manière amicale et professionnelle en précisant le rôle de l'assistant dès que l'utilisateur dit bonjour ou salue.
  ---

  # Règle de salutation

  Lorsque l'utilisateur salue (ex: "bonjour", "salut", "hello") :
  1. Réponds poliment en français.
  2. Rappelle en une phrase courte que tu es l'assistant de développement SoliCode.
  3. Demande sur quel composant ou projet l'utilisateur souhaite avancer aujourd'hui.
  ```
- **Pourquoi et importance :**
  Cette première pratique démontre le fonctionnement d'une consigne comportementale ciblée sans introduire de complexité superflue.
- **Résultat attendu :**
  Le fichier `.agent/skills/hello-helper/SKILL.md` est enregistré et accessible par l'agent.
- **Vérification :**
  Vérifiez avec `cat .agent/skills/hello-helper/SKILL.md` que les métadonnées et instructions sont bien lisibles.

---

### Étape 2.2 — Test de déclenchement du Hello World

- **Action :** Solliciter l'agent dans le chat pour vérifier qu'il adopte le comportement décrit dans le Skill.
- **Comment :**
  Tapez un message simple tel que :
  > *« Bonjour ! »*
- **Pourquoi et importance :**
  Ce test permet de vérifier si l'agent consulte la liste des compétences et applique la directive de salutation personnalisée.
- **Résultat attendu :**
  L'agent répond en mentionnant son rôle SoliCode et en demandant sur quel sujet vous souhaitez travailler.
- **Vérification :**
  Constatez l'application des consignes numérotées du fichier de compétence.

---

## 3. Quick Start : Conception d'un Skill complet `commit-helper`

Dans ce Quick Start, nous concevons un Skill de niveau professionnel imposant à l'agent de rédiger les messages de validation Git selon la convention **Conventional Commits** (feat, fix, docs, style, refactor, test, chore).

---

### Étape 3.1 — Création de la structure du Skill `commit-helper`

- **Action :** Créer le répertoire dédié dans `.agent/skills/`.
- **Comment :**
  Dans votre terminal :
  ```bash
  mkdir -p .agent/skills/commit-helper
  ```
- **Pourquoi et importance :**
  Chaque compétence doit être isolée dans son propre sous-dossier pour permettre l'ajout futur de scripts d'aide ou d'exemples sans collision.
- **Résultat attendu :**
  Le dossier `.agent/skills/commit-helper/` est créé.
- **Vérification :**
  Vérifiez que le dossier existe avec `ls .agent/skills/`.

---

### Étape 3.2 — Rédaction du fichier pivot `SKILL.md`

- **Action :** Écrire les instructions complètes du Skill avec frontmatter, règles et format strict.
- **Comment :**
  Créez le fichier `.agent/skills/commit-helper/SKILL.md` avec le contenu suivant :
  ```markdown
  ---
  name: commit-helper
  description: Génère ou valide un message de commit Git conforme à la norme Conventional Commits. À utiliser dès que l'utilisateur demande de commiter, de proposer un message de commit ou de préparer un git commit.
  ---

  # Commit Helper — SoliCode

  ## Rôle
  Tu aides le développeur à formuler des messages de commit clairs, normalisés et professionnels pour le dépôt.

  ## Format imposé
  `<type>(<portée optionnelle>): <description courte en impératif>`

  ### Types autorisés :
  - **feat** : Nouvelle fonctionnalité
  - **fix** : Correction d'un bug
  - **docs** : Modification de la documentation
  - **style** : Formatage du code (espaces, virgules, etc.)
  - **refactor** : Refactorisation sans ajout de feature ni correction de bug
  - **test** : Ajout ou correction de tests
  - **chore** : Tâche de maintenance ou configuration

  ## Règles strictes :
  1. Description en français ou anglais selon la convention du projet, sans majuscule initiale et sans point final.
  2. Maximum 72 caractères pour la première ligne.
  3. Si la modification concerne un lab spécifique, mentionner sa portée : `feat(lab-02): ajout du fichier definition.md`.
  ```
- **Pourquoi et importance :**
  Le fichier fournit des critères explicites et mesurables que l'agent peut suivre rigoureusement à chaque suggestion de commit.
- **Résultat attendu :**
  Le fichier `.agent/skills/commit-helper/SKILL.md` est complet et enregistré.
- **Vérification :**
  Inspectez les balises YAML et vérifiez qu'aucune faute de syntaxe ne casse la lecture.

---

### Étape 3.3 — Test de fonctionnement en conditions réelles

- **Action :** Demander à l'agent de proposer un message de commit après avoir modifié un fichier.
- **Comment :**
  Posez la question suivante à l'agent :
  > *« Propose-moi un message de commit pour l'ajout du module d'authentification dans mon projet Laravel. »*
- **Pourquoi et importance :**
  Confirmer que l'agent active automatiquement la compétence `commit-helper` et applique le format `<type>(<portée>): <description>` au lieu d'une phrase banale.
- **Résultat attendu :**
  L'agent propose un message formaté tel que :
  `feat(auth): ajout du module d'authentification Laravel`
- **Vérification :**
  Vérifiez que le préfixe correspond bien à l'un des types autorisés (`feat`, `fix`, etc.) et qu'aucun point final n'est présent.

---

## Résultat final et validation

À l'issue de ce lab, vous avez validé :
1. L'installation de l'arborescence `.agent/skills/` dans votre dépôt.
2. La compréhension de la structure d'un `SKILL.md` (frontmatter YAML + Markdown).
3. La création d'une compétence d'initialisation (Hello World).
4. La production et la validation d'un Skill complet et réutilisable (`commit-helper`).

---

## Livrables et critères d’acceptation

### Livrables attendus :
1. Dossier `.agent/skills/commit-helper/` contenant le fichier `SKILL.md`.
2. Capture d'écran ou extrait de discussion prouvant l'activation du Skill lors d'une demande de commit.

### Critères d'acceptation :
- **Frontmatter valide :** Présence obligatoire de `name` et `description` délimités par `---`.
- **Règles explicites :** La description du Skill spécifie clairement son contexte de déclenchement.
- **Conformité des sorties :** Les messages générés respectent la spécification Conventional Commits définie.

---

## Défi facultatif

Pour approfondir vos compétences :
- Ajoutez un second fichier `examples.md` dans `.agent/skills/commit-helper/` répertoriant 5 bons exemples et 5 contre-exemples de commits.
- Mettez à jour `SKILL.md` pour demander à l'agent de s'appuyer sur `examples.md` lors de ses suggestions.
