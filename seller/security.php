<?php 
    // eger giriş yapılmadıysa index.php ye yönlendirecek
    // giris olmadan erisilmesi yasak olan sayfalar icin
    session_start();
    define("security","true");
    if(!isset($_SESSION["auth"])){
        header("Location: sellerAccessDenied.php");
    }

    // if(!isset($_SESSION["auth"])){
    //     header("Location:index.php");
    // }

    // if($_SESSION["auth"]){
    //     $authority = (int) $_SESSION["authority"];
    //     if($_SESSION["auth"]=="admin"){
    //         if($authority < $access || $access==0){
    //             header("Location:adminHome.php");
    //         }
    //     }
    //     else if($_SESSION["auth"]=="seller"){
    //         if($authority < $access){
    //             header("Location:sellerHome.php");
    //         }
    //     }
    // }
    // else{
    //     header("Location:index.php");
    // }
?>