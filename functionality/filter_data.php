<?php
    include("connection.php");
    $model = json_decode(stripslashes($_POST['model']));
    $brand = $_POST["brand"];
    $maxprice = $_POST["maxprice"];
    $state = $_POST["state"];
    
    $upit = "SELECT * FROM ads WHERE";
    if($brand!= "")
        $upit .= " brand='$brand'";
    if(!empty($model)){
        $upit .= " AND model IN('$model[0]'";
        foreach($model as $m)
            $upit .= ", '$m'";
        $upit .= ")";
    }
    if($maxprice)
        $upit .= " AND price <='$maxprice'";
    if($state != "10")
        $upit .= " AND state='$state'";
    $upit .= " ORDER BY creation_date DESC";

    $result = $conn->query($upit);
    if($result->num_rows > 0){
        $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($arr);
    }
?>