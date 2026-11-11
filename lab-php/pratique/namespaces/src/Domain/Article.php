<?php
declare(strict_types=1);

namespace App\Domain;

class Article
{
    public string $title;

    public function __construct(string $title)
    {
        $this->title = $title;
    }
}
