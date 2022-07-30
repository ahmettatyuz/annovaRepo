<?php 
/*
    admin fırsat düzenleme (ekleme) dosyasıdır.
    bu sayfanın gorunumu yoktur. form için çalışır, çalışması bittikten sonra yönlendirme yapar.

    calisma mantigi:
    post ile gelen verilen degiskenlere aktarilir.
    Fırsat ekleme fonksiyonu (addOpportunities) ile gerekli kontroller yapıldıktan sonra veritabanina yazdirilir.
*/
$access=1;
$alert="";

require "security.php";
require "libs/connection.php";
require "libs/functions.php";

if(isset($_POST["SUBMITTED"]) and post("SUBMITTED") =="1"){
    $sellerid=post("SELLERID");
    $title = post("TITLE");
    $content = post("CONTENT");
    $status =0;
    if($sellerid!="" and $title!="" and $content!=""){
        if(addOpportunities($db,$sellerid,$title,$content,$status)){
            $adminLogicalRef=$_SESSION["adminLOGICALREF"];
            $adminUsername=$_SESSION["adminUsername"];
            $sellerUsername=getUsername($db,$sellerid,"seller");
            $description= $adminUsername." tarafından ".$sellerUsername." (".$sellerid.") bayisine fırsat eklendi !";
            addLogData($db,$adminLogicalRef,$adminUsername,$description);
            header("Location: adminOpportunities.php?alert=opportunities&logicalref=".$title);
        }else{
            header("Location: adminOpportunities.php?alert=error&logicalref=".$title);
        }
    }else{
        header("Location: adminOpportunities.php?alert=form&logicalref=0");
    }
    
}


?>