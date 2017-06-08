<?php 

// Общие настройки
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// Подключение файлов системы
define('ROOT', dirname(__FILE__));

// Создание автозагрузчика классов
require_once(ROOT. '/components/Autoload.php');

$loader = new Loader();
spl_autoload_register([$loader, 'loadClass']);

// Вызов Router
$router = new Router();
$router->Run();
