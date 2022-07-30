<?php
session_start();
define("security", "true");
if (isset($_SESSION["auth"]) and $_SESSION["authority"] == "0") {
    header("Location: sellerHome.php");
} else {
    require "libs/functions.php";
    require "libs/connection.php";
    $hata = "";
    if (isset($_POST["auth"]) and post("auth") == "0" and isset($_POST["g-recaptcha-response"])) {

        if (post("g-recaptcha-response") != "") {
            $username = post("USERNAME");
            $password = post("PASSWORD");
            $response = post("g-recaptcha-response");
            $result = reCapthca($response);
            if ($username != "" and $password != "") {
                $row = sellerLoginData($db, $username);
                if ($row) {
                    if ($row["USERNAME"] and password_verify($password, $row["PASSWORD"]) and $result["success"] == 1) {
                        setcookie("username", $username);
                        $_SESSION["auth"] = "seller";
                        $_SESSION["authority"] = "0";
                        $_SESSION["username"] = $username;
                        $_SESSION["LOGICALREF"] = $row["LOGICALREF"];
                        header("Location:sellerHome.php");
                    } else {
                        $hata = "<i class='fa-solid fa-triangle-exclamation'></i> Kullanıcı adı veya parola yanlış !";
                    }
                } else {
                    $hata = "<i class='fa-solid fa-triangle-exclamation'></i> Bu kullanıcı adına ait bir kayıt bulunmamaktadır !";
                }
            } else {
                $hata = "<i class='fa-solid fa-triangle-exclamation'></i> Formdaki tüm alanlar doldurulmalıdır.";
            }
        } else {
            $hata = "<i class='fa-solid fa-triangle-exclamation'></i> <b>Ben robot değilim</b> kutusunu işaretleyiniz";
        }
    }

    $title = "Giriş";
    require "view/header.php";

    require "view/loginView.php";

    require "view/footer.php";
}
