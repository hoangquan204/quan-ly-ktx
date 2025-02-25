<?php
// app/controllers/PhongController.php
namespace Hp\Qlktx\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PDOException;

use Hp\Qlktx\Models\Phong;
use Hp\Qlktx\Models\ThuePhong;
use Hp\Qlktx\Models\SinhVien;
class HomeController
{
    private $phongModel;

    public function __construct($pdo)
    {
        $this->phongModel = new Phong($pdo);
    }

    public function SVhome()
    {
        include '../app/views/home/sinhvien.php';
    }

    public function NVhome()
    {
        include '../app/views/home/nhanvien.php';
    }

    public function ContactPage()
    {
        include '../app/views/Contact/index.php';
    }
}