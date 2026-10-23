---
marp: true
theme: default
paginate: true
size: 16:9
style: |
  :root {
    --bg-primary: #0f172a;
    --text-primary: #f1f5f9;
    --text-muted: #94a3b8;
    --accent: #38bdf8;
    --accent-green: #34d399;
    --accent-red: #f87171;
    --accent-yellow: #fbbf24;
    --card-bg: #1e293b;
    --border-color: #334155;
  }
  section {
    background-color: var(--bg-primary);
    color: var(--text-primary);
    font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    padding: 40px 60px;
    font-size: 20px;
  }
  h1, h2, h3 {
    color: var(--accent);
    font-weight: 700;
  }
  h1 { font-size: 2.2rem; margin-bottom: 20px; }
  h2 { font-size: 1.8rem; margin-bottom: 16px; border-bottom: 2px solid var(--border-color); padding-bottom: 8px; }
  h3 { font-size: 1.3rem; color: var(--accent-yellow); margin-top: 10px; margin-bottom: 8px; }
  p, li { line-height: 1.5; color: var(--text-primary); }
  code {
    background: #1e293b;
    color: #38bdf8;
    padding: 2px 6px;
    border-radius: 4px;
    font-size: 0.9em;
  }
  pre {
    background: #090d16 !important;
    border: 1px solid var(--border-color);
    border-radius: 8px;
    padding: 12px;
    font-size: 0.78rem;
  }
  pre code {
    background: transparent !important;
    color: #e2e8f0;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin: 15px 0;
    font-size: 0.85rem;
  }
  th {
    background: #1e293b;
    color: var(--accent);
    padding: 10px;
    border: 1px solid var(--border-color);
    text-align: left;
  }
  td {
    padding: 8px 10px;
    border: 1px solid var(--border-color);
    background: rgba(30, 41, 59, 0.4);
  }
  section.light {
    background-color: #f8fafc;
    color: #0f172a;
  }
  section.light h1, section.light h2 {
    color: #0284c7;
    border-color: #cbd5e1;
  }
  section.light h3 {
    color: #b45309;
  }
  section.light p, section.light li {
    color: #1e293b;
  }
  section.light code {
    background: #e2e8f0;
    color: #0369a1;
  }
  section.light pre {
    background: #1e293b !important;
    border-color: #cbd5e1;
  }
  section.light th {
    background: #e2e8f0;
    color: #0369a1;
    border-color: #cbd5e1;
  }
  section.light td {
    background: #ffffff;
    border-color: #cbd5e1;
    color: #1e293b;
  }
  .badge-danger {
    background: rgba(248, 113, 113, 0.15);
    color: #f87171;
    border: 1px solid #ef4444;
    padding: 2px 8px;
    border-radius: 4px;
    font-size: 0.8em;
  }
  .badge-success {
    background: rgba(52, 211, 153, 0.15);
    color: #34d399;
    border: 1px solid #10b981;
    padding: 2px 8px;
    border-radius: 4px;
    font-size: 0.8em;
  }
  .grid-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
  }
  footer {
    font-size: 0.75rem;
    color: var(--text-muted);
  }
---

# Lab : Identification, Compréhension et Résolution d’Erreurs JavaScript

---

<!-- _class: light -->

## Lab Plan

1. Introduction
2. Problems Encountered
3. Solutions Implemented

---

## 1. Introduction

### Contexte & Objectifs du Lab
Pendant le développement des fonctionnalités interactives d'un blog (chargement des articles, publication de commentaires, appels asynchrones avec backend PHP), plusieurs dysfonctionnements JavaScript peuvent paralyser l'application.

Ce lab a pour objectifs :
- **Lire et interpréter** avec précision les messages d'erreur et les traces d'exécution (*stack traces*).
- **Identifier l'origine racine** (*root cause*) des anomalies côté client et dans les échanges API/serveur.
- **Mettre en œuvre des correctifs fiables** et vérifier méthodiquement la résolution du problème.
- **Maîtriser les outils professionnels de débogage** : VS Code, Google Chrome DevTools (Console, Network) et diagnostic des réponses du serveur PHP.

---

<!-- _class: light -->

## 2. Problems Encountered

Dans le cadre du développement du blog, 5 erreurs récurrentes et bloquantes ont été relevées :

1. **`TypeError: Cannot read properties of null (reading 'addEventListener')`**
   - Échec de fixation d'événements lors de la soumission du formulaire de commentaires.
2. **`SyntaxError: Unexpected token '<', "<!DOCTYPE..." is not valid JSON`**
   - Échec du parsing d'une réponse API suite à une erreur fatale non interceptée côté PHP.
3. **`TypeError: posts.forEach is not a function`**
   - Rupture du rendu de la liste d'articles à cause d'une structure de charge utile inattendue.
4. **`TypeError: Failed to fetch`**
   - Échec complet de la requête asynchrone (serveur indisponible, mauvaise URL ou politique CORS).
5. **`ReferenceError: displayArticles is not defined`**
   - Absence de fonction disponible lors de l'appel, liée à l'ordre d'inclusion des scripts.

---

## 3. Solutions Implemented

Pour pallier durablement ces anomalies, un protocole d'assainissement a été déployé :

- **Cycle de vie du DOM garanti :** Utilisation systématique de `DOMContentLoaded` ou de l'attribut `defer` sur les scripts pour s'assurer de l'existence des nœuds HTML cibles.
- **Robustesse des flux asynchrones :** Encapsulation systématique des requêtes `fetch()` dans des blocs `try...catch` avec vérification préalable de `response.ok`.
- **Validation stricte des types de données :** Contrôle des formats reçus via `Array.isArray()` et gestion défensive des enveloppes JSON côté client.
- **Alignement des en-têtes et formats d'échange :** Forçage du header `Content-Type: application/json` et normalisation des réponses d'erreur côté PHP (codes HTTP 400/500 au format JSON).
- **Architecture modulaire :** Encapsulation des fonctions au sein de modules ES6 (`type="module"`) ou orchestration rigoureuse de la hiérarchie des scripts.

---

<!-- _class: light -->

## Erreur 1 : `Cannot read properties of null` (DOM non prêt)

### Le problème de départ
Au chargement de la page de lecture d'un article de blog, le formulaire d'ajout de commentaire ne réagit pas lors du clic sur le bouton d'envoi.

```javascript
// main.js (inclus dans le <head> sans attribut defer)
const commentForm = document.getElementById("comment-form");
commentForm.addEventListener("submit", function (e) {
    e.preventDefault();
    // Envoi du commentaire...
});
```

### La lecture de l'erreur
Dans la console DevTools :
```text
Uncaught TypeError: Cannot read properties of null (reading 'addEventListener')
    at main.js:2:13
```
- **Nature :** `TypeError` indique une tentative d'accès à une propriété/méthode sur une valeur `null` ou `undefined`.
- **Origine :** Ligne 2 de `main.js`. L'appel `document.getElementById("comment-form")` a retourné `null` car le DOM HTML sous-jacent n'était pas encore analysé par le navigateur au moment de l'exécution du script.

---

## Résolution de l'Erreur 1 & Outils Utilisés

### La Résolution

<div class="grid-2">
<div>

<span class="badge-danger">Code Incorrect</span>

```html
<head>
  <script src="js/main.js"></script>
</head>
```
```javascript
const commentForm = 
  document.getElementById("comment-form");
commentForm.addEventListener("submit", ...);
```
</div>
<div>

<span class="badge-success">Code Corrigé (Option Recommandée)</span>

```html
<head>
  <!-- Chargement différé après parsing HTML -->
  <script src="js/main.js" defer></script>
</head>
```
*Alternative JS :*
```javascript
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("comment-form");
  if (form) form.addEventListener("submit", ...);
});
```
</div>
</div>

### Outils Utilisés
- **Console DevTools :** Clic direct sur `main.js:2` pour ouvrir le code source incriminé.
- **Onglet Elements :** Vérification de l'ID exact de l'élément dans le DOM (`id="comment-form"`).

---

<!-- _class: light -->

## Erreur 2 : `Unexpected token '<'` (Réponse PHP non JSON)

### Le problème de départ
Lors de l'affichage des articles sur le blog, aucun article n'apparaît et la requête API échoue brutalement lors de la désérialisation du corps de la réponse.

```javascript
async function loadPosts() {
    const response = await fetch("/api/get_posts.php");
    const data = await response.json(); // <-- L'erreur se produit ici
    renderPosts(data);
}
```

### La lecture de l'erreur
```text
Uncaught (in promise) SyntaxError: Unexpected token '<', "<!DOCTYPE "... is not valid JSON
    at JSON.parse (<anonymous>)
    at Response.json (main.js:3:26)
```
- **Décodage :** `JSON.parse` attendait une chaîne commençant par `{` ou `[`, mais a rencontré `<` (début typique d'une balise HTML comme `<!DOCTYPE html>` ou `<br /><b>Fatal error</b>`).
- **Cause racine :** Le script PHP `/api/get_posts.php` a levé une exception ou une erreur de syntaxe PHP et a renvoyé du code HTML d'erreur avec un code 200 ou 500.

---

## Résolution de l'Erreur 2 & Outils Utilisés

### Diagnostic & Résolution
1. **Contrôle préalable du statut HTTP (`response.ok`) :** Intercepter les statuts d'erreur HTTP avant de parser le JSON.
2. **Correction côté serveur PHP :** S'assurer que le script PHP capture ses erreurs et retourne toujours du JSON valide.

```javascript
try {
    const response = await fetch("/api/get_posts.php");
    if (!response.ok) {
        throw new Error(`Erreur HTTP: ${response.status} (${response.statusText})`);
    }
    const data = await response.json();
    renderPosts(data);
} catch (error) {
    console.error("Échec du chargement :", error.message);
    displayNotification("Impossible de charger les articles", "error");
}
```

### Outils Utilisés
- **DevTools Network tab :** Clic sur la ligne `get_posts.php` > Onglet **Response** pour voir l'erreur PHP brute en HTML.
- **Logs d'erreur PHP :** Consultation de `error_log` (Apache/Nginx ou `php -S`) pour identifier la ligne PHP défaillante.

---

<!-- _class: light -->

## Erreur 3 : `posts.forEach is not a function` (Type inattendu)

### Le problème de départ
L'appel API vers `/api/posts.php` s'exécute correctement avec un statut 200 OK, mais le script plante immédiatement à l'affichage des articles.

```javascript
async function displayBlog() {
    const response = await fetch("/api/posts.php");
    const posts = await response.json();
    // Plantage ici :
    posts.forEach(post => {
        container.innerHTML += `<article><h2>${post.title}</h2></article>`;
    });
}
```

### La lecture de l'erreur
```text
Uncaught (in promise) TypeError: posts.forEach is not a function
    at displayBlog (blog.js:5:11)
```
- **Compréhension :** La méthode `.forEach()` n'existe que sur les instances d'`Array`. Si `posts` est un objet classique, `null`, ou une chaîne de caractères, JavaScript lève cette exception.
- **Constat :** L'API PHP renvoie en réalité `{ status: "success", data: [ ... ] }` et non un tableau direct `[ ... ]`.

---

## Résolution de l'Erreur 3 & Outils Utilisés

### La Résolution

```javascript
async function displayBlog() {
    try {
        const response = await fetch("/api/posts.php");
        const jsonResponse = await response.json();

        // 1. Extraction de la propriété contenant les données
        const articles = Array.isArray(jsonResponse) ? jsonResponse : jsonResponse.data;

        // 2. Validation défensive du type
        if (!Array.isArray(articles)) {
            throw new TypeError("Le format des articles reçu n'est pas un tableau.");
        }

        // 3. Parcours sécurisé
        container.innerHTML = articles.map(post => `
            <article class="post-card">
                <h2>${escapeHtml(post.title)}</h2>
                <p>${escapeHtml(post.excerpt)}</p>
            </article>
        `).join("");
    } catch (err) {
        console.error("Erreur de rendu des articles :", err);
    }
}
```

### Outils Utilisés
- **DevTools Console :** Exécution de `console.log(typeof posts, posts)` ou `console.table(jsonResponse.data)`.
- **DevTools Sources :** Point d'arrêt conditionnel juste après `await response.json()` pour inspecter la variable `posts`.

---

<!-- _class: light -->

## Erreur 4 : `Failed to fetch` (Réseau & Communication)

### Le problème de départ
Lorsqu'un utilisateur soumet un like ou tente d'ajouter un commentaire, l'interface se fige et la console émet une erreur réseau générique.

```javascript
fetch("http://localhost:8000/api/like.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ postId: 42 })
})
.then(res => res.json())
.then(data => console.log(data));
```

### La lecture de l'erreur
```text
TypeError: Failed to fetch
    at submitLike (reactions.js:2:5)
Access to fetch at 'http://localhost:8000/api/like.php' from origin 'http://localhost:3000'
has been blocked by CORS policy: No 'Access-Control-Allow-Origin' header is present.
```
- **Nature :** L'erreur `Failed to fetch` est levée dès que la requête réseau ne peut pas aboutir (échec DNS, serveur éteint, port incorrect, certificat SSL invalide ou blocage CORS).
- **Information utile :** Le message d'avertissement CORS associé dans la console indique un blocage d'origine croisée.

---

## Résolution de l'Erreur 4 & Outils Utilisés

### La Résolution

<div class="grid-2">
<div>

### 1. Côté Serveur PHP (`like.php`)
Autoriser les requêtes cross-origin ou restreindre au domaine client :
```php
<?php
// En-têtes CORS requis
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}
// Traitement...
```
</div>
<div>

### 2. Côté Client JavaScript
Sécuriser l'appel réseau via `try...catch` :
```javascript
try {
    const res = await fetch("/api/like.php", {
        method: "POST",
        body: JSON.stringify({ postId: 42 })
    });
    if (!res.ok) throw new Error(`HTTP ${res.status}`);
} catch (error) {
    if (error instanceof TypeError) {
        console.error("Panne réseau ou serveur injoignable");
    }
}
```
</div>
</div>

### Outils Utilisés
- **Chrome Network Tab :** Requête affichée en rouge avec statut `(failed)` ou `CORS error`.
- **Terminal CLI :** Vérification du serveur local (`php -S localhost:8000`).

---

<!-- _class: light -->

## Erreur 5 : `ReferenceError: function is not defined`

### Le problème de départ
Le bouton de rafraîchissement des articles déclenche une erreur immédiate lors du clic de l'utilisateur.

```html
<!-- index.html -->
<script src="js/events.js"></script>
<script src="js/articles.js"></script>
<button onclick="displayArticles()">Recharger les articles</button>
```

```javascript
// events.js (exécuté en premier)
displayArticles(); // Déclenche l'erreur

// articles.js (définit la fonction plus bas)
function displayArticles() {
    console.log("Chargement...");
}
```

### La lecture de l'erreur
```text
Uncaught ReferenceError: displayArticles is not defined
    at events.js:1:1
```
- **Compréhension :** Le moteur JavaScript tente de résoudre l'identifiant `displayArticles` dans la portée globale courante, mais il n'existe pas encore au moment de l'appel.

---

## Résolution de l'Erreur 5 & Outils Utilisés

### La Résolution

<div class="grid-2">
<div>

<span class="badge-danger">Mauvaise pratique : Ordre fragile</span>

- Dépendance forte à l'ordre d'insertion des balises `<script>` dans le HTML.
- Pollution du scope global (`window`).

```html
<!-- Risque d'erreur si l'ordre est inversé -->
<script src="js/articles.js"></script>
<script src="js/events.js"></script>
```
</div>
<div>

<span class="badge-success">Bonne pratique : Modules ES6</span>

Encapsulation et importation explicite des dépendances :

```javascript
// js/articles.js
export function displayArticles() {
    // ...
}

// js/events.js
import { displayArticles } from './articles.js';
document.getElementById('refreshBtn')
  .addEventListener('click', displayArticles);
```

```html
<script type="module" src="js/events.js"></script>
```
</div>
</div>

### Outils Utilisés
- **Console DevTools :** Affichage de la pile d'exécution (*Call Stack*) menant à l'appel non résolu.
- **Onglet Sources :** Inspection des scripts chargés dans l'arborescence des fichiers du navigateur.

---

<!-- _class: light -->

## Environnement de Débogage : VS Code & Chrome

L'intégration de VS Code avec Google Chrome permet un débogage pas à pas direct depuis l'éditeur de code.

### Configuration du fichier `.vscode/launch.json`
```json
{
  "version": "0.2.0",
  "configurations": [
    {
      "type": "pwa-chrome",
      "request": "launch",
      "name": "Lancer Chrome sur le Blog",
      "url": "http://localhost:8000",
      "webRoot": "${workspaceFolder}",
      "sourceMaps": true
    }
  ]
}
```

### Actions clés en session de débogage
- **Points d'arrêt (Breakpoints) :** Clic dans la marge gauche pour suspendre l'exécution à une ligne clé.
- **Exécution pas à pas :** Touches `F10` (*Step Over*), `F11` (*Step Into*) et `Shift+F11` (*Step Out*).
- **Inspection des variables :** Volet **Variables** (locales/globales) et volet **Watch** pour évaluer des expressions en temps réel.

---

## Maîtrise des Outils : Google Chrome DevTools

| Fonctionnalité | Utilisation & Objectif dans le Blog |
| :--- | :--- |
| **Console (`console.log`, `.error`, `.table`)** | Analyser les exceptions non capturées, examiner la structure d'un tableau d'articles avec `console.table()`, et afficher la stack trace complète via `console.trace()`. |
| **Network (Filtre `Fetch/XHR`)** | Suivre toutes les requêtes asynchrones en temps réel, vérifier les codes de retour HTTP (200, 404, 500), le temps de réponse et la taille des transferts. |
| **Network (Headers)** | Vérifier les en-têtes de requête (`Authorization`, `Content-Type`) et de réponse (`Access-Control-Allow-Origin`, `Content-Type: application/json`). |
| **Network (Payload & Response)** | Examiner les paramètres JSON transmis en `POST` et visualiser la réponse brute renvoyée par le serveur PHP avant tout parsing JS. |
| **Sources (Breakpoints & Call Stack)** | Poser des points d'arrêt sur événement (ex: *XHR/fetch Breakpoints* ou *DOM Mutation Breakpoints*) et explorer la pile d'appels. |

---

<!-- _class: light -->

## Débogage des Échanges API & Serveur PHP

Diagnostiquer un dysfonctionnement lors d'une interaction client/serveur nécessite d'isoler la source (JavaScript ou PHP) :

```
[Navigateur / JavaScript]  ---- Requête fetch() ---->  [Serveur Web Apache / PHP]
          ^                                                        |
          |                                                        v
[Console & Network DevTools] <-- Réponse (JSON ou HTML) -- [Script PHP / BDD MySQL]
```

### Étapes de diagnostic côté serveur PHP :
1. **Tester l'endpoint API isolément :** Ouvrir l'URL directement dans le navigateur ou via `curl -i http://localhost:8000/api/posts.php` pour observer le statut et les en-têtes HTTP réels.
2. **Forcer le format JSON même en cas d'erreur :**
   ```php
   header('Content-Type: application/json');
   try {
       $posts = $db->query("SELECT * FROM articles")->fetchAll(PDO::FETCH_ASSOC);
       echo json_encode(["status" => "success", "data" => $posts]);
   } catch (PDOException $e) {
       http_response_code(500);
       echo json_encode(["status" => "error", "message" => "Erreur de base de données."]);
   }
   ```
3. **Inspecter les logs d'erreurs PHP :** Ne jamais laisser `display_errors = On` afficher du HTML brut au milieu d'un flux API.

---

## Synthèse : Méthodologie d'Analyse d'une Erreur JavaScript

Pour résoudre toute erreur rencontrée pendant le développement web :

```
1. LIRE L'ERREUR        -> Identifier le type (TypeError, SyntaxError...) et la ligne source
2. ISOLER LA VARIABLE   -> Examiner la valeur réelle à l'aide de la Console ou d'un Breakpoint
3. VÉRIFIER LE RÉSEAU   -> Contrôler l'onglet Network (Statut HTTP, Response brute, En-têtes)
4. CORRIGER LE CODE     -> Appliquer une programmation défensive (try/catch, if, validation de type)
5. TESTER & VALIDER     -> Rejouer le scénario utilisateur et confirmer l'absence d'erreurs en console
```

### Compétences Acquises
- Capacité à décortiquer un message d'erreur et sa pile d'appels.
- Autonomie sur les outils de débogage DevTools et VS Code.
- Maîtrise de la frontière de communication entre JavaScript et le serveur PHP.
