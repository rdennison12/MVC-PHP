<?php
/**
 * Created by Rick Dennison
 * Date:      12/21/23
 *
 * File Name: RedirectExample.php
 * Project:   MVC-PHP-2023
 */


namespace App\Middleware;

use Framework\MiddlewareInterface;
use Framework\Request;
use Framework\RequestHandlerInterface;
use Framework\Response;

class RedirectExample implements MiddlewareInterface
{
    public function __construct(private Response $response)
    {}
    public function process(Request $request, RequestHandlerInterface $next): Response
    {
        $this->response->redirect("/Products/index");

        return $this->response;
    }
}