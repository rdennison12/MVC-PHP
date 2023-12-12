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
use Framework\Controller;
use Framework\Exceptions\PageNotFoundException;
use Framework\Viewer;

class Products extends Controller
{


    public function __construct(private Product $model)
    {
    }

    public function index(): void
    {
        $products = $this->model->findAll();

        echo $this->viewer->render("Shared/header.php", [
            "title" => "Products"
        ]);

        echo $this->viewer->render("/Products/index.php", [
            "products" => $products,
            "total" => $this->model->getTotal()
        ]);
    }

    public function show(string $id): void
    {
        $product = $this->getProduct($id);

        echo $this->viewer->render("Shared/header.php", [
            "title" => "Product"
        ]);
        echo $this->viewer->render("Products/show.php", [
            "product" => $product
        ]);
    }

    public function edit(string $id): void
    {
        $product = $this->getProduct($id);

        echo $this->viewer->render("Shared/header.php", [
            "title" => "Edit Product"
        ]);
        echo $this->viewer->render("Products/edit.php", [
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
            "name" => $this->request->post["name"],
            "description" => empty($this->request->post["description"]) ? null : $this->request->post["description"]
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
                "errors" => $this->model->getErrors(),
                "product" => $data
            ]);
        }
    }

    public function update(string $id)
    {
        $product = $this->getProduct($id);
        var_dump($product);
        $product["name"] = $this->request->post["name"];
        $product["description"] = empty($this->request->post["description"]) ? null : $this->request->post["description"];

        if ($this->model->update($id, $product)) {
            header("Location: /products/{$id}/show");
            exit;
        }
        else {
            echo $this->viewer->render("Shared/header.php", [
                "title" => "Edit Product"
            ]);
            echo $this->viewer->render("Products/edit.php", [
                "errors" => $this->model->getErrors(),
                "product" => $product
            ]);
        }
    }

    /**
     * @param string $id
     * @return array|bool
     */
    private function getProduct(string $id): array|bool
    {
        $product = $this->model->find($id);
        if ($product === false) {
            throw new PageNotFoundException("Product not found");
        }
        return $product;
    }

    public function delete(string $id)
    {
        $product = $this->getProduct($id);
        echo $this->viewer->render("Shared/header.php", [
            "title" => "Delete Product"
        ]);
        echo $this->viewer->render("Products/delete.php", [
            "product" => $product
        ]);
    }

    public function destroy(string $id)
    {
        $product = $this->getProduct($id);
        $this->model->delete($id);
        header("Location: /Products/index");
        exit;
    }
}