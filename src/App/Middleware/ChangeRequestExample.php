<?php
/**
 * Created by Rick Dennison
 * Date:      12/19/23
 *
 * File Name: ChangeResponseExample.php
 * Project:   MVC-PHP-2023
 */


namespace App\Middleware;

use Framework\MiddlewareInterface;
use Framework\Request;
use Framework\Response;
use Framework\RequestHandlerInterface;

class ChangeRequestExample implements MiddlewareInterface
{
    public function process(Request $request, RequestHandlerInterface $next): Response
    {
        $request->post = array_map("trim", $request->post);
        return $next->handle($request);
    }
}