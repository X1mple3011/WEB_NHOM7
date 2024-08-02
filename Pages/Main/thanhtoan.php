<?php 
session_start();
if(isset($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}


?>
<style>
    .text-thanks {
        text-align: center;
    }
    a {
        text-decoration: none;
    }
</style>

<div class="text-thanks">
<p>
    <img src="https://media0.giphy.com/media/osjgQPWRx3cac/giphy.gif?cid=ecf05e478xp3nc5k847kmtuex5m4q2wzfoxfv4pcmhk7zbum&ep=v1_gifs_search&rid=giphy.gif&ct=g" alt="">
</p>
<h3 style="color: red;">Cảm ơn bạn đã ủng hộ shop!</h3>
<a href="../../index.php">Tiếp tục mua sắm</a>
</div>


