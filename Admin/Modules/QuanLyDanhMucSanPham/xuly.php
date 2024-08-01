<?php
require("../../Config/config.php");
$tenloaisp = $_POST["tendanhmuc"];
$thutu = $_POST["thutu"];
//thêm
if(isset($_POST["themdanhmuc"])){
    $sql_them_danh_muc_san_pham = "INSERT INTO tbl_category(category_name, ordinal_numbers) VALUES('".$tenloaisp."', '".$thutu."')";
    mysqli_query($conn, $sql_them_danh_muc_san_pham);
    header("location:../../index.php?action=quanlydanhmucsanpham&query=them");
}
//sửa
else if (isset($_POST["suadanhmuc"])) {
    $sql_update_danh_muc_san_pham = "UPDATE tbl_category SET category_name ='".$tenloaisp."', ordinal_numbers = '".$thutu."'  WHERE category_id = '".$_GET['id_category_can_sua']."'  ";
    mysqli_query($conn, $sql_update_danh_muc_san_pham);
    header("location:../../index.php?action=quanlydanhmucsanpham&query=them");
}

//xóa
else if (isset($_GET["query"])=="xoa") {
    $category_id_can_xoa = $_GET["id_category_can_xoa"];
    $sql_xoa = "DELETE FROM tbl_category WHERE category_id='".$category_id_can_xoa."'";
    mysqli_query($conn, $sql_xoa);
    header("location:../../index.php?action=quanlydanhmucsanpham&query=them");
}

else {
    
}
?>

