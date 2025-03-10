<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý KTX - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f6f9;
        }
        .dashboard-container {
            margin-top: 50px;
        }
        .card-custom {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: #ffffff;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            cursor: pointer;
        }
        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }
        .card-custom i {
            font-size: 3rem;
            color: #007bff;
            margin-bottom: 15px;
        }
        .card-custom h5 {
            font-weight: 600;
            margin-bottom: 10px;
        }
        a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>

<?php include "../app/views/layout/header.php"; ?>

<div class="container dashboard-container">
    <div class="row g-4">
        
        <div class="col-md-4">
            <a href="/sinhvien">
                <div class="card-custom">
                    <i class="fas fa-graduation-cap"></i>
                    <h5>Quản Lý Sinh Viên</h5>
                    <p>Quản lý thông tin sinh viên và nhân viên.</p>
                </div>
            </a>
        </div>
        
        <div class="col-md-4">
            <a href="/phong">
                <div class="card-custom">
                    <i class="fas fa-hotel"></i>
                    <h5>Quản Lý Phòng</h5>
                    <p>Cập nhật trạng thái phòng và sắp xếp chỗ ở.</p>
                </div>
            </a>
        </div>
        
        <div class="col-md-4">
            <a href="/tt_thuephong">
                <div class="card-custom">
                    <i class="fas fa-dollar-sign"></i>
                    <h5>Quản Lý Doanh Thu</h5>
                    <p>Theo dõi và quản lý các khoản thu phí.</p>
                </div>
            </a>
        </div>
        
        <div class="col-md-4">
            <a href="/thongke">
                <div class="card-custom">
                    <i class="fas fa-chart-line"></i>
                    <h5>Thống Kê</h5>
                    <p>Xem báo cáo tổng hợp về hoạt động KTX.</p>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="/thuephong">
                <div class="card-custom">
                    <i class="fas fa-file"></i>
                    <h5>Quản lý thuê phòng</h5>
                    <p>Xét duyệt đăng ký ở Ký túc xá.</p>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="/nhanvien">
                <div class="card-custom">
                    <i class="fas fa-user-cog"></i>
                    <h5>Quản Lý Nhân Viên</h5>
                    <p>Quản lý thông tin sinh viên và nhân viên.</p>
                </div>
            </a>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include "../app/views/layout/footer.php"; ?>

</body>
</html>
