<?php
    include('connection.php');
    session_start();

    $query1 = "select * from hp_sr";
    $result1 = mysqli_query($connection,$query1);
?>

<DOCTYPE! html>
    <head>    
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href = "style.css">
    </head>
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
                $sql1 = 'select count(id) from hp_sr';
                $c1 = 'id';
                echo 'Total Sales Officer '.sql_count($sql1, $c1, $connection);
            
                $sql = 'select sum(quantity) from hp_products';
                $c = 'quantity';
                $s = sql_sum($sql, $c, $connection);
                echo 'Total Product' .$s;
            ?>
            <br><button class="open-button" onclick="openForm()">Add SR</button>
            <button class="open-button" onclick="openD()">Open dashboard</button>
            <hr>
            <h3>All SO</h3><br>
            <div class = "grid-container">
                <?php
                    while($dataSR=$result1->fetch_assoc()){
                        ?><div class = "grid-item">
                            <form action = "SRprofile.php">
                                <input type = "hidden" name = "id" value = "<?php echo $dataSR['id']; ?>">
                                <input type = "hidden" name = "name" value = "<?php echo $dataSR['name']; ?>">
                                <input type = "hidden" name = "phone" value = "<?php echo $dataSR['phone']; ?>">
                                <input type = "hidden" name = "password" value = "<?php echo $dataSR['password']; ?>">
                                <input type = "hidden" name = "dealer_id" value = "<?php echo $dataSR['dealer_id']; ?>">
                                <input type = "hidden" name = "company_id" value = "<?php echo $dataSR['company_id']; ?>">
                                <input type = "hidden" name = "image" value = "<?php echo $dataSR['image']; ?>">
                                <input type = "hidden" name = "joined_date" value = "<?php echo $dataSR['joined_date']; ?>">
                                <input type = "hidden" name = "is_suspend" value = "<?php echo $dataSR['is_suspend']; ?>">
                                <input type = "hidden" name = "is_delete" value = "<?php echo $dataSR['is_delete']; ?>">
                                <input class = "button" type = "submit" name = "submit" value = "<?php echo $dataSR['name']?>">
                            </form>
                            </div><?php
                    }
                ?>
            </div>

            <div class="form-popup" id="myForm">
            <form action="addSR.php" class="form-container" method = "POST">

                <label for="name"><b>Name</b></label>
                <input type="text" name="name" required>

                <label for="company"><b>Company</b></label>
                <input type="text" name="company" required>

                <label for="email"><b>Email</b></label>
                <input type="text" name="email" required>

                <label for="phone"><b>Phone</b></label>
                <input type="text" name="phone" required>

                <label for="NID"><b>NID NO</b></label>
                <input type="text" name="NID" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" name="password" required>

                <button type="submit" class="btn" name = "submit">Add</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
            </div>
        </div>
        <script>
        function openForm() {
        document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
        document.getElementById("myForm").style.display = "none";
        }
        </script>
    </body>
</html>