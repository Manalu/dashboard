<?php

namespace Base;

/**
 * Class Base\View
 */
class View
{
    /**
     * Render a view file
     *
     * @param string $view The view file
     * @param array $args Array of data to display in the view
     *
     * @return void
     * @throws \Exception
     */
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);
        $file = dirname(__DIR__) . "/App/Views/$view.php";
        if (is_readable($file)) {
            require $file;
        } else {
            throw new \Exception("$file is not found");
        }
    }
}