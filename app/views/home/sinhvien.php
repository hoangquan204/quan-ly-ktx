<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ - Sinh Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">KTX Sinh Viên</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Thông Tin Phòng</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Hợp Đồng</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Thanh Toán</a></li>
                <li class="nav-item"><a class="nav-link btn btn-danger text-white" href="logout.php">Đăng Xuất</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="text-center">Chào mừng, Sinh Viên!</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="card p-3">
                <h5>Thông Tin Phòng</h5>
                <p><strong>Mã Phòng:</strong> P101</p>
                <p><strong>Loại Phòng:</strong> Thường</p>
                <p><strong>Trạng Thái:</strong> Đầy</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3">
                <h5>Trạng Thái Thanh Toán</h5>
                <p><strong>Tháng 2/2024:</strong> Chưa Thanh Toán</p>
                <p><strong>Tháng 1/2024:</strong> Đã Thanh Toán</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
