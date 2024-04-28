<?php
    include('connection.php');
    session_start(); 
?>
<!DOCTYPE html>
    <head><link rel="stylesheet" href="style.css"></head>
    <body>
        <div class = "nav-bar">
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="SR.php">SR</a></li>
                <li><a href="contact.asp">Contact</a></li>
                <li><a href="about.asp">About</a></li>
            </ul>
        </div>
        <div class = "content">
            <?php
                echo 'Dashboard';
                echo ' Welcome ' .$_SESSION['name'];
                $sql1 = 'select count(status) from hp_orders where status = "delivered"';
                $c1 = 'status';
                echo 'Completed orders  '.sql_count($sql1,$c1, $connection);
            
                $sql2 = 'select count(*) from hp_products';
                $c2 = '*';
                echo 'Total type of product '.sql_count($sql2, $c2, $connection);
            
                $sql3 = 'select count(*) from hp_retailers';
                $c3 = '*';
                echo 'Total Retailer '.sql_count($sql3, $c3, $connection);
            ?>
        </div>
    </body>
</html>