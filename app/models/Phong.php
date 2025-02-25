<?php
namespace Hp\Qlktx\Models;
use PDO;
class Phong
{
    public ?PDO $db;
    public string $ma_phong;
    public string $ten_phong;
    public float $dien_tich;
    public int $so_giuong;
    public float $gia_thue;
    public string $gioi_tinh;
    private array $errors = [];
    public function
        __construct(
        ?PDO $pdo
    ) {
        $this->db = $pdo;
    }

    public function fill(array $data): Phong
    {
        $this->ma_phong = $data['ma_phong'] ?? '';
        $this->ten_phong = $data['ten_phong'] ?? '';
        $this->dien_tich = $data['dien_tich'] ?? 0;
        $this->so_giuong = $data['so_giuong'] ?? 0;
        $this->gia_thue = $data['gia_thue'] ?? 0;
        $this->gioi_tinh = $data['gioi_tinh'] ?? '';
        return $this;
    }

    public function getValidationErrors(): array
    {
        return $this->errors;
    }

    public function validate(): bool
    {
        if (empty($this->ma_phong)) {
            $this->errors['ma_phong'] = 'Mã phòng không được để trống';
        }
        if (empty($this->ten_phong)) {
            $this->errors['ten_phong'] = 'Tên phòng không được để trống';
        }
        if ($this->dien_tich <= 0) {
            $this->errors['dien_tich'] = 'Diện tích phải lớn hơn 0';
        }
        if ($this->so_giuong <= 0) {
            $this->errors['so_giuong'] = 'Số giường phải lớn hơn 0';
        }
        if ($this->gia_thue <= 0) {
            $this->errors['gia_thue'] = 'Giá thuê phải lớn hơn 0';
        }
        if (empty($this->gioi_tinh)) {
            $this->errors['gioi_tinh'] = 'Giới tính không được để trống';
        }
        return empty($this->errors);
    }

    public function save(): bool
    {
        if ($this->exists()) {
            $statement = $this->db->prepare(
                'UPDATE Phong SET ten_phong = :ten_phong, dien_tich = :dien_tich, so_giuong = :so_giuong, gia_thue = :gia_thue, gioi_tinh = :gioi_tinh WHERE ma_phong = :ma_phong'
            );
            return $statement->execute([
                'ten_phong' => $this->ten_phong,
                'dien_tich' => $this->dien_tich,
                'so_giuong' => $this->so_giuong,
                'gia_thue' => $this->gia_thue,
                'gioi_tinh' => $this->gioi_tinh,
                'ma_phong' => $this->ma_phong
            ]);
        } else {
            $statement = $this->db->prepare(
                'INSERT INTO Phong (ten_phong, dien_tich, so_giuong, gia_thue, gioi_tinh, ma_phong) VALUES (:ten_phong, :dien_tich, :so_giuong, :gia_thue, :gioi_tinh, :ma_phong)'
            );
            $result = $statement->execute([
                'ten_phong' => $this->ten_phong,
                'dien_tich' => $this->dien_tich,
                'so_giuong' => $this->so_giuong,
                'gia_thue' => $this->gia_thue,
                'gioi_tinh' => $this->gioi_tinh,
                'ma_phong' => $this->ma_phong
            ]);
         
            return $result;
        }
    }

    public function delete(): bool
    {
        $statement = $this->db->prepare('DELETE FROM Phong WHERE ma_phong = :ma_phong');
        return $statement->execute(['ma_phong' => $this->ma_phong]);
    }

   public function find( $ma_phong): ?Phong
    {
        $statement = $this->db->prepare('SELECT * FROM Phong WHERE ma_phong = :ma_phong');
        $statement->execute(['ma_phong' => $ma_phong]);
        if ($row = $statement->fetch()) {
            return $this->fillFromDB($row);
        }
        return null;
    }
    protected function fillFromDB(array $row): Phong
    {
        [
            'ma_phong' => $this->ma_phong,
            'ten_phong' => $this->ten_phong,
            'dien_tich' => $this->dien_tich,
            'so_giuong' => $this->so_giuong,
            'gia_thue' => $this->gia_thue,
            'gioi_tinh' => $this->gioi_tinh
        ] = $row;
        return $this;
    }
    public function exists(): bool
    {
        $statement = $this->db->prepare('SELECT COUNT(*) FROM phong WHERE ma_phong = :ma_phong');
        $statement->execute(['ma_phong' => $this->ma_phong]);
        return $statement->fetchColumn() > 0;
    }

    public function getAll($orderBy = 'ma_phong', $orderDirection = 'ASC')
    {
        $query = "SELECT * FROM phong ORDER BY $orderBy $orderDirection";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function search($criteria, $orderBy = 'ma_phong', $orderDirection = 'ASC')
    {
        $query = "SELECT * FROM phong WHERE 1=1";
        $params = [];

        if (!empty($criteria['ten_phong'])) {
            $query .= " AND ten_phong LIKE :ten_phong";
            $params['ten_phong'] = '%' . $criteria['ten_phong'] . '%';
        }
        if (!empty($criteria['dien_tich'])) {
            $query .= " AND dien_tich = :dien_tich";
            $params['dien_tich'] = $criteria['dien_tich'];
        }
        if (!empty($criteria['so_giuong'])) {
            $query .= " AND so_giuong = :so_giuong";
            $params['so_giuong'] = $criteria['so_giuong'];
        }
        if (!empty($criteria['gioi_tinh'])) {
            $query .= " AND gioi_tinh = :gioi_tinh";
            $params['gioi_tinh'] = $criteria['gioi_tinh'];
        }
        
        $query .= " ORDER BY $orderBy $orderDirection";
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
    public function getRoomNames(): array {
        $query = "SELECT DISTINCT ten_phong FROM Phong";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
    
    // Phương thức đếm tổng số phòng
    public function countAllRooms(): int
    {
        $statement = $this->db->query("SELECT COUNT(*) FROM Phong");
        return (int) $statement->fetchColumn();
    }

    // Phương thức đếm số phòng còn trống
    // public function countAvailableRooms(): int
    // {
    //     // Giả sử `trang_thai` là cột trong bảng `Phong` để đánh dấu phòng trống
    //     $statement = $this->db->query("SELECT COUNT(*) FROM Phong WHERE trang_thai = 'trong'");
    //     return (int) $statement->fetchColumn();
    // }
}