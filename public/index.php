<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$router = new AltoRouter();
$router->setBasePath('/api/v1/shopping-list'); // Define la base de la API

require_once __DIR__ . '/../src/routes/api.php';

$match = $router->match();

if ($match) {
    call_user_func_array($match['target'], $match['params']);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Route not found.']);
}
