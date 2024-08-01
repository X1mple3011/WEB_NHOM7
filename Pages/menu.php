<?php

$sql_danh_muc = "SELECT * FROM tbl_category ORDER BY category_id ASC";
$query_sql_danh_muc = mysqli_query($conn, $sql_danh_muc);
// echo $_SESSION['user-login'];

if (isset($_GET["userlog"]) && $_GET['userlog'] == "logout") {
    unset($_SESSION['user-login']);
    unset($_SESSION['cart-login']);
}
?>

<div class="menu border">
    
    <div class="container menu-container">
        <ul class="menu-list navibar">
            <li><a href="index.php">Trang Chủ</a></li>
            <li class="li-search">
                <form action="index.php?quanly=timkiem" method="post">
                    <input type="text" name="keyword" id="" placeholder="Tìm kiếm ở đây" class="input-search">
                    <input type="submit" value="Search" name="timkiem" class="button-search">
                </form>
            </li>
            <li><a href="index.php?quanly=tintuc">Tin Tức</a></li>
            <li><a href="index.php?quanly=lienhe">Liên Hệ</a></li>
            <li><a href="index.php?quanly=giohang">Giỏ Hàng</a></li>


            <li><a href="index.php?userlog=logout">
                    <?php
                    if (isset($_SESSION['user-login'])) {
                        echo $_SESSION['user-login'];
                    ?>
                        Đăng Xuất
                </a></li>
        <?php
                    } else {
        ?>
            <li><a href="index.php?quanly=dangky">Đăng Ký</a>
                <span style="color: white;">/</span>
                <a href="index.php?quanly=dangnhap">Đăng Nhập</a>
            </li>

        <?php
                    }
        ?>

        </ul>

    </div>


    <div class="clear"></div>
</div>