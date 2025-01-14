<?php

declare(strict_types=1);

class ControllerRouter {
    private array $routes = [];

    // Add routes with controller class and method
    public function add(string $method, string $path, $controller) {
        $path = $this->normalizePath($path);
        $this->routes[] = [
            'path' => $path,
            'method' => strtoupper($method),
            'controller' => $controller,
            'middlewares' => []
        ];
    }
    // Normalize the URL path
    private static function normalizePath(string $path): string {
        $path = trim($path, '/');
        $path = "/{$path}/";
        $path = preg_replace('#[/]{2,}#', '/', $path);
        return $path;
    }

    // Dispatch the correct controller method based on the URL
    public function dispatch(string $path) {
        $path = $this->normalizePath($path);
        $method = strtoupper($_SERVER['REQUEST_METHOD']); // GET, POST, etc.

        foreach ($this->routes as $route) {
            // If the path and method match, call the controller
            if (
                !preg_match("#^{$route['path']}$#", $path) ||
                $route['method'] !== $method
            ) {
                continue;
            }

            if (is_array($route['controller'])) {
                [$class, $function] = $route['controller'];
                $controllerInstance = new $class();
                $controllerInstance->{$function}(); // Call the method
            }
        }
    }
}


?>
