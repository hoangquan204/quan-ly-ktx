<?php
function isActive($path) {
    $currentPath = $_SERVER['REQUEST_URI'];
    return strpos($currentPath, $path) === 0 ? 'active' : '';
}
?>

<nav class="navbar border-right navbar-expand-lg">
    <div class="bg-white" id="sidebar-wrapper">
        <!-- Nút hamburger cho màn hình nhỏ -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span> <!-- Biểu tượng hamburger -->
        </button>
        <div class="collapse list-group-flush my-3 navbar-collapse" id="navbarNav">
            <ul class="list-unstyled flex-column navbar-nav">
                <li>
                    <a href="/ThongKe"
                        class="list-group-item list-group-item-action <?php echo isActive('/ThongKe'); ?>"><i
                            class="fas fa-tachometer-alt me-2"></i>Thống Kê</a>
                </li>
                <li>
                    <a href="/phong" class="list-group-item list-group-item-action <?php echo isActive('/phong'); ?>"><i
                            class="fas fa-bed me-2"></i>Quản lý Phòng</a>
                </li>
                <?php if ($_SESSION['ghi_chu'] === 'admin') : ?>

                <a href="/nhanvien"
                    class="list-group-item list-group-item-action <?php echo isActive('/nhanvien'); ?>"><i
                        class="fas fa-users me-2"></i>Quản Lý Nhân Viên</a>
                <?php endif; ?>
                <a href="/thuephong"
                    class="list-group-item list-group-item-action <?php echo isActive('/thuephong'); ?>"><i
                        class="fas fa-paperclip me-2"></i>Quản Lý Thuê Phòng</a>
                <a href="/tt_thuephong"
                    class="list-group-item list-group-item-action <?php echo isActive('/tt_thuephong'); ?>"><i
                        class="fas fa-money-bill me-2"></i>Quản Lý Thanh Toán Thuê Phòng</a>
                <a href="/hocky" class="list-group-item list-group-item-action <?php echo isActive('/hocky'); ?>"><i
                        class="fas fa-address-book me-2"></i>Quản Lý Học Kỳ</a>
                <a href="/lop" class="list-group-item list-group-item-action <?php echo isActive('/lop'); ?>"><i
                        class="fas fa-address-book me-2"></i>Quản Lý Lớp</a>
                <a href="/sinhvien"
                    class="list-group-item list-group-item-action <?php echo isActive('/sinhvien'); ?>"><i
                        class="fas fa-graduation-cap me-2"></i>Quản Lý Sinh Viên</a>
                <a href="/logout"
                    class="list-group-item list-group-item-action text-danger fw-bold <?php echo isActive('/logout'); ?>"><i
                        class="fas fa-power-off me-2"></i>Đăng Xuất</a>
            </ul>
        </div>
    </div>
</nav>