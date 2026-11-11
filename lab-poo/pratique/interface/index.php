<?php

interface Exportable
{
    public function exporter(): string;
}

class Rapport implements Exportable
{
    public function __construct(private string $titre)
    {
    }

    public function exporter(): string
    {
        return 'Rapport exporté : ' . $this->titre;
    }
}

$rapport = new Rapport('Bilan PHP');
echo $rapport->exporter() . PHP_EOL;
