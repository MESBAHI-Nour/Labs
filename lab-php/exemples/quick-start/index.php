<?php
declare(strict_types=1);

use App\Service\UserService;

require_once __DIR__ . '/src/Support/LoggerTrait.php';
require_once __DIR__ . '/src/Domain/User.php';
require_once __DIR__ . '/src/Service/UserService.php';

try {
    $service = new UserService();
    $user = $service->register('Amina', 22);
    echo "Inscrit : {$user->name}" . PHP_EOL;
} catch (\InvalidArgumentException $exception) {
    fwrite(STDERR, 'Inscription refusée : ' . $exception->getMessage() . PHP_EOL);
    exit(1);
}
