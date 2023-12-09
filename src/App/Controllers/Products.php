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
use Framework\Exceptions\PageNotFoundException;
use Framework\Viewer;

class Products
{
    public function __construct(private Viewer $viewer, private Product $model)
    {
    }

    public function index(): void
    {
        $products = $this->model->findAll();

        echo $this->viewer->render("Shared/header.php", [
            "title" => "Products"
        ]);

        echo $this->viewer->render("/Products/index.php", [
            "products" => $products
        ]);
    }

    public function show(string $id): void
    {
        $product = $this->model->find($id);
        if ($product === false) {
            throw new PageNotFoundException("Product not found");
        }

        echo $this->viewer->render("Shared/header.php", [
            "title" => "Product"
        ]);
        echo $this->viewer->render("Products/show.php", [
            "product" => $product
        ]);
    }

    public function showPage(string $title, string $id, string $page): void
    {
        echo $title, " ", $id, " ", $page;
    }

    public function new()
    {
        echo $this->viewer->render("Shared/header.php", [
            "title" => "New Product"
        ]);
        echo $this->viewer->render("/Products/new.php");
    }

    public function create()
    {
        $data = [
            "name" => $_POST["name"],
            "description" => empty($_POST["description"]) ? null : $_POST["description"]
        ];

        if ($this->model->insert($data)) {
            header("Location: /products/{$this->model->getInsertID()}/show");
            exit;
        }
        else {
            echo $this->viewer->render("Shared/header.php", [
                "title" => "New Product"
            ]);
            echo $this->viewer->render("Products/new.php", [
                "errors" => $this->model->getErrors()
            ]);
        }
    }
}