<?php
if (isset($_GET['admin-seacrh']) == 1) {
    $keyword = $_POST['keyword'];
    $sql_admin_tim_kiem_sp = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.category_id = tbl_category.category_id AND tbl_product.product_name LIKE '%" . $keyword . "%' "; //LIMIT 15 là lấy ra 15 sản phẩm 
    $query_sql_product_in_search = mysqli_query($conn, $sql_admin_tim_kiem_sp);
}

$sql_liet_ke_sp = "SELECT * FROM tbl_product, tbl_category WHERE tbl_product.category_id = tbl_category.category_id ORDER BY product_id ASC";
$query_liet_ke_sp = mysqli_query($conn, $sql_liet_ke_sp);
?>
<h3>
    <form action="index.php?action=quanlysanpham&query=them&timkiem=1" method="post">
        Liệt Kê Sản Phẩm
        <input type="text" placeholder="Tìm kiếm sản phẩm..." name="keyword">
        <input type="submit" value="Search" name="admin-search">
    </form>
</h3>
<table class="table-lietke">
    <tr>
        <th>Thứ Tự</th>
        <th>Id</th>
        <th>Tên Sản Phẩm</th>
        <th>Hình Ảnh</th>
        <th>Giá</th>
        <th>Số Lượng</th>
        <th>Mã Sản Phẩm</th>
        <th>Tóm Tắt</th>
        <th>Nội Dung</th>
        <th>Trạng Thái</th>
        <th>Danh Mục</th>
        <th>Quản Lý</th>
    </tr>

    <?php

    if (isset($_GET['timkiem']) == 1) {
        $keyword = $_POST['keyword'];
        $sql_admin_tim_kiem_sp = "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.category_id = tbl_category.category_id AND tbl_product.product_name LIKE '%" . $keyword . "%' "; //LIMIT 15 là lấy ra 15 sản phẩm 
        $query_sql_product_in_search = mysqli_query($conn, $sql_admin_tim_kiem_sp);
        $thu_tu = 0;
        while ($row_sp_tim_kiem = mysqli_fetch_array($query_sql_product_in_search)) {
    ?>

            <tr>
                <td><?php echo $thu_tu; ?></td>
                <td><?php echo $row_sp_tim_kiem["product_id"]; ?></td>
                <td><?php echo $row_sp_tim_kiem["product_name"]; ?></td>
                <td>
                    <img src="Modules/QuanLySanPham/Uploads/<?php echo $row_sp_tim_kiem['product_image'] ?>" alt="">
                </td>
                <td><?php echo $row_sp_tim_kiem["product_price"]; ?></td>
                <td><?php echo $row_sp_tim_kiem["product_quantity"]; ?></td>
                <td><?php echo $row_sp_tim_kiem["product_code"]; ?></td>
                <td><?php echo $row_sp_tim_kiem["product_summary"]; ?></td>
                <td><?php echo $row_sp_tim_kiem["product_content"]; ?></td>

                <td>
                    <?php
                    if ($row_sp_tim_kiem["product_status"] == 1) {
                        echo "Kích Hoạt";
                    } else {
                        echo "Ẩn";
                    }
                    ?>
                </td>
                <td><?php echo $row_sp_tim_kiem["category_name"]; ?></td>
                <td>
                    <a class="btn btn-primary" href="?action=quanlysanpham&query=sua&product_id_muon_sua=<?php echo $row_sp_tim_kiem['product_id'] ?>">Sửa</a>
                    <a class="btn btn-danger" href="Modules/QuanLySanPham/xuly.php?action=quanlysanpham&query=xoa&product_id_muon_xoa=<?php echo $row_sp_tim_kiem['product_id'] ?>">Xóa</a>
                </td>

            </tr>
        <?php
        }
    } else {
        $i = 0;
        while ($row_lietke_sp = mysqli_fetch_array($query_liet_ke_sp)) {
            $i++;
        ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $row_lietke_sp["product_id"]; ?></td>
                <td><?php echo $row_lietke_sp["product_name"]; ?></td>
                <td>
                    <img src="Modules/QuanLySanPham/Uploads/<?php echo $row_lietke_sp['product_image'] ?>" alt="">
                </td>
                <td><?php echo $row_lietke_sp["product_price"]; ?></td>
                <td><?php echo $row_lietke_sp["product_quantity"]; ?></td>
                <td><?php echo $row_lietke_sp["product_code"]; ?></td>
                <td><?php echo $row_lietke_sp["product_summary"]; ?></td>
                <td><?php echo $row_lietke_sp["product_content"]; ?></td>

                <td>
                    <?php
                    if ($row_lietke_sp["product_status"] == 1) {
                        echo "Kích Hoạt";
                    } else {
                        echo "Ẩn";
                    }
                    ?>
                </td>
                <td><?php echo $row_lietke_sp["category_name"]; ?></td>
                <td>
                    <a class="btn btn-primary" href="?action=quanlysanpham&query=sua&product_id_muon_sua=<?php echo $row_lietke_sp['product_id'] ?>">Sửa</a>
                    <a class="btn btn-danger" href="Modules/QuanLySanPham/xuly.php?action=quanlysanpham&query=xoa&product_id_muon_xoa=<?php echo $row_lietke_sp['product_id'] ?>">Xóa</a>
                </td>

            </tr>
    <?php
        }
    }
    ?>

</table>