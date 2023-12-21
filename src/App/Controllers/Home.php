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
use Framework\Response;

class Home extends Controller
{
    public function index(): Response
    {
        return $this->view("Home/index.mvc.php");
    }
}