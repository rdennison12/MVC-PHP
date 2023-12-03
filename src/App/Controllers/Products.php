<?php

/**
 * Created by Rick Dennison
 * Date:      11/26/23
 *
 * File Name: Products.php
 * Project:   MVC-PHP-2023
 */
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Product;
use Framework\Viewer;

class Products
{
    public function __construct(private Viewer $viewer, private Product $model)
    {
    }

    public function index(): void
    {
        $products = $this->model->getData();

        echo $this->viewer->render("Shared/header.php", [
            "title" => "Products"
        ]);

        echo $this->viewer->render("/Products/index.php", [
            "products" => $products
        ]);
    }

    public function show(string $id): void
    {
        echo $this->viewer->render("Shared/header.php", [
            "title" => "Product"
        ]);
        echo $this->viewer->render("Products/show.php", [
            "id" => $id
        ]);
    }

    public function showPage(string $title, string $id, string $page): void
    {
        echo $title, " ", $id, " ", $page;
    }
}