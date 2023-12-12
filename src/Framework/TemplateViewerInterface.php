<?php
/**
 * Created by Rick Dennison
 * Date:      12/12/23
 *
 * File Name: TemplateViewerInterface.php
 * Project:   MVC-PHP-2023
 */

namespace Framework;

interface TemplateViewerInterface
{
    public function render(string $template, array $data = []): string;
}