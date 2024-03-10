<?php

namespace App;

class Router
{
    public array $routes = [];

    public function get(string $name, array $config): void
    {
        $this->routes['GET'][$name] = $config;
    }

    public function post(string $name, array $config): void
    {
        $this->routes['POST'][$name] = $config;
    }

    public function getRouteInfo(string $type, string $name): array
    {
        foreach ($this->routes[$type] as $routeName => $route) {
            if (preg_match("/$routeName/", $name)) {
                return $route;
            }
        }

        return [];
    }
}