<?php

/**
 * Created by Rick Dennison
 * Date:      11/26/23
 *
 * File Name: Home.php
 * Project:   MVC-PHP-2023
 */
declare(strict_types=1);

namespace App\Controllers;

use Framework\Controller;

class Home extends Controller
{
    public function index(): void
    {
        echo $this->viewer->render("Shared/header.php", [
            "title" => "Home"
        ]);
        echo $this->viewer->render("Home/index.php");
    }
}