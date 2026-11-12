<?php

// ============================================================
// ENTITÉ DOMAINE
// ============================================================
class Etudiant
{
    public function __construct(
        public ?int $id,
        public string $nom,
        public string $email,
        public string $filiere
    ) {}
}

// ============================================================
// INTERFACE DU DAO (CONTRAT D'ACCÈS AUX DONNÉES)
// Permet d'abstraire la source de données (BDD, mémoire, API...)
// ============================================================
interface EtudiantDaoInterface
{
    public function create(Etudiant $etudiant): Etudiant;
    public function findById(int $id): ?Etudiant;
    /** @return Etudiant[] */
    public function findAll(): array;
    public function delete(int $id): bool;
}

// ============================================================
// IMPLÉMENTATION CONCRÈTE DU DAO
// Isole la manipulation du stockage du reste de l'application.
// ============================================================
class EtudiantMemoryDao implements EtudiantDaoInterface
{
    /** @var array<int, Etudiant> */
    private array $data = [];
    private int $autoIncrementId = 1;

    public function create(Etudiant $etudiant): Etudiant
    {
        $id = $this->autoIncrementId++;
        $etudiant->id = $id;
        $this->data[$id] = $etudiant;
        return $etudiant;
    }

    public function findById(int $id): ?Etudiant
    {
        return $this->data[$id] ?? null;
    }

    public function findAll(): array
    {
        return array_values($this->data);
    }

    public function delete(int $id): bool
    {
        if (isset($this->data[$id])) {
            unset($this->data[$id]);
            return true;
        }
        return false;
    }
}

// ============================================================
// DÉMONSTRATION DU PATRON DAO
// ============================================================
$dao = new EtudiantMemoryDao();

echo "=== Démonstration du patron DAO (Data Access Object) ===" . PHP_EOL;

// 1. Insertion de données
$e1 = $dao->create(new Etudiant(null, 'Amina Alami', 'amina@solicode.ma', 'Développement Web'));
$e2 = $dao->create(new Etudiant(null, 'Yassine Bennani', 'yassine@solicode.ma', 'Mobile'));
echo "Étudiants créés avec IDs générés : " . $e1->id . " et " . $e2->id . PHP_EOL;

// 2. Recherche par identifiant
$trouve = $dao->findById($e1->id);
echo "Recherche ID {$e1->id} : " . ($trouve ? "Trouvé ({$trouve->nom})" : "Non trouvé") . PHP_EOL;

// 3. Récupération de tous les enregistrements
echo "Liste des étudiants (" . count($dao->findAll()) . " au total) :" . PHP_EOL;
foreach ($dao->findAll() as $etudiant) {
    echo "- #{$etudiant->id} {$etudiant->nom} ({$etudiant->filiere}) - {$etudiant->email}" . PHP_EOL;
}

// 4. Suppression
$dao->delete($e2->id);
echo "Après suppression de l'ID {$e2->id}, nombre restant : " . count($dao->findAll()) . PHP_EOL;

