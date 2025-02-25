<?php
function route($method, $url) {
    $routes = [
        "GET" => [
            "/" => ["HomeController", "index"],
            "/sinhvien/home" => ["SinhVienController", "home"],
            "/nhanvien/home" => ["NhanVienController", "home"],
        ],
        "POST" => [
            "/auth/login" => ["AuthController", "login"],
            "/auth/logout" => ["AuthController", "logout"],
        ]
    ];
    

    return $routes[$method][$url] ?? null;
}
