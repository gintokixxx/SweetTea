<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Sweettea</title>
    <link rel="stylesheet" href="../../css/admin/itemlist.css">
    <link rel="stylesheet" href="../../css/admin/adminNav.css">

    <?php
        include "../../classes/dbh.classes.php";

        session_start();
        if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
            header('Location: login.php?itemlist=denied');
            exit();
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
                <a href="contactus.php" id="item" class="buttonss"> Reviews</a>
                <a href="logout.php" id="item" class="buttonss"> Log Out </a>
            </div>
        </div>

        <div class="wcontents"> 
            <div class="content">
                <h1> Item List </h1><br>
                <p>  Breakdown of total sales and order volume per day or per month. Use this to see whether your business is trending upwards or downwards over time. </p><br>
                <a href="./items/addItem.php"> <button id="addItem">  Add an Item </button> </a>
            </div>

            <div class="tables">
                <table>
                    <tr>
                    <th id="tid">ID</th>
                    <th id="tname">Name</th>
                    <th id="ttype">Type</th>
                    <th id="tcategory">Category</th>
                    <th id="tvarcount">Variation Count</th>
                    <th id="tprice">Start Price</th>
                    <th id="tactions">Actions</th>
                    </tr>
                    
                    <?php

                    $select = mysqli_query($conn, "SELECT * FROM items") or die("Query Failed");

                    if($select){
                        while($row =mysqli_fetch_assoc($select)){
                            $id = $row['pr_id'];
                            $name = $row['pr_name'];
                            $type = $row['pr_type'];
                            $category = $row['pr_category'];
                            $varcount = $row['pr_varcount'];
                            $price = $row['pr_price'];
                            echo '
                            <tr>
                                <th scope="row">'.$id.'</th>
                                <td> '.$name.'</td>
                                <td> '.$type.'</td>
                                <td> '.$category.'</td>
                                <td> '.$varcount.'</td>
                                <td> '.$price.'</td>
                                <td>
                                <a href="./items/variation.php?variationid='.$id.'"> <button id="addB">  Add Variation </button> </a>
                                <a href="./items/update.php?updateid='.$id.'"> <button id="editB"> Edit </button> </a>
                                <button onclick="showConfirmPopup(' . $id . ')" id="removeB">Remove</button>
                                </td>
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