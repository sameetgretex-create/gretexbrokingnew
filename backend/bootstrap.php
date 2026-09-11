<?php
declare(strict_types=1);

spl_autoload_register(static function (string $class): void {
    $prefix = 'Gretex\\Backend\\';
    if (strncmp($class, $prefix, strlen($prefix)) !== 0) {
        return;
    }

    $relative = substr($class, strlen($prefix));
    $path = __DIR__ . '/src/' . str_replace('\\', '/', $relative) . '.php';

    if (is_file($path)) {
        require $path;
    }
});

$composerAutoload = __DIR__ . '/vendor/autoload.php';
if (is_file($composerAutoload)) {
    require_once $composerAutoload;
}

use Gretex\Backend\Config\Config;
use Gretex\Backend\Config\Env;
use Gretex\Backend\Http\Session;

Env::load(__DIR__ . '/.env');
Env::load(dirname(__DIR__) . '/.env');

$displayErrors = Config::string('APP_ENV', 'production') === 'local' ? '0' : '0';
ini_set('display_errors', $displayErrors);
ini_set('log_errors', '1');

Session::start();

