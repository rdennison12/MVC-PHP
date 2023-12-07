<?php
/**
 * Created by Rick Dennison
 * Date:      12/6/23
 *
 * File Name: ErrorHandler.php
 * Project:   MVC-PHP-2023
 */
declare(strict_types=1);

namespace Framework;

use ErrorException;
use Throwable;
use Framework\Exceptions\PageNotFoundException;

class ErrorHandler
{
    /**
     * @param int $errno
     * @param string $errstr
     * @param string $errfile
     * @param int $errline
     * @return bool
     * @throws ErrorException
     */
    public static function handleError(int $errno, string $errstr, string $errfile, int $errline): bool
    {
        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    }

    public static function handleException(Throwable $exception): void
    {

        if ($exception instanceof PageNotFoundException) {
            http_response_code(404);
            $template = "404.php";
        }
        else {
            http_response_code(500);
            $template = "500.php";
        }

        if ($_ENV["SHOW_ERRORS"]) {
            ini_set("display_errors", "1");
        }
        else {
            ini_set("display_errors", "0");
            ini_set("log_errors", "1");

            require dirname(__DIR__, 2) . "/Views/$template";
        }
        throw $exception;
    }

}