# Pratique / application technique

## Préparation et outils

- Disposer de PHP 8.0 ou d'une version ultérieure installée sur votre machine.
- Ouvrir un terminal (PowerShell sur Windows ou Bash sous Linux/macOS) à la racine du dépôt.
- Vérifier la version installée avec la commande :
  ```powershell
  php -v
  ```
- Aucun framework lourd, base de données externe ou gestionnaire de paquets Composer n'est requis : chaque exemple s'exécute directement en ligne de commande (PHP CLI) avec des classes natives et du stockage en mémoire.

---

## Parcours de mise en application

Pour chaque notion, ouvrir le fichier correspondant dans votre éditeur, analyser la séparation des responsabilités, puis lancer le script depuis son répertoire exact. Chaque script est entièrement autonome.

### 1. Architecture 3-tiers

Fichier : [`pratique/architecture-3-tiers/index.php`](./pratique/architecture-3-tiers/index.php)

**Action :** observer la circulation des données à travers les trois couches logicielles distinctes (Présentation, Service, DAO).  
**Comment :** analyser le fichier, repérer l'entité `Produit`, le DAO `ProduitDao`, le service `ProduitService` et le contrôleur `ProduitController`, puis lancer :

```powershell
Push-Location .\lab-architecture\pratique\architecture-3-tiers
php .\index.php
Pop-Location
```

**Utilité :** comprendre qu'un contrôleur ne doit jamais appeler directement une base de données, et qu'un DAO ne doit contenir aucune règle d'affichage ni de calcul métier.  
**Résultat attendu :**
```text
=== Catalogue des produits (Couche Présentation) ===
- [1] Ordinateur Portable : 8500.00 MAD (avec 10% de remise : 7650.00 MAD)
- [2] Clavier Mécanique : 600.00 MAD (avec 10% de remise : 540.00 MAD)
```
**Vérification :** la couche présentation formate l'affichage des produits et de leur remise calculée par le service à partir des données fournies par le DAO.

---

### 2. Le patron DAO (Data Access Object)

Fichier : [`pratique/dao/index.php`](./pratique/dao/index.php)

**Action :** manipuler une source de données au travers d'une interface et d'une classe d'accès aux données dédiée.  
**Comment :** étudier l'interface `EtudiantDaoInterface` et son implémentation `EtudiantMemoryDao`, puis exécuter :

```powershell
Push-Location .\lab-architecture\pratique\dao
php .\index.php
Pop-Location
```

**Utilité :** isoler complètement la persistance (stockage en mémoire, SQL, fichier JSON) du code applicatif. Si la méthode de stockage change, seule l'implémentation du DAO est modifiée.  
**Résultat attendu :**
```text
=== Démonstration du patron DAO (Data Access Object) ===
Étudiants créés avec IDs générés : 1 et 2
Recherche ID 1 : Trouvé (Amina Alami)
Liste des étudiants (2 au total) :
- #1 Amina Alami (Développement Web) - amina@solicode.ma
- #2 Yassine Bennani (Mobile) - yassine@solicode.ma
Après suppression de l'ID 2, nombre restant : 1
```
**Vérification :** vérifier que les opérations CRUD (création avec identifiant auto-généré, recherche, listing et suppression) fonctionnent sans exposer la structure interne du tableau.

---

### 3. La Couche Service (Logique métier)

Fichier : [`pratique/service/index.php`](./pratique/service/index.php)

**Action :** faire appliquer des règles de gestion strictes (validation du nom, majorité à 18 ans, format email, unicité de l'email) par une classe Service.  
**Comment :** examiner `InscriptionService` et son utilisation du `UtilisateurDao`, puis exécuter :

```powershell
Push-Location .\lab-architecture\pratique\service
php .\index.php
Pop-Location
```

**Utilité :** centraliser la logique métier dans une classe dédiée afin d'éviter d'éparpiller des conditions de validation dans des contrôleurs ou des formulaires.  
**Résultat attendu :**
```text
=== Démonstration de la Couche Service en PHP ===
Succès : Utilisateur inscrit avec l'ID 1 (Sara Karim).
Tentative d'inscription d'un mineur (16 ans)...
Règle métier bloquante : L'utilisateur doit être majeur (minimum 18 ans).
Tentative d'inscription avec le même email (sara@example.com)...
Règle métier bloquante : L'email 'sara@example.com' est déjà utilisé par un autre compte.
```
**Vérification :** le cas valide enregistre l'utilisateur avec succès, tandis que les tentatives non conformes (mineur, email en doublon) sont bloquées par des exceptions métier explicites.

---

### 4. La classe BaseService

Fichier : [`pratique/base-service/index.php`](./pratique/base-service/index.php)

**Action :** réutiliser une infrastructure commune (gestion et collection des erreurs, journalisation, validation de champs) dans plusieurs services grâce à l'héritage d'une classe abstraite `BaseService`.  
**Comment :** observer la classe abstraite `BaseService` puis les deux services dérivés `ArticleService` et `CommandeService`, puis lancer :

```powershell
Push-Location .\lab-architecture\pratique\base-service
php .\index.php
Pop-Location
```

**Utilité :** éviter la duplication de code récurrent dans chaque classe service (comme la gestion d'un tableau d'erreurs ou d'un journal d'activité) en factorisant ces mécanismes transverses.  
**Résultat attendu :**
```text
=== Démonstration du patron BaseService en PHP ===
--- 1. Test ArticleService (données invalides) ---
Erreurs détectées par BaseService :
  - Le champ 'titre' est obligatoire.
  - Le prix doit être strictement supérieur à 0.

--- 2. Test ArticleService (données valides) ---
Article créé avec succès : #1 Livre PHP Architecture (150 MAD)

--- 3. Test CommandeService (héritant de BaseService) ---
Erreur commande : La quantité commandée doit être d'au moins 1.
Succès de la commande 2 !

--- 4. Logs partagés (fournis par BaseService) ---
Journal ArticleService :
  [...] Échec de création de l'article ''
  [...] Article #1 ('Livre PHP Architecture') créé avec succès.
Journal CommandeService :
  [...] Tentative de commande invalide (quantité: 0)
  [...] Commande validée pour l'article #1 (qté: 2).
```
**Vérification :** vérifier que les deux services disposent des méthodes `addError()`, `hasErrors()`, `getErrors()`, `log()` et `getLogs()` sans avoir eu besoin de les réécrire.

---

## Résultat final et validation

- Les quatre scripts d'exemples s'exécutent sans avertissement ni erreur fatale PHP.
- Le découpage en couches (Présentation, Service, DAO) est respecté dans chaque fichier.
- Le code source illustre concrètement la résolution de chaque problème soulevé :
  - Le code est structuré de manière lisible et découplée.
  - L'architecture 3-tiers isole la présentation du stockage via le service.
  - Le patron DAO encapsule l'accès aux données derrière un contrat.
  - Le Service encapsule les règles métier et les invariants du domaine.
  - La classe BaseService mutualise les mécanismes transverses d'erreurs et de logs.

---

## Livrables et critères d'acceptation

- **Livrable 1 :** le dossier `lab-architecture` placé directement à la racine du dépôt, contenant les cinq fichiers Markdown et le sous-dossier `images/` avec les logos officiels.
- **Livrable 2 :** quatre exemples autonomes sous `pratique/` (`architecture-3-tiers`, `dao`, `service`, `base-service`).
- **Critère de clarté :** chaque fichier PHP comporte des commentaires explicatifs situant la responsabilité de chaque classe.
- **Critère d'indépendance :** aucun exemple ne dépend d'un autre exemple ; chacun possède son propre point d'entrée `index.php`.

---

## Défi facultatif

Pour approfondir les acquis :
1. Dans `pratique/dao/index.php`, ajouter une méthode `findByFiliere(string $filiere): array` à l'interface `EtudiantDaoInterface` et l'implémenter dans `EtudiantMemoryDao`.
2. Créer une nouvelle classe `EtudiantService` qui utilise `EtudiantDaoInterface` et hérite de `BaseService` pour valider qu'un étudiant ne peut pas être inscrit dans une filière inexistante.
