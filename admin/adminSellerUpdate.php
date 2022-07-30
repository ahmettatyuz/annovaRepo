<?php 
    $access=1;
    $alert="";
    require "security.php";
    require "libs/connection.php";
    require "libs/functions.php";
    
    if(isset($_GET["seller"])){
        $sellerLogicalRef=$_GET["seller"];
        $seller=getSeller($db,$sellerLogicalRef);
        $sellerUpdated=array();
        $cities= getCities($db);
        $taxoffices = getTaxOffices($db);
        if(empty($seller)){
            header("Location:adminSellers.php");
        }
        if(isset($_POST["SUBMITTED"])){
            $taxtype= post("TAXTYPE");
            $taxcode = post("TAXCODE");
            if(isset($_POST["NAMESURNAME"])){  //tuzel secilirse isim soyisim olmayacak dolayisiyla hata verebilir.
                $namesurname=post("NAMESURNAME"); // bu if blogu ile hatayı engelliyorum.
            }else{
                $namesurname="-";
            }
            $description = post("DESCRIPTION");
            $mobile = post("PHONE");
            $taxoffice= post("TAXOFFICE");
            $city = post("CITY");
            $address= post("ADDRESS");
            $newusername = post("USERNAME");

            array_push($sellerUpdated,$newusername);
            array_push($sellerUpdated,$address);
            array_push($sellerUpdated,$city);
            array_push($sellerUpdated,$taxcode);
            array_push($sellerUpdated,$taxtype);
            array_push($sellerUpdated,$taxoffice);
            array_push($sellerUpdated,$mobile);
            array_push($sellerUpdated,$namesurname);
            array_push($sellerUpdated,$description);

            if(sellerUpdate($db,$newusername,$address,$city,$taxcode,$taxtype,$taxoffice,$mobile,$namesurname,$description,$sellerLogicalRef)){
                $differences = findDifference($sellerUpdated,$seller,"seller");
                // log tablosuna guncelleme yapıldgına dair bilgi aktarımı
                // fonksiyona da çevirilebilir
                $adminUsername=$_SESSION["adminUsername"];
                $adminLogicalRef = $_SESSION["adminLOGICALREF"];
                $sellerUsername=getUsername($db,$sellerLogicalRef,"seller");
                $content = $adminUsername." tarafından ".$sellerUsername." (".$sellerLogicalRef.") bayisinin bilgileri güncellendi !(".$differences.")";
                addLogData($db,$adminLogicalRef,$adminUsername,$content);
                header("Location:adminSellers.php?alert=update&logicalref=".$sellerLogicalRef);
            }
            else{
                header("Location:adminSellers.php?alert=error");
            }
        }
        
    }else{
        header("Location:adminSellers.php");
    }
    


    $title ="Bayi Bilgileri Düzenle";
    require "view/header.php";
    require "view/admin/navbar.php";
    require "view/admin/adminSellerUpdateView.php";
    require "view/footer.php";
