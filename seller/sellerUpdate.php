<?php 
    $access=0;
    require "security.php"; // giriş yapılmadan bu sayfaya erişilememsi için
    require "libs/connection.php";  // veritabani baglantisi
    require "libs/functions.php";  // post ve get fonksiyonları
    $alert="";
    $username=$_SESSION["username"];
    $logicalref=$_SESSION["LOGICALREF"];
    $seller = getSeller($db,$logicalref);
    $cities=getCities($db);
    $taxoffices=getTaxOffices($db);
    $namesurname="";
    if(isset($_POST["SUBMITTED"])){
        $taxtype= post("TAXTYPE");

        $taxcode = post("TAXCODE");
        if(isset($_POST["NAMESURNAME"])){  //tuzel secilirse isim soyisim olmayacak dolayisiyla hata verebilir.
            $namesurname=post("NAMESURNAME"); // bu if blogu ile hatayı engelliyorum.
        }else{
            $namesurname="-";
        }
        $descripton = post("DESCRIPTION");
        $mobile = post("PHONE");
    
        $taxoffice= post("TAXOFFICE");
        $city = post("CITY");
        $address= post("ADDRESS");
        
        $newusername = post("USERNAME");
        if($taxtype!="" and $taxcode!="" and$namesurname!="" and $descripton!="" and $mobile!="" and $taxoffice!="" and $city!="" and $address!="" and $newusername!=""){
            $result = sellerUpdate($db,$newusername,$address,$city,$taxcode,$taxtype,$taxoffice,$mobile,$namesurname,$descripton,$logicalref);
            if($result==true){
                header("Location:seller.php?alert=update");
            }else{
                header("Location:seller.php?alert=update");
            }
        }else{
            $alert = "Formdaki tüm alanlar doldurulmalıdır.";
        }
        
        
    }
    $title="Bayi Bilgileri";
    require "view/header.php";
    require "view/seller/navbar.php";
    require "view/seller/sellerUpdateView.php";
    require "view/footer.php";
?>