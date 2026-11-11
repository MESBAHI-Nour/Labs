<?php

class Vehicule
{
    public function demarrer(): string
    {
        return 'Le véhicule démarre.';
    }
}

class Voiture extends Vehicule
{
    public function klaxonner(): string
    {
        return 'La voiture klaxonne.';
    }
}

$voiture = new Voiture();
echo $voiture->demarrer() . PHP_EOL;
echo $voiture->klaxonner() . PHP_EOL;
