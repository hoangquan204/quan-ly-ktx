<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý KTX - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

<?php include "../app/views/layout/header.php"; ?>

<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-2 g-4">
        
        <div class="col">
            <div class="card text-center p-3">
            <i class="fas fa-graduation-cap fa-3x mb-2"></i>
                <h5 class="card-title">Quản Lý Sinh Viên</h5>
                <p class="card-text">Quản lý thông tin sinh viên và nhân viên.</p>
                <a href="/sinhvien" class="btn btn-light">Xem chi tiết</a>
            </div>
        </div>
        
        <div class="col">
            <div class="card text-center p-3">
                <i class="fas fa-hotel fa-3x mb-2"></i>
                <h5 class="card-title">Quản Lý Phòng</h5>
                <p class="card-text">Cập nhật trạng thái phòng và sắp xếp chỗ ở.</p>
                <a href="/phong" class="btn btn-light">Xem chi tiết</a>
            </div>
        </div>
        
        <div class="col">
            <div class="card text-center p-3">
                <i class="fas fa-dollar-sign fa-3x mb-2"></i>
                <h5 class="card-title">Quản Lý Doanh Thu</h5>
                <p class="card-text">Theo dõi và quản lý các khoản thu phí.</p>
                <a href="/tt_thuephong" class="btn btn-light">Xem chi tiết</a>
            </div>
        </div>
        
        <div class="col">
            <div class="card text-center p-3">
                <i class="fas fa-chart-line fa-3x mb-2"></i>
                <h5 class="card-title">Thống Kê</h5>
                <p class="card-text">Xem báo cáo tổng hợp về hoạt động KTX.</p>
                <a href="/thongke" class="btn btn-light">Xem chi tiết</a>
            </div>
        </div>

        <div class="col">
            <div class="card text-center p-3">
                <i class="fas fa-file fa-3x mb-2"></i>
                <h5 class="card-title">Quản lý thuê phòng</h5>
                <p class="card-text">Xét duyệt đăng ký ở Ký túc xá.</p>
                <a href="/thuephong" class="btn btn-light">Xem chi tiết</a>
            </div>
        </div>

        <div class="col">
            <div class="card text-center p-3">
            <i class="fas fa-user-cog fa-3x mb-2"></i>
                <h5 class="card-title">Quản Lý Nhân Viên</h5>
                <p class="card-text">Quản lý thông tin sinh viên và nhân viên.</p>
                <a href="/nhanvien" class="btn btn-light">Xem chi tiết</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include "../app/views/layout/footer.php"; ?>
</body>
</html>
