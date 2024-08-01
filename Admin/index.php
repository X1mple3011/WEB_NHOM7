<?php
session_start();
if(!isset($_SESSION['admin-login'])) {
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../Css/admin_html_tags.css">
    <link rel="stylesheet" href="../Css/admin_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>

    </style>
</head>

<body>

    <h3 class="admin-title">Welcome Admin</h3>
    <?php
    require("./Config/config.php");
    include("Modules/header.php");
    include("Modules/menu.php");
    include("Modules/main.php");
    include("Modules/footer.php");
    
    ?>
    <textarea name="" id="" cols="30" rows="10"></textarea>
</body>

</html>