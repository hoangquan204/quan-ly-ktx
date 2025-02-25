<!-- app/views/phong/index.php -->
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/x-icon" href="CTU_logo.ico">
</head>

<body>

<?php include "../app/views/layout/header.php"; ?>

<div class="container mt-4">
    <h1 class="mb-4 text-center text-primary">Thống Kê KTX</h1>

    <div class="row g-4">
        <!-- Thống kê phòng -->
        <div class="col-md-4">
            <div class="card border-primary shadow">
                <div class="card-body">
                    <h5 class="card-title text-primary"><i class="fas fa-door-closed"></i> Phòng</h5>
                    <p class="card-text">Tổng số phòng: <strong><?= htmlspecialchars($totalRooms) ?></strong></p>
                    <p class="card-text">Phòng nam: <strong><?= htmlspecialchars($maleRooms) ?></strong></p>
                    <p class="card-text">Phòng nữ: <strong><?= htmlspecialchars($femaleRooms) ?></strong></p>
                    <p class="card-text">Phòng trống: <strong><?= htmlspecialchars($availableRooms) ?></strong></p>
                    <p class="card-text">Phòng đã thuê: <strong><?= htmlspecialchars($rentedRooms) ?></strong></p>
                </div>
            </div>
        </div>

        <!-- Thống kê sinh viên -->
        <div class="col-md-4">
            <div class="card border-success shadow">
                <div class="card-body">
                    <h5 class="card-title text-success"><i class="fas fa-user-graduate"></i> Sinh Viên</h5>
                    <p class="card-text">Sinh viên đang thuê: <strong><?= htmlspecialchars($currentStudentsRenting) ?></strong></p>
                    <p class="card-text">Sinh viên nam: <strong><?= htmlspecialchars($maleStudentsRenting) ?></strong></p>
                    <p class="card-text">Sinh viên nữ: <strong><?= htmlspecialchars($femaleStudentsRenting) ?></strong></p>
                </div>
            </div>
        </div>

        <!-- Thống kê tài chính -->
        <div class="col-md-4">
            <div class="card border-warning shadow">
                <div class="card-body">
                    <h5 class="card-title text-warning"><i class="fas fa-money-bill-wave"></i> Tài Chính</h5>
                    <p class="card-text">Tổng tiền thu: <strong><?= htmlspecialchars($totalRevenue) ?> VNĐ</strong></p>
                    <p class="card-text">Tiền đặt cọc: <strong><?= htmlspecialchars($totalDeposit) ?> VNĐ</strong></p>
                    <p class="card-text">Tiền thanh toán: <strong><?= htmlspecialchars($totalPayment) ?> VNĐ</strong></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
