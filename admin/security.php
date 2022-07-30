<?php 
    // eger giriş yapılmadıysa index.php ye yönlendirecek
    // giris olmadan erisilmesi yasak olan sayfalar icin
    // session_set_cookie_params(null,"/","localhost",false,true);
    session_start();
    define("securityAdmin","true");
    if(!isset($_SESSION["authAdmin"])){
        header("Location: adminAccessDenied.php");
    }
    $adminAuthority=$_SESSION["adminAuthority"];
    if($adminAuthority < $access){
        header("Location: adminAccessDenied.php");
    }
    
?>