<?php
namespace Hp\Qlktx\Models;

use PDO;

class NhanVien
{
    public ?PDO $db;
    public string $ma_nhan_vien ;
    public string $ho_ten;
    public string $so_dien_thoai;
    public string $ghi_chu = '';
    public string $password;
    private array $errors = [];

    public function __construct(?PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function fill(array $data): NhanVien
    {
        $this->ma_nhan_vien = $data['ma_nhan_vien'] ?? '';
        $this->ho_ten = $data['ho_ten'] ?? '';
        $this->so_dien_thoai = $data['so_dien_thoai'] ?? '';
        $this->ghi_chu = $data['ghi_chu'] ?? '';
        // Mã hóa password nếu tồn tại trong dữ liệu đầu vào
        $this->password = isset($data['password']) ? md5($data['password']) : '';
        return $this;
    }
    public function filledit(array $data): NhanVien
    {
        $this->ho_ten = $data['ho_ten'] ?? '';
        $this->so_dien_thoai = $data['so_dien_thoai'] ?? '';
        $this->ghi_chu = $data['ghi_chu'] ?? '';
        
        return $this;
    }
   

    public function getValidationErrors(): array
    {
        return $this->errors;
    }

    public function validate(): bool
    {
        if (empty($this->ho_ten)) {
            $this->errors['ho_ten'] = 'Họ tên không được để trống';
        }
        if (empty($this->so_dien_thoai) || !preg_match('/^[0-9]{10,11}$/', $this->so_dien_thoai)) {
            $this->errors['so_dien_thoai'] = 'Số điện thoại không hợp lệ';
        }
        if (empty($this->password)) {
            $this->errors['password'] = 'Mật khẩu không được để trống';
        }
        return empty($this->errors);
    }

    public function save(): bool
    {
        if ($this->exists()) {
            $statement = $this->db->prepare(
                'update NhanVien SET ho_ten = :ho_ten, so_dien_thoai = :so_dien_thoai, ghi_chu = :ghi_chu, password = :password where ma_nhan_vien = :ma_nhan_vien'
            );
            return $statement->execute([
                'ho_ten' => $this->ho_ten,
                'so_dien_thoai' => $this->so_dien_thoai,
                'ghi_chu' => $this->ghi_chu,
                'password' => $this->password,
                'ma_nhan_vien' => $this->ma_nhan_vien
            ]);
        } else {
            
            $statement = $this->db->prepare(
                'INSERT INTO NhanVien (ho_ten, so_dien_thoai, ghi_chu, password, ma_nhan_vien) VALUES (:ho_ten, :so_dien_thoai, :ghi_chu, :password, :ma_nhan_vien)'
            );
            $result = $statement->execute([
                'ho_ten' => $this->ho_ten,
                'so_dien_thoai' => $this->so_dien_thoai,
                'ghi_chu' => $this->ghi_chu,
                'password' => $this->password,
                'ma_nhan_vien' => $this->generateMaNhanVien($this->db)
            ]);
            return $result;
        }
    }
    function generateMaNhanVien($pdo)
    {
        // Lấy số thứ tự hiện tại
        $stmt = $pdo->query("SELECT current_number FROM nhanvien_counter WHERE id = 1");
        $currentNumber = $stmt->fetchColumn();

        // Tạo mã nhân viên mới
        $newMaNhanVien = 'NVKTXA' . str_pad($currentNumber, 2, '0', STR_PAD_LEFT);

        // Cập nhật số thứ tự
        $pdo->query("UPDATE nhanvien_counter SET current_number = current_number + 1 WHERE id = 1");

        return $newMaNhanVien;
    }

    public function delete(): bool
    {
        $statement = $this->db->prepare('DELETE FROM NhanVien WHERE ma_nhan_vien = :ma_nhan_vien');
        return $statement->execute(['ma_nhan_vien' => $this->ma_nhan_vien]);
    }

    public function find(string $ma_nhan_vien): ?NhanVien
    {
        $statement = $this->db->prepare('SELECT * FROM NhanVien WHERE ma_nhan_vien = :ma_nhan_vien');
        $statement->execute(['ma_nhan_vien' => $ma_nhan_vien]);
        if ($row = $statement->fetch()) {
            return $this->fillFromDB($row);
        }
        return null;
    }

    protected function fillFromDB(array $row): NhanVien
    {
        [
            'ma_nhan_vien' => $this->ma_nhan_vien,
            'ho_ten' => $this->ho_ten,
            'so_dien_thoai' => $this->so_dien_thoai,
            'ghi_chu' => $this->ghi_chu,
            'password' => $this->password
        ] = $row;
        return $this;
    }

    public function getAll(): array
    {
        $stmt = $this->db->query("SELECT * FROM NhanVien");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByMaAndPassWord(string $ma_nhan_vien, string $password): ?NhanVien
    {
        $statement = $this->db->prepare('SELECT * FROM NhanVien WHERE ma_nhan_vien = :ma_nhan_vien AND password = :password');
        $statement->execute(['ma_nhan_vien' => $ma_nhan_vien, 'password' => $password]);
        if ($row = $statement->fetch()) {
            return $this->fillFromDB($row);
        }
        return null;
    }
    public function exists(): bool
    {
        $statement = $this->db->prepare('SELECT COUNT(*) FROM nhanvien WHERE ma_nhan_vien = :ma_nhan_vien');
        $statement->execute(['ma_nhan_vien' => $this->ma_nhan_vien]);
        return $statement->fetchColumn() > 0;
    }
    public function countAllnv(): int
    {
        $statement = $this->db->prepare("SELECT COUNT(*) FROM NhanVien WHERE ghi_chu = :ghi_chu");
        $statement->execute(['ghi_chu' => 'nhan vien']);
        return (int) $statement->fetchColumn();
    }

    public function search(array $criteria): array {
        $query = "SELECT * FROM NhanVien WHERE 1=1";
        $params = [];

        if (!empty($criteria['ma_nhan_vien'])) {
            $query .= " AND ma_nhan_vien = :ma_nhan_vien";
            $params['ma_nhan_vien'] = $criteria['ma_nhan_vien'];
        }
        if (!empty($criteria['ho_ten'])) {
            $query .= " AND ho_ten = :ho_ten";
            $params['ho_ten'] = $criteria['ho_ten'];
        }
        if (!empty($criteria['so_dien_thoai'])) {
            $query .= " AND so_dien_thoai = :so_dien_thoai";
            $params['so_dien_thoai'] = $criteria['so_dien_thoai'];
        }
        if (!empty($criteria['ghi_chu'])) {
            $query .= " AND ghi_chu = :ghi_chu";
            $params['ghi_chu'] = $criteria['ghi_chu'];
        }

        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}