<?php
// app/controllers/PhongController.php
namespace Hp\Qlktx\Controllers;

use Hp\Qlktx\Models\ThongKe;
use PDO;

class ThongKeController
{
    private $thongKeModel;

    public function __construct(PDO $pdo)
    {
        $this->thongKeModel = new ThongKe($pdo);
    }

    public function index()
    {
        $totalRooms = $this->thongKeModel->getTotalRooms();
        $rentedRooms = $this->thongKeModel->getRentedRooms();
        $availableRooms = $this->thongKeModel->getAvailableRooms();
        $currentStudentsRenting = $this->thongKeModel->getCurrentStudentsRenting();
        $totalRevenue = $this->thongKeModel->getTotalRevenue();
        $maleRooms = $this->thongKeModel->getMaleRooms();
        $femaleRooms = $this->thongKeModel->getFemaleRooms();
        $maleStudentsRenting = $this->thongKeModel->getMaleStudentsRenting();
        $femaleStudentsRenting = $this->thongKeModel->getFemaleStudentsRenting();
        $totalDeposit = $this->thongKeModel->getTotalDeposit();
        $totalPayment = $this->thongKeModel->getTotalPayment();

        include '../app/views/ThongKe/index.php';
    }
}