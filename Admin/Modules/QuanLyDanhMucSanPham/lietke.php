<?php
$sql_liet_ke_danh_muc_sp = "SELECT * FROM tbl_category ORDER BY category_id ASC";
$query_liet_ke_danh_muc_sp = mysqli_query($conn, $sql_liet_ke_danh_muc_sp);
?>
<h3>Liệt Kê Danh Mục Sản Phẩm</h3>
<table class="table-lietke">
    <tr>
        <th>Thứ Tự</th>
        <th>Id</th>
        <th>Tên Danh Mục</th>
        <th>Edit</th>
    </tr>

    <?php
    $i = 0;
    while ($row_lietke = mysqli_fetch_array($query_liet_ke_danh_muc_sp)) {
        $i++;
    ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row_lietke["category_id"]; ?></td>
            <td><?php echo $row_lietke["category_name"]; ?></td>
            <td>
                <a class="btn btn-primary" href="?action=quanlydanhmucsanpham&query=sua&id_category_can_sua=<?php echo $row_lietke['category_id'] ?>">Sửa</a>
                <a class="btn btn-danger" href="Modules/QuanLyDanhMucSanPham/xuly.php?action=quanlydanhmucsanpham&query=xoa&id_category_can_xoa=<?php echo $row_lietke['category_id'] ?>">Xóa</a>
            </td>
        </tr>
    <?php
    }

    ?>

</table>