<?php

/**
 * Created by Rick Dennison
 * Date:      11/26/23
 *
 * File Name: Home.php
 * Project:   MVC-PHP-2023
 */
namespace App\Controllers;
use Framework\Viewer;

class Home
{
    public function index(): void
    {
        $viewer = new Viewer;
        echo $viewer->render("Shared/header.php", [
            "title" => "Home"
        ]);
        echo $viewer->render("Home/index.php");
    }
}