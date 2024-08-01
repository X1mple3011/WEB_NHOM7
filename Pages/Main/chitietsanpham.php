<h3>Chi Tiết Sản Phẩm</h3>
<?php
$sql_chi_tiet_sp = "SELECT * FROM tbl_product, tbl_category WHERE tbl_product.category_id = tbl_category.category_id AND tbl_product.product_id = '$_GET[product_id_muon_xem]' LIMIT 15"; //LIMIT 15 là lấy ra 15 sản phẩm 
$query_sql_chi_tiet_sp = mysqli_query($conn, $sql_chi_tiet_sp);
// print_r($query_sql_chi_tiet_sp) in ra những thứ nó lấy

while ($row_chi_tiet_sp = mysqli_fetch_array($query_sql_chi_tiet_sp)) {
?>
    <div class="wrapper-chi-tiet-sp">
        <div class="chi-tiet-cac-hinh-anh-sp">
            <img src="./Admin/Modules/QuanLySanPham/Uploads/<?php echo $row_chi_tiet_sp['product_image']; ?>" alt="">
        </div>
       <form action="./Pages/Main/xulygiohang.php?product_id_muon_them_vao_gio_hang=<?php echo $row_chi_tiet_sp['product_id']; ?>" method="post">
       <div class="chi-tiet-thong-tin-sp">
            <h4>Tên Sản Phẩm: <?php echo $row_chi_tiet_sp['product_name']; ?> </h4>
            <p class="product-price">Giá Sản Phẩm: <?php echo number_format($row_chi_tiet_sp['product_price'], 0, ',', '.') . 'vnđ'; ?></p>
            <p>Mã Sản Phẩm: <?php echo $row_chi_tiet_sp['product_id']; ?></p>
            <p>Số Lượng Sản Phẩm: <?php echo $row_chi_tiet_sp['product_quantity']; ?></p>
            <p>Danh Mục Sản Phẩm: <?php echo $row_chi_tiet_sp['category_name']; ?></p>
            <p><input type="submit" value="Thêm vào giỏ hàng" name = "themvaogiohang" class="add-cart"></p>
        </div>
       </form>
    </div>

<?php
}
?>