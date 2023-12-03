<?php
/**
 * Created by Rick Dennison
 * Date:      11/30/23
 *
 * File Name: Viewer.php
 * Project:   MVC-PHP-2023
 */
declare(strict_types=1);

namespace Framework;

class Viewer
{
    public function render(string $template, array $data = []): string
    {
        extract($data, EXTR_SKIP);
        ob_start();
        require "Views/$template";
        return ob_get_clean();
    }
}