# Définition

## Mini-définition
Une exception signale un cas anormal, un namespace nomme un espace de classes, et un trait réutilise des méthodes dans plusieurs classes.

## Concepts clés et terminologie
- **`Throwable` :** interface commune aux objets `Error` et `Exception` en PHP 7+. Un `TypeError` est un exemple de `Error`, tandis qu’`InvalidArgumentException` est une exception.
- **Erreur PHP :** toutes les erreurs et alertes ne sont pas des exceptions. Ce lab se concentre sur les exceptions attendues ; n’interceptez pas systématiquement tout `Throwable`, car cela peut masquer un défaut de programmation.
- **Exception :** objet signalant une situation que le code peut traiter ; `throw` la lance et `try`/`catch` permet de la gérer. Si aucune clause ne l’intercepte, l’exécution remonte vers l’appelant et peut s’arrêter.
- **`InvalidArgumentException` :** exception SPL adaptée à un argument invalide. Elle est définie par PHP et appartient au namespace global ; depuis un namespace, on l’écrit `\InvalidArgumentException`.
- **Namespace :** déclaration `namespace App\Domain;` qui regroupe des noms de classes. La déclaration se place au début du fichier PHP, après `declare` éventuel.
- **Import :** `use App\Domain\User;` permet de référencer une classe avec son nom court dans le fichier courant.
- **Trait :** bloc de méthodes réutilisables, inclus dans une classe avec `use LoggerTrait;`. Un trait n’est pas une classe et ne s’instancie pas.
- **Chargement :** un namespace ne charge pas automatiquement les fichiers. Ce lab utilise des `require_once` explicites ; Composer et l’autoloading PSR-4 sont une autre approche, non nécessaire ici.

## Exemple simple ou distinction utile
Un exemple sur les exceptions peut refuser un âge négatif avec `\InvalidArgumentException` et intercepter le cas avec `try`/`catch`. Un exemple séparé peut illustrer des classes aux noms complets distincts, comme `App\Domain\Article` et `App\Service\ArticleSummary`. Un troisième exemple peut montrer deux classes réutilisant un même trait. Ces notions sont testées séparément.
