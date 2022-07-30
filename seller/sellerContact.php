<?php
$access = 1;
$alert = "";
require "security.php";
require "libs/connection.php";
require "libs/functions.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$phpmailer = new PHPMailer();

if (isset($_POST["SUBMITTED"]) and post("SUBMITTED") == "1" and isset($_POST["g-recaptcha-response"])) {
    if (post("g-recaptcha-response") != "") {
        $kimden = post("EMAIL");
        $message = post("MESSAGE");
        $konu = post("KONU");
        $response = post("g-recaptcha-response");
        if ($kimden != "" and $message != "" and $konu != "" and $response != "") {
            $result = reCapthca($response);
            if ($result["success"]) {
                $alert = mailer2($phpmailer,"ahmettatyuz@gmail.com",$konu,$message);
            }
        } else {
            $alert = "Formdaki tüm alanlar doldurulmalıdır.";
        }
    } else {
        $alert = "<b>Ben robot değilim</b> kutusunu işaretleyiniz !";
    }
} else {
}

$title = "İletişim";
require "view/header.php";
require "view/seller/navbar.php";
require "view/seller/sellerContactView.php";
require "view/footer.php";
