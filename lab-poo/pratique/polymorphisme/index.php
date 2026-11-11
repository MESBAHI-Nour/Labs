<?php

interface Descriptible
{
    public function decrire(): string;
}

class Article implements Descriptible
{
    public function __construct(private string $titre)
    {
    }

    public function decrire(): string
    {
        return 'Article : ' . $this->titre;
    }
}

class Produit implements Descriptible
{
    public function __construct(private string $nom)
    {
    }

    public function decrire(): string
    {
        return 'Produit : ' . $this->nom;
    }
}

function afficher(Descriptible $objet): void
{
    echo $objet->decrire() . PHP_EOL;
}

afficher(new Article('Guide PHP'));
afficher(new Produit('Clavier'));
