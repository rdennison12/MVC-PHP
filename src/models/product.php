<?php
/**
 * Created by Rick Dennison
 * Date:      11/25/23
 *
 * File Name: product.php
 * Project:   MVC-PHP-2023
 */
class Product
{
    public function getData(): array
    {
        $dsn = "mysql:host=localhost;dbname=product_db;charset=utf8;port=3306";

        $pdo = new PDO($dsn, "product_db_user", "Bee#08088", [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

        $stmt = $pdo->query("SELECT * FROM product");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}