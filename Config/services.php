<?php
/**
 * Created by Rick Dennison
 * Date:      12/6/23
 *
 * File Name: services.php
 * Project:   MVC-PHP-2023
 */
declare(strict_types=1);

$container = new Framework\Container;
$container->set(App\Database::class, function ()
{
    return new App\Database($_ENV["DB_HOST"], $_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
});

$container->set(Framework\TemplateViewerInterface::class, function (){
    return new Framework\MVCTemplateViewer;
});

return $container;