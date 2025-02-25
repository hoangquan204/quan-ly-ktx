<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include "../app/views/layout/header.php"; ?>
    <div class="d-flex justify-content-center align-items-center vh-100" style="background-color: #f8f9fa;">
        <div class="card shadow p-4" style="width: 350px;">
            <h2 class="text-center mb-4">Đăng nhập</h2>
            <form action="/AuthController/login" method="POST">
                <div class="mb-3">
                    <label for="maUser" class="form-label">Mã số:</label>
                    <input type="text" id="maUser" name="maUser" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
            </form>
            <?php if (isset($error)) echo "<div class='alert alert-danger mt-3'>$error</div>"; ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</div>
</body>
</html>
