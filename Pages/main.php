<main class="main border">
    <div class="container main-container">
        <?php
        include("Sidebar/sidebar.php");
        ?>
        <div class="clear"></div>
        <div class="main-content">
            <?php
            if (isset($_GET["quanly"])) {
                $temp = $_GET["quanly"];
            } else {
                $temp = "";
            }
            if ($temp == "danhmucsanpham") {
                include("Main/danhmucsp.php");
            } else if ($temp == "giohang") {
                include("Main/giohang.php");
            } else if ($temp == "tintuc") {
                include("Main/tintuc.php");
            } else if ($temp == "lienhe") {
                include("Main/lienhe.php");
            } else if ($temp == "sanpham") {
                include("Main/chitietsanpham.php");
            } else if ($temp == "dangky") {
                include("Main/dangky.php");
            } else if ($temp == "dangnhap") {
                include("Main/dangnhap.php");
            } else if ($temp == "timkiem") {
                include("Main/timkiem.php");
            } else {
                include("Main/index.php");
            }


            ?>


        </div>
        <div class="clear"></div>
    </div>

</main>