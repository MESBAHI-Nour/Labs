<?php

// ============================================================
// CLASSE ABSTRAITE BASESERVICE
// Fournit une infrastructure commune à tous les services métier :
// gestion des erreurs, journalisation d'actions et validations.
// ============================================================
abstract class BaseService
{
    /** @var string[] */
    protected array $errors = [];

    /** @var string[] */
    protected array $logs = [];

    protected function addError(string $message): void
    {
        $this->errors[] = $message;
    }

    public function hasErrors(): bool
    {
        return count($this->errors) > 0;
    }

    /** @return string[] */
    public function getErrors(): array
    {
        return $this->errors;
    }

    protected function clearErrors(): void
    {
        $this->errors = [];
    }

    protected function log(string $action): void
    {
        $this->logs[] = sprintf("[%s] %s", date('H:i:s'), $action);
    }

    /** @return string[] */
    public function getLogs(): array
    {
        return $this->logs;
    }

    protected function validateRequired(string $valeur, string $champ): bool
    {
        if (trim($valeur) === '') {
            $this->addError("Le champ '{$champ}' est obligatoire.");
            return false;
        }
        return true;
    }
}

// ============================================================
// SERVICE 1 : ARTICLESERVICE (HÉRITE DE BASESERVICE)
// ============================================================
class ArticleService extends BaseService
{
    /** @var array<int, array{id: int, titre: string, prix: float}> */
    private array $articles = [];

    public function creerArticle(string $titre, float $prix): ?array
    {
        $this->clearErrors();

        // Utilisation des méthodes héritées de BaseService
        $this->validateRequired($titre, 'titre');

        if ($prix <= 0) {
            $this->addError("Le prix doit être strictement supérieur à 0.");
        }

        if ($this->hasErrors()) {
            $this->log("Échec de création de l'article '{$titre}'");
            return null;
        }

        $id = count($this->articles) + 1;
        $article = ['id' => $id, 'titre' => trim($titre), 'prix' => $prix];
        $this->articles[$id] = $article;

        $this->log("Article #{$id} ('{$titre}') créé avec succès.");
        return $article;
    }
}

// ============================================================
// SERVICE 2 : COMMANDESERVICE (HÉRITE DE BASESERVICE)
// ============================================================
class CommandeService extends BaseService
{
    public function passerCommande(int $articleId, int $quantite): bool
    {
        $this->clearErrors();

        if ($quantite <= 0) {
            $this->addError("La quantité commandée doit être d'au moins 1.");
            $this->log("Tentative de commande invalide (quantité: {$quantite})");
            return false;
        }

        $this->log("Commande validée pour l'article #{$articleId} (qté: {$quantite}).");
        return true;
    }
}

// ============================================================
// DÉMONSTRATION DE BASESERVICE
// ============================================================
echo "=== Démonstration du patron BaseService en PHP ===" . PHP_EOL;

$articleService = new ArticleService();
$commandeService = new CommandeService();

// 1. Test ArticleService avec erreurs
echo "--- 1. Test ArticleService (données invalides) ---" . PHP_EOL;
$resInvalide = $articleService->creerArticle('', -10.0);
if ($articleService->hasErrors()) {
    echo "Erreurs détectées par BaseService :" . PHP_EOL;
    foreach ($articleService->getErrors() as $err) {
        echo "  - {$err}" . PHP_EOL;
    }
}

// 2. Test ArticleService avec succès
echo PHP_EOL . "--- 2. Test ArticleService (données valides) ---" . PHP_EOL;
$resValide = $articleService->creerArticle('Livre PHP Architecture', 150.0);
if ($resValide) {
    echo "Article créé avec succès : #{$resValide['id']} {$resValide['titre']} ({$resValide['prix']} MAD)" . PHP_EOL;
}

// 3. Test CommandeService
echo PHP_EOL . "--- 3. Test CommandeService (héritant de BaseService) ---" . PHP_EOL;
$commandeService->passerCommande(1, 0); // Quantité invalide
if ($commandeService->hasErrors()) {
    echo "Erreur commande : " . implode(', ', $commandeService->getErrors()) . PHP_EOL;
}

$commandeService->passerCommande(1, 2); // Quantité valide
echo "Succès de la commande 2 !" . PHP_EOL;

// 4. Consultation des logs collectés par BaseService
echo PHP_EOL . "--- 4. Logs partagés (fournis par BaseService) ---" . PHP_EOL;
echo "Journal ArticleService :" . PHP_EOL;
foreach ($articleService->getLogs() as $log) {
    echo "  {$log}" . PHP_EOL;
}
echo "Journal CommandeService :" . PHP_EOL;
foreach ($commandeService->getLogs() as $log) {
    echo "  {$log}" . PHP_EOL;
}

