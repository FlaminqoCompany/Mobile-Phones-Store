<?php
    session_start();
    if(isset($_SESSION["id"]) && isset($_SESSION["email"]) && isset($_SESSION["password"])){
        include("connection.php");
        $s_id = $_SESSION["id"];
        $s_email = $_SESSION["email"];
        $s_password = $_SESSION["password"];
        $query = "SELECT profile_image FROM users WHERE id='$s_id' AND email='$s_email' AND password='$s_password'";
        $result = $conn->query($query);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $image = $row["profile_image"];
            }
            echo base64_encode($image);
        }
        else{
            echo "2";
        }
    }
    else{
        echo "3";
    }
?>