<?php
/**
 * Created by Rick Dennison
 * Date:      12/19/23
 *
 * File Name: RequestHandlerInterface.php
 * Project:   MVC-PHP-2023
 */


namespace Framework;

interface RequestHandlerInterface
{
    public function handle(Request $request): Response;
}