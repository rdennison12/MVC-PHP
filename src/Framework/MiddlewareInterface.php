<?php
/**
 * Created by Rick Dennison
 * Date:      12/21/23
 *
 * File Name: MiddlewareInterface.php
 * Project:   MVC-PHP-2023
 */


namespace Framework;

interface MiddlewareInterface
{
    public function process(Request $request, RequestHandlerInterface $next): Response;
}