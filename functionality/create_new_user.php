<?php
    include("connection.php");

    $email = $_POST["eml"];
    $password = $_POST["psw"];
    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO users (email, password, member_since)
    VALUES ('$email', '$password', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "1";
    } else {
        echo "0";
    }

    $conn->close();
?>