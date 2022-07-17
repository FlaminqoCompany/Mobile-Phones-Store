<?php
    include("connection.php");
    session_start();
    if(isset($_SESSION["id"]) && isset($_SESSION["email"]) && isset($_SESSION["password"])){
        $u_id = $_SESSION["id"];
        $query = "SELECT * FROM ads WHERE id IN (SELECT id_ad FROM favorite_ads WHERE id_user='$u_id')";
        $result = $conn->query($query);
        $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($arr);
    }
    else echo "1";
?>