<?php
    include("connection.php");
    session_start();
    if(isset($_SESSION["email"]) && isset($_SESSION["password"]) && isset($_SESSION["id"])){
        $my_id = $_SESSION["id"];
        $sql1 = "SELECT messages_main.ad_id, messages_main.ad_title, messages_main.from_id, users.name, users.surname
                 FROM messages_main INNER JOIN users ON messages_main.from_id=users.id WHERE to_id='$my_id' AND from_id!='$my_id'";
        $result = $conn->query($sql1);
        $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($arr);
    }
?>