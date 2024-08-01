<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<link rel="stylesheet" href="Css/giohang.css">
</link>

<h3>Giỏ Hàng</h3>
<?php
if (isset($_SESSION['cart'])) {
    $i = 0;
    $thanh_tien = 0;
    $tong_tien = 0;
?>

<table class="table-gio-hang">
    <tr>
        <th>Thứ Tự</th>
        <th>Mã Sản Phẩm</th>
        <th>Tên Sản Phẩm</th>
        <th>Hình Ảnh</th>
        <th>Số Lượng</th>
        <th>Giá Sản Phẩm</th>
        <th>Thành Tiền</th>
        <th>Quản Lý</th>
    </tr>

    <?php
        foreach ($_SESSION['cart'] as $cart_item) {
            $i++;
            $thanh_tien = $cart_item['so_luong_sp'] * $cart_item['gia_sp'];
            $tong_tien +=  $thanh_tien;
        ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $cart_item['ma_sp'] ?></td>
        <td><?php echo $cart_item['ten_sp'] ?></td>
        <td><img src="./Admin/Modules/QuanLySanPham/Uploads/<?php echo $cart_item['hinh_anh_sp']; ?>" alt=""></td>
        <td class="tang-giam-so-luong-sp">
            <a href="./Pages/Main/xulygiohang.php?id_sp_muon_giam=<?php echo $cart_item['id_sp']; ?>"><i
                    class="fa-solid fa-chevron-left"></i></a>
            <span> </span>
            <?php echo $cart_item['so_luong_sp'] ?>
            <span> </span>
            <a href="./Pages/Main/xulygiohang.php?id_sp_muon_tang=<?php echo $cart_item['id_sp']; ?>"><i
                    class="fa-solid fa-chevron-right"></i></a>

        </td>
        <td><?php echo number_format($cart_item['gia_sp'], 0, ',', '.') . 'vnđ' ?></td>
        <td><?php echo number_format($thanh_tien, 0, ',', '.') . 'vnđ' ?></td>
        <td><a href="./Pages/Main/xulygiohang.php?id_sp_muon_xoa=<?php echo $cart_item['id_sp']; ?>">Xóa</a></td>
    </tr>
    <?php
        }
        ?>
    <tr>
        <td colspan="7">Tổng tiền: <?php echo number_format($tong_tien, 0, ',', '.') . 'vnđ' ?></td>
        <td><a href="./Pages/Main/xulygiohang.php?xoatatca=1">Xóa Tất Cả</a></td>
        <div style="clear: both;"></div>
    </tr>
    <tr>
        <td colspan="8">
            <?php
                if (isset($_SESSION['user-login'])) {
                ?>

            <p><a href="Pages/Main/thanhtoan.php">Đặt hàng</a></p>
            <?php
                } else {
                ?>
            <p><a href="index.php?quanly=dangnhap">Đăng nhập để đặt hàng</a></p>
            <?php
                }
                ?>
        </td>
    </tr>
    <?php

} 
else {
    ?>
    <tr>
        <td colspan="8">
            <p>Hiện tại giỏ hàng trống</p>
        </td>

    </tr>
    <?php
} 
    ?>
</table>