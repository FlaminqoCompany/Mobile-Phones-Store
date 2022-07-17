<?php
    include("connection.php");
    $id = $_POST["id"];
    $sql = "SELECT id FROM favorite_ads WHERE id_ad='$id'";
    $result = $conn->query($sql);
    echo $result->num_rows;
?>