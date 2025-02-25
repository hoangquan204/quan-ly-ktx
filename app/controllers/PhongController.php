<?php
// app/controllers/PhongController.php
namespace Hp\Qlktx\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PDOException;

use Hp\Qlktx\Models\Phong;
use Hp\Qlktx\Models\ThuePhong;
use Hp\Qlktx\Models\SinhVien;
class PhongController
{
    private $phongModel;

    public function __construct($pdo)
    {
        $this->phongModel = new Phong($pdo);
    }
    public function index()
        {
            // Lấy tiêu chí tìm kiếm và sắp xếp từ request
            $criteria = [
                'ten_phong' => $_GET['ten_phong'] ?? '',
                'dien_tich' => $_GET['dien_tich'] ?? '',
                'so_giuong' => $_GET['so_giuong'] ?? '',
                'gioi_tinh' => $_GET['gioi_tinh'] ?? ''
            ];

            $orderBy = $_GET['order_by'] ?? 'ma_phong'; // Cột mặc định là 'ma_phong'
            $orderDirection = $_GET['order_direction'] ?? 'ASC'; // Thứ tự mặc định là 'ASC'

            // Nếu có tiêu chí tìm kiếm, gọi phương thức `search`, nếu không thì lấy toàn bộ danh sách
            if (!empty($criteria['ten_phong']) || !empty($criteria['dien_tich']) || !empty($criteria['so_giuong']) || !empty($criteria['gioi_tinh'])) {
                $phongs = $this->phongModel->search($criteria, $orderBy, $orderDirection);
            } else {
                $phongs = $this->phongModel->getAll($orderBy, $orderDirection);
            }

            // Gọi view index.php và truyền kết quả vào
            include '../app/views/phong/index.php';
        }

    public function SVindex()
    {
        $sinhVien = new SinhVien($this->phongModel->db);
        $sinhVien = $sinhVien->find($_SESSION['ma_so']);
        $errors = [];
        $successMessage = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ma_phong'])) {
            $thuePhongController = new ThuePhongController($this->phongModel->db);
            $thuePhong = new ThuePhong($this->phongModel->db);

            $defaultHocKy = $thuePhong->getDefaultHocKy();
            $phong = $this->phongModel->find($_POST['ma_phong']);

            if ($defaultHocKy && $phong) {
                $giaThueThucTe = $phong->gia_thue; // Lấy giá thuê thực tế từ phòng
                $soTienCanTra = $giaThueThucTe; // Tính toán số tiền cần trả

                $thuePhong->fill([
                    'ma_sinh_vien' => $_SESSION['ma_so'],
                    'ma_phong' => $_POST['ma_phong'],
                    'tien_dat_coc' => 0,
                    'gia_thue_thuc_te' => $giaThueThucTe,
                    'can_thanh_toan' => $soTienCanTra,
                    'trang_thai' => 'choxetduyet',
                    'ma_hoc_ky' => $defaultHocKy['ma_hoc_ky'],
                    'bat_dau' => $defaultHocKy['bat_dau'],
                    'ket_thuc' => $defaultHocKy['ket_thuc']
                ]);

                if ($thuePhong->validate() && $thuePhong->save()) {
                    $_SESSION['success_message'] = 'Đăng ký thuê phòng thành công!';
                    header('Location: /phong');
                    exit;
                } else {
                    $errors = $thuePhong->getValidationErrors();
                }
            } else {
                $errors[] = 'Không tìm thấy học kỳ hoặc phòng phù hợp.';
            }
        }

        if (isset($_SESSION['success_message'])) {
            $successMessage = $_SESSION['success_message'];
            unset($_SESSION['success_message']);
        }

        $criteria = [
            'ten_phong' => $_GET['ten_phong'] ?? '',
            'dien_tich' => $_GET['dien_tich'] ?? '',
            'so_giuong' => $_GET['so_giuong'] ?? '',
            'gioi_tinh' => $_GET['gioi_tinh'] ?? '',
            'chi_phong_trong' => isset($_GET['chi_phong_trong']) ? 1 : 0
        ];

        if (!empty($criteria['ten_phong']) || !empty($criteria['dien_tich']) || !empty($criteria['so_giuong']) || !empty($criteria['gioi_tinh']) || $criteria['chi_phong_trong']) {
            $phongs = $this->phongModel->search($criteria);
        } else {
            $phongs = $this->phongModel->getAll();
        }

        include '../app/views/danhsachphong/index.php';
    }

    public function create()
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $phong = new Phong($this->phongModel->db);
            $phong->fill($_POST);

            // Kiểm tra mã phòng đã tồn tại
            if ($phong->exists()) {
                $errors[] = 'Mã phòng đã tồn tại. Vui lòng chọn mã phòng khác.';
            } else {
                if ($phong->validate() && $phong->save()) {
                    header('Location: /phong');
                    exit;
                }
                $errors = $phong->getValidationErrors();
            }
        }
        include '../app/views/phong/create.php';
    }

    public function search()
    {
        $criteria = [
            
            'ten_phong' => $_GET['ten_phong'] ?? '',
            'dien_tich' => $_GET['dien_tich'] ?? '',
            'so_giuong' => $_GET['so_giuong'] ?? '',
            'gioi_tinh' => $_GET['gioi_tinh'] ?? '',
            'chi_phong_trong' => isset($_GET['chi_phong_trong']) ? 1 : 0
        ];
        $phongs = $this->phongModel->search($criteria);
        include '../app/views/phong/index.php';
    }

    public function edit($id)
    {
        $phong = $this->phongModel->find($id);
        if (!$phong) {
            header('Location: /phong');
            exit;
        }

        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $phong->fill($_POST);
            if ($phong->validate() && $phong->save()) {
                header('Location: /phong');
                exit;
            }
            $errors = $phong->getValidationErrors();
        }
        include '../app/views/phong/edit.php';
    }

    public function delete($id)
    {
        $phong = $this->phongModel->find($id);
        if ($phong) {
            try {
                if ($phong->delete()) {
                    header('Location: /phong');
                    exit;
                }
            } catch (PDOException $e) {
                // Lưu thông báo lỗi vào session
                $_SESSION['error_message'] = 'Không thể xóa phòng vì phòng đang được thuê.';
            }
        }
        header('Location: /phong');
        exit;
    }
    public function export()
    {
        $rooms = $this->phongModel->getAll();

        // Create a new spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set the header row
        $headers = ['Mã Phòng', 'Tên Phòng', 'Diện Tích', 'Số Giường', 'Giá Thuê', 'Giới Tính'];
        $sheet->fromArray($headers, NULL, 'A1');

        // Fill data rows
        $rowIndex = 2;
        foreach ($rooms as $room) {
            $sheet->fromArray(array_values($room), NULL, 'A' . $rowIndex);
            $rowIndex++;
        }

        // Set the headers for the download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="phong_export.xlsx"');
        header('Cache-Control: max-age=0');

        // Save and output the file
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
    public function detail($id)
    {
        $phong = $this->phongModel->find($id);
        if (!$phong) {
            header('Location: /phong');
            exit;
        }
        include '../app/views/phong/detail.php';
    }
    public function clearNotification($ma_sinh_vien)
    {   
        $stmt = $this->phongModel ->db->prepare('UPDATE sinhvien SET notification = :notification WHERE ma_sinh_vien = :ma_sinh_vien');
        $stmt->execute(['notification' => '', 'ma_sinh_vien' => $ma_sinh_vien]);
    }
}