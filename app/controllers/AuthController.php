<?php
require_once __DIR__ . "/../models/User.php";

class AuthController {
    public function login() {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $maUser = $_POST["maUser"];
            $password = $_POST["password"];

            $userModel = new User();
            $user = $userModel->getUserByMa($maUser); // Đảm bảo gọi đúng tên hàm

            if ($user && $password === $user["MatKhau"]) {
                $_SESSION["user"] = [
                    "MaUser" => $user["MaUser"],
                    "role" => $user["role"]
                ];

                header("Location: /" . $_SESSION["user"]["role"] . "/home");
                exit;
            } else {
                echo "Đăng nhập thất bại!";
            }
        }

        require_once "../app/views/auth/login.php";
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: /");
    }
}
?>
