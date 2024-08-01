<?php
if (isset($_POST['user-register'])) {
    $user_nickname = $_POST['user-nickname'];
    $user_username = $_POST['user-username'];
    $user_password = md5($_POST['user-password']);
    $user_email = $_POST['user-email'];
    $user_phone_nums = $_POST['user-phone-nums'];
    $user_address = $_POST['user-address'];
    $sql_sellect_all_from_tbl_user = "SELECT * FROM tbl_user";
    $query_sql_sellect_all_from_tbl_user = mysqli_query($conn, $sql_sellect_all_from_tbl_user);
    $can_register = true;
    while ($row_user = mysqli_fetch_array($query_sql_sellect_all_from_tbl_user)) {
        if ($row_user['user_username'] == $user_username) {
            echo "<h4 style='color: green;'>Tên tài khoản đã được đăng ký từ trước vui lòng chuyển đến đăng nhập</h4>";
            $can_register = false;
        }
    }

    if ($can_register == true) {
        $sql_user_register = "INSERT INTO tbl_user(user_nickname, user_username, user_password, user_email, user_phone_nums, user_address) VALUES('" . $user_nickname . "','" . $user_username . "','" . $user_password . "','" . $user_email . "','" . $user_phone_nums . "','" . $user_address . "')";
        if (mysqli_query($conn, $sql_user_register)) {
            echo "<h4 style='color: blue;'>Đăng ký thành công</h4>";
        }
    }
}

?>



<h3>Đăng Ký</h3>
<form action="" method="post">
    <table class="table-dang-ky">

        <tr>
            <td>Họ và tên</td>
            <td><input type="text" name="user-nickname"></td>
        </tr>
        <tr>
            <td>Tên đăng nhập</td>
            <td><input type="text" name="user-username"></td>
        </tr>
        <tr>
            <td>mật khẩu</td>
            <td><input type="password" name="user-password"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="user-email"></td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input type="text" name="user-phone-nums"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="user-address"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Đăng Ký" name="user-register"></td>
        </tr>
        <tr>
            <td colspan="2">
                <a href="index.php?quanly=dangnhap">Bạn đã có tài khoản ? Tới đăng nhập</a>
            </td>
        </tr>
    </table>
</form>