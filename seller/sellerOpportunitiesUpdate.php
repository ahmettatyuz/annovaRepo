<?php 
    require "security.php";
    require "libs/connection.php";
    require "libs/functions.php";
    
    if(isset($_POST["SUBMITTED"]) and post("SUBMITTED")){
        $status = post("STATUSOPP");
        $logicalno = post("LOGICALNOOPP");
        $sellerid=$_SESSION["LOGICALREF"];
        if(sellerOpportunityUpdate($db,$logicalno,$status,$sellerid)){
            header("Location:sellerOpportunities.php?alert=opportunity&logicalref=0");
        }else{
            header("Location:sellerOpportunities.php?alert=error&logicalref=0");
        }
    }


?>