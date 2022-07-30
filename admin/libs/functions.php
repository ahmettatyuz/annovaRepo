<?php 
/*
    Bu dosyada sitede kullanılan tüm fonksiyonlar bulunuyor.
*/

if (!defined("securityAdmin")) {
    die("Erişim Engellendi");
} ?>
<?php
function post($key)
{
    // post ile alınacak inputların filtrelenmesini saglayan fonksiyon
    return htmlspecialchars(strip_tags(trim($_POST[$key])));
}
function get($key) 
{
    // get ile alınacak inputların filtrelenmesini sağlayan fonksiyon
    return htmlspecialchars(strip_tags(trim($_GET[$key])));
}

function getSeller($db, $logicalref) 
{
    // logicalref degerine göre bayi bilgilerini getiren fonksiyon
    $query = $db->prepare("SELECT * FROM SELLER WHERE LOGICALREF=:logicalref");
    $query->bindParam(":logicalref", $logicalref);
    if ($query->execute() == 1) {
        return $query->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function getAllSellers($db) 
{
    // veritabanindan tum bayileri getiren fonksiyon
    $sellers = array();
    $query = $db->prepare("SELECT * FROM seller");
    $query->execute();
    if ($query->rowCount() > 0) {
        foreach ($query as $row) {
            array_push($sellers, $row);
        }
    }
    return $sellers;
}

function getAllUsers($db) 
{
    // veritabanindan tüm kullanicilari getiren fonksiyon
    $query = $db->prepare("SELECT * FROM user");
    if ($query->execute() == 1) {
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function getLogData($db) 
{
    // veritabanindan tum logları getiren fonksiyon
    $query = $db->prepare("SELECT * FROM `log` ORDER BY `log`.`DATE` DESC");
    if ($query->execute() == 1) {
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function adminLoginData($db, $adminUsername) 
{
    // admin girisi icin kullanici adina gore admin bilgisini getiren fonksiyon 
    $query = $db->prepare("SELECT * FROM user WHERE USERNAME=:username");
    $query->bindParam(":username", $adminUsername);
    if ($query->execute() == 1 and $query->rowCount() > 0) {
        return $query->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function getUsername($db, $logicalref,$tablename)
{
    // veritabanindan logicalref degerine gore username bilgisini getiren fonksiyon
    $query = $db->prepare("SELECT USERNAME FROM $tablename WHERE LOGICALREF=:logicalref");
    // $query->bindParam(":tablename",$tablename);
    $query->bindParam(":logicalref",$logicalref);
    if ($query->execute() == 1 and $query->rowCount() > 0) {
        return $query->fetch(PDO::FETCH_ASSOC)["USERNAME"];
    } else {
        return false;
    }
}

function addNewSeller($db, $username, $password)
{
    // veritabanina yeni bayi eklemeyi saglayan fonksiyon
    $query = $db->prepare("SELECT USERNAME FROM seller WHERE USERNAME=:username");
    $query->bindParam(":username", $username);
    if ($query->execute() == 1 and $query->rowCount() > 0) {
        return 1;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = $db->prepare("INSERT INTO `seller`(`USERNAME`, `PASSWORD`) VALUES (:username,:password)");
    $query->bindParam(":username", $username);
    $query->bindParam(":password", $password);
    if ($query->execute() == 1) {
        return 2;
    } else {
        return 0;
    }
}

function deleteSeller($db, $logicalref)
{
    // veritabanindan bayi silmeye yarayan fonksiyon
    $query = $db->prepare("DELETE FROM `seller` WHERE LOGICALREF=:logicalref");
    $query->bindParam(":logicalref", $logicalref);
    if ($query->execute() == 1) {
        return true;
    } else {
        return false;
    }
}

function addLogData($db, $adminLogicalRef, $adminUsername, $description)
{
    // veritabanina log bilgisi ekleyen fonksiyon
    $query = $db->prepare("INSERT INTO `log`(`ADMIN`, `ADMINUSERNAME`,`DESCRIPTION`) VALUES (:adminlogicalref,:adminusername,:description)");
    $query->bindParam(":adminlogicalref", $adminLogicalRef);
    $query->bindParam(":adminusername", $adminUsername);
    $query->bindParam(":description", $description);
    if ($query->execute() == 1) {
        return true;
    } else {
        return false;
    }
}

function sellerUpdate($db, $newUsername, $address, $city, $taxcode, $taxtype, $taxoffice, $mobile, $namesurname, $description, $logicalref)
{
    // veritabaninda bayi bilgisini guncelleyen fonksiyon
    $query = $db->prepare("UPDATE `seller` SET `USERNAME`=:newusername,`ADDRESS`=:address,`CITY`=:city,`TAXCODE`=:taxcode,`TAXTYPE`=:taxtype,`TAXOFFICE`=:taxoffice,`MOBILE`=:mobile,`NAMESURNAME`=:namesurname,`DESCRIPTION`=:description WHERE LOGICALREF= :logicalref");
    $query->bindParam(":newusername", $newUsername);
    $query->bindParam(":address", $address);
    $query->bindParam(":city", $city);
    $query->bindParam(":taxcode", $taxcode);
    $query->bindParam(":taxtype", $taxtype);
    $query->bindParam(":taxoffice", $taxoffice);
    $query->bindParam(":mobile", $mobile);
    $query->bindParam(":namesurname", $namesurname);
    $query->bindParam(":description", $description);
    $query->bindParam(":logicalref", $logicalref);

    if ($query->execute() == 1) {
        return true;
    } else {
        return false;
    }
}

function setSellerPassword($db, $newPassword, $logicalref)
{
    // veritabaninda bayi parolasini degistirmeye yarayan fonskiyon
    $query = $db->prepare("UPDATE `seller` SET `PASSWORD`=:password WHERE LOGICALREF=:logicalref");
    $query->bindParam(":password", $newPassword);
    $query->bindParam(":logicalref", $logicalref);
    if ($query->execute() == 1) {
        return true;
    } else {
        return false;
    }
}

function sellerActiveToggle($db, $logicalref, $value)
{
    // veritabaninda bayiyi aktifse pasif, pasifse aktif hale getiren fonksiyon
    $value = !$value;
    $query = $db->prepare("UPDATE `seller` SET `ACTIVE`=:value WHERE LOGICALREF=:logicalref");
    $query->bindParam(":logicalref", $logicalref);
    $query->bindParam(":value", $value);
    if ($query->execute() == 1) {
        return true;
    } else {
        return false;
    }
}

function createAlert($alertType, $parameter2="")
{
    // bildirim olusturmaya yarayan fonksiyon
    if ($alertType == "insert") {
        $alert = "<i class='fa-solid fa-circle-check'></i> <b>Ekleme</b> işlemi başarılı !(<b>" . $parameter2 . "</b>)";
    } else if ($alertType == "delete") {
        $alert = "<i class='fa-solid fa-circle-check'></i> <b>Silme</b> işlemi başarılı !(<b>" . $parameter2 . "</b>)";
    } else if ($alertType == "update") {
        $alert = "<i class='fa-solid fa-circle-check'></i> <b>Güncelleme</b> işlemi başarılı !(<b>" . $parameter2 . "</b>)";
    } else if ($alertType == "password") {
        $alert = "<i class='fa-solid fa-circle-check'></i> <b>Parola değiştirme</b> işlemi başarılı !(<b>" . $parameter2 . "</b>)";
    } else if ($alertType == "error") {
        $alert = "<i class='fa-solid fa-triangle-exclamation'></i> İşlem <b>başarısız</b> !(<b>" . $parameter2 . "</b>)";
    } else if ($alertType == "active") {
        $alert = "<i class='fa-solid fa-circle-check'></i> <b>Aktifleştirme</b> işlemi başarılı !(<b>" . $parameter2 . "</b>)";
    } else if ($alertType == "passive") {
        $alert = "<i class='fa-solid fa-circle-check'></i> <b>Pasifleştirme</b> işlemi başarılı !(<b>" . $parameter2 . "</b>)";
    } else if ($alertType == "licenced") {
        $alert = "<i class='fa-solid fa-circle-check'></i> <b>Lisans etkinleştirme</b> işlemi başarılı !(<b>" . $parameter2 . "</b>)";
    } else if ($alertType == "unlicenced") {
        $alert = "<i class='fa-solid fa-circle-check'></i> <b>Lisans kaldırma</b> işlemi başarılı !(<b>" . $parameter2 . "</b>)";
    }
    else if ($alertType == "form") {
        $alert = "<i class='fa-solid fa-triangle-exclamation'></i> Formdaki tüm alanlar doldurulmalıdır.";
    }
    else if ($alertType == "alreadyexists") {
        $alert = "<i class='fa-solid fa-triangle-exclamation'></i> Bu kullanıcı adına ait bir kayıt zaten var.";
    }
    else if ($alertType == "opportunities") {
        $alert = "<i class='fa-solid fa-circle-check'></i> <b>Fırsat ekleme</b> işlemi başarılı !";
    }
    return $alert;
}

function getUrl()
{
    // url veren fonksiyon
    return 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
}

function getAllLicences($db)
{
    // veritabanindan tum lisanslari getiren fonksiyon
    $query = $db->prepare("SELECT * FROM licence");
    if ($query->execute() == 1) {
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function licenceUpdate($db, $frm, $offical, $phone, $smsphone, $version, $videocontroller, $cpuid, $volumeserial, $users, $address, $city, $taxoffice, $taxcode, $macid, $sellerid, $licence, $adddate, $licencestart, $licenceexpire, $logicalno)
{
    // veritabaninda lisansi guncelleyen fonksiyon
    $query = $db->prepare("UPDATE `licence` SET `FRM`=:frm,`OFFICAL`=:offical,`PHONE`=:phone,`SMSPHONE`=:smsphone,`VERSION`=:version,`VIDEOCONTROLLER`=:videocontroller,`CPUID`=:cpuid,`VOLUMESERIAL`=:volumeserial,`USERS`=:users,`ADDRESS`=:address,`CITY`=:city,`TAXOFFICE`=:taxoffice,`TAXCODE`=:taxcode,`MACID`=:macid,`SELLERID`=:sellerid,`LICENCE`=:licence,`ADDDATE`=:adddate,`LICENCESTART`=:licencestart,`LICENCEEXPIRE`=:licenceexpire WHERE LOGICALNO=:logicalno");
    $query->bindParam(":frm", $frm);
    $query->bindParam(":offical", $offical);
    $query->bindParam(":phone", $phone);
    $query->bindParam(":smsphone", $smsphone);
    $query->bindParam(":version", $version);
    $query->bindParam(":videocontroller", $videocontroller);
    $query->bindParam(":cpuid", $cpuid);
    $query->bindParam(":volumeserial", $volumeserial);
    $query->bindParam(":users", $users);
    $query->bindParam(":address", $address);
    $query->bindParam(":city", $city);
    $query->bindParam(":taxoffice", $taxoffice);
    $query->bindParam(":taxcode", $taxcode);
    $query->bindParam(":macid", $macid);
    $query->bindParam(":sellerid", $sellerid);
    $query->bindParam(":licence", $licence);
    $query->bindParam(":adddate", $adddate);
    $query->bindParam(":licencestart", $licencestart);
    $query->bindParam(":licenceexpire", $licenceexpire);
    $query->bindParam(":logicalno", $logicalno);

    if ($query->execute() == 1) {
        return true;
    } else {
        return false;
    }
}

function getLicence($db, $logicalno)
{
    // veritabanindan logicalno degerine gore lisansi getiren fonksiyon
    $query = $db->prepare("SELECT * FROM licence WHERE LOGICALNO=:logicalno");
    $query->bindParam(":logicalno", $logicalno);
    if ($query->execute() == 1) {
        return $query->fetch(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function licenceToggle($db, $logicalno, $licenceValue)
{
    // veritabaninda lisansi aktifse pasif, pasifse aktif hale getiren fonksiyon
    $licenceValue = !$licenceValue;
    $query = $db->prepare("UPDATE `licence` SET `LICENCE`=:licencevalue WHERE LOGICALNO=:logicalno");
    $query->bindParam(":licencevalue", $licenceValue);
    $query->bindParam(":logicalno", $logicalno);
    if ($query->execute() == 1) {
        return true;
    } else {
        return false;
    }
}

function getCities($db)
{
    // veritabanindan tum sehirleri getiren fonksiyon
    $query = $db->prepare("SELECT * FROM `cities`");
    if ($query->execute() == 1) {
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function getTaxOffices($db)
{
    // veritabanindan tum vergi dairelerini getiren fonksiyon
    $query = $db->prepare("SELECT * FROM `taxoffices`");
    if ($query->execute() == 1) {
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return false;
    }
}

function getCityName($db, $code)
{
    // veritabanindan plakaya gore sehir adını veren fonksiyon
    if ($code != "") {
        $query = $db->prepare("SELECT NAME FROM cities WHERE CODE=:code");
        $query->bindParam(":code", $code);
        if ($query->execute() == 1) {
            return $query->fetch(PDO::FETCH_ASSOC)["NAME"];
        } else {
            return false;
        }
    } else {
        return "";
    }
}

function getTaxOfficeName($db, $code)
{
    // veritabanından koduna göre vergi dairesinin ismini veren fonksiyon
    if ($code != "") {
        $query = $db->prepare("SELECT NAME FROM taxoffices WHERE CODE=:code");
        $query->bindParam(":code", $code);
        if ($query->execute() == 1) {
            return $query->fetch(PDO::FETCH_ASSOC)["NAME"];
        } else {
            return false;
        }
    } else {
        return "";
    }
}

function addNewUser($db, $username, $password, $authority)
{
    // veritabanina yeni kullanici eklemeyi saglayan fonksiyon
    $query=$db->prepare("SELECT USERNAME FROM user WHERE USERNAME=:username");
    $query->bindParam(":username",$username);
    if($query->execute()==1 and $query->rowCount()>0){
        return 1;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = $db->prepare("INSERT INTO `user`(`USERNAME`, `PASSWORD`, `AUTHORITY`) VALUES (:username,:password,:authority)");
    $query->bindParam(":username", $username);
    $query->bindParam(":password", $password);
    $query->bindParam(":authority", $authority);
    if ($query->execute() == 1) {
        return 2;
    } else {
        return 0;
    }
}

// seller updated indexli
function findDifference($arrayUpdated,$array2,$filter=""){
    // guncelleme ekranında degistirilen verileri bulan fonksiyon
    $differences="";
    $i=0;

    if($filter=="seller"){
        unset($array2["LOGICALREF"]);
        unset($array2["PASSWORD"]);
        unset($array2["ACTIVE"]);
        $names=array("Kullanıcı Adı","Adres","Şehir","Vergi/Tc No","Vergi Tipi","Vergi Dairesi","Telefon","İsim Soyisim","Ünvan");
        foreach($array2 as $value){
            if(strval($value) != strval($arrayUpdated[$i])){
                $differences .= $names[$i]."-";
            }
            $i+=1;
        }
    }
    else if($filter == "licence"){
        unset($array2["LOGICALNO"]);
        $names = array("Firma Adı","Firma Yetkilisi","Telefon","SMS Telefon","Versiyon","Video Controller","CPUID","Volume Serial","USERS","Adres","Şehir","Vergi Dairesi","Vergi/TC No","MACID","Bayi ID","Lisans Durumu","ADDDATE","LICENCESTART","LICENCEEXPIRE");
        foreach($array2 as $value){
            if(strval($value) != strval($arrayUpdated[$i])){
                $differences .= $names[$i]."-";
            }
            $i+=1;
        }
    }  
    else if($filter=="user"){
        unset($array2["LOGICALREF"]);
        unset($array2["PASSWORD"]);
        $names = array("Kullanıcı Adı","Yetki Düzeyi");
        foreach($array2 as $value){
            if(strval($value) != strval($arrayUpdated[$i])){
                $differences .= $names[$i]."-";
            }
            $i+=1;
        }
    }  
    return trim($differences,"-");
}

function getAllSellersName($db){
    // veritabanindan tum bayi isimlerini getiren fonksiyon
    $query=$db->prepare("SELECT LOGICALREF,USERNAME FROM seller");
    if($query->execute()==1){
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

function getAllOpportunities($db){
    // veritabanindan tum firsatlari getiren fonksiyon
    $query=$db->prepare("SELECT * FROM opportunities");
    if($query->execute()==1){
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}

function addOpportunities($db,$sellerid,$title,$content,$status){
    // veritabanina firsat ekleyen fonksiyon
    $query=$db->prepare("INSERT INTO `opportunities`(`SELLERID`, `TITLE`, `CONTENT`, `STATUS`) VALUES (:sellerid,:title,:content,:status)");
    $query->bindParam(":sellerid",$sellerid);
    $query->bindParam(":title",$title);
    $query->bindParam(":content",$content);
    $query->bindParam(":status",$status);
    if($query->execute()==1){
        return true;
    }
    else{
        return false;
    }
}

function changeAuthority($db,$logicalref,$authority){
    // veritabaninda kullanicinin yetki düzeyini degistirmeye yarayan fonksiyon
    $query=$db->prepare("UPDATE `user` SET `AUTHORITY`=:authority WHERE LOGICALREF=:logicalref");
    $query->bindParam(":authority",$authority);
    $query->bindParam(":logicalref",$logicalref);
    if($query->execute()==1){
        return true;
    }else{
        return false;
    }
}

function updateUser($db,$username,$authority,$logicalref){
    // veritabaninda kullaniciyi guncelleyen fonksiyon
    $query=$db->prepare("UPDATE `user` SET `USERNAME`=:username,`AUTHORITY`=:authority WHERE LOGICALREF=:logicalref");
    $query->bindParam(":username",$username);
    $query->bindParam(":authority",$authority);
    $query->bindParam(":logicalref",$logicalref);
    if($query->execute()==1){
        return true;
    }else{
        return false;
    }
}

function getUser($db,$logicalref){
    // veritabaninda logical ref degerine gore kullaniciyi getiren fonksiyon
    $query=$db->prepare("SELECT * FROM user WHERE LOGICALREF=:logicalref");
    $query->bindParam(":logicalref",$logicalref);
    if($query->execute()==1){
        return $query->fetch(PDO::FETCH_ASSOC);
    }else{
        return false;
    }
}