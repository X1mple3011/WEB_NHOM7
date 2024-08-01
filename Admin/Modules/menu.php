<?php

if (isset($_GET['action']) && ($_GET['action']) == 'admin-logout') {
    unset($_SESSION['admin-login']);
    header('location:login.php');
}

// if (isset($_SESSION['admin-login'])) {
//     echo $_SESSION['admin-login'];
// }
?>

<h3>Admin Menu</h3>
<div class="container admin-menu-container">
    <ul class="admin-menu-list navibar">
        <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản Lý Danh Mục Sản Phẩm</a></li>
        <li><a href="index.php?action=quanlysanpham&query=them">Quản Lý Sản Phẩm</a></li>
        <li><a href="index.php?action=quanlybaiviet&query=them">Quản Lý Bài Viết</a></li>
        <li><a href="index.php?action=quanlydanhmucbaiviet&query=them">Quản Lý Danh Mục Bài Viết</a></li>
        <li><a href="index.php?action=admin-logout">Đăng Xuất</a></li>
    </ul>
</div>