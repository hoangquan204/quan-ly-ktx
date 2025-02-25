<?php
namespace Hp\Qlktx\Models;
use PDO;
use PDOException;

class ThuePhong
{
    public ?PDO $db;
    public int $ma_hop_dong = -1;
    public string $ma_sinh_vien;
    public string $ma_phong;
    public string $bat_dau;
    public string $ket_thuc;
    public float $tien_dat_coc;
    public float $gia_thue_thuc_te;
    public string $ma_hoc_ky;
    public float $can_thanh_toan;
    public string $trang_thai;
    private array $errors = [];

    public function __construct(?PDO $pdo)
    {
        $this->db = $pdo;
    }

    public function fill(array $data): ThuePhong
    {
        $this->trang_thai = $data['trang_thai'] ?? 'choxetduyet';
        $this->ma_sinh_vien = $data['ma_sinh_vien'] ?? '';
        $this->ma_phong = $data['ma_phong'] ?? '';
        $this->bat_dau = $data['bat_dau'] ?? '';
        $this->ket_thuc = $data['ket_thuc'] ?? '';
        $this->tien_dat_coc = $data['tien_dat_coc'] ?? 0;
        $this->gia_thue_thuc_te = $data['gia_thue_thuc_te'] ?? 0;
        $this->ma_hoc_ky = $data['ma_hoc_ky'] ?? '';
        $this->can_thanh_toan = $data['can_thanh_toan'] ?? 0;
        $this->trang_thai = $data['trang_thai'] ?? 'choxetduyet';
        return $this;
    }

    public function getValidationErrors(): array
    {
        return $this->errors;
    }

    public function validate(): bool
    {
        $this->errors = []; // Reset errors

        if (empty($this->ma_sinh_vien)) {
            $this->errors['ma_sinh_vien'] = 'Mã sinh viên không được để trống';
        }

        if (empty($this->ma_phong)) {
            $this->errors['ma_phong'] = 'Mã phòng không được để trống';
        }

        if (empty($this->bat_dau)) {
            $this->errors['bat_dau'] = 'Ngày bắt đầu không được để trống';
        } elseif (!strtotime($this->bat_dau)) {
            $this->errors['bat_dau'] = 'Ngày bắt đầu không hợp lệ';
        }

        if (empty($this->ket_thuc)) {
            $this->errors['ket_thuc'] = 'Ngày kết thúc không được để trống';
        } elseif (!strtotime($this->ket_thuc)) {
            $this->errors['ket_thuc'] = 'Ngày kết thúc không hợp lệ';
        } elseif (strtotime($this->bat_dau) > strtotime($this->ket_thuc)) {
            $this->errors['ket_thuc'] = 'Ngày kết thúc phải sau ngày bắt đầu';
        }

        if ($this->tien_dat_coc < 0) {
            $this->errors['tien_dat_coc'] = 'Tiền đặt cọc không được âm';
        }

        if ($this->gia_thue_thuc_te < 0) {
            $this->errors['gia_thue_thuc_te'] = 'Giá thuê thực tế không được âm';
        }

        if (empty($this->ma_hoc_ky)) {
            $this->errors['ma_hoc_ky'] = 'Mã học kỳ không được để trống';
        }

        if ($this->can_thanh_toan < 0) {
            $this->errors['can_thanh_toan'] = 'Cần thanh toán không được âm';
        }

        if (empty($this->trang_thai)) {
            $this->errors['trang_thai'] = 'Trạng thái không được để trống';
        }

        return empty($this->errors);
    }

    public function save(): bool
    {
        try {
            if ($this->ma_hop_dong >= 0) {
                $statement = $this->db->prepare(
                    'UPDATE ThuePhong SET ma_sinh_vien = :ma_sinh_vien, ma_phong = :ma_phong, bat_dau = :bat_dau, ket_thuc = :ket_thuc, tien_dat_coc = :tien_dat_coc, gia_thue_thuc_te = :gia_thue_thuc_te, ma_hoc_ky = :ma_hoc_ky, can_thanh_toan = :can_thanh_toan, trang_thai = :trang_thai WHERE ma_hop_dong = :ma_hop_dong'
                );
                return $statement->execute([
                    'ma_sinh_vien' => $this->ma_sinh_vien,
                    'ma_phong' => $this->ma_phong,
                    'bat_dau' => $this->bat_dau,
                    'ket_thuc' => $this->ket_thuc,
                    'tien_dat_coc' => $this->tien_dat_coc,
                    'gia_thue_thuc_te' => $this->gia_thue_thuc_te,
                    'ma_hoc_ky' => $this->ma_hoc_ky,
                    'can_thanh_toan' => $this->can_thanh_toan,
                    'ma_hop_dong' => $this->ma_hop_dong,
                    'trang_thai' => $this->trang_thai
                ]);
            } else {
                $statement = $this->db->prepare(
                    'INSERT INTO ThuePhong (ma_sinh_vien, ma_phong, bat_dau, ket_thuc, tien_dat_coc, gia_thue_thuc_te, ma_hoc_ky, can_thanh_toan, trang_thai) VALUES (:ma_sinh_vien, :ma_phong, :bat_dau, :ket_thuc, :tien_dat_coc, :gia_thue_thuc_te, :ma_hoc_ky, :can_thanh_toan, :trang_thai)'
                );
                $result = $statement->execute([
                    'ma_sinh_vien' => $this->ma_sinh_vien,
                    'ma_phong' => $this->ma_phong,
                    'bat_dau' => $this->bat_dau,
                    'ket_thuc' => $this->ket_thuc,
                    'tien_dat_coc' => $this->tien_dat_coc,
                    'gia_thue_thuc_te' => $this->gia_thue_thuc_te,
                    'ma_hoc_ky' => $this->ma_hoc_ky,
                    'can_thanh_toan' => $this->can_thanh_toan,
                    'trang_thai' => $this->trang_thai
                ]);
                if ($result) {
                    $this->ma_hop_dong = $this->db->lastInsertId();
                }else{
                    $this->errors['save'] = 'Lỗi khi thêm hợp đồng';
                }
                return $result;
            }
        } catch (PDOException $e) {
            $this->errors[] = $e->getMessage();
            return false;
        }
    }

    public function delete(): bool
    {
        try {
            $statement = $this->db->prepare('delete FROM ThuePhong WHERE ma_hop_dong = :ma_hop_dong');
            return $statement->execute(['ma_hop_dong' => $this->ma_hop_dong]);
        } catch (PDOException $e) {
            $this->errors[] = $e->getMessage();
            return false;
        }
    }

    public function find(int $ma_hop_dong): ?ThuePhong
    {
        $statement = $this->db->prepare('SELECT * FROM ThuePhong WHERE ma_hop_dong = :ma_hop_dong');
        $statement->execute(['ma_hop_dong' => $ma_hop_dong]);
        if ($row = $statement->fetch()) {
            return $this->fillFromDB($row);
        }
        return null;
    }

    protected function fillFromDB(array $row): ThuePhong
    {
        [   'trang_thai' => $this->trang_thai,
            'ma_hop_dong' => $this->ma_hop_dong,
            'ma_sinh_vien' => $this->ma_sinh_vien,
            'ma_phong' => $this->ma_phong,
            'bat_dau' => $this->bat_dau,
            'ket_thuc' => $this->ket_thuc,
            'tien_dat_coc' => $this->tien_dat_coc,
            'gia_thue_thuc_te' => $this->gia_thue_thuc_te,
            'ma_hoc_ky' => $this->ma_hoc_ky,
            'can_thanh_toan' => $this->can_thanh_toan
        ] = $row;
        return $this;
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM ThuePhong");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateStatus(int $ma_hop_dong, string $trang_thai): bool
    {
        try {
            $statement = $this->db->prepare(
                'UPDATE ThuePhong SET trang_thai = :trang_thai WHERE ma_hop_dong = :ma_hop_dong'
            );
            return $statement->execute([
                'trang_thai' => $trang_thai,
                'ma_hop_dong' => $ma_hop_dong
            ]);
        } catch (PDOException $e) {
            $this->errors[] = $e->getMessage();
            return false;
        }
    }

    public function getDefaultHocKy(): ?array
    {
        $statement = $this->db->prepare('
            SELECT * FROM Hoc_Ky
            WHERE bat_dau <= NOW() AND ket_thuc >= NOW()
            LIMIT 1
        ');
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getPending()
    {
        $stmt = $this->db->prepare("SELECT * FROM ThuePhong WHERE trang_thai = 'choxetduyet'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} 