<?php

class Compte
{
    private float $solde = 0.0;

    public function deposer(float $montant): void
    {
        if ($montant <= 0) {
            throw new InvalidArgumentException('Le dépôt doit être positif.');
        }

        $this->solde += $montant;
    }

    public function retirer(float $montant): void
    {
        if ($montant <= 0 || $montant > $this->solde) {
            throw new InvalidArgumentException('Retrait impossible.');
        }

        $this->solde -= $montant;
    }

    public function solde(): float
    {
        return $this->solde;
    }
}

$compte = new Compte();
$compte->deposer(100);
$compte->retirer(30);

try {
    $compte->retirer(100);
} catch (InvalidArgumentException $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

echo 'Solde final : ' . $compte->solde() . PHP_EOL;
