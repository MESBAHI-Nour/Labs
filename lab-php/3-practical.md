# Pratique / application adaptée

> Type confirmé : technique. Le parcours pratique permet de vérifier les trois notions dans un petit programme exécutable.

## Préparation et outils (si nécessaire)
- Installez PHP **7.4 ou ultérieur** et ouvrez un terminal.
- Vérifiez l’installation avec `php -v`. Si la commande n’est pas reconnue, configurez le `PATH` de PHP ou utilisez le terminal fourni par votre environnement PHP.
- Aucun paquet Composer n’est requis. Les fichiers sont chargés explicitement avec `require_once` pour se concentrer sur les notions du lab.

## Parcours de mise en application
### Hello World

**Action :** vérifier qu’un script PHP s’exécute depuis le terminal.  
**Comment :** exécutez `php -r "echo 'Bonjour PHP', PHP_EOL;"`.  
**Utilité :** confirmer que PHP est accessible avant de créer les classes.  
**Résultat attendu :** le terminal affiche `Bonjour PHP`.  
**Vérification :** la commande se termine sans erreur.

### Quick Start — inscription d’un utilisateur

Les fichiers PHP prêts à exécuter se trouvent dans le sous-dossier `exemples/quick-start/` de ce lab. La structure est la suivante :

```text
exemples/quick-start/
├── index.php
└── src/
    ├── Domain/
    │   └── User.php
    ├── Service/
    │   └── UserService.php
    └── Support/
        └── LoggerTrait.php
```

Le petit programme inscrit un utilisateur. Les classes appartiennent à des namespaces, deux classes réutilisent le même trait, et une entrée invalide déclenche une exception que le point d’entrée intercepte. Aucun autoloading Composer n’est utilisé.

Depuis la racine du dépôt, placez-vous dans ce sous-dossier :

```powershell
Set-Location .\labs\lab-php-erreurs-namespaces-traits\exemples\quick-start
```

### Étapes détaillées
#### 1. Examiner le trait partagé — `src/Support/LoggerTrait.php`

Le fichier exécutable est [`exemples/quick-start/src/Support/LoggerTrait.php`](./exemples/quick-start/src/Support/LoggerTrait.php).

```php
<?php
declare(strict_types=1);

namespace App\Support;

trait LoggerTrait
{
    protected function log(string $message): void
    {
        echo "[INFO] {$message}" . PHP_EOL;
    }
}
```

- **Action :** repérer la méthode commune `log()`.
- **Comment :** ouvrez le fichier ; le namespace et le trait sont déjà déclarés.
- **Utilité :** un seul comportement pourra être réutilisé par plusieurs classes.
- **Résultat attendu :** `LoggerTrait` fournit `log(string $message)`.
- **Vérification :** le fichier contient `namespace App\Support;` et `trait LoggerTrait`.

#### 2. Examiner la classe métier — `src/Domain/User.php`

Le fichier exécutable est [`exemples/quick-start/src/Domain/User.php`](./exemples/quick-start/src/Domain/User.php).

```php
<?php
declare(strict_types=1);

namespace App\Domain;

use App\Support\LoggerTrait;

class User
{
    use LoggerTrait;

    public string $name;
    public int $age;

    public function __construct(
        string $name,
        int $age
    ) {
        if (trim($name) === '' || $age < 0) {
            throw new \InvalidArgumentException('Nom ou âge invalide.');
        }
        $this->name = $name;
        $this->age = $age;
        $this->log("Utilisateur créé : {$name}");
    }
}
```

- **Action :** repérer la validation des données utilisateur.
- **Comment :** suivez le namespace, l’import du trait et le `throw` pour un nom vide ou un âge négatif.
- **Utilité :** séparer la règle métier du traitement de l’erreur.
- **Résultat attendu :** une instance valide est créée ; une valeur invalide lance `InvalidArgumentException`.
- **Vérification :** contrôlez les propriétés typées, la condition et le `throw`.

#### 3. Examiner le service — `src/Service/UserService.php`

Le fichier exécutable est [`exemples/quick-start/src/Service/UserService.php`](./exemples/quick-start/src/Service/UserService.php).

```php
<?php
declare(strict_types=1);

namespace App\Service;

use App\Domain\User;
use App\Support\LoggerTrait;

class UserService
{
    use LoggerTrait;

    public function register(string $name, int $age): User
    {
        $user = new User($name, $age);
        $this->log("Inscription terminée pour {$name}");
        return $user;
    }
}
```

- **Action :** vérifier la réutilisation du trait dans une seconde classe.
- **Comment :** observez `User`, `LoggerTrait` et l’appel à `register()`.
- **Utilité :** démontrer le partage de code sans dupliquer `log()`.
- **Résultat attendu :** `UserService` réutilise `log()` et retourne un `User`.
- **Vérification :** les deux classes contiennent `use LoggerTrait;` et aucune ne redéfinit `log()`.

#### 4. Exécuter le point d’entrée — `index.php`

Le fichier exécutable est [`exemples/quick-start/index.php`](./exemples/quick-start/index.php).

```php
<?php
declare(strict_types=1);

use App\Service\UserService;

require_once __DIR__ . '/src/Support/LoggerTrait.php';
require_once __DIR__ . '/src/Domain/User.php';
require_once __DIR__ . '/src/Service/UserService.php';

try {
    $service = new UserService();
    $user = $service->register('Amina', 22);
    echo "Inscrit : {$user->name}" . PHP_EOL;
} catch (\InvalidArgumentException $exception) {
    fwrite(STDERR, 'Inscription refusée : ' . $exception->getMessage() . PHP_EOL);
    exit(1);
}
```

- **Action :** exécuter le parcours et traiter le cas invalide.
- **Comment :** depuis `exemples/quick-start/`, lancez `php index.php`. Le point d’entrée charge les fichiers avec `require_once`, appelle le service dans `try` et gère l’exception dans `catch`.
- **Utilité :** montrer le chargement, l’appel et la gestion d’erreur au même endroit.
- **Résultat attendu :** l’inscription valide s’affiche ; une entrée invalide produit un message explicite.
- **Vérification :** lancez `php index.php`, puis remplacez `22` par `-1` dans `index.php` et relancez la commande. La seconde exécution affiche le refus sur la sortie d’erreur et retourne un code de sortie non nul.

## Résultat final et validation
- Depuis `exemples/quick-start/`, `php index.php` avec le code initial affiche deux messages `[INFO]`, puis `Inscrit : Amina`.
- Après remplacement de `22` par `-1`, relancez `php index.php` dans le même sous-dossier : la sortie standard d’erreur indique `Inscription refusée : Nom ou âge invalide.` et le processus retourne le code `1`.
- Les noms complets des classes sont `App\Domain\User` et `App\Service\UserService`.
- `LoggerTrait::log()` est fourni par le trait et utilisé par les deux classes.
- Le code utilise des propriétés typées compatibles avec PHP 7.4.

## Livrables et critères d’acceptation
- Les quatre fichiers PHP de `exemples/quick-start/` existent aux chemins indiqués et sont exécutés depuis ce sous-dossier.
- Chaque classe déclare son namespace et les dépendances nécessaires sont importées ou chargées.
- Le code valide s’exécute sans exception non interceptée.
- Le test invalide est intercepté et signalé sans échec silencieux.
- Le trait est réutilisé dans `User` et `UserService`.

## Défi facultatif
Remplacez les `require_once` par un autoloader Composer PSR-4 pour le préfixe `App\\`. Vérifiez ensuite que les classes restent dans les mêmes namespaces et que les deux tests produisent les mêmes résultats. Ce défi nécessite Composer ; il n’est pas requis pour le Quick Start.
