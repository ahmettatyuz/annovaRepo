<?php
$access = 2;
$alert = "";
require "security.php";
require "libs/connection.php";
require "libs/functions.php";
if (isset($_GET["logicalno"])) {
    $logicalno = $_GET["logicalno"];
    $licence = getLicence($db, $logicalno);
    $licenceUpdated=array();
    if (isset($_POST["SUBMITTED"]) and post("SUBMITTED") == "1") {
        $frm = post("FRM"); array_push($licenceUpdated,$frm);
        $offical = post("OFFICAL"); array_push($licenceUpdated,$offical);
        $phone = post("PHONE"); array_push($licenceUpdated,$phone);
        $smsphone = post("SMSPHONE"); array_push($licenceUpdated,$smsphone);
        $version = post("VERSION"); array_push($licenceUpdated,$version);
        $videocontroller = post("VIDEOCONTROLLER"); array_push($licenceUpdated,$videocontroller);
        $cpuid = post("CPUID"); array_push($licenceUpdated,$cpuid);
        $volumeserial = post("VOLUMESERIAL"); array_push($licenceUpdated,$volumeserial);
        $users = post("USERS"); array_push($licenceUpdated,$users);
        $address = post("ADDRESS"); array_push($licenceUpdated,$address);
        $city = post("CITY"); array_push($licenceUpdated,$city);
        $taxoffice = post("TAXOFFICE"); array_push($licenceUpdated,$taxoffice);
        $taxcode = post("TAXCODE"); array_push($licenceUpdated,$taxcode);
        $macid = post("MACID"); array_push($licenceUpdated,$macid);
        $sellerid = post("SELLERID"); array_push($licenceUpdated,$sellerid);
        $licenceVal = post("LICENCE"); array_push($licenceUpdated,$licenceVal);
        $adddate = post("ADDDATE"); array_push($licenceUpdated,$adddate);
        $licencestart = post("LICENCESTART"); array_push($licenceUpdated,$licencestart);
        $licenceexpire = post("LICENCEEXPIRE"); array_push($licenceUpdated,$licenceexpire);
        $update = licenceUpdate($db, $frm, $offical, $phone, $smsphone, $version, $videocontroller, $cpuid, $volumeserial, $users, $address, $city, $taxoffice, $taxcode, $macid, $sellerid, $licenceVal, $adddate, $licencestart, $licenceexpire, $logicalno);
        if ($update) {
            $differences = findDifference($licenceUpdated,$licence,"licence");
            $adminLogicalRef = $_SESSION["adminLOGICALREF"];
            $adminUsername = $_SESSION["adminUsername"];
            $description = $adminUsername." tarafından ".$logicalno." no'lu lisans güncellenmiştir !(".$differences.")";
            addLogData($db,$adminLogicalRef,$adminUsername,$description);
            header("Location:adminLicence.php?alert=update&logicalref=" . $logicalno);
        } else {
            header("Location:adminLicence.php?alert=error&logicalref=" . $logicalno);
        }
    }
}

if (isset($_POST["LICENCETOGGLE"]) and isset($_POST["LICENCEVALUE"])) {
    $logicalno = post("LICENCETOGGLE");
    $licenceValue = post("LICENCEVALUE");
    if (licenceToggle($db, $logicalno, $licenceValue)) {
        $adminLogicalRef = $_SESSION["adminLOGICALREF"];
        $adminUsername = $_SESSION["adminUsername"];
        $str = $licenceValue ? "kaldırıldı" : "etkinleştirildi";
        $description = $adminUsername . " tarafından " . $logicalno . " no'lu lisans " . $str . "!";
        addLogData($db, $adminLogicalRef, $adminUsername, $description);
        $str = $licenceValue ? "unlicenced" : "licenced";
        header("Location:adminLicence.php?alert=" . $str . "&logicalref=" . $logicalno);
    } else {
        header("Location:adminLicence.php?alert=error&logicalref=" . $logicalno);
    }
}

$title = "Lisans Düzenle";
require "view/header.php";
require "view/admin/navbar.php";
require "view/admin/adminLicenceUpdateView.php";
require "view/footer.php";
