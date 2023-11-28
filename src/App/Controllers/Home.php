<?php

namespace App\Controllers;
/**
 * Created by Rick Dennison
 * Date:      11/26/23
 *
 * File Name: Home.php
 * Project:   MVC-PHP-2023
 */
class Home
{
    public function index(): void
    {
        require "views/home_index.php";
    }
}