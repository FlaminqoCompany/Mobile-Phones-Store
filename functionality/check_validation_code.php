<?php
    include("connection.php");

    $first = $_POST["one"];
    $second = $_POST["two"];
    $third = $_POST["three"];
    $forth = $_POST["four"];
    $fifth = $_POST["five"];

    session_start();
    $email_value = $_SESSION["email_value"];

    $sql = "SELECT verification_code FROM users WHERE email='$email_value'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $verificaiton_code = $row["verification_code"];
        }
    }

    $verificaiton_code_string = "";
    $verificaiton_code_string .= strval($first);
    $verificaiton_code_string .= strval($second);
    $verificaiton_code_string .= strval($third);
    $verificaiton_code_string .= strval($forth);
    $verificaiton_code_string .= strval($fifth);

    echo $verificaiton_code_string;

    if($verificaiton_code == $verificaiton_code_string){
        $sql2 = "UPDATE users SET verified = 1 WHERE email='$email_value'";
        if($conn->query($sql2) === TRUE)
            echo '1';
        else
            echo '2';
    }
    else{
        echo '3';
    }
?>