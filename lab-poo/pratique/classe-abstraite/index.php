<?php

abstract class Forme
{
    abstract public function aire(): float;
}

class Rectangle extends Forme
{
    public function __construct(
        private float $largeur,
        private float $hauteur
    ) {
    }

    public function aire(): float
    {
        return $this->largeur * $this->hauteur;
    }
}

$rectangle = new Rectangle(5, 3);
echo 'Aire du rectangle : ' . $rectangle->aire() . PHP_EOL;
