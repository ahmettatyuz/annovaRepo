<?php
/*
    admin login sayfasıdır.
    Bu sayfanin gorunumunu degistirmek icin adminLoginView.php dosyasına gidilmelidir.

    calisma mantigi:
    posttan gelen veriler kontrol edilir. gelen veriler bos degilse veriler degiskenlere aktarilir.
    kullanici adina gore veritabanindan kullanicinin verisi cekilir ve kontrol edilir.
    eger kullanici adi ve parola dogru ise SESSION'a authAdmin, adminAuthority, adminUsername, adminLOGICALREF degerleri eklenir.

*/
session_start();
define("securityAdmin", "true");
if (isset($_SESSION["authAdmin"])) {
    header("Location: adminHome.php");
}

$hata = "";
require "libs/functions.php";
require "libs/connection.php";
if (isset($_POST["SUBMITTED"]) and post("SUBMITTED") == "1" and isset($_POST["g-recaptcha-response"])) {
    if (post("g-recaptcha-response") != "") {
        $adminUsername = post("USERNAME");
        $adminPassword = post("PASSWORD");
        if ($adminPassword != "" and $adminUsername != "") {
            if ($adminUsername == "admin" and hash('sha512', $adminPassword) == "85615b2c05fa320e314f644057666e058d8f6a77c170e6885e1e631f034b57ce43080541a65324e529d15dfb7d4f8ef0d73c27837e6b1520af03710c05bede77") {
                $_SESSION["authAdmin"] = "admin";
                $_SESSION["adminAuthority"] = "3";
                $_SESSION["adminUsername"] = "admin";
                $_SESSION["adminLOGICALREF"] = "0";
                header("Location:adminHome.php");
            } else {
                $user = adminLoginData($db, $adminUsername);
                if ($user) {
                    if (($user["USERNAME"] == $adminUsername and password_verify($adminPassword, $user["PASSWORD"]))) {
                        setcookie("adminUsername", $adminUsername);
                        $_SESSION["authAdmin"] = "admin";
                        $_SESSION["adminAuthority"] = $user["AUTHORITY"];
                        $_SESSION["adminUsername"] = $adminUsername;
                        $_SESSION["adminLOGICALREF"] = $user["LOGICALREF"];
                        header("Location:adminHome.php");
                    } else {
                        $hata = "<i class='fa-solid fa-triangle-exclamation'></i> Kullanıcı adı veya parola hatalı !";
                    }
                } else {
                    $hata = "<i class='fa-solid fa-triangle-exclamation'></i> Kullanıcı bulunamadı !";
                }
            }
        } else {
            $hata = "<i class='fa-solid fa-triangle-exclamation'></i>Formdaki tüm alanlar doldurulmalıdır.";
        }
    } else {
        $hata = "<i class='fa-solid fa-triangle-exclamation'></i> <b>Ben robot değilim</b> kutusunu işaretleyiniz";
    }
}


$title = "Admin Girişi";
require "view/header.php";
require "view/admin/adminLoginView.php";
require "view/footer.php";


?>

<script>
    $(document).ready(function() {
        $("#alert").slideDown();
    })
</script>