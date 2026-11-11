<?php
declare(strict_types=1);

use App\Domain\Article;
use App\Service\ArticleSummary;

require_once __DIR__ . '/src/Domain/Article.php';
require_once __DIR__ . '/src/Service/ArticleSummary.php';

$article = new Article('PHP et les namespaces');
echo ArticleSummary::format($article) . PHP_EOL;
