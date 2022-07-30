<?php
/*
Bu dosyada veritabanı bağlantısı yapılıyor.
*/

if(!defined("securityAdmin")){die("Erişim Engellendi");} ?>
<?php 
try{
    $db = new PDO("mysql:host=localhost;dbname=annova;charset=utf8","root","");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $dberror){
    $hata = $dberror->getMessage();
}

$connection = mysqli_connect("localhost","root","","annova");