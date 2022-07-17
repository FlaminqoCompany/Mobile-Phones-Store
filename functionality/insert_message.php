<?php
    include("connection.php");
    session_start();
    if(isset($_SESSION["email"]) && isset($_SESSION["password"]) && isset($_SESSION["id"])){
        $my_id = $_SESSION["id"];
        $creator_id = $_POST["creator_id"];
        $message_value = $_POST["message_value"];

        $sql1 = "SELECT * FROM messages_main WHERE from_id='$my_id' AND to_id='$creator_id'";
        $result1 = $conn->query($sql1);
        if($result1->num_rows > 0){
            while($row1 = $result1->fetch_assoc())
                $table_name = $row1["table_name"];
            $dtme = date('Y-m-d H:i:s');
            $sql2 = "INSERT INTO $table_name(from_id, to_id, message, dateandtime) VALUES('$my_id', '$creator_id', '$message_value', '$dtme')";
            if($conn->query($sql2) === TRUE) echo 1;
            else echo 2;
        }
        else{
            $ad_id = $_POST["ad_id"];
            $table_name = $my_id . "_" . $creator_id . "_" . $ad_id . "_messages";
            $sql3 = "CREATE TABLE $table_name(id int NOT NULL AUTO_INCREMENT,from_id int,to_id int,message text,dateandtime datetime, PRIMARY KEY (id))";
            if($conn->query($sql3) === TRUE){
                $dtme = date('Y-m-d H:i:s');
                $sql4 = "INSERT INTO $table_name(from_id, to_id, message, dateandtime) VALUES('$my_id', '$creator_id', '$message_value', '$dtme')";
                if($conn->query($sql4) === TRUE) {
                    $sql5 = "SELECT title from ads WHERE id='$ad_id'";
                    $result2 = $conn->query($sql5);
                    if($result2->num_rows > 0){
                        while($row2 = $result2->fetch_assoc())
                            $ad_title = $row2["title"];
                        $sql6 = "INSERT INTO messages_main(from_id, to_id, table_name, ad_title, ad_id) VALUES ('$my_id', '$creator_id', '$table_name', '$ad_title', '$ad_id')";
                        if($conn->query($sql6) === TRUE) echo 1;
                        else echo 2;
                    }
                }
                else echo 3;
            }
        }
    }
    else echo 0;
?>