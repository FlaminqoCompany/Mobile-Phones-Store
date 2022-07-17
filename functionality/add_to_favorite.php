<?php
    include("connection.php");
    session_start();

    if(isset($_SESSION["id"]) && isset($_SESSION["email"]) && isset($_SESSION["password"]) && isset($_POST["id"])){
        include("connection.php");
        $s_id = $_SESSION["id"];
        $s_email = $_SESSION["email"];
        $s_password = $_SESSION["password"];
        $ad_id = $_POST["id"];

        $sql = "SELECT id FROM favorite_ads WHERE id_user='$s_id' AND id_ad='$ad_id'";
        $res = $conn->query($sql);
        $deleted = 0;
        if($res->num_rows > 0) {
            if($_POST["action"] == "1"){
                $sql2 = "DELETE FROM favorite_ads WHERE id_user='$s_id' AND id_ad='$ad_id'";
                if($conn->query($sql2) === TRUE) {
                    echo "5";
                    $deleted = 1;
                }
            }
            else{
                echo "6";
            }
        }

        else if($_POST["action"] == "1" && $deleted != 1){
            $query = "SELECT id FROM users WHERE id='$s_id' AND email='$s_email' AND password='$s_password'";
            $result = $conn->query($query);
            if($result->num_rows > 0){
                $query2 = "SELECT id FROM ads WHERE id='$ad_id'";
                $result2 = $conn->query($query2);
                if($result2->num_rows > 0){
                    $query3 = "INSERT INTO favorite_ads(id_user, id_ad) VALUES('$s_id', '$ad_id')";
                    if($conn->query($query3) === TRUE) echo "1";
                }
                else echo "2";
            }
            else echo "3";
        }
    }
    else echo "4";
?>