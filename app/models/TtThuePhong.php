<?php
 namespace Hp\Qlktx\Models;
 use PDO;
use PDOException;
 class TtThuePhong
 {
     public ?PDO $db;
     public int $ma_hop_dong;
     public string $thang_nam;
     public float $so_tien;
     public ?string $ngay_thanh_toan;
     public string $ma_nhan_vien;
     private array $errors = [];

     public function __construct(?PDO $pdo)
     {
         $this->db = $pdo;
     }

     public function fill(array $data): TtThuePhong
     {
         $this->ma_hop_dong = $data['ma_hop_dong'] ?? 0;
         $this->thang_nam = $data['thang_nam'] ? $data['thang_nam'] . '-01' : '';
         $this->so_tien = $data['so_tien'] ?? 0;
         $this->ngay_thanh_toan = $data['ngay_thanh_toan'] ?? null;
         $this->ma_nhan_vien = $data['ma_nhan_vien'] ?? '';
         return $this;
     }

     public function getValidationErrors(): array
     {
         return $this->errors;
     }

     public function validate(): bool
     {
         if ($this->ma_hop_dong <= 0) {
             $this->errors['ma_hop_dong'] = 'Mã hợp đồng không hợp lệ';
         }
         if (empty($this->thang_nam)) {
             $this->errors['thang_nam'] = 'Tháng năm không được để trống';
         }
         if ($this->so_tien <= 0) {
             $this->errors['so_tien'] = 'Số tiền phải lớn hơn 0';
         }
         return empty($this->errors);
     }

     public function save(): bool
     {
         $statement = $this->db->prepare(
             'INSERT INTO tt_thuephong (ma_hop_dong, thang_nam, so_tien, ngay_thanh_toan, ma_nhan_vien) VALUES (:ma_hop_dong, :thang_nam, :so_tien, :ngay_thanh_toan, :ma_nhan_vien)'
         );
         return $statement->execute([
             'ma_hop_dong' => $this->ma_hop_dong,
             'thang_nam' => $this->thang_nam,
             'so_tien' => $this->so_tien,
             'ngay_thanh_toan' => $this->ngay_thanh_toan,
             'ma_nhan_vien' => $this->ma_nhan_vien
         ]);
     }

     public function delete(): bool
     {
         $statement = $this->db->prepare('DELETE FROM tt_thuephong WHERE ma_hop_dong = :ma_hop_dong AND thang_nam = :thang_nam');
         return $statement->execute(['ma_hop_dong' => $this->ma_hop_dong, 'thang_nam' => $this->thang_nam]);
     }

     public function find(int $ma_hop_dong): ?TtThuePhong
     {
         $statement = $this->db->prepare('SELECT * FROM tt_thuephong WHERE ma_hop_dong = :ma_hop_dong');
         $statement->execute(['ma_hop_dong' => $ma_hop_dong]);
         if ($row = $statement->fetch()) {
             return $this->fillFromDB($row);
         }
         return null;
     }

     protected function fillFromDB(array $row): TtThuePhong
     {
         [
             'ma_hop_dong' => $this->ma_hop_dong,
             'thang_nam' => $this->thang_nam,
             'so_tien' => $this->so_tien,
             'ngay_thanh_toan' => $this->ngay_thanh_toan,
             'ma_nhan_vien' => $this->ma_nhan_vien
         ] = $row;
         return $this;
     }

     public function getAll(): array
     {
         $stmt = $this->db->query("SELECT * FROM tt_thuephong");
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
     }

     public function saveWithTransaction(): bool
     {
         try {
             $statement = $this->db->prepare('CALL AddThuePhongAndUpdate(:ma_hop_dong, :thang_nam, :so_tien, :ngay_thanh_toan, :ma_nhan_vien)');
             $result = $statement->execute([
                 'ma_hop_dong' => $this->ma_hop_dong,
                 'thang_nam' => $this->thang_nam,
                 'so_tien' => $this->so_tien,
                 'ngay_thanh_toan' => $this->ngay_thanh_toan,
                 'ma_nhan_vien' => $this->ma_nhan_vien
             ]);

             return $result;
         } catch (PDOException $e) {
             $this->errors[] = $e->getMessage();
             return false;
         }
     }

     public function deleteWithUpdate(string $ma_nhan_vien): bool
     {
         try {
             $statement = $this->db->prepare('CALL DeleteTtThuePhongAndUpdateThuePhong(:ma_hop_dong, :ma_nhan_vien)');
             return $statement->execute([
                 'ma_hop_dong' => $this->ma_hop_dong,
                 'ma_nhan_vien' => $ma_nhan_vien
             ]);
         } catch (PDOException $e) {
             $this->errors[] = $e->getMessage();
             return false;
         }
     }
 }