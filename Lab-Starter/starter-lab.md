---
marp: true
theme: default
size: 16:9
paginate: true
style: |
  section {
    font-family: Arial, sans-serif;
    background: #ffffff;
    color: #202938;
    padding: 48px 64px;
  }
  h1 {
    color: #1769aa;
  }
  h2 {
    color: #1769aa;
  }
  strong {
    color: #1769aa;
  }
  code {
    background: #eef4fa;
    color: #143b5d;
  }
---

<!-- _class: lead -->

# Lab-Starter

**Préparer son environnement de développement**

Git · Windows · VS Code · Markdown

---

# 1. Les problèmes

- **Git** : le projet n'est pas initialisé, les changements ne sont pas suivis.
- **Fichiers cachés** : `.gitignore` ou `.env` n'apparaissent pas dans l'Explorateur.
- **Extensions cachées** : `README.md` apparaît seulement comme `README`.
- **TODO** : les tâches à faire sont dispersées dans le code.
- **Markdown** : erreurs de formatage dans les fichiers `.md`.
- **Aperçu web** : ouvrir et actualiser manuellement les pages HTML.

---

# 2. Les solutions

| Problème | Solution |
|---|---|
| Initialiser Git | Source Control de VS Code ou `git init` |
| Voir les fichiers cachés | Explorateur Windows : **Éléments masqués** |
| Voir `.md`, `.js`, `.php`… | Explorateur Windows : **Extensions de noms de fichiers** |
| Repérer les TODO dans le code | Extension **[TODO Highlight](https://marketplace.visualstudio.com/items?itemName=wayou.vscode-todo-highlight)** |
| Repérer les erreurs Markdown | Extension **[markdownlint](https://marketplace.visualstudio.com/items?itemName=DavidAnson.vscode-markdownlint)** |
| Prévisualiser HTML en direct | Extension **[Live Server](https://marketplace.visualstudio.com/items?itemName=ritwickdey.LiveServer)** |

---

# 3. Initialiser Git


1. Ouvrir le dossier du projet dans VS Code.
2. Ouvrir **Source Control** avec `Ctrl + Shift + G`.
3. Cliquer sur **Initialize Repository**.
4. Alternative dans le terminal :

```bash
git init
```


---

# 4. Afficher les fichiers cachés

Pour voir des fichiers comme `.gitignore` ou `.env` :

1. Ouvrir l'Explorateur de fichiers avec `Win + E`.
2. Cliquer sur **Affichage**.
3. Choisir **Afficher** → **Éléments masqués**.
4. Les fichiers cachés deviennent visibles.

---

# 5. Afficher les extensions de fichiers

Pour distinguer `README.md` de `README.md.txt` :

1. Ouvrir l'Explorateur de fichiers avec `Win + E`.
2. Cliquer sur **Affichage** → **Afficher**.
3. Activer **Extensions de noms de fichiers**.
4. Vérifier le vrai nom du fichier, par exemple `README.md`.

---

# 6. Repérer les tâches avec TODO Highlight

**Rôle :** met en évidence les mots-clés `TODO` et `FIXME` dans le code pour repérer les tâches et problèmes à traiter.

1. Ouvrir **Extensions** : `Ctrl + Shift + X`.
2. Rechercher **TODO Highlight** (éditeur : Wayou Liu), puis installer.
3. Dans un fichier de code, ajouter des commentaires :

```js
// TODO: ajouter la validation
// FIXME: corriger cette erreur
```

4. Enregistrer le fichier : les mots-clés sont colorés dans l’éditeur.
5. Pour afficher la liste des annotations, ouvrir la palette avec `Ctrl + Shift + P`, puis lancer **TODO-Highlight: List highlighted annotations**.



---

# 7. Vérifier Markdown avec markdownlint

1. Ouvrir **Extensions** : `Ctrl + Shift + X`.
2. Rechercher **markdownlint** (éditeur : David Anson), puis installer.
3. Ouvrir un fichier `.md` et examiner les soulignements d'avertissement.
4. Ouvrir **Problems** avec `Ctrl + Shift + M` pour lire les détails.
5. Placer le curseur sur un avertissement et essayer `Ctrl + .` pour les corrections proposées.

> L'extension signale les problèmes de style et de structure Markdown.

---

# 8. Prévisualiser avec Live Server

1. Ouvrir **Extensions** : `Ctrl + Shift + X`.
2. Rechercher **Live Server** (éditeur : Ritwick Dey), puis installer.
3. Ouvrir le projet contenant `index.html`.
4. Cliquer sur **Go Live** en bas de VS Code.
5. La page s'ouvre dans le navigateur et s'actualise après les modifications enregistrées.

> Live Server sert les pages statiques HTML , il n'exécute pas le code PHP.
