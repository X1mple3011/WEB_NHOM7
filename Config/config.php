<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "web_mysqli";

$conn = mysqli_connect($server, $username, $password, $db);
//  Check connection
if (!$conn) {
  die("Kết nối thất bại: " . mysqli_connect_error());
}
// else echo "Connected successfully!";
// $con = mysqli_connect("localhost","root","","web_mysqli");

// // Check connection
// if (mysqli_connect_errno()) {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   exit();
// }
// else {
//   echo "Kết Nối Thành Công";
// }


?>

