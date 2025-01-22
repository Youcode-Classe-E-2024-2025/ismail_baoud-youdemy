<?php

declare(strict_types=1);
namespace src\controllers;
class ControllerRouter {
    private array $routes = [];

    public function add(string $method, string $path, $controller) {
        $path = $this->normalizePath($path);
        $this->routes[] = [
            'path' => $path,
            'method' => strtoupper($method),
            'controller' => $controller
        ];
    }
    private function normalizePath(string $path): string {
        $path = trim($path, '/');
        $path = "/{$path}/";
        $path = preg_replace('#[/]{2,}#', '/', $path);
        return $path;
    }

    public function dispatch(string $path) {
        $path = $this->normalizePath($path);
        $method = strtoupper($_SERVER['REQUEST_METHOD']); 

        foreach ($this->routes as $route) {
            if (
                !preg_match("#^{$route['path']}$#", $path) ||
                $route['method'] !== $method
            ) {
                continue;
            }

            if (is_array($route['controller'])) {
                [$class, $function] = $route['controller'];
                $controllerInstance = new $class();
                $controllerInstance->{$function}();
            }
        }
    }
}


?>
