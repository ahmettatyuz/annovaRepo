<?php
$access = 3;
$alert = "";
require "security.php";
require "libs/connection.php";
require "libs/functions.php";


$authority = "";
$logicalref = get("logicalref");
$user = getUser($db, $logicalref);

if (isset($_POST["SUBMITTED"]) and post("SUBMITTED")) {
    $userUpdated=array();
    $newusername = post("USERNAME");
    $authority = post("AUTHORITY");
    array_push($userUpdated,$newusername);
    array_push($userUpdated,$authority);
    $result = updateUser($db, $newusername, $authority, $logicalref);
    if ($result) {
        $differences = findDifference($userUpdated,$user,"user");
        $adminLogicalref = $_SESSION["adminLOGICALREF"];
        $adminUsername = $_SESSION["adminUsername"];
        $description = $adminUsername." tarafından ".$newusername." (".$logicalref.") kullanıcısı düzenlendi ! ($differences)";
        addLogData($db,$adminLogicalref,$adminUsername,$description);
        header("Location:adminUsers.php?alert=update&logicalref=" . $logicalref);
    } else {
        $alert = "hata";
    }
}

$title = "Kullanıcı Düzenle";
require "view/header.php";
require "view/admin/navbar.php";
require "view/admin/adminUsersUpdateView.php";
require "view/footer.php";
