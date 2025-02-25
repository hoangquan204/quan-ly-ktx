<?php
namespace Hp\Qlktx\Models;
use PDO;

class SinhVien
{
    public ?PDO $db;
    public string $ma_sinh_vien;
    public string $ho_ten;
    public string $so_dien_thoai;
    public string $ma_lop;
    public string $password;
    public string $gioi_tinh;
    public string $notification = '';
    private array $errors = [];
    
    public function __construct(?PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function fill(array $data): SinhVien
    {
        $this->ma_sinh_vien = $data['ma_sinh_vien'] ?? '';
        $this->ho_ten = $data['ho_ten'] ?? '';
        $this->so_dien_thoai = $data['so_dien_thoai'] ?? '';
        $this->ma_lop = $data['ma_lop'] ?? '';
        if (!empty($data['password'])) {
            $this->password = md5($data['password']);
        }
        $this->gioi_tinh = $data['gioi_tinh'] ?? '';
        $this->notification = $data['notification'] ?? '';
        return $this;
    }

    public function filledit(array $data): SinhVien
    {
        $this->ho_ten = $data['ho_ten'] ?? '';
        $this->so_dien_thoai = $data['so_dien_thoai'] ?? '';
        $this->ma_lop = $data['ma_lop'] ?? '';
        $this->gioi_tinh = $data['gioi_tinh'] ?? '';
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
        if (empty($this->ma_lop)) {
            $this->errors['ma_lop'] = 'Mã lớp không được để trống';
        }
        if (empty($this->password)) {
            $this->errors['password'] = 'Mật khẩu không được để trống';
        }
        return empty($this->errors);
    }

    public function save(): bool
    {
        if ($this->exists()) {
            $query = 'UPDATE SinhVien SET ho_ten = :ho_ten, so_dien_thoai = :so_dien_thoai, ma_lop = :ma_lop, gioi_tinh = :gioi_tinh';
            $params = [
                'ho_ten' => $this->ho_ten,
                'so_dien_thoai' => $this->so_dien_thoai,
                'ma_lop' => $this->ma_lop,
                'gioi_tinh' => $this->gioi_tinh,
                'ma_sinh_vien' => $this->ma_sinh_vien
            ];

            if (!empty($this->password)) {
                $query .= ', password = :password';
                $params['password'] = $this->password;
            }

            $query .= ' WHERE ma_sinh_vien = :ma_sinh_vien';
            $statement = $this->db->prepare($query);
            return $statement->execute($params);
        } else {
            $statement = $this->db->prepare(
                'INSERT INTO SinhVien (ma_sinh_vien, ho_ten, so_dien_thoai, ma_lop, password, gioi_tinh) VALUES (:ma_sinh_vien, :ho_ten, :so_dien_thoai, :ma_lop, :password, :gioi_tinh)'
            );
            return $statement->execute([
                'ma_sinh_vien' => $this->ma_sinh_vien,
                'ho_ten' => $this->ho_ten,
                'so_dien_thoai' => $this->so_dien_thoai,
                'ma_lop' => $this->ma_lop,
                'password' => $this->password,
                'gioi_tinh' => $this->gioi_tinh
            ]);
        }
    }

    public function delete(): bool
    {
        $statement = $this->db->prepare('DELETE FROM SinhVien WHERE ma_sinh_vien = :ma_sinh_vien');
        return $statement->execute(['ma_sinh_vien' => $this->ma_sinh_vien]);
    }

    public function find($ma_sinh_vien): ?SinhVien
    {
        $statement = $this->db->prepare('SELECT * FROM SinhVien WHERE ma_sinh_vien = :ma_sinh_vien');
        $statement->execute(['ma_sinh_vien' => $ma_sinh_vien]);
        if ($row = $statement->fetch()) {
            return $this->fillFromDB($row);
        }
        return null;
    }

    protected function fillFromDB(array $row): SinhVien
    {
        [
            'ma_sinh_vien' => $this->ma_sinh_vien,
            'ho_ten' => $this->ho_ten,
            'so_dien_thoai' => $this->so_dien_thoai,
            'ma_lop' => $this->ma_lop,
            'password' => $this->password,
            'gioi_tinh' => $this->gioi_tinh,
            'notification' => $this->notification
        ] = $row;
        return $this;
    }

    // public function getAll()
    // {
    //     $stmt = $this->db->query("SELECT * FROM SinhVien");
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
    public function getAll($orderBy = 'ma_sinh_vien', $orderDirection = 'ASC')
    {
        $query = "SELECT * FROM sinhvien ORDER BY $orderBy $orderDirection";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function findByMaAndPassword($ma_sinh_vien, $password): ?SinhVien
    {
        $statement = $this->db->prepare('SELECT * FROM sinhVien WHERE ma_sinh_vien = :ma_sinh_vien AND password = :password');
        $statement->execute(['ma_sinh_vien' => $ma_sinh_vien, 'password' => $password]);
        if ($row = $statement->fetch()) {
            return $this->fillFromDB($row);
        }
        return null;
    }

    public function exists(): bool
    {
        $statement = $this->db->prepare('SELECT COUNT(*) FROM SinhVien WHERE ma_sinh_vien = :ma_sinh_vien');
        $statement->execute(['ma_sinh_vien' => $this->ma_sinh_vien]);
        return $statement->fetchColumn() > 0;
    }

    public function getCurrentRoom(): ?array
    {
        $statement = $this->db->prepare('
            SELECT p.*, tp.ma_hop_dong 
            FROM ThuePhong tp
            JOIN Phong p ON tp.ma_phong = p.ma_phong
            WHERE tp.ma_sinh_vien = :ma_sinh_vien 
            AND tp.trang_thai = "daduyet"
            AND (tp.ket_thuc IS NULL OR tp.ket_thuc > NOW())
        ');
        $statement->execute(['ma_sinh_vien' => $this->ma_sinh_vien]);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    public function getRoommates(): array
    {
        $currentRoom = $this->getCurrentRoom();
        if (!$currentRoom) {
            return [];
        }

        $statement = $this->db->prepare('
            SELECT sv.*
            FROM ThuePhong tp
            JOIN SinhVien sv ON tp.ma_sinh_vien = sv.ma_sinh_vien
            WHERE tp.ma_phong = :ma_phong 
            AND tp.trang_thai = "daduyet"
            AND sv.ma_sinh_vien != :ma_sinh_vien
        ');
        $statement->execute([
            'ma_phong' => $currentRoom['ma_phong'],
            'ma_sinh_vien' => $this->ma_sinh_vien
        ]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPendingRoom(): ?array
    {
        $statement = $this->db->prepare('
            SELECT p.*, tp.ma_hop_dong 
            FROM ThuePhong tp
            JOIN Phong p ON tp.ma_phong = p.ma_phong
            WHERE tp.ma_sinh_vien = :ma_sinh_vien 
            AND tp.trang_thai = "choxetduyet"
        ');
        $statement->execute(['ma_sinh_vien' => $this->ma_sinh_vien]);
        $result= $statement->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }
    public function countAllsv(): int
    {
        $statement = $this->db->query("SELECT COUNT(*) FROM sinhVien");
        return (int) $statement->fetchColumn();
    }
    public function search($criteria, $orderBy = 'ma_sinh_vien', $orderDirection = 'ASC')
    {
        $query = "SELECT * FROM SinhVien WHERE 1=1";
        $params = [];
    
        // Tìm kiếm theo mã sinh viên
        if (!empty($criteria['ma_sinh_vien'])) {
            $query .= " AND ma_sinh_vien = :ma_sinh_vien";
            $params['ma_sinh_vien'] = $criteria['ma_sinh_vien'];
        }
    
        // Tìm kiếm theo họ tên
        if (!empty($criteria['ho_ten'])) {
            $query .= " AND ho_ten LIKE :ho_ten";
            $params['ho_ten'] = '%' . $criteria['ho_ten'] . '%'; // Thêm dấu % để tm kiếm theo phần chuỗi
        }
    
        // Tìm kiếm theo số điện thoại
        if (!empty($criteria['so_dien_thoai'])) {
            $query .= " AND so_dien_thoai = :so_dien_thoai";
            $params['so_dien_thoai'] = $criteria['so_dien_thoai'];
        }
    
        // Tìm kiếm theo mã lớp
        if (!empty($criteria['ma_lop'])) {
            $query .= " AND ma_lop = :ma_lop";
            $params['ma_lop'] = $criteria['ma_lop'];
        }
    
        // Tìm kiếm theo giới tính
        if (!empty($criteria['gioi_tinh'])) {
            $query .= " AND gioi_tinh = :gioi_tinh";
            $params['gioi_tinh'] = $criteria['gioi_tinh'];
        }
    
        // Thực thi truy vấn
        $query .= " ORDER BY $orderBy $orderDirection";
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
    
    public function updateNotification(string $message): bool
    {
        $statement = $this->db->prepare('UPDATE SinhVien SET notification = :notification WHERE ma_sinh_vien = :ma_sinh_vien');
        return $statement->execute(['notification' => $message, 'ma_sinh_vien' => $this->ma_sinh_vien]);
    }

    public function clearNotification(): bool
    {
        $statement = $this->db->prepare('UPDATE SinhVien SET notification = NULL WHERE ma_sinh_vien = :ma_sinh_vien');
        return $statement->execute(['ma_sinh_vien' => $this->ma_sinh_vien]);
    }
}