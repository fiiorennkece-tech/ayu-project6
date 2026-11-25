<?php

namespace App\Core;

class Bootstrap
{
    public function __construct()
    {
        $url = isset($_GET['page']) && is_string($_GET['page'])
            ? $_GET['page']
            : $this->getRequestUri();
        $url = trim(rawurldecode($url), '/');

        if ($url === '') {
            $url = 'index';
        }

        $segments = explode('/', $url);
        foreach ($segments as $segment) {
            if ($segment === '' || !preg_match('/^[A-Za-z0-9_-]+$/D', $segment)) {
                $this->fileNotFound();
                return;
            }
        }

        $page = ucfirst(array_shift($segments));
        $file = ROOT . "app/controllers/" . $page . ".php";
        if (!is_file($file)) {
            $this->fileNotFound();
            return;
        }

        $class = "App\\Controllers\\" . $page;
        $controller = new $class();
        $action = $segments ? array_shift($segments) : 'index';
        if (!method_exists($controller, $action)) {
            $this->fileNotFound();
            return;
        }

        $method = new \ReflectionMethod($controller, $action);
        if (!$method->isPublic() || $method->isConstructor() || $method->getDeclaringClass()->getName() !== $class) {
            $this->fileNotFound();
            return;
        }

        $params = array_values($segments);
        if (count($params) < $method->getNumberOfRequiredParameters() || count($params) > $method->getNumberOfParameters()) {
            $this->fileNotFound();
            return;
        }

        call_user_func_array([$controller, $action], $params);
    }

    private function getRequestUri(): string
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $uri = parse_url($uri, PHP_URL_PATH);
        $basePath = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/')), '/');
        if ($basePath !== '' && ($uri === $basePath || strpos($uri, $basePath . '/') === 0)) {
            $uri = substr($uri, strlen($basePath));
        }

        return is_string($uri) ? trim($uri, '/') : '';
    }

    private function fileNotFound(): void
    {
        (new \App\Core\Error())->fileNotFound();
    }
}
