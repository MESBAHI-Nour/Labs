<?php
declare(strict_types=1);

namespace App\Service;

use App\Domain\Article;

class ArticleSummary
{
    public static function format(Article $article): string
    {
        return "Article : {$article->title}";
    }
}
