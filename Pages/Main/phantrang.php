<div class="clear"></div>
<div class="phan-trang">
Trang:
<?php
$sql_trang = "SELECT * FROM tbl_product";
$query_sql_trang = mysqli_query($conn, $sql_trang);
$row_product_count = mysqli_num_rows($query_sql_trang);
$trang = ceil($row_product_count / 10); // ceil làm tròn
echo "Tổng có tất cả ".$row_product_count. " sản phẩm";
echo $pages.'/'.$trang;

?>

<ul class="list-trang">
    <?php
    for ($i=1; $i <= $trang; $i++) { 
    ?>
    <li <?php if($i == $pages) {echo 'style="background: rgb(122, 34, 204)"';} else {echo '';} ?> ><a  href="index.php?trang=<?php echo $i; ?>"><?php echo $i;?></a></li>
    <?php
    }
    ?>
    
</ul>
</div>