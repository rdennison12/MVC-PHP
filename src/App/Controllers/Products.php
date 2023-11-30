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

class Products
{
    public function index(): void
    {
        $model = new Product;
        $products = $model->getData();
        require "Views/products_index.php";
    }

    public function show(string $id): void
    {
        require "Views/products_show.php";
    }
    public function showPage(string $title, string $id, string $page): void
    {
        echo $title, " ", $id, " ", $page;
    }
}