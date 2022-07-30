<?php 
/*
    admin anasayfasıdır.
    bu sayfanın gorunumunu degistirmek icin adminHomeView.php dosyasına gidilmelidir.


*/
    $access=1;
    $alert="";
    require "security.php";
    require "libs/connection.php";
    require "libs/functions.php";

    $title = "Admin Ana Sayfa";
    require "view/header.php";
    require "view/admin/navbar.php";
    require "view/admin/adminHomeView.php";
    require "view/footer.php";
