<?php

namespace App\Controllers;

use App\Models\Product;

/**
 * Created by Rick Dennison
 * Date:      11/26/23
 *
 * File Name: Products.php
 * Project:   MVC-PHP-2023
 */
class Products
{
    public function index(): void
    {
        $model = new Product;
        $products = $model->getData();
        require "views/products_index.php";
    }

    public function show(): void
    {
        require "views/products_show.php";
    }
}