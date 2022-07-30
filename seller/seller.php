<?php 
    $access=0;
    $alert="";
    require "security.php"; // session_start();
    require "libs/connection.php";
    require "libs/functions.php";
    

    $username = $_SESSION["username"];
    $logicalref=$_SESSION["LOGICALREF"];
    $seller = getSeller($db,$logicalref);
    $title="Bayi Bilgileri";
    require "view/header.php";
    require "view/seller/navbar.php";
    require "view/seller/sellerView.php";
    require "view/footer.php";

?>