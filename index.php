<?php
/**
 * Created by Rick Dennison
 * Date:      11/25/23
 *
 * File Name: index.php
 * Project:   MVC-PHP-2023
 */
declare(strict_types=1);

use App\Database;
use Framework\Container;
use Framework\Dispatcher;

$show_errors = true;
if ($show_errors){
    ini_set("display_errors", "1");
} else {
    ini_set("display_errors", "0");
}

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
if ($path === false) {
    throw new UnexpectedValueException("Malformed URL: '{$_SERVER["REQUEST_URI"]}'");
}
spl_autoload_register(function (string $class_name)
{
    require "src/" . str_replace("\\", "/", $class_name) . ".php";
});

$router = new Framework\Router;

$router->add("/admin/{controller}/{action}", ["namespace" => "Admin"]);
$router->add("/{title}/{id:\d+}/{page:\d+}", ["controller" => "products", "action" => "showPage"]);
$router->add("/product/{slug:[\w-]+}", ["controller" => "products", "action" => "show"]);
$router->add("/{controller}/{id:\d+}/{action}");
$router->add("/home/index", ["controller" => "home", "action" => "index"]);
$router->add("/products", ["controller" => "products", "action" => "index"]);
$router->add("/", ["controller" => "home", "action" => "index"]);
$router->add("/{controller}/{action}");

$container = new Container;
$container->set(App\Database::class, function ()
{
    return new Database("localhost", "product_db", "product_db_user", "Bee#08088");
});


$dispatcher = new Dispatcher($router, $container);
$dispatcher->handle($path);