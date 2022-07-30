<?php if(!defined("security")){die("Erişim Engellendi");} ?>
<?php
function post($key)
{
    return htmlspecialchars(strip_tags(trim($_POST[$key]))) ;
}
function get($key)
{
    return $_GET[$key];
}

function getSeller($db, $logicalref)
{
    $query=$db->prepare("SELECT * FROM SELLER WHERE LOGICALREF=:logicalref");
    $query->bindParam(":logicalref",$logicalref);
    if($query->execute()==1){
        $rows = $query->fetch(PDO::FETCH_ASSOC);
        return $rows;
    }else{
        return false;
    }
}

function sellerUpdate($db,$newUsername,$address,$city,$taxcode,$taxtype,$taxoffice,$mobile,$namesurname,$description,$logicalref){
    $query = $db->prepare("UPDATE `seller` SET `USERNAME`=:newusername,`ADDRESS`=:address,`CITY`=:city,`TAXCODE`=:taxcode,`TAXTYPE`=:taxtype,`TAXOFFICE`=:taxoffice,`MOBILE`=:mobile,`NAMESURNAME`=:namesurname,`DESCRIPTION`=:description WHERE LOGICALREF= :logicalref");
    $query->bindParam(":newusername",$newUsername);
    $query->bindParam(":address",$address);
    $query->bindParam(":city",$city);
    $query->bindParam(":taxcode",$taxcode);
    $query->bindParam(":taxtype",$taxtype);
    $query->bindParam(":taxoffice",$taxoffice);
    $query->bindParam(":mobile",$mobile);
    $query->bindParam(":namesurname",$namesurname);
    $query->bindParam(":description",$description);
    $query->bindParam(":logicalref",$logicalref);

    if($query->execute()==1){
        return true;
    }else{
        return false;
    }
}

function setSellerPassword($db,$newPassword,$logicalref){
    $query = $db->prepare("UPDATE `seller` SET `PASSWORD`=:password WHERE LOGICALREF=:logicalref");
    $query->bindParam(":password",$newPassword);
    $query->bindParam(":logicalref",$logicalref);
    if($query->execute()==1){
        return true;
    }
    else{
        return false;
    }
}

function sellerLoginData($db,$username){
    $query = $db->prepare("SELECT LOGICALREF,USERNAME,PASSWORD FROM seller WHERE USERNAME=:username");
    $query->bindParam(":username",$username);
    if($query->execute()==1 && $query->rowCount()>0){
        return $query->fetch(PDO::FETCH_ASSOC);
    }else{
        return false;
    }
}


function createAlert($alertType)
{
    if ($alertType == "update") {
        $alert = "<i class='fa-solid fa-circle-check'></i> Bilgileriniz başarıyla <b>güncellendi </b>!";
    } else if ($alertType == "password") {
        $alert = "<i class='fa-solid fa-circle-check'></i> Parola başarıyla <b>değiştirildi </b>!";
    } else if ($alertType == "error") {
        $alert = "<i class='fa-solid fa-triangle-exclamation'></i> <b>İşlem başarısız !</b>";
    }else if($alertType == "opportunity"){
        $alert = "<i class='fa-solid fa-circle-check'></i> Fırsat başarıyla <b>güncellendi </b>!";
    }
    else if($alertType == "contact"){
        $alert = "<i class='fa-solid fa-circle-check'></i> Mesaj başarıyla <b>iletildi </b>!";
    }
    else if($alertType == "captcha"){
        $alert = "<i class='fa-solid fa-circle-check'></i> <b>Ben robot değilim</b> kutusunu işaretleyiniz";
    }
    return $alert;
}

function getSales($db,$logicalref){
    $query=$db->prepare("SELECT `FRM`, `OFFICAL`, `PHONE`, `SMSPHONE`, `VERSION`, `USERS`, `ADDRESS`, `CITY`, `TAXOFFICE`, `TAXCODE`, `LICENCE`, `ADDDATE`, `LICENCESTART`, `LICENCEEXPIRE` FROM `licence` WHERE SELLERID=:logicalref");
    $query->bindParam(":logicalref",$logicalref);
    if($query->execute()==1){
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }else{
        return false;
    }
}

function getCities($db){
    $query=$db->prepare("SELECT * FROM `cities`");
    if($query->execute()==1){
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }else{
        return false;
    }
}
function getTaxOffices($db){
    $query=$db->prepare("SELECT * FROM `taxoffices`");
    if($query->execute()==1){
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }else{
        return false;
    }
}

function getCityName($db,$code){
    if($code!=""){
        $query=$db->prepare("SELECT NAME FROM cities WHERE CODE=:code");
        $query->bindParam(":code",$code);
        if($query->execute()==1){
            return $query->fetch(PDO::FETCH_ASSOC)["NAME"];
        }else{
            return false;
        }
    }else{
        return "";
    }
}

function getTaxOfficeName($db,$code){
    if($code!=""){
        $query=$db->prepare("SELECT NAME FROM taxoffices WHERE CODE=:code");
        $query->bindParam(":code",$code);
        if($query->execute()==1){
            return $query->fetch(PDO::FETCH_ASSOC)["NAME"];
        }else{
            return false;
        }
    }else{
        return "";
    }
}

function getOpportunities($db,$sellerid){
    $query=$db->prepare("SELECT * FROM `opportunities` WHERE SELLERID=:sellerid");
    $query->bindParam(":sellerid",$sellerid);
    if($query->execute()==1){
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }else{
        return false;
    }
}

function sellerOpportunityUpdate($db,$logicalno,$status,$sellerid){
    $query=$db->prepare("UPDATE `opportunities` SET `STATUS`=:status WHERE LOGICALNO=:logicalno AND SELLERID=:sellerid");
    $query->bindParam(":status",$status);
    $query->bindParam(":logicalno",$logicalno);
    $query->bindParam(":sellerid",$sellerid);
    if($query->execute()==1){
        return true;
    }else{
        return false;
    }
}

function reCapthca($response)
{
    $secret = "6LfzBiQhAAAAAHpGF25TQuuiROQeqH7hF-zAvipT";
    $remoteip = $_SERVER["REMOTE_ADDR"];
    $result = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");

    return json_decode($result, true);
}


function mailer($kime,$kimden,$konu,$mesaj){
    $kimden = 'From: '.$kimden."\r\n" .
    'Reply-To: reply@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $result = mail($kime,$konu,$mesaj,$kimden);
    if($result){
        return "Mail Başarılı";
    }else{
        return "Mail başarısız";
    }
    
}

function mailer2($mail,$kime,$subject,$body){
    $mail->isSMTP();
    $mail->SMTPKeepAlive = true;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls'; //ssl
    
    $mail->Port = 587; //25 , 465 , 587
    $mail->Host = "smtp.yandex.com";
    
    $mail->Username = "atatyuz@yandex.com";
    $mail->Password = "Tatyuz51+";
    
    
    $mail->setFrom("atatyuz@yandex.com");
    $mail->addAddress($kime);
    
    
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;
    
    
    if ($mail->send())
        return "Mail başarıyla gönderildi !";
    else
        return "Mail gönderimi başarısız !";
}