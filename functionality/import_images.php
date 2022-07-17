<?php
    include "connection.php";
    session_start();
    mkdir($_SESSION["folder_name"]);
    $br = 0;
    $dir = $_SESSION["folder_name"] . '/';
    while(isset($_FILES["image".$br])){
        move_uploaded_file($_FILES["image".$br]["tmp_name"], $dir. $_FILES["image".$br]["name"]);
        $br++;
    }
    echo "1";
?>