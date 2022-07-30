<?php 
    $access=3;
    require "security.php";
    require "libs/connection.php";
    require "libs/functions.php";

    if(isset($_POST["NEWUSERSUBMIT"]) and post("NEWUSERSUBMIT")=="1"){
        $username = post("USERNAME");
        $password = post("PASSWORD");
        $authority = post("AUTHORITY");
        if($username!="" and $password!="" and $authority !=""){
            $result = addNewUser($db,$username,$password,$authority);
            if($result==2){
                $adminUsername=$_SESSION["adminUsername"];
                $adminLogicalRef=$_SESSION["adminLOGICALREF"];
                $description=$adminUsername." tarafından ".$username." kullanıcısı eklendi !";
                addLogData($db,$adminLogicalRef,$adminUsername,$description);
                header("Location:adminUsers.php?alert=insert&logicalref=".$username);
            }
            else if($result==1){
                header("Location:adminUsers.php?alert=alreadyexists&logicalref=".$username);
            }
            else{
                header("Location:adminUsers.php?alert=error&logicalref=".$username);
            }
        }else{
            header("Location:adminUsers.php?alert=form&logicalref=0");
        }
        
    }
    if(isset($_POST["AUTHSUBMIT"]) and post("AUTHSUBMIT")){
        $authority = post("AUTHORITY");
        $logicalref = post("LOGICALREF");
        $result = changeAuthority($db,$logicalref,$authority);
        if($result and $authority!=""){
            $adminLogicalRef = $_SESSION["adminLOGICALREF"];
            $adminUsername = $_SESSION["adminUsername"];
            $username = getUsername($db,$logicalref,"user");
            $description = $adminUsername." tarafından ".$username." (".$logicalref.") kullanıcısının yetkisi $authority yapıldı !";
            addLogData($db,$adminLogicalRef,$adminUsername,$description);
            header("Location:adminUsers.php?alert=update&logicalref=$logicalref");
        }else{
            header("Location:adminUsers.php?alert=error&logicalref=$logicalref");
        }

    }


?>