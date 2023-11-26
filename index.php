<?php
/**
 * Created by Rick Dennison
 * Date:      11/25/23
 *
 * File Name: index.php
 * Project:   MVC-PHP-2023
 */


$action = $_GET["action"];
$controller = $_GET["controller"];

if ($controller === "products") {
    require "src/controllers/products.php";
    $controller_object = new products();
}
elseif ($controller === "home") {
    require "src/controllers/home.php";
    $controller_object = new Home();
}

if ($action === "index") {
    $controller_object->index();
}
elseif ($action === "show") {
    $controller_object->show();
}


