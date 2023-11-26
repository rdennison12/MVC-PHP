<?php

/**
 * Created by Rick Dennison
 * Date:      11/26/23
 *
 * File Name: products.php
 * Project:   MVC-PHP-2023
 */
class Products
{
    public function index()
    {
        require "src/models/product.php";
        $model = new product();
        $products = $model->getData();
        require "views/products_index.php";
    }

    public function show()
    {
        require "views/products_show.php";
    }
}