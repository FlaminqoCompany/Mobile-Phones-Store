<?php
    include("connection.php");
    $query = "SELECT * FROM ads ORDER BY creation_date DESC LIMIT 3";
    $result = $conn->query($query);
    $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($arr);
?>