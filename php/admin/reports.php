<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Sweettea | Reports</title>
    <link rel="stylesheet" href="../../css/admin/itemlist.css">
    <link rel="stylesheet" href="../../css/admin/adminNav.css">
    <link rel="stylesheet" href="../../css/admin/reports.css">

    <?php
        include "../../classes/dbh.classes.php";

        $currentMonth = date('m');
        $monthString = date('F', strtotime("2000-$currentMonth-01"));

        session_start();
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
            header('Location: login.php?itemlist=denied');
            exit();
        }

        $selectTotal = mysqli_query($conn, "SELECT SUM(customer_total) AS total_for_today FROM order_history WHERE MONTH(purchase_date) = $currentMonth;");
        $totalForMonth = 0;

        if ($row = mysqli_fetch_assoc($selectTotal)) {
            $totalForMonth = $row['total_for_today'];
        }
        
        ?>
</head>
<body>
        <div class="whitebox">

            <div class="profile">
                <div class="nameaddress">
                    <p>ADMIN</p>
                </div>
            </div>

            <div>
                <a href="reports.php" id="report" class="buttonss"> Reports</a>
                <a href="orders.php" id="order" class="buttonss"> Orders</a>
                <a href="itemlist.php" id="item" class="buttonss"> Items</a>
                <a href="logout.php" id="item" class="buttonss"> Log Out </a>
            </div>
        </div>

        <div class="wcontents"> 
            <div class="content">
                <h1> Reports </h1><br>
                <p>  Breakdown of total sales and order volume per month. Use this to see whether your business is trending upwards or downwards over time. </p><br>
                <span class="heading">Total Sales for <?php echo $monthString . ' : ' . $totalForMonth; ?></span><br><br>
            </div>

            <div class="tables">
                <table>
                    <tr>
                    <th id="tcustomerid">Date</th>
                    <th id="tnumberofpurhase">Total Number of Purchase </th>
                    <th id="tpurchasetotal">Total</th>
                    </tr>
                    
                    <?php

                    $select = mysqli_query($conn, "SELECT DATE(purchase_date) AS date, COUNT(*) AS num_rows, SUM(customer_total) AS total
                    FROM order_history
                    WHERE MONTH(purchase_date) = $currentMonth
                    GROUP BY DATE(purchase_date)
                    ORDER BY date DESC");

                    if($select){
                    while($row = mysqli_fetch_assoc($select)){
                            echo '
                            <tr>
                                <th scope="row">'.$row['date'].'</th>
                                <td> '.$row['num_rows'].'</td>
                                <td> '.$row['total'].'</td>
                            </tr>
                            ';
                        }
                    }
                    ?>
                </table>
            </div>
        </div>

        <script>
        function showConfirmPopup(itemId) {
            var popup = document.getElementById('confirm-popup');
            popup.style.display = 'block';

            // pass the item ID to the deleteItem function
            var deleteBtn = popup.querySelector('#delete-btn');
            deleteBtn.setAttribute('onclick', 'deleteItem(' + itemId + ')');
        }

        function hidePopup() {
            var popup = document.getElementById('confirm-popup');
            popup.style.display = 'none';
        }

        function deleteItem(itemId) {
            // code to delete item from database
            // send AJAX request to PHP script to delete item from database
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    // display success message
                    var result = JSON.parse(this.responseText);
                    if (result.success) {
                    alert(result.message);
                    // reload the page or remove the item from the list
                    location.reload();
                    } else {
                    alert(result.message);
                    }
                }
            };

            xhr.open("POST", "items/delete.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("itemId=" + itemId);
            
            // close popup div
            popup.style.display = "none";

            // reload the page after item is deleted
            location.reload();
        }



        </script>
</body>

</html>