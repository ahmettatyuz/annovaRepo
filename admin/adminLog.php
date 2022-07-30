<?php 
/*
    admin log sayfasıdır.
    bu sayfanın gorunumunu degistirmek icin adminLogView.php dosyasina gidilmelidir.

    calisma mantigi:
    $logs degiskenine tum loglar aktarılır.
    adminLogView.php dosyasında $log dizisi tabloya yazdırılır.
*/
    $access=1;
    $alert="";
    require "security.php";
    require "libs/functions.php";
    require "libs/connection.php";

    $logs = getLogData($db);

    $title="Log Tablosu";
    require "view/header.php";
    require "view/admin/navbar.php";
    require "view/admin/adminLogView.php";
    require "view/footer.php";


?>