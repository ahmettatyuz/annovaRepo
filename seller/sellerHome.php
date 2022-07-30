<?php 
    $access=0;
    $alert="";
    require "security.php";
    require "libs/connection.php";
    require "libs/functions.php";
    
    $username = $_SESSION["username"];
    $logicalref=$_SESSION["LOGICALREF"];
    $seller = getSeller($db,$logicalref);
    $opportunity=getOpportunities($db,$_SESSION["LOGICALREF"]);
    foreach($seller as $data){
        if($data==""){
            
            $alert .= "<div class='mb-2'>Lütfen eksik <b><a class='alert-link' href='sellerUpdate.php'>bayi bilgileri</a></b>nizi tamamlayınız !</div>";
            break;
        }
    }

    foreach($opportunity as $value){
        if($value["STATUS"]=="0"){
            $alert .= "<div>İşleme alınmamış <b><a class='alert-link' href='sellerOpportunities.php'>fırsatlar</a></b> bulunmaktadır !</div>";
            break;
        }
    }

    $title = "Anasayfa";
    require "view/header.php";
    require "view/seller/navbar.php";
    require "view/seller/sellerHomeView.php";
    require "view/footer.php";
?>

