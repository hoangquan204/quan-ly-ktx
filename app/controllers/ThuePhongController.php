<?php
namespace Hp\Qlktx\Controllers;

use Hp\Qlktx\Models\ThuePhong;

use PDO;
use Exception;
use PDOException;

class ThuePhongController
{
    private $thuePhongModel;

    public function __construct($pdo)
    {
        $this->thuePhongModel = new ThuePhong($pdo);
    }

    public function index()
    {
        $status = $_GET['status'] ?? '';
        if ($status === 'choxetduyet') {
            $thuePhongs = $this->thuePhongModel->getPending();
        } else {
            $thuePhongs = $this->thuePhongModel->getAll();
        }
        include '../app/views/thuephong/index.php';
    }

    public function create()
    {
        $errors = [];
        $sinhViens = $this->getSinhViens();
        $phongs = $this->getPhongs();
        $hocKys = $this->getHocKys();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $thuePhong = new ThuePhong($this->thuePhongModel->db);
            $thuePhong->fill($_POST);

            try {
                $giaThue = $this->getGiaThue($thuePhong->ma_phong);
                if ($giaThue !== null) {
                    $thuePhong->gia_thue_thuc_te = $giaThue;
                }

                $hocKy = $this->getHocKy($thuePhong->ma_hoc_ky);
                if ($hocKy !== null) {
                    $thuePhong->bat_dau = $hocKy['bat_dau'];
                    $thuePhong->ket_thuc = $hocKy['ket_thuc'];
                }

                $thuePhong->can_thanh_toan = $thuePhong->gia_thue_thuc_te - $thuePhong->tien_dat_coc;

                if ($thuePhong->validate() && $thuePhong->save()) {
                    $errors = array_merge($errors, $thuePhong->getValidationErrors());
                    
                }
                $errors = array_merge($errors, $thuePhong->getValidationErrors());
                include '../app/views/thuephong/create.php';
            } catch (Exception $e) {
                $errors[] = $e->getMessage();
            }
        }
        include '../app/views/thuephong/create.php';
    }

    private function getSinhViens()
    {
        $stmt = $this->thuePhongModel->db->query("SELECT * FROM SinhVien");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getPhongs()
    {
        $stmt = $this->thuePhongModel->db->query("SELECT * FROM Phong");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getHocKys()
    {
        $stmt = $this->thuePhongModel->db->query("SELECT * FROM Hoc_Ky");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getGiaThue($ma_phong)
    {
        $stmt = $this->thuePhongModel->db->prepare("SELECT gia_thue FROM Phong WHERE ma_phong = :ma_phong");
        $stmt->execute(['ma_phong' => $ma_phong]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['gia_thue'] : null;
    }

    private function getHocKy($ma_hoc_ky)
    {
        $stmt = $this->thuePhongModel->db->prepare("SELECT bat_dau, ket_thuc FROM Hoc_Ky WHERE ma_hoc_ky = :ma_hoc_ky");
        $stmt->execute(['ma_hoc_ky' => $ma_hoc_ky]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function edit($id)
    {
        $thuePhong = $this->thuePhongModel->find($id);
        if (!$thuePhong) {
            header('Location: /thuephong');
            exit;
        }

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $thuePhong->fill($_POST);
            if ($thuePhong->validate()) {
                if ($thuePhong->save()) {
                    header('Location: /thuephong');
                    exit;
                } else {
                    $errors[] = 'Lỗi khi lưu thông tin phòng.';
                }
            } else {
                $errors = $thuePhong->getValidationErrors();
            }
        }
        include '../app/views/thuephong/edit.php';
    }

    public function delete($id)
    {
        $errors = [];
        try {
            $thuePhong = $this->thuePhongModel->find($id);
            if ($thuePhong && $thuePhong->delete()) {
                $this->sendNotification($thuePhong->ma_sinh_vien, 'Hợp đồng thuê phòng của bạn đã bị xóa.');
                header('Location: /thuephong');

                exit;
            }
            $errors = $thuePhong->getValidationErrors();
        } catch (PDOException $e) {
            // Bắt lỗi từ trigger
            $errors[] = "Không thể xóa: " . $e->getMessage();
        }
        $_SESSION['errors'] = $errors;

        header('Location: /thuephong');
        exit;
    }

    public function detail($id)
    {
        $thuePhong = $this->thuePhongModel->find($id);
        if (!$thuePhong) {
            header('Location: /thuephong');
            exit;
        }
        include '../app/views/thuephong/detail.php';
    }

    public function approve($id)
    {
        $thuePhong = $this->thuePhongModel->find($id);
        if ($thuePhong && $thuePhong->updateStatus($id, 'daduyet')) {
            $this->sendNotification($thuePhong->ma_sinh_vien, 'Yêu cầu thuê phòng của bạn đã được duyệt.');
            header('Location: /thuephong');
            exit;
        }
        $errors = $thuePhong->getValidationErrors();
        include '../app/views/thuephong/index.php';
    }
    private function sendNotification($ma_sinh_vien, $message)
    {
        $stmt = $this->thuePhongModel->db->prepare('UPDATE sinhvien SET notification = :message WHERE ma_sinh_vien = :ma_sinh_vien');
        $stmt->execute(['message' => $message, 'ma_sinh_vien' => $ma_sinh_vien]);
    }
    
} 