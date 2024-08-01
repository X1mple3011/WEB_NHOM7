
<?php
$sql_danh_muc = "SELECT * FROM tbl_category ORDER BY category_id ASC";
$query_sql_danh_muc = mysqli_query($conn, $sql_danh_muc);

?>

<div class="sidebar">
    <ul class="sidebar-list">
        <?php
        while ($row_danh_muc = mysqli_fetch_array($query_sql_danh_muc)) {
        ?>
            <li><a href="index.php?quanly=danhmucsanpham&category_id_muon_xem=<?php echo $row_danh_muc['category_id'];?>"><?php echo $row_danh_muc['category_name']?></a></li>
        <?php
        }
        ?>
    </ul>
</div>