<?php
/**
 * Created by Rick Dennison
 * Date:      12/20/23
 *
 * File Name: middleware.php
 * Project:   MVC-PHP-2023
 */

use App\Middleware\ChangeRequestExample;
use App\Middleware\ChangeResponseExample;

return [
    "message" => ChangeRequestExample::class,
    "trim" => ChangeResponseExample::class,
    "deny"=>\App\Middleware\RedirectExample::class
];
 
 