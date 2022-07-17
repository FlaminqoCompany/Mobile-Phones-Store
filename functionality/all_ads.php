<?php
    include("connection.php");
    $start = $_POST["start"];
    $end = $_POST["end"];
    $sql = "UPDATE ads SET favorites_count = (SELECT COUNT(id) FROM favorite_ads WHERE id_ad = ads.id)";
    if($conn->query($sql) === TRUE){
        $query = "SELECT * FROM ads ORDER BY creation_date LIMIT $start, $end";
        $result = $conn->query($query);
        if($result->num_rows > 0){
            $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
            echo json_encode($arr);
        }
    }
    
?>