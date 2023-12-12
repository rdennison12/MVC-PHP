<?php
/**
 * Created by Rick Dennison
 * Date:      12/11/23
 *
 * File Name: Request.php
 * Project:   MVC-PHP-2023
 */
declare(strict_types=1);


namespace Framework;

class Request
{
    public function __construct(public string $uri,
                                public string $method,
                                public array $get,
                                public array $post,
                                public array $file,
                                public array $cookie,
                                public array $server)
    {
    }

    public static function createFromGlobals(): static
    {
        return new static(
            $_SERVER["REQUEST_URI"],
            $_SERVER["REQUEST_METHOD"],
            $_GET,
            $_POST,
            $_FILES,
            $_COOKIE,
            $_SERVER
        );
    }
}