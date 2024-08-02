<?php
session_start();
// unset($_SESSION['admin-login']);
// echo $_SESSION['admin-login'];
include('../Admin/Config/config.php');
if(isset($_POST['admin-login'])) {
    $admin_ussername = $_POST['admin-username'];
    $admin_password_encode = md5($_POST['admin-password']);
    $sql_choose_admin_login = "SELECT * FROM tbl_admin WHERE admin_username = '".$admin_ussername."' AND admin_password = '".$admin_password_encode."'";
    $query_sql_choose_admin_login = mysqli_query($conn, $sql_choose_admin_login);
    $count = mysqli_num_rows($query_sql_choose_admin_login);
    if ($count > 0) {
        $_SESSION['admin-login'] = $admin_ussername;
        header('location:index.php');
    }
    else {
        echo '<script>alert("tài khoản hoặc mật khẩu không đúng")</script>';
        header('location:login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <link rel="stylesheet" href="../Css/main_page_style.css">
    <link rel="stylesheet" href="../Css/admin_style.css">
    <style>
        .table-admin-login,
        th,
        td {
            border: 1px solid black;

        }

        .table-admin-login {
            /* border-collapse: collapse; */
            margin: 0 auto;
            text-align: center;
            width: 300px;
        }

        .table-admin-login tr td input {
            /* border-collapse: collapse; */
            width: 100%;

        }
    </style>
</head>

<body>
    <div class="wrapper-login">
    <!-- để action rỗng là post gửi vẫn vào chính trang này -->
        <form action="" autocomplete="off" method="post">
            <table class="table-admin-login">
                <tr>
                    <td colspan="2">
                        <h3>Đăng Nhập Admin</h3>
                    </td>
                </tr>
                <tr>
                    <td>Tài Khoản</td>
                    <td>
                        <input type="text" name="admin-username" id="">
                    </td>
                </tr>
                <tr>
                    <td>Mật Khẩu</td>
                    <td>
                        <input type="password" name="admin-password" id="">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Đăng Nhập" name="admin-login">
                    </td>
                </tr>
            </table>

        </form>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>

</html>