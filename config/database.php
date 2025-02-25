<?php
class Database {
    private $host = "localhost";
    private $dbname = "QuanLyKTX_QTDL";
    private $username = "root";
    private $password = "";
    private $conn;

    public function __construct() {
        $this->connect(); // Gọi connect() khi khởi tạo Database
    }

    private function connect() { // Đổi thành private
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=utf8",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Lỗi kết nối cơ sở dữ liệu: " . $e->getMessage());
        }
    }

    public function getConnection() { // Phương thức này để lấy kết nối
        return $this->conn;
    }
}
?>
