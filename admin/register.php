<?php
    include("connection.php");
    include("date.php");
    session_start();

    if(isset($_POST['submit'])){
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_mobile = $_POST['mobile'];
        $user_id = rand();
        $date = date("y-m-d h:i:s");



        $sql = "insert into hp_admin(id, name, email, phone, join_date) value($user_id, '$user_name', '$user_email', '$user_mobile', '$date')";
        $result = mysqli_query($connection , $sql);

        if($result){
            header("Location:login.html");
        } else {
            echo '<script> window.location.href = "register.html"; 
                    alert("Failed to create account") </script>';
        }
    }
?>