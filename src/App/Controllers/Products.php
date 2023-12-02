<?php

/**
 * Created by Rick Dennison
 * Date:      11/26/23
 *
 * File Name: Products.php
 * Project:   MVC-PHP-2023
 */

namespace App\Controllers;

use App\Models\Product;
use Framework\Viewer;

class Products
{
    public function index(): void
    {
        $model = new Product;
        $products = $model->getData();

        $viewer = new Viewer;
        echo $viewer->render("Shared/header.php", [
            "title" => "Products"
        ]);

        echo $viewer->render("/Products/index.php", [
            "products" => $products
        ]);
    }

    public function show(string $id): void
    {
        $viewer = new Viewer;
        echo $viewer->render("Shared/header.php", [
            "title" => "Product"
        ]);
        echo  $viewer->render("Products/show.php", [
            "id" => $id
        ]);
    }

    public function showPage(string $title, string $id, string $page): void
    {
        echo $title, " ", $id, " ", $page;
    }
}