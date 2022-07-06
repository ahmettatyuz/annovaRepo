<?php 
    session_start();

    require "libs/connection.php";
    require "libs/functions.php";

    $username = post("USERNAME");
    $password = post("PASSWORD");

    $query= "SELECT USERNAME,PASSWORD FROM seller";
    $result = mysqli_query($connection,$query);
    $login=0;
    while($row = mysqli_fetch_assoc($result)){
        if($row["USERNAME"] ==  $username and password_verify($password,$row["PASSWORD"])){
            setcookie("username",$username);
            $_SESSION["auth"]=1;
            $login=1;
            header("Location:mainpage.php");
        }
    }
    if($login==0){
        header("Location:index.php");
    }


?>