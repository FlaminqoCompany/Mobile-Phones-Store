<?php 
    include('connection.php');
    $id = $_POST["id"];
    $query = "select * from ads where id='$id'";
    $result = $conn->query($query);
    $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($arr);

?>