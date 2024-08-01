<?php
$sql_sua_danh_muc_sp = "SELECT * FROM tbl_category WHERE category_id='".$_GET['id_category_can_sua']."' LIMIT 1";
$query_sua_danh_muc_sp = mysqli_query($conn, $sql_sua_danh_muc_sp);
?>

<h3>Sửa Mục Sản Phẩm</h3>
<table class="table-them" >
    <!-- <tr>
    <th>Điền Danh Mục Sản Phẩm</th>
    <th>Contact</th>
    <th>Country</th>
  </tr> -->
    <form action="Modules/QuanLyDanhMucSanPham/xuly.php?id_category_can_sua=<?php echo $_GET["id_category_can_sua"]?>" method="post">
        <?php
            while($_row_dinh_sua = mysqli_fetch_array($query_sua_danh_muc_sp)) {

            
        ?>
        <tr>
            <td>Tên Danh Mục</td>
            <td><input type="text" name="tendanhmuc" id="" value="<?php echo $_row_dinh_sua["category_name"]; ?>"></td>
        </tr>
        <tr>
            <td>Thứ Tự</td>
            <td><input type="text" name="thutu" id="" value="<?php echo $_row_dinh_sua["ordinal_numbers"]; ?>"></td>
        </tr>
        <tr>
            <td><input type="submit" name="suadanhmuc" value="Sửa Danh Mục Sản Phẩm"></td>
        </tr>
        <?php
            }
        ?>
    </form>

</table>