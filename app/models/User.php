<?php
require_once __DIR__ . "/../../config/Database.php";

class User {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function getUserByMa($maUser) { // Sửa tên phương thức cho đúng với AuthController
        $query = "SELECT MaSV AS MaUser, HoTen, MatKhau, 'sinhvien' AS role FROM SinhVien WHERE MaSV = :maUser
                  UNION 
                  SELECT MaNV AS MaUser, HoTen, MatKhau, 'nhanvien' AS role FROM NhanVien WHERE MaNV = :maUser";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":maUser", $maUser);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
