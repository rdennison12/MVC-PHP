<?php
/**
 * Created by Rick Dennison
 * Date:      12/12/23
 *
 * File Name: MVCTemplateViewer.php
 * Project:   MVC-PHP-2023
 */
declare(strict_types=1);


namespace Framework;

class MVCTemplateViewer implements TemplateViewerInterface
{
    public function render(string $template, array $data = []): string
    {
        $code = file_get_contents(dirname(__DIR__, 2) . "/Views/$template");
        $code = $this->replaceVariables($code);
        $code = $this->replacePHP($code);

        extract($data, EXTR_SKIP);
        ob_start();
        eval("?>$code");
        return ob_get_clean();
    }

    private function replaceVariables(string $code): string
    {
        return preg_replace("#{{\s*(\S+)\s*}}#", "<?= htmlspecialchars(\$$1) ?>", $code);
    }
    private function replacePHP(string $code): string
    {
        return preg_replace("#{%\s*(.+)\s*%}#", "<?php $1 ?>", $code);
    }
}