<?php
    include("connection.php");
    include("date.php");
    session_start();

    if(isset($_GET['submit'])){
        $sr_id = $_GET['id'];
        $sr_name = $_GET['name'];
        $sr_phone = $_GET['phone'];
        $sr_dealerID = $_GET['dealer_id'];
        $sr_companyID = $_GET['company_id'];
        $sr_image = $_GET['image'];
        $sr_joinedDate = $_GET['joined_date'];
        $sr_isSuspende = $_GET['is_suspend'];
        $sr_isDelete = $_GET['is_delete'];

        $query = "select * from hp_companies where id = '$sr_companyID'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_row($result);

        $query1 = "select * from hp_orders where sr_id = '$sr_id'";
        $result1 = mysqli_query($connection, $query1);

        $query2 = "select * from hp_dealers where id = '$sr_dealerID'";
        $result2 = mysqli_query($connection, $query2);
    }
?>

<!DOCTYPE html>
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
            <h3>SR Profile</h3>
            <div class = "grid-container-small">                
                <div class = "grid-item-small">
                    <p><?php echo $sr_name; ?></p>
                    <p class = "number"> <?php echo $sr_phone;?></div>
                <div class = "grid-item-small">
                    <?php echo $row[1];?>
                </div>
                <div class = "grid-item-small">
                    <p class = "number"><?php echo $sr_joinedDate;?></p>
                </div>    
            </div>
            <button class="open-button" onclick="openWindow(this)" id = "1">Order</button>
            <button class="open-button" onclick="openWindow(this)" id = "2">Route</button>
            <button class="open-button" onclick="openWindow(this)" id = "3">Dealer</button>
            <br>
            <div id = "route-dtls" class = "hidden-div">
                <p>Not Designed Yet</p>
            </div>
            <div id = "ordr-dtls" class = "hidden-div">
                <table>
                    <tr><th>Order</th><th>Date</th><th>Retailer ID</th><th>Amount</th><th>Total Quantity</th><th>Payment</th><th>Status</th></tr>
                        <?php if($result1->num_rows >0){
                            while($order = $result1->fetch_assoc()){
                                ?><tr><td><?php echo $order['unique_id']; ?></td>
                                <td><?php echo $order['order_date'];?></td>
                                <td><?php echo $order['retailer_id'];?></td>
                                <td><?php echo $order['collected_amount'];?></td>
                                <td><?php echo $order['collection_amount'];?></td>
                                <td><?php echo $order['payment_status'];?></td>
                                <td><?php echo $order['status'];?></td>
                                </tr>
                            <?php }
                        }?>
                </table>
            </div>
            <div class = "grid-container-hidden" id = "dlr-dtls">
                <?php if($result2->num_rows >0){
                    while($datadlr=$result2->fetch_assoc()){
                        ?><div class = "grid-item">
                            <form action = "DLRprofile.php">
                                <input type = "hidden" name = "id" value = "<?php echo $datadlr['id']; ?>">
                                <input type = "hidden" name = "name" value = "<?php echo $datadlr['name']; ?>">
                                <input type = "hidden" name = "phone" value = "<?php echo $datadlr['phone']; ?>">
                                <input type = "hidden" name = "area" value = "<?php echo $datadlr['area']; ?>">
                                <input type = "hidden" name = "image" value = "<?php echo $datadlr['image']; ?>">
                                <input type = "hidden" name = "joined_date" value = "<?php echo $datadlr['joined_date']; ?>">
                                <input type = "hidden" name = "is_delete" value = "<?php echo $datadlr['is_delete']; ?>">
                                <input class = "button" type = "submit" name = "submit" value = "<?php echo $datadlr['name']?>">
                            </form>
                    </div><?php
                    }
                } else { echo 'No Dealer Found!';}
                ?>
            </div>
        <script>
            function openWindow(button) {
                var s = button.id ;
                switch(s){
                    case '1':
                        var x = document.getElementById("ordr-dtls");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                            document.getElementById("route-dtls").style.display = "none";
                            document.getElementById("dlr-dtls").style.display = "none";
                        } else {
                            x.style.display = "none";
                        } break;
                        case '2':
                        var x = document.getElementById("route-dtls");
                        if (x.style.display === "none") {
                            x.style.display = "block";
                            document.getElementById("ordr-dtls").style.display = "none";
                            document.getElementById("dlr-dtls").style.display = "none";
                        } else {
                            x.style.display = "none";
                        } break;
                        case '3':
                            var x = document.getElementById("dlr-dtls");
                            if (x.style.display === "none") {
                                x.style.display = "grid";
                                document.getElementById("ordr-dtls").style.display = "none";
                                document.getElementById("route-dtls").style.display = "none";
                            } else {
                                x.style.display = "none";
                            } break;    
                }        
                
            }
</script>
    </body>    
</html>