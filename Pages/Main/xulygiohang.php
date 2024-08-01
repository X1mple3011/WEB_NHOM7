<h3>Thêm Giỏ Hàng</h3>
<?php
session_start();
echo $_GET['product_id_muon_them_vao_gio_hang'];
include('../../Admin/Config/config.php');

if (($_GET['id_sp_muon_tang'])) {
    $id_sp_can_tang = $_GET['id_sp_muon_tang'];
    foreach ($_SESSION['cart'] as $cart_array_item) {
        if ($cart_array_item['id_sp'] != $id_sp_can_tang) {
            $product_array_result[] = array('ten_sp' => $cart_array_item["ten_sp"], 'id_sp' => $cart_array_item['id_sp'], 'so_luong_sp' => $cart_array_item['so_luong_sp'], 'gia_sp' => $cart_array_item['gia_sp'], 'hinh_anh_sp' => $cart_array_item['hinh_anh_sp'], 'ma_sp' => $cart_array_item["ma_sp"]);
        } else {
            $product_array_result[] = array('ten_sp' => $cart_array_item["ten_sp"], 'id_sp' => $cart_array_item['id_sp'], 'so_luong_sp' => $cart_array_item['so_luong_sp'] + 1, 'gia_sp' => $cart_array_item['gia_sp'], 'hinh_anh_sp' => $cart_array_item['hinh_anh_sp'], 'ma_sp' => $cart_array_item["ma_sp"]);
        }
        $_SESSION['cart'] = $product_array_result;
        header('location:../../index.php?quanly=giohang');
    }
}


if (($_GET['id_sp_muon_giam'])) {
    $id_sp_can_giam = $_GET['id_sp_muon_giam'];
    foreach ($_SESSION['cart'] as $cart_array_item) {
        if ($cart_array_item['id_sp'] != $id_sp_can_giam) {
            $product_array[] = array('ten_sp' => $cart_array_item["ten_sp"], 'id_sp' => $cart_array_item['id_sp'], 'so_luong_sp' => $cart_array_item['so_luong_sp'], 'gia_sp' => $cart_array_item['gia_sp'], 'hinh_anh_sp' => $cart_array_item['hinh_anh_sp'], 'ma_sp' => $cart_array_item["ma_sp"]);
        } else {
            if ($cart_array_item['so_luong_sp'] > 1) {
                $product_array[] = array('ten_sp' => $cart_array_item["ten_sp"], 'id_sp' => $cart_array_item['id_sp'], 'so_luong_sp' => $cart_array_item['so_luong_sp'] - 1, 'gia_sp' => $cart_array_item['gia_sp'], 'hinh_anh_sp' => $cart_array_item['hinh_anh_sp'], 'ma_sp' => $cart_array_item["ma_sp"]);
            } else {
                $product_array[] = array('ten_sp' => $cart_array_item["ten_sp"], 'id_sp' => $cart_array_item['id_sp'], 'so_luong_sp' => $cart_array_item['so_luong_sp'], 'gia_sp' => $cart_array_item['gia_sp'], 'hinh_anh_sp' => $cart_array_item['hinh_anh_sp'], 'ma_sp' => $cart_array_item["ma_sp"]);
            }
        }
        $_SESSION['cart'] = $product_array;
        header('location:../../index.php?quanly=giohang');
    }
}


//giam so luong

//xoa tung san pham

if ($_SESSION['cart'] && isset($_GET['id_sp_muon_xoa'])) {
    $id_sp_can_xoa = $_GET['id_sp_muon_xoa'];
    foreach ($_SESSION['cart'] as $cart_array_item) {
        if ($cart_array_item['id_sp'] != $id_sp_can_xoa) {
            $product_array_kept[] = array('ten_sp' => $cart_array_item["ten_sp"], 'id_sp' => $cart_array_item['id_sp'], 'so_luong_sp' => $cart_array_item['so_luong_sp'], 'gia_sp' => $cart_array_item['gia_sp'], 'hinh_anh_sp' => $cart_array_item['hinh_anh_sp'], 'ma_sp' => $cart_array_item["ma_sp"]);
        }
        $_SESSION['cart'] = $product_array_kept;
        header('location:../../index.php?quanly=giohang');
    }
}

//xoa tat ca

if ($_GET['xoatatca'] && $_GET['xoatatca'] == 1) {
    // unset() chỉ định session cần xóa thôi
    unset($_SESSION['cart']);

    header('location:../../index.php?quanly=giohang');
}

//them san pham



if (isset($_POST['themvaogiohang'])) {
    $product_id_muon_them = $_GET['product_id_muon_them_vao_gio_hang'];
    $so_luong_sp_them_mac_dinh = 1;
    $sql_chon_sp_muon_them_vao_gio = "SELECT * FROM tbl_product WHERE product_id = '" . $product_id_muon_them . "' LIMIT 1";
    $query_sql_chon_sp_muon_them_vao_gio = mysqli_query($conn, $sql_chon_sp_muon_them_vao_gio);


    if ($row_sp_muon_them_vao_gio = mysqli_fetch_array($query_sql_chon_sp_muon_them_vao_gio)) {
        $new_product_array = array(array('ten_sp' => $row_sp_muon_them_vao_gio["product_name"], 'id_sp' => $product_id_muon_them, 'so_luong_sp' => $so_luong_sp_them_mac_dinh, 'gia_sp' => $row_sp_muon_them_vao_gio['product_price'], 'hinh_anh_sp' => $row_sp_muon_them_vao_gio['product_image'], 'ma_sp' => $row_sp_muon_them_vao_gio['product_code']));

        if (isset($_SESSION['cart'])) {
            $found_old_product = false;
            echo "phiên cart được khởi tạo thành công";
            echo "<br>";
            foreach ($_SESSION['cart'] as $cart_array_item) {
                // nếu có trùng sản phẩm cụ thể là trùng id sản phẩm
                if ($cart_array_item['id_sp'] == $product_id_muon_them) {
                    $old_product_array[] = array('ten_sp' => $cart_array_item["ten_sp"], 'id_sp' => $cart_array_item['id_sp'], 'so_luong_sp' => $cart_array_item['so_luong_sp'] + 1, 'gia_sp' => $cart_array_item['gia_sp'], 'hinh_anh_sp' => $cart_array_item['hinh_anh_sp'], 'ma_sp' => $cart_array_item["ma_sp"]);
                    $found_old_product = true;
                    echo "đã có sản phẩm này trong cart";
                    echo "<br>";

                    // nếu không trùng sản phẩm cụ thể là không trùng id sản phẩm
                } else {
                    // giữ nguyên phần tử cũ
                    $old_product_array[] = array('ten_sp' => $cart_array_item["ten_sp"], 'id_sp' => $cart_array_item['id_sp'], 'so_luong_sp' => $cart_array_item['so_luong_sp'], 'gia_sp' => $cart_array_item['gia_sp'], 'hinh_anh_sp' => $cart_array_item['hinh_anh_sp'], 'ma_sp' => $cart_array_item["ma_sp"]);
                    echo "đã thêm 1 sản phẩm mới vào cart";
                    echo "<br>";
                }
                // print_r($_SESSION['cart']);
            }

            if ($found_old_product == false) {

                //hợp nhất cái cũ và cái mới vào thành 1 cụ thể là sẽ thêm 1 phần tử ở đây là 1 mảng vào sau phần tử mảng cũ trước đó
                $_SESSION['cart'] = array_merge($old_product_array, $new_product_array);
            } else {
                $_SESSION['cart'] = $old_product_array;
            }
            // print_r($_SESSION['cart']);
        } else {
            $_SESSION['cart'] = $new_product_array;
            // print_r($_SESSION['cart']);
        }

        header('location:../../index.php?quanly=giohang');
        header('location:../../index.php?');
        print_r($_SESSION['cart']);
    }
}
?>