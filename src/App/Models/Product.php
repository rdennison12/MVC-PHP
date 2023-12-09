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

use Framework\Model;

class Product extends Model
{
//    protected $table = "products";

    protected function validate(array $data): void
    {
        if (empty($data["name"])) {
            $this->addError("name", "Name is required");
        }
    }
}