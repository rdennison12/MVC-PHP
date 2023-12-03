<?php
/**
 * Created by Rick Dennison
 * Date:      11/25/23
 *
 * File Name: Product.php
 * Project:   MVC-PHP-2023
 */
declare(strict_types=1);

namespace App\Models;

use PDO;
use App\Database;

class Product
{
    public function __construct(private Database $database)
    {
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        $pdo = $this->database->getConnection();

        $stmt = $pdo->query("SELECT * FROM product");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}