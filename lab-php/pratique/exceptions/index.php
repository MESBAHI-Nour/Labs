<?php
declare(strict_types=1);

$input = $argv[1] ?? '22';
$age = filter_var($input, FILTER_VALIDATE_INT);

try {
    if ($age === false || $age < 0) {
        throw new InvalidArgumentException('Âge invalide.');
    }

    echo "Âge accepté : {$age}" . PHP_EOL;
} catch (InvalidArgumentException $exception) {
    fwrite(STDERR, $exception->getMessage() . PHP_EOL);
    exit(1);
}
