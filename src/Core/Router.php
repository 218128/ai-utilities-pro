<?php

namespace App\Core;

class Router {
    protected $routes = [];

    public function get(string $path, string $callback): void {
        $this->routes['GET'][$path] = $callback;
    }

    public function post(string $path, string $callback): void {
        $this->routes['POST'][$path] = $callback;
    }

    public function resolve(): void {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        // Normalize trailing slash
        if ($path !== '/' && substr($path, -1) === '/') {
            $path = rtrim($path, '/');
        }

        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            http_response_code(404);
            echo "404 - Not Found";
            return;
        }

        if (is_string($callback)) {
            // Controller@method format
            [$controllerClass, $method] = explode('@', $callback);
            $controllerFQN = "App\\Controllers\\" . $controllerClass;
            require_once __DIR__ . "/../Controllers/" . $controllerClass . ".php";
            $controller = new $controllerFQN();
            echo $controller->$method();
        } else {
            echo call_user_func($callback);
        }
    }
}
?>
