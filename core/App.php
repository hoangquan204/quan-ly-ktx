<?php
require_once "../app/routes.php";

class App {
    protected $controller = "AuthController";
    protected $method = "login";
    protected $params = [];

    public function __construct() {
        $url = $this->parseUrl();
        $requestedUri = "/" . ($url[0] ?? "");

        // Debug xem URL nhận được có đúng không
        var_dump("Requested URL:", $requestedUri);

        $route = route($_SERVER["REQUEST_METHOD"], $requestedUri);
        var_dump("Resolved Route:", $route);

        if ($route) {
            $this->controller = $route[0];
            $this->method = $route[1];
        } else {
            die("Lỗi 404: Không tìm thấy route cho " . htmlspecialchars($requestedUri));
        }

        $controllerFile = "../app/controllers/" . $this->controller . ".php";

        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            $this->controller = new $this->controller;
            
            if (method_exists($this->controller, $this->method)) {
                call_user_func([$this->controller, $this->method]);
            } else {
                die("Lỗi: Phương thức " . htmlspecialchars($this->method) . " không tồn tại.");
            }
        } else {
            die("Lỗi: Controller " . htmlspecialchars($this->controller) . " không tìm thấy.");
        }
    }

    private function parseUrl() {
        if (isset($_GET['url'])) {
            return explode("/", filter_var(rtrim($_GET['url'], "/"), FILTER_SANITIZE_URL));
        }
        return [];
    }
}
?>
