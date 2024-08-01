<?php

// session_start();
if(isset($_GET['trang'])) {
    $pages = $_GET['trang'];
} else {
    $pages = 1;
}

if($pages == '' || $pages == 1) {
    $begin = 0;

} else {
    $begin = ($pages * 10) - 10;
}
$sql_product_in_category = "SELECT * FROM tbl_product, tbl_category WHERE tbl_product.category_id = tbl_category.category_id AND tbl_product.category_id = '$_GET[category_id_muon_xem]'";
$query_sql_product_in_category = mysqli_query($conn, $sql_product_in_category);
$sql_product_with_category_id_selected = "SELECT * FROM tbl_product WHERE category_id = '$_GET[category_id_muon_xem]' ORDER BY tbl_product.product_id DESC LIMIT $begin, 10";

$query_sql_product_with_category_id_selected = mysqli_query($conn, $sql_product_with_category_id_selected);

if ($row_category = mysqli_fetch_array($query_sql_product_in_category)) {
?>
    <h3>Danh Mục Sản Phẩm: <?php echo $row_category["category_name"] ?></h3>
    <?php
    while ($row_product_in_category = mysqli_fetch_array($query_sql_product_with_category_id_selected)) {
        // echo $row_product_in_category['product_image'];
    ?>
        <ul class="product-list">

            <li>
                <a href="index.php?quanly=sanpham&product_id_muon_xem=<?php echo $row_product_in_category['product_id']; ?>">
                    <img src="./Admin/Modules/QuanLySanPham/Uploads/<?php echo $row_product_in_category['product_image']; ?>" alt="Éo Thấy Ảnh">
                    <p class="product-name"><?php echo $row_product_in_category['product_name']; ?></p>
                    <p class="product-price"><?php echo number_format($row_product_in_category['product_price'], 0, ',', '.') . 'vnđ'; ?></p>
                </a>
            </li>

        </ul>
    <?php
    }
    ?>
<?php
} else {

    $sql_category_name_with_category_id_selected = "SELECT * FROM tbl_category WHERE category_id = '$_GET[category_id_muon_xem]'";
    $query_sql_category_name_with_category_id_selected = mysqli_query($conn, $sql_category_name_with_category_id_selected);
    $row_category = mysqli_fetch_array($query_sql_category_name_with_category_id_selected);
?>

    <h3>Danh Mục Sản Phẩm: <?php echo $row_category['category_name'] ?></h3>
    <h4>Hiện chưa có sản phẩm thuộc danh mục này</h4>
<?php
}

?>
<div class="clear"></div>
<div class="phan-trang">
<?php
$sql_trang = "SELECT * FROM tbl_product WHERE category_id = '$_GET[category_id_muon_xem]' ORDER BY tbl_product.product_id ";
$query_sql_trang = mysqli_query($conn, $sql_trang);
$row_product_count = mysqli_num_rows($query_sql_trang);
$trang = ceil($row_product_count / 10); // ceil làm tròn
if ($row_product_count > 0) {
    echo "Trang: ".$pages.'/'.$trang;
}

?>

<ul class="list-trang">
    <?php
    for ($i=1; $i <= $trang; $i++) { 
    ?>
    <li <?php if($i == $pages) {echo 'style="background: rgb(122, 34, 204)"';} else {echo '';} ?> ><a  href="index.php?quanly=danhmucsanpham&trang=<?php echo $i; ?>&category_id_muon_xem=<?php echo $_GET['category_id_muon_xem']; ?>"><?php echo $i;?></a></li>
    <?php
    }
    ?>
    
</ul>
</div>

