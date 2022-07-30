<?php 
/*
    admin header kısmının gorunumu
*/

if (!defined("securityAdmin")) {
    die("Erişim engellendi
    <a href='adminLogout.php'>Admin Girişi</a>");
} ?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require "cdn.php" ?>
    <title><?php echo $title; ?></title>
</head>

<body class="bg-light" style="overflow-y: scroll;">

    <?php
    if (isset($_SESSION["auth"]) and $_SESSION["adminUsername"] != "admin") {
        $user = adminLoginData($db, $_SESSION["adminUsername"]);
        $_SESSION["adminAuthority"] = $user["AUTHORITY"];
    }

    ?>
    <!-- siderbar için gerekli -->

    <!-- <div class="container-fluid overflow-hidden">
        <div class="row vh-100 overflow-auto"> -->