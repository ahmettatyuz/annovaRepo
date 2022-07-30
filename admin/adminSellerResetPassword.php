<?php
$access = 1;
$alert = "";
$hata = "";
require "security.php";
require "libs/connection.php";
require "libs/functions.php";

if (isset($_GET["seller"])) {
    $sellerLogicalRef = $_GET["seller"];
    if (isset($_POST["SUBMITTED"])) {
        $newpassword = post("NEWPASSWORD");
        $newpassword2 = post("NEWPASSWORDX");
        if ($newpassword != "" and $newpassword2 != "") {
            if ($newpassword == $newpassword2 and $newpassword != "" and $newpassword2 != "") {
                $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
                if (setSellerPassword($db, $newpassword, $sellerLogicalRef)) {
                    $adminUsername = $_SESSION["adminUsername"];
                    $adminLogicalRef = $_SESSION["adminLOGICALREF"];
                    $sellerUsername = getUsername($db, $sellerLogicalRef,"seller");
                    $description = $adminUsername . " tarafından " . $sellerUsername . " (" . $sellerLogicalRef . ") bayisinin parolası değiştirildi !";
                    addLogData($db, $adminLogicalRef, $adminUsername, $description);
                    header("Location: adminSellers.php?alert=password&logicalref=" . $sellerLogicalRef);
                } else {
                    header("Location: adminSellers.php?alert=error&logicalref=" . $sellerLogicalRef);
                }
            } else {
                $alert = "Parolalar Uyuşmuyor !";
            }
        } else {
            $alert = "Formdaki tüm alanlar doldurulmalıdır.";
        }
    }
}


$title = "Bayi Parolası Değiştir";
require "view/header.php";
require "view/admin/navbar.php";
require "view/admin/adminSellerResetPasswordView.php";
require "view/footer.php";
