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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    
    <!-- Logo + Tiêu đề -->
    <div class="d-flex align-items-center">
      <a href="/" class="me-3">
        <i class="fa-solid fa-school fa-2x"></i>
      </a>
      <h2 class="m-0 fw-bold">KTX CTU</h2>
    </div>
    <!-- Menu chính (bên trái) -->
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active fw-semibold" href="/">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-semibold" href="/lienhe">Liên hệ</a>
        </li>
      </ul>
    </div>

    <!-- Khu vực bên phải (Hello, Tìm kiếm, Đăng xuất) -->
    <div class="d-flex align-items-center gap-3">
      <p class="m-0">Hello, <strong><?= htmlspecialchars($_SESSION['ho_ten'] ?? 'Ẩn danh') ?></strong></p>
      <a href="/logout" class="btn btn-danger">Đăng xuất</a>
    </div>
  </div>
</nav>
