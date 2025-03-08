<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    
    <!-- Logo + Tiêu đề -->
    <div class="d-flex align-items-center">
      <a href="/" class="me-3">
        <i class="fa-solid fa-school fa-2x"></i>
      </a>
      <h2 class="m-0 fw-bold">KTX C - CTU</h2>
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
