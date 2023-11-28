<?php
/**
 * Created by Rick Dennison
 * Date:      11/26/23
 *
 * File Name: Router.php
 * Project:   MVC-PHP-2023
 */

namespace Framework;

class Router
{
    private array $routes = [];

    public function add(string $path, array $params): void
    {
        $this->routes[] = [
            "path" => $path,
            "params" => $params
        ];
    }

    public function match(string $path): array|bool
    {
        foreach ($this->routes as $route) {
            if ($route["path"] === $path) {
                return $route["params"];
            }
        }
        return false;
    }
}