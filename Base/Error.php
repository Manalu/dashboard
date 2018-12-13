<?php

namespace Base;

/**
 * Class Base\Error
 */
class Error
{
    /**
     * Error handler.
     *
     * @param int $level Error level
     * @param string $message Error message
     * @param string $file Filename the error was raised in
     * @param int $line Line number in the file
     *
     * @return void
     * @throws \ErrorException
     */
    public static function errorHandler($level, $message, $file, $line)
    {
        if (error_reporting() !== 0) {
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    /**
     * Exception handler.
     *
     * @param \Exception $exception The exception
     *
     * @return void
     */
    public static function exceptionHandler($exception)
    {
        $code = $exception->getCode();
        if ($code !== 404 && $code !== 404) {
            $code = 500;
        }

        http_response_code($code);

        echo "<h1>Error occurs!</h1>";
        echo "<h2>" . $exception->getMessage() . "</h2>";
        echo "<p>" . get_class($exception) . "</p>";
        echo "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
        echo "<p>Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine() . "</p>";
    }
}
