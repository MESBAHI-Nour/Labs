# Pratique / application adaptée

> Type confirmé : technique. Chaque notion est mise en pratique dans un exemple indépendant ; aucun exemple ne regroupe les trois notions.

## Préparation et outils
- Installez PHP 7.4 ou ultérieur et ouvrez un terminal.
- Vérifiez l’installation avec `php -v`.
- Aucun paquet Composer n’est requis.

## Parcours de mise en application

### Hello World

**Action :** vérifier qu’un script PHP s’exécute depuis le terminal.  
**Comment :** exécutez `php -r "echo 'Bonjour PHP', PHP_EOL;"`.  
**Utilité :** confirmer que PHP est accessible avant les exemples.
**Résultat attendu :** le terminal affiche `Bonjour PHP`.  
**Vérification :** la commande se termine sans erreur.

### Exemple 1 — Exceptions

L’exemple autonome se trouve dans [`exemples/exceptions/index.php`](./exemples/exceptions/index.php). Il valide une valeur reçue en argument, lève `InvalidArgumentException` si l’âge est invalide et intercepte cette exception. Il ne dépend pas des exemples sur les namespaces ou les traits.

Depuis la racine du dépôt, exécutez le cas valide :

```powershell
php .\lab-php\exemples\exceptions\index.php 22
```

Puis essayez une valeur invalide :

```powershell
php .\lab-php\exemples\exceptions\index.php -1
```

- **Action :** observer la différence entre les deux exécutions.
- **Utilité :** pratiquer `throw`, `try` et `catch` sans les mêler aux autres notions.
- **Résultat attendu :** le premier appel confirme l’âge ; le second affiche un refus explicite et retourne un code non nul.
- **Vérification :** contrôlez le message d’erreur et le code retour du second appel.

### Exemple 2 — Namespaces

L’exemple indépendant se trouve dans [`exemples/namespaces/`](./exemples/namespaces/). Il déclare et utilise des classes appartenant à des namespaces différents. Il ne dépend ni de l’exemple sur les exceptions ni de celui sur les traits.

Depuis la racine du dépôt, lancez :

```powershell
php .\lab-php\exemples\namespaces\index.php
```

- **Action :** repérer les déclarations, imports et noms complets des classes.
- **Utilité :** apprendre à distinguer et utiliser des classes organisées dans des namespaces.
- **Résultat attendu :** le script affiche un résumé construit avec les deux classes.
- **Vérification :** lancez le script et vérifiez qu’il s’exécute sans erreur de classe introuvable.

### Exemple 3 — Traits

L’exemple indépendant se trouve dans [`exemples/traits/index.php`](./exemples/traits/index.php). Deux classes utilisent un trait commun ; ce fichier ne réutilise pas les exceptions ni les classes de l’exemple sur les namespaces.

Depuis la racine du dépôt, lancez :

```powershell
php .\lab-php\exemples\traits\index.php
```

- **Action :** repérer le trait et les deux classes qui l’utilisent.
- **Utilité :** observer le partage d’une méthode sans la recopier dans chaque classe.
- **Résultat attendu :** les deux objets exécutent le comportement fourni par le trait.
- **Vérification :** contrôlez les deux messages affichés et l’usage de `use` dans chaque classe.

## Résultat final et validation
- Trois exemples PHP autonomes existent : exceptions, namespaces et traits.
- Chaque exemple se lance séparément avec la commande indiquée.
- Aucun exemple ne dépend d’une application qui rassemble les trois notions.
- Le cas d’âge invalide est intercepté et signalé sans échec silencieux.

## Livrables et critères d’acceptation
- Un script exécutable et vérifiable pour chacune des trois notions.
- Les namespaces sont déclarés et utilisés correctement dans l’exemple concerné.
- Le trait est utilisé par au moins deux classes dans son propre exemple.
- L’exception est levée puis interceptée dans son propre exemple.

## Défi facultatif
Ajoutez un cas de test supplémentaire à chaque exemple, sans les fusionner. Pour celui sur les namespaces, vérifiez l’utilisation de deux classes portant le même nom court mais appartenant à des namespaces distincts.
