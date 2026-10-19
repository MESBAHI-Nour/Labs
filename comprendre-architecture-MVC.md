---
marp: true
theme: default
size: 16:9
paginate: true
style: |
  section { font-family: Arial, sans-serif; background: #ffffff; color: #202938; padding: 48px; }
  h1 { color: #1769aa; }
  h2 { color: #1769aa; }
  strong { color: #1769aa; }
  code { font-size: 0.78em; }
  pre { font-size: 0.68em; line-height: 1.18; }
---

<!-- _class: lead -->

# Architecture MVC

**Modèle · Vue · Contrôleur**

---

## 1. Le principe

- **Model** : données, accès à la base, règles métier liées à l’entité
- **View** : interface affichée à l’utilisateur
- **Controller** : reçoit la requête et coordonne le traitement

**Flux :** Requette → Controller → Model → Controller → View

---

## 2. Model — `Product.php`

```php
class Product extends Model
{
    protected $fillable = ['name', 'price', 'stock'];

    public function isAvailable(): bool
    {
        return $this->stock > 0;
    }
}
```

- `Product` représente un produit.
- Eloquent permet `Product::all()`, `create()`, `save()`, `delete()`.
- `isAvailable()` applique une règle métier lorsqu’on l’appelle.

---

## 3. Controller — `ProductController.php`

```php
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
}
```

- Récupère les données avec le Model.
- Transmet les données à la View.
- Ne contient pas le code HTML de l’interface.

---

## 4. View — `products/index.blade.php`

```blade
<h1>Produits</h1>

@foreach ($products as $product)
    <p>{{ $product->name }} — {{ $product->price }} DH</p>
@endforeach
```

- Affiche les données reçues du Controller.
- Blade utilise `{{ }}` pour afficher les valeurs.
- La View ne récupère pas directement les données en base.

---

## 5. Relier les composants

**Route** — `routes/web.php`

```php
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'index']);
```

**Lors de `/products` :**

1. La route appelle `index()`.
2. Le Controller demande les produits au Model.
3. Le Controller transmet les produits à la View.
4. La View affiche la liste au navigateur.

---

## À retenir

| Composant | Responsabilité |
|---|---|
| Model | Données + accès DB + règles liées au modèle |
| View | Présentation |
| Controller | Coordination de la requête |
| Route | Associe une URL à une action |

**Objectif :** séparer les responsabilités pour faciliter la maintenance.
