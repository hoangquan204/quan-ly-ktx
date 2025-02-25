<?php require_once "../app/views/layout/header.php"; ?>
<h2>Danh sách phòng</h2>
<table border="1">
    <tr>
        <th>Mã Phòng</th>
        <th>Loại Phòng</th>
        <th>Giá Phòng</th>
        <th>Trạng Thái</th>
    </tr>
    <?php foreach ($data as $row): ?>
        <tr>
            <td><?= $row['MaPhong'] ?></td>
            <td><?= $row['LoaiPhong'] ?></td>
            <td><?= number_format($row['GiaPhong']) ?> VNĐ</td>
            <td><?= $row['TrangThai'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php require_once "../app/views/layout/footer.php"; ?>
