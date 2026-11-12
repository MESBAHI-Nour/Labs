<?php

// ============================================================
// MODÈLE / ENTITÉ
// ============================================================
class Produit
{
    public function __construct(
        public int $id,
        public string $nom,
        public float $prix
    ) {}
}

// ============================================================
// COUCHE 3 : ACCÈS AUX DONNÉES (DAO)
// Responsabilité : interagir avec le stockage de données.
// ============================================================
class ProduitDao
{
    /** @var array<int, Produit> */
    private array $tableProduits = [];

    public function __construct()
    {
        // Données initiales simulées
        $this->tableProduits = [
            1 => new Produit(1, 'Ordinateur Portable', 8500.0),
            2 => new Produit(2, 'Clavier Mécanique', 600.0),
        ];
    }

    public function findById(int $id): ?Produit
    {
        return $this->tableProduits[$id] ?? null;
    }

    /** @return Produit[] */
    public function findAll(): array
    {
        return array_values($this->tableProduits);
    }
}

// ============================================================
// COUCHE 2 : LOGIQUE MÉTIER (SERVICE)
// Responsabilité : règles de gestion, calculs et orchestration.
// ============================================================
class ProduitService
{
    public function __construct(
        private ProduitDao $produitDao
    ) {}

    public function calculerPrixRemise(int $produitId, float $pourcentageRemise): ?float
    {
        $produit = $this->produitDao->findById($produitId);
        if ($produit === null) {
            return null;
        }

        // Règle métier : la remise ne peut pas dépasser 50%
        $remiseValide = min($pourcentageRemise, 50.0);
        return $produit->prix * (1 - ($remiseValide / 100));
    }

    public function getCatalogue(): array
    {
        return $this->produitDao->findAll();
    }
}

// ============================================================
// COUCHE 1 : PRÉSENTATION (CLI / CONTRÔLEUR)
// Responsabilité : interactions utilisateur, affichage et mise en forme.
// ============================================================
class ProduitController
{
    public function __construct(
        private ProduitService $produitService
    ) {}

    public function afficherCatalogue(): void
    {
        echo "=== Catalogue des produits (Couche Présentation) ===" . PHP_EOL;
        $produits = $this->produitService->getCatalogue();

        foreach ($produits as $produit) {
            $prixPromo = $this->produitService->calculerPrixRemise($produit->id, 10.0);
            echo sprintf(
                "- [%d] %s : %.2f MAD (avec 10%% de remise : %.2f MAD)%s",
                $produit->id,
                $produit->nom,
                $produit->prix,
                $prixPromo,
                PHP_EOL
            );
        }
    }
}

// ============================================================
// EXÉCUTION / TEST DU FLUX 3-TIERS
// ============================================================
$dao = new ProduitDao();                     // Couche 3
$service = new ProduitService($dao);          // Couche 2
$controller = new ProduitController($service); // Couche 1

$controller->afficherCatalogue();

