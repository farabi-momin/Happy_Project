<?php
    session_start();
    include("connection.php");
    include("sendOTP.php");

    if(isset($_POST['submit'])){
        $code = $_POST['otp'];
        $email = $_SESSION["email"];

        $sql = "select otp from hp_admin where email = '$email'";
        $result = mysqli_query($connection , $sql);
        $arr = $result->fetch_array(MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        $otp = $arr["otp"];

        if($count == 1){
            if($otp == $code){
                header("Location:dashboard.php");
            } else {
                echo '<script> window.location.href = "login.html"; 
                alert("Invalid otp") </script>'; 
            }

        } else {
            echo '<script> window.location.href = "login.html"; 
            alert("Invalid email or password") </script>'; 
        }

    }    
?>