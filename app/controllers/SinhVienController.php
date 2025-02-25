<?php

namespace Hp\Qlktx\Controllers;

use Hp\Qlktx\Models\SinhVien;
use PDO;
use PDOException;

class SinhVienController
{
    private $sinhVienModel;

    public function __construct(PDO $pdo)
    {
        $this->sinhVienModel = new SinhVien($pdo);
    }
    public function search()
    {
        $criteria = [
            'ma_sinh_vien' => $_GET['ma_sinh_vien'] ?? '',
            'ho_ten' => $_GET['ho_ten'] ?? '',
            'so_dien_thoai' => $_GET['so_dien_thoai'] ?? '',
            'ma_lop' => $_GET['ma_lop'] ?? '',
            'gioi_tinh' => $_GET['gioi_tinh'] ?? ''
        ];
        $sinhViens = $this->sinhVienModel->search($criteria);
        include '../app/views/SinhVien/index.php';
    }
    public function index()
    {
        // Kiểm tra xem có tiêu chí tìm kiếm không
        $criteria = [
            'ma_sinh_vien' => $_GET['ma_sinh_vien'] ?? '',
            'ho_ten' => $_GET['ho_ten'] ?? '',
            'so_dien_thoai' => $_GET['so_dien_thoai'] ?? '',
            'ma_lop' => $_GET['ma_lop'] ?? '',
            'gioi_tinh' => $_GET['gioi_tinh'] ?? ''
        ];
        $orderBy = $_GET['order_by'] ?? 'ma_sinh_vien'; // Cột mặc định là 'ma_phong'
        $orderDirection = $_GET['order_direction'] ?? 'ASC'; // Thứ tự mặc định là 'ASC'

        // Nếu có tiêu chí tìm kiếm, gọi phương thức `search`, nếu không thì lấy toàn bộ danh sách
        if (!empty($criteria['ma_sinh_vien']) || !empty($criteria['ho_ten']) ) {
            $sinhViens = $this->sinhVienModel->search($criteria, $orderBy, $orderDirection);
        } else {
            $sinhViens = $this->sinhVienModel->getAll($orderBy, $orderDirection);
        }

        // Gọi view index.php và truyền kết quả vào
        include '../app/views/SinhVien/index.php';
    }
    // Hiển thị danh sách sinh viên

    // Tạo sinh viên mới
    public function create()
    {
        $errors = [];
        $lopModel = new \Hp\Qlktx\Models\Lop($this->sinhVienModel->db);
        $lops = $lopModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->sinhVienModel->fill($_POST);

            // Kiểm tra mã sinh viên đã tồn tại
            if ($this->sinhVienModel->exists()) {
                $errors[] = 'Mã sinh viên đã tồn tại. Vui lòng chọn mã khác.';
            } else {
                if ($this->sinhVienModel->validate() && $this->sinhVienModel->save()) {
                    header('Location: /sinhvien');
                    exit;
                } else {
                    $errors = $this->sinhVienModel->getValidationErrors();
                }
            }
        }
        include '../app/views/sinhvien/create.php';
    }

     // Tạo sinh viên mới
     public function myInfo()
     {
         include '../app/views/auth/trangcanhan.php';
     }

    // Chỉnh sửa sinh viên
    public function edit($id)
    {
        $sinhVien = $this->sinhVienModel->find($id);
        if (!$sinhVien) {
            header('Location: /sinhvien');
            exit;
        }

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sinhVien->fill($_POST);

            // Cập nhật mật khẩu nếu có nhập mới
            if (!empty($_POST['password'])) {
                $sinhVien->password = md5($_POST['password']);
            }

            if ($sinhVien->validate() && $sinhVien->save()) {
                header('Location: /sinhvien');
                exit;
            } else {
                $errors = $sinhVien->getValidationErrors();
            }
        }

        include '../app/views/sinhvien/edit.php';
    }

    // Xóa sinh viên
    public function delete($id)
    {
        try {
            $sinhVien = $this->sinhVienModel->find($id);
            if ($sinhVien && $sinhVien->delete()) {
                $_SESSION['successMessage'] = 'Xóa sinh viên thành công.';
            } else {
                $_SESSION['errors'][] = 'Lỗi khi xóa sinh viên.';
            }
        } catch (PDOException $e) {
            $_SESSION['errors'][] = 'Sinh viên đang thuê phòng không thể xóa.';
        }
        header('Location: /sinhvien');
        exit;
    }
}