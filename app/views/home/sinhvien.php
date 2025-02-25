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
            <i class="fas fa-user fa-3x mb-2"></i>
                <h5 class="card-title">Thông tin cá nhân</h5>
                <p class="card-text">Xem và cập nhật thông tin của bạn trên hệ thống.</p>
                <a href="/my-info" class="btn btn-light">Xem chi tiết</a>
            </div>
        </div>
        
        <div class="col">
            <div class="card text-center p-3">
                <i class="fas fa-bed fa-3x mb-2"></i>
                <h5 class="card-title">Phòng đang ở</h5>
                <p class="card-text">Xem trạng thái của phòng bạn đang ở.</p>
                <a href="/current" class="btn btn-light">Xem chi tiết</a>
            </div>
        </div>
        
        <div class="col">
            <div class="card text-center p-3">
                <i class="fas fa-list fa-3x mb-2"></i>
                <h5 class="card-title">Danh sách phòng</h5>
                <p class="card-text">Xem danh dách phòng có trên hệ thống.</p>
                <a href="/phong" class="btn btn-light">Xem chi tiết</a>
            </div>
        </div>
        
        <div class="col">
            <div class="card text-center p-3">
                <i class="fas fa-money-bill fa-3x mb-2"></i>
                <h5 class="card-title">Thanh toán hóa đơn</h5>
                <p class="card-text">Thanh toán và xem lịch sử thanh toán hóa đơn.</p>
                <a href="#" class="btn btn-light">Xem chi tiết</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include "../app/views/layout/footer.php"; ?>
</body>
</html>
