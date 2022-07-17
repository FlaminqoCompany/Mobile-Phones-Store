<?php
    $eml = $_POST["email"];
    $psw = $_POST["password"];

    include("connection.php");
    
    $sql = "SELECT * FROM users WHERE email='$eml'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $pass = $row["password"];
            $id = $row["id"];
        }
        if($pass == $psw){
            session_start();
            $_SESSION["email"] = $eml;
            $_SESSION["password"] = $pass;
            $_SESSION["id"] = $id;
            setcookie("user_id", $id, time() + 2 * 24 * 60 * 60);
            echo "1";
        }
        else{
            echo "2";
        }
    }
    else{
        echo "3";
    }
?>