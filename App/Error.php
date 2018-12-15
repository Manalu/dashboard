<?php

namespace App;

use Base\ErrorInterface;
use Base\View;

/**
 * Class App\Error
 */
class Error implements ErrorInterface
{
    /**
     * {@inheritdoc}
     */
    public static function errorHandler(int $level, string $message, string $file, int $line)
    {
        if (error_reporting() !== 0) {
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function exceptionHandler(\Exception $exception)
    {
        $code = $exception->getCode();
        if ($code !== 404 && $code !== 404) {
            $code = 500;
        }

        http_response_code($code);
        View::render('error', ['exception' => $exception]);
    }
}
