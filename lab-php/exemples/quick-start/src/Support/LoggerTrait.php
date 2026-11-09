<?php
declare(strict_types=1);

namespace App\Support;

trait LoggerTrait
{
    protected function log(string $message): void
    {
        echo "[INFO] {$message}" . PHP_EOL;
    }
}
