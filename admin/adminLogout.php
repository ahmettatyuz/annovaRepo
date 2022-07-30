<?php 
/*
    admin cikis sayfasidir
    bu dosyanin gorunumu yoktur.
    
    calisma mantigi:
    SESSION'daki giris bilgileri silinir. Dolayisiyla cikis yapilmis olur. Son olarak login sayfasina yonlendirilir.
*/
session_start();
unset($_SESSION["authAdmin"]);
unset($_SESSION["adminAuthority"]);
unset($_SESSION["adminUsername"]);
unset($_SESSION["adminLOGICALREF"]);
setcookie("adminUsername","",time()-36000);
header("Location: adminLogin.php");

?>