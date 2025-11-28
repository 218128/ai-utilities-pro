<?php

namespace App\Core;

class Router {
    protected $routes = [];

    public function get($path, $callback) {
        $this->routes['GET'][$path] = $callback;
    }

    public function post($path, $callback) {
        $this->routes['POST'][$path] = $callback;
    }

    public function resolve() {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        
        // Simple normalization to remove trailing slash if not root
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
            // Handle 'Controller@method' format
            $parts = explode('@', $callback);
            $controllerName = "App\\Controllers\\" . $parts[0];
            $method = $parts[1];
            
            // Simple autoloading simulation for this structure
            require_once __DIR__ . "/../Controllers/" . $parts[0] . ".php";
            
            $controller = new $controllerName();
            echo $controller->$method();
        } else {
            echo call_user_func($callback);
        }
    }
}
