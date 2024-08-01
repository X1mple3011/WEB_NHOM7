
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
$sql_product_in_category = "SELECT * FROM tbl_product, tbl_category WHERE tbl_product.category_id = tbl_category.category_id ORDER BY tbl_product.product_id DESC LIMIT $begin, 10"; //LIMIT 15 là lấy ra 15 sản phẩm 
$query_sql_product_in_category = mysqli_query($conn, $sql_product_in_category);


?>


<h3>Sản Phẩm Mới Nhất</h3>
<ul class="product-list">
    <?php
    while ($row_product_in_category = mysqli_fetch_array($query_sql_product_in_category)) {
    ?>
        <li>
            <a href="index.php?quanly=sanpham&product_id_muon_xem=<?php echo $row_product_in_category['product_id']; ?>">
                <img src="./Admin/Modules/QuanLySanPham/Uploads/<?php echo $row_product_in_category['product_image']; ?>" alt="">
                <p class="product-in-category"><?php echo $row_product_in_category['category_name']; ?></p>
                <p class="product-name"><?php echo $row_product_in_category['product_name']; ?></p>
                <p class="product-price"><?php echo number_format($row_product_in_category['product_price'], 0, ',', '.') . 'vnđ'; ?></p>
            </a>
        </li>
    <?php
    }
    ?>
</ul>
<div class="clear"></div>
<div class="phan-trang" >
Trang:
<?php
$sql_trang = "SELECT * FROM tbl_product";
$query_sql_trang = mysqli_query($conn, $sql_trang);
$row_product_count = mysqli_num_rows($query_sql_trang);
$trang = ceil($row_product_count / 10); // ceil làm tròn
echo $pages.'/'.$trang;

?>

<ul class="list-trang" >
    <?php
    for ($i=1; $i <= $trang; $i++) { 
    ?>
    <li <?php if($i == $pages) {echo 'style="background: rgb(122, 34, 204)"';} else {echo '';} ?> ><a  href="index.php?trang=<?php echo $i; ?>"><?php echo $i;?></a></li>
    <?php
    }
    ?>
    
</ul>
</div>