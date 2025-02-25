<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<nav class="navbar" style="background-color: #e3f2fd;">
  <div class="container-fluid">
  <i class="fa-solid fa-school fa-3x "></i>
  <h1>KTX C - ĐẠI HỌC CẦN THƠ</h1>
  <div>
    <p>Hello, <strong><?=htmlspecialchars( $_SESSION['ho_ten'] ?? 'Ẩn danh') ?></strong></p>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
  </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/lienhe">Liên hệ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logout">Đăng xuất</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Nhập nội dung tìm kiếm" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Tìm kiếm</button>
      </form>
    </div>
  </div>
</nav>