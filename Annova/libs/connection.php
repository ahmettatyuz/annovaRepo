<?php 
    $connection = mysqli_connect("localhost","root","","annova");
    if(mysqli_connect_errno()>0){
        die("hata: ".mysqli_connect_errno());
    }
?>