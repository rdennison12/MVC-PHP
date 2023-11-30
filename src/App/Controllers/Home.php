<?php

/**
 * Created by Rick Dennison
 * Date:      11/26/23
 *
 * File Name: Home.php
 * Project:   MVC-PHP-2023
 */
namespace App\Controllers;
class Home
{
    public function index(): void
    {
        require "Views/home_index.php";
    }
}