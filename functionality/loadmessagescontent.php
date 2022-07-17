<?php
    include("connection.php");
    session_start();
    if(isset($_SESSION["email"]) && isset($_SESSION["password"]) && isset($_SESSION["id"])){
        $my_id = $_SESSION["id"];
        $ad_id = $_POST["ad_id"];
        $guess_id = $_POST["guess_id"];
        $action = $_POST["action"];

        if($action == 1)
            $table_name = $my_id . "_" . $guess_id . "_" . $ad_id . "_messages";
        else
            $table_name = $guess_id . "_" . $my_id . "_" . $ad_id . "_messages";
        
        $sql1 = "SELECT * FROM $table_name ORDER BY dateandtime ASC";
        $result = $conn->query($sql1);
        if($result->num_rows > 0){
            $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
            echo json_encode($arr);
        }
        else{
            echo "Nema poruka";
        }
    }
?>