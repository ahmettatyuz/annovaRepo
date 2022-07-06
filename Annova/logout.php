<?php 
    session_start();
    session_destroy();
    setcookie("username","",time()-36000);
    header("Location:index.php");
?>