<?php

// ============================================================
// ENTITÉ DOMAINE
// ============================================================
class Utilisateur
{
    public function __construct(
        public ?int $id,
        public string $nom,
        public string $email,
        public int $age
    ) {}
}

// ============================================================
// DAO POUR LES UTILISATEURS
// ============================================================
class UtilisateurDao
{
    /** @var array<int, Utilisateur> */
    private array $utilisateurs = [];
    private int $autoId = 1;

    public function findByEmail(string $email): ?Utilisateur
    {
        foreach ($this->utilisateurs as $u) {
            if (strtolower($u->email) === strtolower($email)) {
                return $u;
            }
        }
        return null;
    }

    public function save(Utilisateur $utilisateur): Utilisateur
    {
        $id = $this->autoId++;
        $utilisateur->id = $id;
        $this->utilisateurs[$id] = $utilisateur;
        return $utilisateur;
    }

    /** @return Utilisateur[] */
    public function findAll(): array
    {
        return array_values($this->utilisateurs);
    }
}

// ============================================================
// COUCHE SERVICE (LOGIQUE MÉTIER)
// Applique les règles de gestion et coordonne les opérations.
// ============================================================
class InscriptionService
{
    public function __construct(
        private UtilisateurDao $utilisateurDao
    ) {}

    public function inscrire(string $nom, string $email, int $age): Utilisateur
    {
        // Règle métier 1 : Validation du nom
        if (trim($nom) === '') {
            throw new InvalidArgumentException("Le nom ne peut pas être vide.");
        }

        // Règle métier 2 : Âge minimum requis
        if ($age < 18) {
            throw new DomainException("L'utilisateur doit être majeur (minimum 18 ans).");
        }

        // Règle métier 3 : Format de l'adresse email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("L'adresse email '{$email}' est invalide.");
        }

        // Règle métier 4 : Unicité de l'email
        if ($this->utilisateurDao->findByEmail($email) !== null) {
            throw new DomainException("L'email '{$email}' est déjà utilisé par un autre compte.");
        }

        // Création et persistance si toutes les règles sont respectées
        $nouvelUtilisateur = new Utilisateur(null, trim($nom), $email, $age);
        return $this->utilisateurDao->save($nouvelUtilisateur);
    }
}

// ============================================================
// DÉMONSTRATION DU SERVICE
// ============================================================
$dao = new UtilisateurDao();
$service = new InscriptionService($dao);

echo "=== Démonstration de la Couche Service en PHP ===" . PHP_EOL;

// 1. Inscription valide
try {
    $u1 = $service->inscrire("Sara Karim", "sara@example.com", 22);
    echo "Succès : Utilisateur inscrit avec l'ID {$u1->id} ({$u1->nom})." . PHP_EOL;
} catch (Exception $e) {
    echo "Échec : " . $e->getMessage() . PHP_EOL;
}

// 2. Inscription refusée : mineur (< 18 ans)
try {
    echo "Tentative d'inscription d'un mineur (16 ans)..." . PHP_EOL;
    $service->inscrire("Omar Tazi", "omar@example.com", 16);
} catch (DomainException $e) {
    echo "Règle métier bloquante : " . $e->getMessage() . PHP_EOL;
}

// 3. Inscription refusée : doublon d'email
try {
    echo "Tentative d'inscription avec le même email (sara@example.com)..." . PHP_EOL;
    $service->inscrire("Sara Autre", "sara@example.com", 25);
} catch (DomainException $e) {
    echo "Règle métier bloquante : " . $e->getMessage() . PHP_EOL;
}

