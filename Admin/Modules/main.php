<style>
    img {
        width: 150px;
    }
</style>
<div class="clear"></div>
<h3>Main</h3>
<main class="main border">
    <div class="container admin-main-container">
        <?php
        include("tablemanagecss.php")
        ?>
        <div class="admin-main-content">
            <?php
            if (isset($_GET["action"]) && $_GET["query"]) {
                $action = $_GET["action"];
                $query = $_GET["query"];
            } else {
                $action = "";
                $query = "";
            }
            if ($action == "quanlydanhmucsanpham" && $query == "them") {
                include("Modules/QuanLyDanhMucSanPham/them.php");
                include("Modules/QuanLyDanhMucSanPham/lietke.php");
            } else if ($action == "quanlydanhmucsanpham" && $query == "sua") {
                include("Modules/QuanLyDanhMucSanPham/sua.php");
            } else if ($action == "quanlysanpham" && $query == "them") {
                include("Modules/QuanLySanPham/them.php");
                include("Modules/QuanLySanPham/lietke.php");
            } else if ($action == "quanlysanpham" && $query == "sua") {
                include("Modules/QuanLySanPham/sua.php");
            } else {
                include("Modules/dashboard.php");
            }


            ?>

            <div class="clear"></div>
        </div>

</main>