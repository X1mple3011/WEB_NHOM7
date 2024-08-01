<?php
require("../../Config/config.php");
$ten_sp = $_POST["ten_sp"];
$ma_sp = $_POST["ma_sp"];
$gia_sp = $_POST["gia_sp"];
// $hinh_anh_sp = $_POST["hinh_anh_sp"];
$tom_tat_sp = $_POST["tom_tat_sp"];
$noi_dung_sp = $_POST["noi_dung_sp"];
$so_luong_sp = $_POST["so_luong_sp"];
$tinh_trang_sp = $_POST["tinh_trang_sp"];
$id_danh_muc_sp = $_POST["danh_muc_sp"];
// echo $id_danh_muc_sp;
$hinh_anh_sp = $_FILES["hinh_anh_sp"]["name"]; // tmp_name là bắt buộc của php không phải như tên biến thông thường
$hinh_anh_sp_tmp = $_FILES["hinh_anh_sp"]["tmp_name"];
$hinh_anh_sp = time() . "_" . $hinh_anh_sp;

// !empty($_FILES["hinh_anh_sp"]["name"])


if (!empty($_FILES["hinh_anh_sp"]["name"])) {
    echo "Có post ảnh";
} else {
    echo "Chưa post ảnh";
}

//thêm
if (isset($_POST["them_sp"])) {
    echo "hinh_anh_sp_tmp =" . $hinh_anh_sp_tmp;
    echo "<br>";
    echo "hinh_anh_sp =" . $hinh_anh_sp;
    echo "<br>";
    $sql_them_san_pham = "INSERT INTO tbl_product(product_name, product_code, product_price, product_quantity, product_image, product_summary, product_content, product_status, category_id) VALUES('" . $ten_sp . "', '" . $ma_sp . "', '" . $gia_sp . "', '" . $so_luong_sp . "', '" . $hinh_anh_sp . "', '" . $tom_tat_sp . "', '" . $noi_dung_sp . "', '" . $tinh_trang_sp . "', '" . $id_danh_muc_sp . "')";
    mysqli_query($conn, $sql_them_san_pham);
    move_uploaded_file($hinh_anh_sp_tmp, "Uploads/" . $hinh_anh_sp);
    header("location:../../index.php?action=quanlysanpham&query=them");
}
//sửa
else if (isset($_POST["sua_sp"])) {
    echo $hinh_anh_sp;
    if (!empty($_FILES["hinh_anh_sp"]["name"])) {

        
        $sql_chon_sp = "SELECT * FROM tbl_product WHERE product_id = '" . $_GET['product_id_muon_sua'] . "'";
        $sql_chon_sp_query = mysqli_query($conn, $sql_chon_sp);
        while ($row_sp_muon_xoa = mysqli_fetch_array($sql_chon_sp_query)) {
            unlink('uploads/' . $row_sp_muon_xoa['product_image']);
        }
        $sql_update_san_pham = "UPDATE tbl_product SET product_name ='" . $ten_sp . "', product_code = '" . $ma_sp . "', product_image = '" . $hinh_anh_sp . "', product_price = '".$gia_sp."', product_quantity = '" . $so_luong_sp . "', product_summary = '" . $tom_tat_sp . "', product_content = '" . $noi_dung_sp . "', product_status = '" . $tinh_trang_sp . "', category_id = '" . $id_danh_muc_sp. "'   WHERE product_id = '" . $_GET['product_id_muon_sua'] . "' ";

        if (mysqli_query($conn, $sql_update_san_pham)) {
            echo "Update data thành công";
            move_uploaded_file($hinh_anh_sp_tmp, "Uploads/" . $hinh_anh_sp);
            
            header("location:../../index.php?action=quanlysanpham&query=them");
        }
    } else {
        $sql_update_san_pham = "UPDATE tbl_product SET product_name ='" . $ten_sp . "', product_code = '" . $ma_sp . "', product_quantity = '" . $so_luong_sp . "', product_price = '".$gia_sp."', product_summary = '" . $tom_tat_sp . "', product_content = '" . $noi_dung_sp . "', product_status = '" . $tinh_trang_sp . "', category_id = '" . $id_danh_muc_sp. "'  WHERE product_id = '" . $_GET['product_id_muon_sua'] . "' ";
        if (mysqli_query($conn, $sql_update_san_pham)) {
            echo "Update data thành công với k sửa ảnh";
            header("location:../../index.php?action=quanlysanpham&query=them");
        }
    }
}

//xóa
else if (isset($_GET["query"]) == "xoa") {
    $sql_chon_sp = "SELECT * FROM tbl_product WHERE product_id = '" . $_GET['product_id_muon_xoa'] . "'";
    $sql_chon_sp_query = mysqli_query($conn, $sql_chon_sp);
    while ($row_sp_muon_xoa = mysqli_fetch_array($sql_chon_sp_query)) {
        unlink('uploads/' . $row_sp_muon_xoa['product_image']);
    }
    $product_id_muon_xoa = $_GET["product_id_muon_xoa"];
    $sql_xoa_sp = "DELETE FROM tbl_product WHERE product_id='" . $product_id_muon_xoa . "'";
    mysqli_query($conn, $sql_xoa_sp);
    header("location:../../index.php?action=quanlysanpham&query=them");
} else {
}

?>
<img src="Uploads/'.<?php echo $hinh_anh_sp ?>.'" alt="k thấy">