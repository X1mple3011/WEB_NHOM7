<?php
$sql_sua_sp = "SELECT * FROM tbl_product WHERE product_id='" . $_GET['product_id_muon_sua'] . "' LIMIT 1";
$query_sua_sp = mysqli_query($conn, $sql_sua_sp);
?>

<h3>Sửa Sản Phẩm</h3>
<table class="table-them" style="width: 100%;">
    <!-- <tr>
    <th>Điền Danh Mục Sản Phẩm</th>
    <th>Contact</th>
    <th>Country</th>
  </tr> -->

    <?php
    while ($row_sp_muon_sua = mysqli_fetch_array($query_sua_sp)) {


    ?>
        <form action="Modules/QuanLySanPham/xuly.php?product_id_muon_sua=<?php echo $_GET["product_id_muon_sua"] ?>" method="post" enctype="multipart/form-data">
            <tr>
                <td>Mã Sản Phẩm</td>
                <td><input type="text" name="ma_sp" id="" value="<?php echo $row_sp_muon_sua['product_code']; ?>"></td>
            </tr>
            <tr>
                <td>Tên Sản Phẩm</td>
                <td><input type="text" name="ten_sp" id="" value="<?php echo $row_sp_muon_sua['product_name']; ?>"></td>
            </tr>
            <tr>
                <td>Giá Sản Phẩm</td>
                <td><input type="text" name="gia_sp" id="" value="<?php echo $row_sp_muon_sua['product_price']; ?>"></td>
            </tr>
            <tr>

                <td>Hình Ảnh Sản Phẩm</td>
                <td> <img src="Modules/QuanLySanPham/Uploads/<?php echo $row_sp_muon_sua['product_image']; ?>" alt=""></td>
                <td><input type="file" name="hinh_anh_sp" id=""></td>

            </tr>
            <tr>
                <td>Số Lượng Sản Phẩm</td>
                <td><input type="text" name="so_luong_sp" id="" value="<?php echo $row_sp_muon_sua['product_quantity']; ?>"></td>
            </tr>
            <tr>
                <td>Tóm Tắt Sản Phẩm</td>
                <td><textarea name="tom_tat_sp" id="" rows="3" style="resize: none;"><?php echo $row_sp_muon_sua['product_summary']; ?></textarea></td>
            </tr>
            <tr>
                <td>Nội Dung Sản Phẩm</td>
                <td><textarea name="noi_dung_sp" id="" rows="3" style="resize: none;"><?php echo $row_sp_muon_sua['product_content']; ?></textarea></td>
            </tr>
            <tr>
                <td>Danh Mục Sản Phẩm</td>
                <td>
                    <select name="danh_muc_sp" id="">
                        <?php
                        $sql_danh_muc = "SELECT * FROM tbl_category ORDER BY category_id ASC";
                        $query_sql_danh_muc = mysqli_query($conn, $sql_danh_muc);
                        while ($row_danh_muc = mysqli_fetch_array($query_sql_danh_muc)) {
                            if ($row_danh_muc["category_id"] == $row_sp_muon_sua["category_id"]) {
                        ?>
                                <option selected value="<?php echo $row_danh_muc['category_id']; ?>"><?php echo $row_danh_muc["category_name"]; ?></option>
                            <?php
                            } else {
                            ?>
                                <option value="<?php echo $row_danh_muc['category_id']; ?>"><?php echo $row_danh_muc["category_name"]; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tình Trạng Sản Phẩm</td>
                <td>
                    <?php
                    if ($row_sp_muon_sua['product_status'] == 1) {
                    ?>
                        <select name="tinh_trang_sp" id="">
                            <option value="1" selected>Kích Hoạt</option>
                            <option value="0">Ẩn</option>
                        </select>
                    <?php
                    } else {
                    ?>
                        <select name="tinh_trang_sp" id="">
                            <option value="1">Kích Hoạt</option>
                            <option value="0" selected>Ẩn</option>
                        </select>
                    <?php
                    }
                    ?>


                </td>
            </tr>

            <tr>
                <td><input type="submit" name="sua_sp" value="Sửa Sản Phẩm"></td>
            </tr>
        </form>
    <?php
    }
    ?>

</table>