<?php
require_once "../app/routes.php";

class App {
    protected $controller = "AuthController";
    protected $method = "login";
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        $route = route($_SERVER["REQUEST_METHOD"], "/" . ($url[0] ?? ""));
        if ($route) {
            $this->controller = $route[0];
            $this->method = $route[1];
        }

        require_once "../app/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller;

        call_user_func([$this->controller, $this->method]);
    }

    private function parseUrl() {
        if (isset($_GET['url'])) {
            return explode("/", filter_var(rtrim($_GET['url'], "/"), FILTER_SANITIZE_URL));
        }
        return [];
    }
}
