<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); // Bắt đầu session

require '../vendor/autoload.php';
require '../config/database.php';
use \Hp\Qlktx\Controllers\HomeController;
use \Hp\Qlktx\Controllers\SinhVienController;
use Hp\Qlktx\Controllers\PhongController;
use Hp\Qlktx\Controllers\NhanVienController;
use Hp\Qlktx\Controllers\ThuePhongController;
use Hp\Qlktx\Controllers\LopController; // Import LopController
use Hp\Qlktx\Controllers\TtThuePhongController;
use Hp\Qlktx\Controllers\DanhSachPhongController;
use Hp\Qlktx\Controllers\ThongKeController;
use Hp\Qlktx\Controllers\HocKyController;


$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Kiểm tra nếu không phải trang đăng nhập và người dùng chưa đăng nhập
if ($requestUri !== '/login' && !isset($_SESSION['ma_so'])) {
    header('Location: /login');
    exit;
}

// Kiểm tra các route và điều hướng
if ($requestUri === '/') {
    if(isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien'){
        $controller = new HomeController($pdo);
        $controller->NVhome();
    } else {
        $controller = new HomeController($pdo);
        $controller->SVhome();
    }
}elseif($requestUri === '/phong'){
    if(isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien'){
        $controller = new PhongController($pdo);
        $controller->index();
    } else {
        $controller = new PhongController($pdo);
        $controller->SVindex();
    }
}elseif($requestUri === '/my-info'){
    if(isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien'){
        $controller = new NhanVienController($pdo);
        $controller->myInfo();
    } else {
        $controller = new SinhVienController($pdo);
        $controller->myInfo();
    }
}
elseif ($requestUri === '/phong/create') {
    if(isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien'){
        $controller = new PhongController($pdo);
        $controller->create();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif ($requestUri === '/phong/search') {
    if (isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien') {
        $controller = new PhongController($pdo);
        $controller->search();
    } else {
        $controller = new PhongController($pdo);
        $controller->search();
    }
}
elseif (preg_match('/\/phong\/edit\/(\w+)/', $requestUri, $matches)) {
    if(isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien'){
        $controller = new PhongController($pdo);
        $controller->edit($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/phong\/delete\/(\w+)/', $requestUri, $matches)) {

    if(isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien'){
        $controller = new PhongController($pdo);
        $controller->delete($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
}

elseif ($requestUri === '/nhanvien') {
    if ($_SESSION['ghi_chu'] === 'admin') {
        $controller = new NhanVienController($pdo);
        $controller->index();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif ($requestUri === '/nhanvien/create') {
    if ($_SESSION['ghi_chu'] === 'admin') {
        $controller = new NhanVienController($pdo);
        $controller->create();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif ($requestUri === '/login') {
    $controller = new NhanVienController($pdo);
    $controller->login();
} elseif (preg_match('/\/nhanvien\/edit\/(\w+)/', $requestUri, $matches)) {
    if ($_SESSION['ghi_chu'] === 'admin') {
        $controller = new NhanVienController($pdo);
        $controller->edit($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/nhanvien\/delete\/(\w+)/', $requestUri, $matches)) {
    if ($_SESSION['ghi_chu'] === 'admin') {
        $controller = new NhanVienController($pdo);
        $controller->delete($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
}

// Route cho ThuePhong
elseif ($requestUri === '/thuephong') {
    if (isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien') {
        $controller = new ThuePhongController($pdo);
        $controller->index();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif ($requestUri === '/thuephong/create') {
    if (isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien') {
        $controller = new ThuePhongController($pdo);
        $controller->create();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/thuephong\/edit\/(\d+)/', $requestUri, $matches)) {
    if (isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien') {
        $controller = new ThuePhongController($pdo);
        $controller->edit($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/thuephong\/delete\/(\d+)/', $requestUri, $matches)) {
    if (isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien') {
        $controller = new ThuePhongController($pdo);
        $controller->delete($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/thuephong\/approve\/(\d+)/', $requestUri, $matches)) {
    if (isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien') {
        $controller = new ThuePhongController($pdo);
        $controller->approve($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
}

// Routes cho Lop
elseif ($requestUri === '/lop') {
    if(isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien'){
        $controller = new LopController($pdo);
        $controller->index();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif ($requestUri === '/lop/create') {
    if(isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien'){
        $controller = new LopController($pdo);
        $controller->create();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/lop\/edit\/(\w+)/', $requestUri, $matches)) {
    if(isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien'){
        $controller = new LopController($pdo);
        $controller->edit($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/lop\/delete\/(\w+)/', $requestUri, $matches)) {
    if(isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien'){
        $controller = new LopController($pdo);
        $controller->delete($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
}

// Routes cho SinhVien
elseif ($requestUri === '/sinhvien') {
    if(isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien'){
        $controller = new SinhVienController($pdo);
        $controller->index();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif ($requestUri === '/sinhvien/create') {
    if(isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien'){
        $controller = new SinhVienController($pdo);
        $controller->create();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/sinhvien\/edit\/(\w+)/', $requestUri, $matches)) {
    if(isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien'){
        $controller = new SinhVienController($pdo);
        $controller->edit($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/sinhvien\/delete\/(\w+)/', $requestUri, $matches)) {
    if(isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien'){
        $controller = new SinhVienController($pdo);
        $controller->delete($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
}

// Routes cho TtThuePhong
elseif ($requestUri === '/tt_thuephong') {
    if(isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien'){
        $controller = new TtThuePhongController($pdo);
        $controller->index();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif ($requestUri === '/tt_thuephong/create') {
    if(isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien'){
        $controller = new TtThuePhongController($pdo);
        $controller->create();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/tt_thuephong\/delete\/(\d+)\/([A-Za-z0-9]+)/', $requestUri, $matches)) {
    if(isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien'){
        $controller = new TtThuePhongController($pdo);
        $controller->delete($matches[1], $matches[2]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} else if($requestUri === '/logout' && isset($_SESSION['ma_so'])){
    $controller = new NhanVienController($pdo);
    $controller->logout();

    

}elseif($requestUri === '/thongke'){
    $controller = new ThongKeController($pdo);
    $controller->index();

// Routes cho HocKy
}elseif($requestUri === '/lienhe'){
    $controller = new HomeController($pdo);
    $controller->ContactPage();

// Routes cho HocKy
}elseif ($requestUri === '/hocky') {
    if (isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien') {
        $controller = new HocKyController($pdo);
        $controller->index();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif ($requestUri === '/hocky/create') {
    if (isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien') {
        $controller = new HocKyController($pdo);
        $controller->create();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/hocky\/edit\/(\w+)/', $requestUri, $matches)) {
    if (isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien') {
        $controller = new HocKyController($pdo);
        $controller->edit($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
} elseif (preg_match('/\/hocky\/delete\/(\w+)/', $requestUri, $matches)) {
    if (isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien') {
        $controller = new HocKyController($pdo);
        $controller->delete($matches[1]);
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }
}


elseif($requestUri === '/export_phong') {
    if (isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien') {
        $controller = new PhongController($pdo);
        $controller->export();
    } else {
        $controller->unauthorized();
    }

}elseif($requestUri === '/export_nhanvien') {
    if (isset($_SESSION['ghi_chu']) && $_SESSION['ghi_chu'] !== 'sinh vien') {
        $controller = new NhanVienController($pdo);
        $controller->export();
    } else {
        $controller = new NhanVienController($pdo);
        $controller->unauthorized();
    }

}elseif ($requestUri === '/current') {

    if (isset($_SESSION['ma_so']) && $_SESSION['ghi_chu'] === 'sinh vien') {
        $controller = new DanhSachPhongController($pdo);
        $controller->current();
    } else {
        header('Location: /login');
        exit;
    }
} else{


    echo "Page not found.";
}