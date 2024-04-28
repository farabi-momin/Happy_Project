<?php
    error_reporting(0);

    // Add your connection Code
    include "connection.php";
    
    // Important Files (Please check your file path according to your folder structure)
    require "./phpmailer/src/PHPMailer.php";
    require "./phpmailer/src/SMTP.php";
    require "./phpmailer/src/Exception.php";
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    
    // Email From Form Input

    
    function sendMail($send_to, $otp, $name) {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
    
        // Enter your email ID
        $mail->Username = "sakib.farabi@northsouth.edu";
        $mail->Password = "dgvyzfxxgjbjixti";
    
        // Your email ID and Email Title
        $mail->setFrom("sakib.farabi@northsouth.edu", "HAPPY.ORG");
    
        $mail->addAddress($send_to);
    
        // You can change the subject according to your requirement!
        $mail->Subject = "Verifying Account";
    
        // You can change the Body Message according to your requirement!
        $mail->Body = "Hello, {$name}\nYour account registration is successfully done! Now activate your account with OTP {$otp}.";
        $mail->send();
    }
    
    // Message to print email success!
    echo "Email Sent Successfully!";
    
    ?>
?>