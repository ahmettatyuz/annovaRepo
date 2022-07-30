<?php 
/*
    admin analiz sayfası
    bu sayfanın gorunumu degistirmek icin adminAnalysisView.php dosyasına gidilmelidir.

*/
    $access=2;
    $alert="";
    require "security.php";
    require "libs/functions.php";
    require "libs/connection.php";
    
    
    $title= "Analiz";
    require "view/header.php";
    require "view/admin/navbar.php";
    require "view/admin/adminAnalysisView.php";
    require "view/footer.php";
