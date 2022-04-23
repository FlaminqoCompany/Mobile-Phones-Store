<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    include("connection.php");
    session_start();
    $email = $_SESSION["email_value"];

    $verification_code = "";
    for($i = 0; $i < 5; $i++){
        $number = rand(0, 9);
        $verification_code .= $number;
    }

    $sql = "UPDATE users SET verification_code = '$verification_code' WHERE email='$email'";
    if($conn->query($sql) === TRUE) {
        require '../vendor/autoload.php';

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;                      
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                     
            $mail->SMTPAuth   = true;                                   
            $mail->Username   = 'teamflaminqo@gmail.com';                    
            $mail->Password   = 'flaminqocompany2022';                          
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
            $mail->Port       = 587;  

            $mail->setFrom('teamflaminqo@gmail.com', 'Team Flaminqo');    
            $mail->addAddress($email);

            $mail->isHTML(true);                               
            $mail->Subject = 'Your PhotoStore launch code';
            $mail->Body    = "
                <div style='width: 500px; height: 100px; display: block; margin: auto;'>
                    <h2 style='position:relative; top:50%; transform: translateY(-50%); color: rgb(39, 39, 39);'>
                        Here's your PhoneShop launch code, @".$email."
                    </h2>
                </div>
                <div style='width: 500px; height: 300px; display: block; margin: auto; border: 1px solid rgb(39, 39, 39); border-radius: 10px;'>
                    <p style='width: 80%; text-align: center; display: block; margin: auto; margin-top: 50px;'>Continue signing up for PhoneShop by entering the code below: </p>
                    <h1 style='text-align: center;'>".$verification_code."</h1>
                </div>
            ";
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
        }
        catch (Exception $e) {
            echo '2';
        }
    }
    else{
        echo '3';
    }


?>