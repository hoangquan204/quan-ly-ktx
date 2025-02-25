<?php
class HomeController {
    public function index() {
        session_start(); // Đảm bảo session hoạt động

        // Kiểm tra nếu người dùng đã đăng nhập hay chưa
        if (!isset($_SESSION["user"]["role"])) {
            header("Location: /AuthController/login"); // Chuyển hướng nếu chưa đăng nhập
            exit;
        }

        // Tự động điều hướng đến trang theo vai trò
        if ($_SESSION["user"]["role"] === "nhanvien") {
            header("Location: /nhanvien/home");
        } elseif ($_SESSION["user"]["role"] === "sinhvien") {
            header("Location: /sinhvien/home");
        } else {
            die("Lỗi: Vai trò không hợp lệ!");
        }
    }
}
