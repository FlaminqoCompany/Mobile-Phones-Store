<?php
    include("connection.php");
    $sql = "SELECT * FROM ads";
    $result = $conn->query($sql);
    echo $result->num_rows;
?>