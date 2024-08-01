<h3>Thêm Sản Phẩm</h3>
<table class="table-them">
    <!-- <tr>
    <th>Điền Danh Mục Sản Phẩm</th>
    <th>Contact</th>
    <th>Country</th>
  </tr> -->
    <form action="Modules/QuanLySanPham/xuly.php" method="post" enctype="multipart/form-data">
        <tr>
            <td>Mã Sản Phẩm</td>
            <td><input type="text" name="ma_sp" id=""></td>
        </tr>
        <tr>
            <td>Tên Sản Phẩm</td>
            <td><input type="text" name="ten_sp" id=""></td>
        </tr>
        <tr>
            <td>Giá Sản Phẩm</td>
            <td><input type="text" name="gia_sp" id=""></td>
        </tr>
        <tr>
            <td>Hình Ảnh Sản Phẩm</td>
            <td><input type="file" name="hinh_anh_sp" id=""></td>
        </tr>
        <tr>
            <td>Số Lượng Sản Phẩm</td>
            <td><input type="text" name="so_luong_sp" id=""></td>
        </tr>
        <tr>
            <td>Tóm Tắt Sản Phẩm</td>
            <td><textarea name="tom_tat_sp" id="" rows="3" style="resize: none;"></textarea></td>
        </tr>
        <tr>
            <td>Nội Dung Sản Phẩm</td>
            <td><textarea name="noi_dung_sp" id="" rows="3" style="resize: none;"></textarea></td>
        </tr>

        <tr>
            <td>Danh Mục Sản Phẩm</td>
            <td>
                <select name="danh_muc_sp" id="">
                    <?php
                    $sql_danh_muc = "SELECT * FROM tbl_category ORDER BY category_id ASC";
                    $query_sql_danh_muc = mysqli_query($conn, $sql_danh_muc);
                    while ($row_danh_muc = mysqli_fetch_array($query_sql_danh_muc)) {
                    ?>
                    <option value="<?php echo $row_danh_muc['category_id']; ?>"><?php echo $row_danh_muc["category_name"]; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Tình Trạng Sản Phẩm</td>
            <td>
                <select name="tinh_trang_sp" id="">
                    <option value="1">Kích Hoạt</option>
                    <option value="0">Ẩn</option>
                </select>
            </td>
        </tr>

        <tr>
            <td><input type="submit" name="them_sp" value="Thêm Sản Phẩm"></td>
        </tr>

    </form>

</table>