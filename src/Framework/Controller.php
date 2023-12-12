<?php
/**
 * Created by Rick Dennison
 * Date:      12/11/23
 *
 * File Name: Controller.php
 * Project:   MVC-PHP-2023
 */
declare(strict_types=1);


namespace Framework;

abstract class Controller
{
    protected Request $request;
    protected TemplateViewerInterface $viewer;

    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    public function setViewer(TemplateViewerInterface $viewer): void
    {
        $this->viewer = $viewer;
    }
}