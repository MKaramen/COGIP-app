<?php

declare(strict_types=1);
/*
 * App Route Class
 *   - Creates URL & loads  controller
 *   - URL format: /controller/method/params
 */
class Route
{
    private $currentController;
    private $currentMethod;
    private $params;
    public function routeRequest(): void
    {
        try {
            // Default values
            $url = '';
            $currentController = 'PagesController';
            $currentMethod = 'index';
            if (isset($_GET['url'])) {
                $url = trim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                $currentController = ucfirst(strtolower($url[0])) . 'Controller';  // string
                $currentMethod = $url[1];
            }
            $this->currentController = $currentController;
            $controllerFile = getenv('APP_ROOT') . '/app/controllers/' . $this->currentController . '.php';
            if (!file_exists($controllerFile)) throw new Exception('Page not found!');
            $this->currentController = new $currentController();                  // instantiate controller

            $this->currentMethod = $currentMethod;
            if (isset($url[1])) unset($url[1]);                                   // unset method
            $this->params = $url ? array_values(array_slice($url, 2)) : array();                   // get Params
            // Call currentMethod on instance currentController with array of params
            $this->currentController->{$this->currentMethod}($this->params);
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            Helper::to(getenv('APP_ROOT') . '/app/views/errors/404.php');
        }
    }
}
