<?php 
    $access=0;
    $alert="";
    require "security.php";
    require "libs/functions.php";
    require "libs/connection.php";


    $sales = getSales($db,$_SESSION["LOGICALREF"]);


    $title="Satışlar";
    require "view/header.php";
    require "view/seller/navbar.php";
    require "view/seller/sellerSalesView.php";
    require "view/footer.php";



?>