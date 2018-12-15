<?php

namespace Base;

/**
 * Class Base\Router
 *
 * This class defines the controller for the corresponding route.
 */
class Router
{
    /**
     * Static method to call the appropriate route
     *
     * @param $config
     * @throws \Exception
     */
    public static function run($config)
    {
        foreach ($config::ROUTES as $url => $action) {
            $matches = preg_match($url, $_SERVER['REQUEST_URI'], $uri);

            if ($matches > 0) {
                $controller = new $action[0];
                $uri_data = static::parseUri($uri[1]);
                $controller->{$action[1]}($uri_data);
                return;
            } elseif ($_SERVER['REQUEST_URI'] === "/") {
                $root = $config::ROOT[0];
                $home = new $root;
                $home->{$config::ROOT[1]}([]);
                return;
            }
        }
        throw new \Exception('Page not found', 404);
    }

    /**
     * @param $uri
     * @return array
     */
    private static function parseUri($uri)
    {
        $uri_data = parse_url($uri);
        if (isset($uri_data['query'])) {
            parse_str($uri_data['query'], $params);
        } else {
            $params = false;
        }

        $action = substr($uri_data['path'], 0, -1);
        return ['params' => $params, 'action' => $action === '' ? 'index' : $action];
    }
}
