<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $to_email = $_POST["eml"];

    $verification_code = "";
    for($i = 0; $i < 5; $i++){
        $number = rand(0, 9);
        $verification_code .= $number;
    }

    include("connection.php");

    $password = $_POST["psw"];
    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO users (email, password, member_since, verification_code)
    VALUES ('$to_email', '$password', '$date', $verification_code)";

    if ($conn->query($sql) === TRUE) {
        $mail->SMTPDebug = 0;                      
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'teamflaminqo@gmail.com';                    
        $mail->Password   = 'flaminqocompany2022';                          
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
        $mail->Port       = 587;  

        $mail->setFrom('teamflaminqo@gmail.com', 'Team Flaminqo');    
        $mail->addAddress($to_email);

        $mail->isHTML(true);                               
        $mail->Subject = 'Your PhotoStore launch code';
        $mail->Body    = "
            <div style='width: 500px; height: 100px; display: block; margin: auto;'>
                <h2 style='position:relative; top:50%; transform: translateY(-50%); color: rgb(39, 39, 39);'>
                    Here's your PhoneShop launch code, @".$to_email."
                </h2>
            </div>
            <div style='width: 500px; height: 300px; display: block; margin: auto; border: 1px solid rgb(39, 39, 39); border-radius: 10px;'>
                <p style='width: 80%; text-align: center; display: block; margin: auto; margin-top: 50px;'>Continue signing up for PhoneShop by entering the code below: </p>
                <h1 style='text-align: center;'>".$verification_code."</h1>
            </div>
        ";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

        session_start();
        
        $_SESSION["email_value"] = $to_email;

        echo '1';
    } else {
        echo "0";
    }

    
} catch (Exception $e) {
    echo '2';
}