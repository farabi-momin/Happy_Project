<?php
    include('connection.php');
    include('date.php');
    session_start();

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $company = $_POST['company'];
        $date = date("y-m-d h:i:s");

        $sql = "select id from hp_companies where name = '$company'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($result);
        $company_id = $row['id'];

        $sql1 = "insert into hp_sr(name, phone, password, dealer_id, company_id, joined_date, is_suspend, is_delete) value('$name', '$phone', '$password', '0', '$company_id', '$date', '0', '0')";
        $result1 = mysqli_query($connection, $sql1);

        if($result1){
            header("Location:SR.php");
        } else {
            echo '<script> window.location.href = "SR.php"; 
                    alert("Failed to add SR") </script>';
        }
    }
?>    