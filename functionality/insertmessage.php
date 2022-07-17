<?php
    include("connection.php");
    session_start();
    if(isset($_SESSION["email"]) && isset($_SESSION["password"]) && isset($_SESSION["id"])){
        $my_id = $_SESSION["id"];
        $ad_id = $_POST["ad_id"];
        $guess_id = $_POST["guess_id"];
        $message = $_POST["message"];
        $dtme = date('Y-m-d H:i:s');
        
        try {
            $table_name = $my_id . "_" . $guess_id . "_" . $ad_id . "_messages";
            $sql2 = "INSERT INTO $table_name(from_id, to_id, message, dateandtime)
            VALUES('$my_id', '$guess_id', '$message', '$dtme')";
            if($conn->query($sql2) === TRUE) echo 1;
            else echo 2;
        } catch (Exception $e) {
            $table_name = $guess_id . "_" . $my_id . "_" . $ad_id . "_messages";
            $sql2 = "INSERT INTO $table_name(from_id, to_id, message, dateandtime)
            VALUES('$my_id', '$guess_id', '$message', '$dtme')";
            if($conn->query($sql2) === TRUE) echo 1;
            else echo 2;
        }
    }
?>