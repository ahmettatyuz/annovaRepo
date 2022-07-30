<?php 
    $access=0;
    $alert="";
    require "security.php";
    require "libs/connection.php";
    require "libs/functions.php";

    $opportunities = getOpportunities($db,$_SESSION["LOGICALREF"]);
    $title="Fırsatlar";
    require "view/header.php";
    require "view/seller/navbar.php";
    require "view/seller/sellerOpportunitiesView.php";
    require "view/footer.php";
?>