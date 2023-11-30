<?php
/**
 * Created by Rick Dennison
 * Date:      11/30/23
 *
 * File Name: Dispatcher.php
 * Project:   MVC-PHP-2023
 */

namespace Framework;

use ReflectionException;
use ReflectionMethod;

class Dispatcher
{
    /**
     * @param Router $router
     */
    public function __construct(private Router $router)
    {
    }

    /**
     * @param string $path
     * @return void
     * @throws ReflectionException
     */
    public function handle(string $path): void
    {
        $params = $this->router->match($path);
        if ($params === false) {
            exit("No route matched");
        }

        $action = $this->getActionName($params);
        $controller = $this->getControllerName($params);

        $controller_object = new $controller;
        $args = $this->getActionArguments($controller, $action, $params);
        $controller_object->$action(...$args);
    }

    /**
     * @param string $controller
     * @param string $action
     * @param array $params
     * @return array
     * @throws ReflectionException
     */
    private function getActionArguments(string $controller, string $action, array $params): array
    {
        $args = [];
        $method = new ReflectionMethod($controller, $action);
        foreach ($method->getParameters() as $parameter) {
            $name = $parameter->getName();
            $args[$name] = $params[$name];
        }
        return $args;
    }

    /**
     * @param array $params
     * @return string
     */
    private function getControllerName(array $params): string
    {
        $controller = $params["controller"];
        $controller = str_replace("-", "", ucwords(strtolower($controller), "-"));
        $namespace = "App\Controllers";
        if (array_key_exists("namespace", $params)){
            $namespace .= "\\" . $params["namespace"];
        }
        return $namespace. "\\" . $controller;
    }

    /**
     * @param array $params
     * @return string
     */
    private function getActionName(array $params): string
    {
        $action = $params["action"];
        return lcfirst(str_replace("-", "", ucwords(strtolower($action), "-")));
    }

}