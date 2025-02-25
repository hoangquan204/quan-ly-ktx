<?php
function isActive($path) {
    $currentPath = $_SERVER['REQUEST_URI'];
    return strpos($currentPath, $path) === 0 ? 'active' : '';
}
?>

<nav class="navbar border-right navbar-expand-lg">
    <div class="bg-white " id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
        </div>
        <div class="collapse list-group-flush my-3 navbar-collapse" id="navbarNav">
            <ul class="list-unstyled flex-column navbar-nav">
                <li>
                    <a href="/phong" class="list-group-item list-group-item-action <?php echo isActive('/phong'); ?>"><i
                        class="fas fa-bed me-2"></i>Danh Sách Phòng</a>
                </li>
                <li>
                    <a href="/current" class="list-group-item list-group-item-action <?php echo isActive('/current'); ?>"><i
                        class="fas fa-users me-2"></i>Phòng Ở Hiện Tại</a>
                </li>
                <li>
                    <a href="/login"
                    class="list-group-item list-group-item-action text-danger fw-bold <?php echo isActive('/logout'); ?>"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>