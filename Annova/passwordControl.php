<?php 
    require "libs/connection.php";
    require "libs/functions.php";
    $title = "Parola Kontrol";
    require "view/header.php";
    require "view/registerPasswordView.php";
    if(isset($_POST["submitted"])){
        $password = post("PASSWORD");
        // veritabanındaki şifrelerle karşılaştır eğer şifre varsa index phpye yönlendir.
    }

    // parolayı kontrol et
    // doğruysa index'e yönlendir.
    // güvenlik ekle : index htmlye önceden(url çubuğundan) erişilemesin
    require "view/footer.php";  
?>