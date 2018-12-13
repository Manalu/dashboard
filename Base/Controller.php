<?php

namespace Base;

/**
 * Class Base\Controller
 */
abstract class Controller implements ControllerInterface
{
    /**
     * Set the PDO database connection
     *
     * @param $class
     * @return mixed
     */
    protected function getClassName($class)
    {
        $className = get_class($class);
        if ($pos = strrpos($className, '\\')) {
            return substr($className, $pos + 1);
        }
        return $pos;
    }

    /**
     * Check if an action exists
     *
     * @param $action
     * @param $source
     * @return void
     * @throws \Exception
     */
    protected function checkAction($action, $source)
    {

        // TODO: The methods of request must be properly carry out.
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            throw new \Exception('This type of request is currently not allowed', 403);
        }

        if (!method_exists($source, $action)) {
            throw new \Exception('Page not found', 404);
        }

    }


}
