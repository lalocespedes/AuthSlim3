<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

use lalocespedes\App;
use Illuminate\Database\Capsule\Manager as Capsule;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();
$dotenv->required([
    'DB_CONNECTION',
    'DB_SERVER',
    'DB_DATABASE',
    'DB_USER',
    'DB_PASSWORD'
]);

session_start();

// Instantiate the app
//$settings = require __DIR__ . '/../src/settings.php';
//$app = new \Slim\App($settings);

$app = new App;

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => getenv('DB_CONNECTION'),
    'database' => getenv('DB_DATABASE'),
    'prefix' => ''
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

// Set up dependencies
//require __DIR__ . '/../src/dependencies.php';

// Register middleware
require __DIR__ . '/../src/middleware.php';

// Register routes
require __DIR__ . '/../src/routes.php';

// Run app
$app->run();
