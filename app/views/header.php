<header class="header p-3 d-flex align-items-center justify-content-between">
    <img src="../../image/CTU_logo.png" alt="logo" width="100px" class="logo">
    <div class="container text-center">
        <h1 class="tieude">QUẢN LÝ KÝ TÚC XÁ</h1>
    </div>
    <?php if (isset($_SESSION['ho_ten'])): ?>
    <div class="p-2">
        <p class="tendangnhap">Xin chào, <?= htmlspecialchars($_SESSION['ho_ten']); ?></p>
    </div>
    <?php else: ?>
    <a href="/login" class="btn btn-primary">Đăng nhập</a>
    <?php endif; ?>
</header>