<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Sweettea | Orders</title>
    <link rel="stylesheet" href="../../css/admin/itemlist.css">
    <link rel="stylesheet" href="../../css/admin/adminNav.css">
    <link rel="stylesheet" href="../../css/admin/orders.css">

    <?php 
        include "../../classes/dbh.classes.php";

        session_start();
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
            header('Location: login.php?itemlist=denied');
            exit();
        }

        $totalForToday = 0; 

        $selectTotal = mysqli_query($conn, "SELECT SUM(customer_total) AS total_for_today FROM order_history WHERE purchase_date = CURDATE();");

        if ($row = mysqli_fetch_assoc($selectTotal)) {
            $totalForToday = $row['total_for_today'];
        }

    ?>

</head>
<body>

        <div id="confirm-popup" class="popup">
            <div class="popup-content">

                <div id="popup-p"> 
                    <p> Are you sure you want to remove this item? </p>
                </div>

                <div id="popup-buttons">
                    <button onclick="hidePopup()" class="pop-up-buttons"> No </button>
                    <button onclick="deleteItem()" class="pop-up-buttons" id="delete-btn"> Yes </button>
                </div>

            </div>
        </div>

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
                <h1> Orders </h1><br>
                <p>  Breakdown of total sales and order volume per day. Use this to see whether your business is trending upwards or downwards over time. </p><br>
                <span class="heading">Total Sales for Today :  &nbsp; <?php echo $totalForToday; ?></span><br><br>
            </div>

            <div class="tables">
                <table>
                    <tr>
                    <th id="tcustomerid">ID</th>
                    <th id="tcustomername">Name</th>
                    <th id="tcustomerphone">Phone</th>
                    <th id="tcustomerpayment">Payment</th>
                    <th id="tcustomernews">Newsletter</th>
                    <th id="tpurchasename">Purchase Name</th>
                    <th id="tpurchasetotal">Total</th>
                    </tr>
                    
                    <?php

                    $select = mysqli_query($conn, "SELECT * FROM order_history WHERE purchase_date = CURDATE() ORDER BY history_id DESC;") or die("Query Failed");

                    $totalForToday = 0;
                    if($select){
                        while($row = mysqli_fetch_assoc($select)){
                            $historyId = $row['history_id'];
                            $customerName = $row['customer_name'];
                            $customerPhone = $row['customer_phone'];
                            $customerPayment = $row['customer_payment'];
                            $customerNews= $row['customer_news'];
                            $purchaseName = $row['customer_purchase'];
                            $purchaseTotal = $row['customer_total'];


                            echo '
                            <tr>
                                <th scope="row">'.$historyId.'</th>
                                <td> '.$customerName.'</td>
                                <td> '.$customerPhone.'</td>
                                <td> '.$customerPayment.'</td>
                                <td> '.$customerNews.'</td>
                                <td> '.$purchaseName.'</td>
                                <td> '.$purchaseTotal.'</td>
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