<?php

namespace Base;

/**
 * Interface Base/ErrorInterface
 */
interface ErrorInterface
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
    public static function errorHandler(int $level, string $message, string $file, int $line);

    /**
     * Exception handler.
     *
     * @param \Exception $exception The exception
     *
     * @return void
     * @throws \Exception
     */
    public static function exceptionHandler(\Exception $exception);
}
