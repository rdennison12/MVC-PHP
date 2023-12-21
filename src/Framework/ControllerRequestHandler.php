<?php
/**
 * Created by Rick Dennison
 * Date:      12/19/23
 *
 * File Name: ControllerRequestHandler.php
 * Project:   MVC-PHP-2023
 */
declare(strict_types=1);

namespace Framework;

use Framework\RequestHandlerInterface;

class ControllerRequestHandler implements RequestHandlerInterface
{
    public function __construct(private Controller $controller, private string $action, private array $args)
    {}
    public function handle(Request $request): Response
    {
       $this->controller->setRequest($request);

       return ($this->controller)->{$this->action}(...$this->args);
    }
}