<?php
    include('connection.php');
    $id = $_POST["id"];

    $query = "select users.id, users.name, users.surname from users inner join ads on users.id = ads.id_user where ads.id='$id'";
    $result = $conn->query($query);

    /*while($row = $result->fetch_assoc()){
        $name = $row["name"];
        $surname = $row["surname"];
    }

    echo $name;
    */
    $datas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($datas);
?>