<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Cá Nhân</title>
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
            <a href="/my-info">
                <div class="card-custom">
                    <i class="fas fa-graduation-cap"></i>
                    <h5>Thông tin cá nhân</h5>
                    <p>Quản lý thông tin cá nhân của sinh viên.</p>
                </div>
            </a>
        </div>
        
        <div class="col-md-4">
            <a href="/phong">
                <div class="card-custom">
                    <i class="fas fa-hotel"></i>
                    <h5>Danh sách phòng</h5>
                    <p>Danh sách phòng có trên hệ thống.</p>
                </div>
            </a>
        </div>
        
        <div class="col-md-4">
            <a href="/current">
                <div class="card-custom">
                    <i class="fas fa-dollar-sign"></i>
                    <h5>Phòng của bạn</h5>
                    <p>Thông tin về phòng của bạn đang ở.</p>
                </div>
            </a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include "../app/views/layout/footer.php"; ?>
</body>
</html>
