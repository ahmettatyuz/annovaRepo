<?php 
    $access=1;
    require "security.php";
    require "libs/connection.php";
    require "libs/functions.php";

    if(isset($_POST["NEWSELLER"]) and $_POST["NEWSELLER"]=="1"){
        $username = post("USERNAME");
        $password = post("PASSWORD");
        if($username!="" and $password!=""){
            $result = addNewSeller($db,$username,$password);
            if($result==2){
                $adminUsername = $_SESSION["adminUsername"];
                $adminLogicalRef = $_SESSION["adminLOGICALREF"];
                $description = $adminUsername." tarafından ".$username." bayisi eklendi !";
                addLogData($db,$adminLogicalRef,$adminUsername,$description);
                header("Location:adminSellers.php?alert=insert&logicalref=".$username);
            }
            else if($result==1){
                header("Location:adminSellers.php?alert=alreadyexists&logicalref=".$username);
            }
            else{
                header("Location:adminSellers.php?alert=error&logicalref=".$username);
            }
        }else{
            header("Location:adminSellers.php?alert=form&logicalref=".$username);
        }
        
    }
    else if(isset($_POST["DELETEBTN"])){
        $sellerlogicalref=post("DELETESELLER");
        if($sellerlogicalref!=""){
            $sellerUsername = getUsername($db,$sellerlogicalref,"seller");
        }
        if(deleteSeller($db,$sellerlogicalref)){
            $adminUsername = $_SESSION["adminUsername"];
            $adminLogicalRef = $_SESSION["adminLOGICALREF"];
            $description = $adminUsername." tarafından ".$sellerUsername." (".$sellerlogicalref.") bayisi silindi !";
            addLogData($db,$adminLogicalRef,$adminUsername,$description);
            header("Location:adminSellers.php?alert=delete&logicalref=".$sellerlogicalref);
        }else{
            header("Location:adminSellers.php?alert=error&logicalref=".$sellerlogicalref);
        }
    }
    else if(isset($_POST["ACTIVEBTN"])){
        $sellerActiveValue = post("ACTIVE");
        $sellerLogicalRef = post("ACTIVESELLER");
        $sellerUsername = getUsername($db,$sellerLogicalRef,"seller");
        if(sellerActiveToggle($db,$sellerLogicalRef,$sellerActiveValue)){
            $adminUsername = $_SESSION["adminUsername"];
            $adminLogicalRef = $_SESSION["adminLOGICALREF"];
            $str = $sellerActiveValue ? "pasifleştirildi":"aktifleştirildi";
            $description = $adminUsername." tarafından ".$sellerUsername." (".$sellerLogicalRef.") bayisi ". $str."!";
            addLogData($db,$adminLogicalRef,$adminUsername,$description);
            $str = $sellerActiveValue ? "passive":"active";
            header("Location:adminSellers.php?alert=".$str."&logicalref=".$sellerLogicalRef);
        }else{
            header("Location:adminSellers.php?alert=error&logicalref=".$sellerLogicalRef);
        }
    }
    else{
        header("Location:adminSellers.php");
    }
    

?>