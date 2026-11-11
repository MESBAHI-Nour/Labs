<?php

class Visiteur
{
    private static int $nombre = 0;

    public function __construct()
    {
        self::$nombre++;
    }

    public static function nombreCree(): int
    {
        return self::$nombre;
    }
}

new Visiteur();
new Visiteur();
echo 'Visiteurs créés : ' . Visiteur::nombreCree() . PHP_EOL;
