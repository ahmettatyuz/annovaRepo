<?php 
    $access=3;
    $alert="";
    require "security.php";
    require "libs/connection.php";
    require "libs/functions.php";


    $users = getAllUsers($db);
    $title="Kullanıcılar";
    require "view/header.php";
    require "view/admin/navbar.php";
    require "view/admin/adminUsersView.php";
    require "view/footer.php";

?>