<?php

namespace Core;

class Router
{

    protected static $routes = []; // array for the routes ...

    protected static function addroutes($route, $controller, $action, $method, $middleware)
    {
        self::$routes[$method][$route] = ["controller" => $controller, "action" => $action, "middleware" => $middleware];
    }

    public static function get($route, $controller, $action, $middleware = "")
    {
        self::addroutes($route, $controller, $action, "GET", $middleware);
    }

    public static function post($route, $controller, $action, $middleware = "")
    {
        self::addroutes($route, $controller, $action, "POST", $middleware);
    }

    public static function dispatch()
    {
        $uri = $_SERVER["REQUEST_URI"];
        $method = $_SERVER["REQUEST_METHOD"];
        if ($method == "POST") {
            if (!isset($_POST["csrf_token"]) or ($_POST["csrf_token"] != $_SESSION["csrf_token"])) {
                die("CSRF Attack Detected!");
            }
        }
        foreach (self::$routes[$method] as $route => $value) {
            $pattern = "#^" . preg_replace("/\{([a-zA-Z]+)\}/", "(?P<$1>[^/]+)", $route) . "$#";
            if (preg_match($pattern, $uri, $matches)) {
                $params = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);
                $controller = $value["controller"];
                $action = $value["action"];
                $middleware = $value["middleware"];
                if ($middleware) {
                    $middleware = new $middleware();
                    $middleware->handle();
                }
                $controller = new $controller();
                return call_user_func_array([$controller, $action], array_values($params));
            }
        }
        http_response_code(404);
        require_once __DIR__ . '/../app/view/errors/404.php';
        exit;
    }
}
