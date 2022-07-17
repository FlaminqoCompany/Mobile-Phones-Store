<?php
    include("connection.php");
    session_start();
    if(isset($_SESSION["email"]) && isset($_SESSION["password"]) && isset($_SESSION["id"])){
        $my_id = $_SESSION["id"];
        $sql1 = "SELECT ad_id FROM messages_main WHERE from_id='$my_id'";
        $result1 = $conn->query($sql1);
        if($result1->num_rows > 0){
            $sql2 = "SELECT ads.id, ads.title, users.id as usrid, users.name, users.surname FROM ads INNER JOIN users 
                     ON ads.id_user=users.id AND users.id != '$my_id' WHERE ads.id IN(0";
            while($row1 = $result1->fetch_assoc())
                $sql2 .= (", " . $row1["ad_id"]);
            $sql2 .= ")";
            $result = $conn->query($sql2);
            $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
            echo json_encode($arr);
        }
        else echo 1;
    }
?>