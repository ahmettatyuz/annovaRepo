<?php 
    require "libs/connection.php";  // veritabani baglantisi
    require "libs/functions.php";  // post ve get fonksiyonları

    $taxtype= post("TAXTYPE");

    $taxcode = post("TAXCODE");
    if(isset($_POST["NAMESURNAME"])){  //tuzel secilirse isim soyisim olmayacak dolayisiyla hata verebilir.
        $namesurname=post("NAMESURNAME"); // bu if blogu ile hatayı engelliyorum.
    }
    $descripton = post("DESCRIPTION");
    $mobile = POST("PHONE");

    $taxoffice=post("TAXOFFICE");
    $city = post("CITY");
    $address= post("ADDRESS");
    
    $username = post("USERNAME");
    $password = post("PASSWORD");
    $password = password_hash($password,PASSWORD_DEFAULT);

    $query = "INSERT INTO `seller`( `USERNAME`, `PASSWORD`, `ADDRESS`, `CITY`, `TAXCODE`, `TAXTYPE`, `TAXOFFICE`, `MOBILE`, `NAMESURNAME`, `DESCRIPTION`) VALUES ('$username','$password','$address','$city','$taxcode','$taxtype','$taxoffice','$mobile','$namesurname','$descripton')";

    $result = mysqli_query($connection,$query);


?>