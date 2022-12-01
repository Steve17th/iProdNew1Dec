<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require './src/Exception.php';
    require './src/PHPMailer.php';
    require './src/SMTP.php';

    try{
    $mail = new PHPMailer(true);
    $mail -> isSMTP();
    $mail -> SMTPAuth = true;
    $mail -> SMTPSecure = 'tls';
    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    $mail -> Host = 'smtp.gmail.com';
    $mail -> Port = '465';
    $mail -> isHTML(true);
    $mail -> Username = 'iproductiveplanner@gmail.com';
    $mail -> Password = 'yezzzzz5fivePRODUCTIVITY';
    $mail -> setFrom('iproductiveplanner@gmail.com');
    $mail -> Subject = 'You have created a new account';
    $mail -> Body = 'Welcome, thank you for registering with us!';
    $mail -> addAddress('steveobura72@gmail.com');  
    $mail -> Send();
    echo "<script> alert('Sent!');</script>";
    }catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                   }

    // function sendSignUpMail(){
    //     try{
    //         $mail = new PHPMailer(true);
    //         $mail -> isSMTP();
    //         $mail -> SMTPAuth = true;
    //         $mail -> SMTPSecure = 'ssl';
    //         $mail -> Host = 'smtp.gmail.com';
    //         $mail -> Port = '465';
    //         $mail -> isHTML(true);
    //         $mail -> Username = 'iproductiveplanner@gmail.com';
    //         $mail -> Password = 'trolfolnwgyqqxpi';
    //         $mail -> setFrom('iproductiveplanner@gmail.com');
    //         $mail -> Subject = 'You have created a new account';
    //         $mail -> Body = 'Welcome, thank you for registering with us!';
    //         $mail -> addAddress('steveobura72@gmail.com');  
    //         $mail -> Send();
    //         echo "<script> alert('Sent!');</script>";
    //     } catch (Exception $e) {
    //         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //     }
    // }
?>