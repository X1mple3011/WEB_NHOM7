<?php
    // session_start();
    if($_POST['timkiem']) {
        $keyword = $_POST['keyword'];



    } else {
        echo "Không có keyword";
    }
    $sql_product_in_search= "SELECT * FROM tbl_product,tbl_category WHERE tbl_product.category_id = tbl_category.category_id AND tbl_product.product_name LIKE '%".$keyword."%' "; //LIMIT 15 là lấy ra 15 sản phẩm 
    $query_sql_product_in_search = mysqli_query($conn, $sql_product_in_search);

    
    
?>


<h3>Từ Khóa Tìm Kiếm: <?php echo $keyword ?></h3>
<ul class="product-list">
    <?php
    while($row_product_in_search = mysqli_fetch_array($query_sql_product_in_search)) {
    ?>
    <li>
        <a href="index.php?quanly=sanpham&product_id_muon_xem=<?php echo $row_product_in_search['product_id'];?>">
            <img src="./Admin/Modules/QuanLySanPham/Uploads/<?php echo $row_product_in_search['product_image']; ?>" alt="">
            <p class="product-in-category"><?php echo $row_product_in_search['category_name']; ?></p>
            <p class="product-name"><?php echo $row_product_in_search['product_name']; ?></p>
            <p class="product-price"><?php echo number_format($row_product_in_search['product_price'],0,',','.').'vnđ'; ?></p>
            
        </a>
    </li>
    
    <?php
    }
    ?>

</ul>