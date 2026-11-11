# Pratique / application technique

## Préparation et outils

- Installer PHP 8.0 ou ultérieur et ouvrir PowerShell à la racine du dépôt.
- Vérifier l’installation avec `php -v`.
- Aucun paquet Composer ni serveur web n’est nécessaire : les scripts s’exécutent en ligne de commande.

## Hello World

**Action :** vérifier qu’un script PHP s’exécute dans le terminal.  
**Comment :** depuis la racine du dépôt, exécuter :

```powershell
php .\lab-poo\pratique\hello-world\index.php
```

Le fichier [`pratique/hello-world/index.php`](./pratique/hello-world/index.php) affiche un message simple.  
**Pourquoi :** confirmer que PHP CLI est prêt avant d’étudier les notions.  
**Résultat attendu :** `Bonjour POO en PHP !`  
**Vérification :** la sortie apparaît et la commande se termine sans erreur.

## Parcours de mise en application

Pour chaque exemple, ouvrir son fichier, repérer la déclaration et son usage, puis exécuter la commande depuis le dossier exact indiqué. Les scripts sont autonomes : aucun ne dépend d’un autre.

### Exemple 1 — Classe abstraite

Fichier : [`pratique/classe-abstraite/index.php`](./pratique/classe-abstraite/index.php)

**Action :** compléter le comportement abstrait d’une forme dans une classe concrète.  
**Comment :** lire `Forme`, `Rectangle` et le calcul affiché, puis lancer :

```powershell
Push-Location .\lab-poo\pratique\classe-abstraite
php .\index.php
Pop-Location
```

**Pourquoi :** distinguer le contrat partiellement défini par une classe abstraite de l’objet concret instancié.  
**Résultat attendu :** l’aire du rectangle est affichée.  
**Vérification :** confirmer que `Rectangle` implémente `aire()` et que le script s’exécute sans instancier `Forme`.

### Exemple 2 — Interface

Fichier : [`pratique/interface/index.php`](./pratique/interface/index.php)

**Action :** définir et implémenter un contrat d’export.  
**Comment :** observer l’interface `Exportable` et la méthode fournie par `Rapport`, puis lancer :

```powershell
Push-Location .\lab-poo\pratique\interface
php .\index.php
Pop-Location
```

**Pourquoi :** comprendre comment un contrat précise une capacité attendue sans imposer l’héritage d’une classe.  
**Résultat attendu :** un message confirme l’export du rapport.  
**Vérification :** confirmer que la classe implémente l’interface et fournit sa méthode.

### Exemple 3 — Héritage

Fichier : [`pratique/heritage/index.php`](./pratique/heritage/index.php)

**Action :** créer une classe qui hérite d’un comportement et en ajoute un.  
**Comment :** repérer `Vehicule`, `Voiture` et `extends`, puis lancer :

```powershell
Push-Location .\lab-poo\pratique\heritage
php .\index.php
Pop-Location
```

**Pourquoi :** pratiquer la spécialisation d’une classe parente.  
**Résultat attendu :** la voiture peut démarrer et klaxonner.  
**Vérification :** les deux messages apparaissent ; `demarrer()` est défini dans la classe parente.

### Exemple 4 — Polymorphisme

Fichier : [`pratique/polymorphisme/index.php`](./pratique/polymorphisme/index.php)

**Action :** traiter des objets différents via une même interface.  
**Comment :** comparer les implémentations de `decrire()` et suivre leur appel par `afficher()`, puis lancer :

```powershell
Push-Location .\lab-poo\pratique\polymorphisme
php .\index.php
Pop-Location
```

**Pourquoi :** constater qu’un même code client peut utiliser plusieurs types concrets qui respectent un contrat commun.  
**Résultat attendu :** les descriptions de l’article et du produit sont affichées.  
**Vérification :** une seule fonction `afficher()` accepte les deux objets et appelle leur propre comportement.

### Exemple 5 — Encapsulation

Fichier : [`pratique/encapsulation/index.php`](./pratique/encapsulation/index.php)

**Action :** contrôler les modifications du solde d’un compte.  
**Comment :** repérer la propriété privée et les méthodes de dépôt et de retrait, puis lancer :

```powershell
Push-Location .\lab-poo\pratique\encapsulation
php .\index.php
Pop-Location
```

**Pourquoi :** préserver l’état de l’objet au moyen de règles vérifiées par ses méthodes.  
**Résultat attendu :** le solde final est affiché et un retrait excessif est refusé avec un message explicite.  
**Vérification :** confirmer que le solde n’est pas accessible directement et que le retrait invalide ne modifie pas sa valeur.

### Exemple 6 — Méthodes et propriétés statiques

Fichier : [`pratique/statique/index.php`](./pratique/statique/index.php)

**Action :** partager un compteur entre des instances et interroger la classe.  
**Comment :** repérer la propriété et la méthode statiques, puis lancer :

```powershell
Push-Location .\lab-poo\pratique\statique
php .\index.php
Pop-Location
```

**Pourquoi :** distinguer les membres de classe des membres propres à un objet.  
**Résultat attendu :** deux instances sont créées et le nombre total est affiché.  
**Vérification :** le compteur partagé atteint `2` et la méthode est appelée avec `::`.

## Résultat final et validation

- Le Hello World et les six scripts s’exécutent indépendamment.
- Chaque exemple montre la notion annoncée sans dépendre d’une application combinant toutes les notions.
- Les sorties concordent avec les résultats attendus.
- Les classes abstraites ne sont pas instanciées directement et les classes qui implémentent une interface fournissent son contrat.
- Les comportements hérités, polymorphes, encapsulés et statiques sont identifiables dans leurs exemples respectifs.

## Livrables et critères d’acceptation

- Un script PHP exécutable pour chaque notion et un Hello World.
- Des exemples sans dépendance externe, avec des noms et des sorties qui rendent leur objectif observable.
- Un exemple d’encapsulation qui refuse un retrait impossible sans altérer le solde.
- Un exemple polymorphe dans lequel le même code client traite au moins deux classes concrètes.
