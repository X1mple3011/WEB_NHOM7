<?php
// Khi đẩy dữ liệu đi thì chỉ có dùng post thoi
// Còn khi lấy dữ liệu trang web thì get hay post cũng được
// session_start();
if(isset($_POST['user-login'])) {
    $user_username = $_POST['user-username'];
    $user_password = $_POST['user-password'];
    $sql_select_all_from_tbl_user = "SELECT * FROM tbl_user";
    $query_sql_select_all_from_tbl_user = mysqli_query($conn, $sql_select_all_from_tbl_user);
    $can_login = false;
    while($row_user = mysqli_fetch_array($query_sql_select_all_from_tbl_user)) {
        if($row_user["user_username"] == $user_username) {
            $can_login = true;
        }
    }

    if($can_login == true) {
        $_SESSION['user-login'] = $user_username;
        echo "<h4 style='color: blue;'>Đăng nhập thành công</h4>";
        echo $_SESSION['user-login'];
        header('location:index.php');
        
        
    }

    else {
        echo "<h4 style='color: green;'>Tài khoản hoặc mật khẩu không đúng</h4>";
        // header('location:index.php');
    }

}
?>

<h3>Đăng Nhập</h3>
<form action="" autocomplete="off" method="post">
            <table class="table-dang-nhap">
                <tr>
                    <td colspan="2">
                        <h3>Đăng Nhập</h3>
                    </td>
                </tr>
                <tr>
                    <td>Tài Khoản</td>
                    <td>
                        <input type="text" name="user-username" id="">
                    </td>
                </tr>
                <tr>
                    <td>Mật Khẩu</td>
                    <td>
                        <input type="password" name="user-password" id="">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Đăng Nhập" name="user-login">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="index.php?quanly=dangky">Bạn chưa có tài khoản ? Tới đăng ký</a>
                    </td>
                </tr>
            </table>

        </form>