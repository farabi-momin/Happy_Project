<?php
    session_start();
    include("connection.php");
    include("sendOTP.php");


    if(isset($_POST['submit'])){
        $email = $_POST['email'];

        $sql = "select * from hp_admin where email = '$email'";
        $result = mysqli_query($connection , $sql);
        $arr = $result->fetch_array(MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        $_SESSION['name'] = $arr["name"];
        $_SESSION['id'] = $arr["id"];
        $_SESSION['email'] = $arr["email"];
        $_SESSION['stDate'] = $arr["join_date"];

        // Generate Random 6-Digit OTP
        $verification_otp = random_int(100000, 999999);

        // Full Name of User
        $send_to_name = "Farabi";

        if($count == 1){
            $otp = random_int(100000, 999999);
            $sql1 = "update hp_admin  set otp = '$otp' where email = '$email'";
            $result1 = mysqli_query($connection , $sql1);
            echo $_SESSION['name'];
            sendMail($email, $otp, $_SESSION['name']);
            echo 'Success!';
            
            header("Location:verification.html");
        } else {
            echo '<script> window.location.href = "login.html"; 
                    alert("Invalid email or password") </script>';        
        }
    }
?>