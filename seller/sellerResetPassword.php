<?php
$access=0;
require "security.php";
require "libs/functions.php";
require "libs/connection.php";

$alert = "";
if (isset($_POST["SUBMITTED"])) {
    $newpassword = post("NEWPASSWORD");
    $newpassword2 = post("NEWPASSWORDX");
    $currentPassword=post("CURRENTPASSWORD");
    $currentPasswordDB="";
    if($newpassword!="" and $newpassword2!=""){
        $logicalref = $_SESSION["LOGICALREF"];
        $query=$db->prepare("SELECT PASSWORD FROM seller WHERE LOGICALREF=:logicalref");
        $query->bindParam(":logicalref",$logicalref);
        if($query->execute()==1){
            $currentPasswordDB=$query->fetch(PDO::FETCH_ASSOC)["PASSWORD"];
            $currentPWBool=password_verify($currentPassword,$currentPasswordDB);
        }
        if ($newpassword == $newpassword2 and $newpassword != "" and $newpassword2 != "") {
            if($currentPWBool){
                $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
                $result = setSellerPassword($db,$newpassword,$logicalref);
                if($result) {
                    header("Location: seller.php?alert=password");
                } else {
                    header("Location: seller.php?alert=error");
                }
            }else{
                $alert = "Mevcut Parola Yanlış !";
            }
            
        } else {
            $alert = "Parolalar Uyuşmuyor !";
        }
    }else{
        $alert ="Formdaki tüm alanlar doldurulmalıdır.";
    }
    
}

$title = "Parola Yenile";
require "view/header.php";
require "view/seller/navbar.php";
require "view/seller/resetPasswordView.php";
require "view/footer.php";
