<?php 
    $access=0;
    $alert="";

    require "security.php";
    require "libs/functions.php";
    require "libs/connection.php";

    $title="Ürün Bilgileri";
    require "view/header.php";
    require "view/seller/navbar.php";
    require "view/seller/sellerProductView.php";
    require "view/footer.php";





?>