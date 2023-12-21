<?php
/**
 * Created by Rick Dennison
 * Date:      12/6/23
 *
 * File Name: routes.php
 * Project:   MVC-PHP-2023
 */
declare(strict_types=1);

$router = new Framework\Router;

$router->add("/admin/{controller}/{action}", ["namespace" => "Admin"]);
$router->add("/{title}/{id:\d+}/{page:\d+}", ["controller" => "products", "action" => "showPage"]);
$router->add("/product/{slug:[\w-]+}", ["controller" => "products", "action" => "show"]);
//$router->add("/{controller}/{id:\d+}/{action}");

// Routes specific to database administration
$router->add("/{controller}/{id:\d+}/show", ["action" => "show", "middleware" => "message|message"]);
$router->add("/{controller}/{id:\d+}/edit", ["action" => "edit"]);
$router->add("/{controller}/{id:\d+}/update", ["action" => "update"]);
$router->add("/{controller}/{id:\d+}/delete", ["action" => "delete"]);
$router->add("/{controller}/{id:\d+}/destroy", ["action" => "destroy", "method" => "post"]);


$router->add("/home/index", ["controller" => "home", "action" => "index", "middleware" => "message|message"]);
$router->add("/products", ["controller" => "products", "action" => "index", "middleware" => "message|message"]);
$router->add("/", ["controller" => "home", "action" => "index"]);
$router->add("/{controller}/{action}");

return $router;
 