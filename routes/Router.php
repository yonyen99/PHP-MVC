<?php
class Router
{
    private $routes = [];

    function get($uri, $action)
    {
        $this->routes[$uri] = [
            'method' => 'GET',
            'action' => $action
        ];
    }
    function post($uri, $action)
    {
        $this->routes[$uri] = [
            'method' => 'POST',
            'action' => $action
        ];
    }
    function put($uri, $action)
    {
        $this->routes[$uri] = [
            'method' => 'POST',
            'action' => $action
        ];
    }
    function delete($uri, $action)
    {
        $this->routes[$uri] = [
            'method' => 'POST',
            'action' => $action
        ];
    }

    function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        foreach ($this->routes as $routeUri => $route) {
            if ($routeUri == $uri && $route['method'] == $requestMethod) {
                $controller = $route['action'][0];
                $method = $route['action'][1];

                $objectController = new $controller();
                $objectController->$method($id);
                exit();
            }
        }
        http_response_code(404);
        require __DIR__. '/../app/views/errors/404.php';
    }
}
