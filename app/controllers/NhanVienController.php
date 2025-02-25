<?php
class NhanVienController {
    public function home() {
        session_start();

        if (!isset($_SESSION["user"]) || $_SESSION["user"]["role"] !== "nhanvien") {
            header("Location: /AuthController/login");
            exit;
        }

        echo "<h1>Chào mừng nhân viên: " . $_SESSION["user"]["MaUser"] . "</h1>";
        echo "<a href='/AuthController/logout'>Đăng xuất</a>";
    }
}
