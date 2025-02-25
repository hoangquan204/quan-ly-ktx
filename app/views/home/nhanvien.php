<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ - Nhân Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Quản Lý KTX</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Danh Sách Sinh Viên</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Quản Lý Phòng</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Báo Cáo</a></li>
                <li class="nav-item"><a class="nav-link btn btn-danger text-white" href="logout.php">Đăng Xuất</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="text-center">Chào mừng, Nhân Viên!</h2>
    <div class="row">
        <div class="col-md-6">
            <div class="card p-3">
                <h5>Danh Sách Sinh Viên</h5>
                <ul>
                    <li>Nguyễn Văn A - P101</li>
                    <li>Trần Thị B - P102</li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3">
                <h5>Trạng Thái Phòng</h5>
                <p><strong>P101:</strong> Đầy</p>
                <p><strong>P102:</strong> Còn Chỗ</p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
