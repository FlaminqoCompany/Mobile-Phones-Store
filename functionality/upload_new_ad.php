<?php
    include("connection.php");

    $category = $_POST["category"];
    $brand = $_POST["brand"];
    $model = $_POST["model"];
    $title = $_POST["title"];
    $phone_number = $_POST["phone_number"];
    $state = $_POST["state"];
    $description = $_POST["description"];
    $notes = $_POST["notes"];
    $price = $_POST["price"];

    session_start();
    $id_user = $_SESSION["id"];

    $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $random_name = generate_string($permitted_chars, 20);
    $random_name_generated = $random_name;

    $sql = "INSERT INTO ads(id_user, category, brand, model, title, phone_number, state, description, notes, price, images) 
                            VALUES
                            ('$id_user', '$category', '$brand', '$model', '$title', '$phone_number', '$state', '$description', '$notes', '$price', '$random_name_generated')";

    if($conn->query($sql) === TRUE){
        $_SESSION["folder_name"] = $random_name_generated;
        echo 1;
    }
    else echo 2;
 
    function generate_string($input, $strength = 16) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
    
        return $random_string;
    }
?>