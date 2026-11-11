# Définition

## Mini-définition

La programmation orientée objet organise le code autour d’objets ; les classes abstraites, les interfaces, l’héritage, le polymorphisme, l’encapsulation et les membres statiques précisent comment ces objets sont définis et utilisés.

## Concepts clés et terminologie

- **Classe abstraite :** classe déclarée avec `abstract`, qui ne peut pas être instanciée directement. Elle peut fournir des propriétés et des méthodes communes ainsi que des méthodes abstraites à définir dans les classes concrètes.
- **Interface :** contrat déclaré avec `interface`. Une classe l’implémente avec `implements` et doit fournir les méthodes exigées par ce contrat.
- **Héritage :** mécanisme par lequel une classe dérivée réutilise ou spécialise une classe parente à l’aide de `extends`. En PHP, une classe n’étend qu’une seule classe parente.
- **Polymorphisme :** possibilité de traiter plusieurs objets différents au moyen d’un même type ou contrat, chaque objet fournissant son propre comportement.
- **Encapsulation :** contrôle de l’accès à l’état et aux comportements d’un objet. Les visibilités `public`, `protected` et `private` définissent où ses membres sont accessibles.
- **Propriété statique :** donnée appartenant à la classe plutôt qu’à une instance ; elle se déclare avec `static` et s’accède avec `NomClasse::$propriete`.
- **Méthode statique :** méthode appartenant à la classe, appelée avec `NomClasse::methode()`. Elle ne dispose pas de `$this`, car elle n’est pas appelée sur une instance.

## Distinctions utiles

- Une classe abstraite peut fournir une implémentation et un état partagés ; une interface définit un contrat sans être une classe parente.
- L’héritage relie une classe dérivée à une classe parente. Le polymorphisme décrit l’utilisation commune d’objets dont les comportements peuvent différer.
- L’encapsulation ne consiste pas seulement à rendre une propriété `private` : les méthodes publiques doivent aussi préserver les règles de validité de l’objet.
- Une propriété statique est partagée par les instances de sa classe ; une propriété d’instance appartient à un objet particulier.

## Petit repère de syntaxe

```php
abstract class Forme
{
    abstract public function aire(): float;
}

interface Exportable
{
    public function exporter(): string;
}

class Rapport implements Exportable
{
    public function exporter(): string
    {
        return 'Rapport exporté';
    }
}
```
