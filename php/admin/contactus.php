<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Sweettea | Reviews</title>
    <link rel="stylesheet" href="../../css/admin/itemlist.css">
    <link rel="stylesheet" href="../../css/admin/adminNav.css">
    <link rel="stylesheet" href="../../css/admin/contactus.css">

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
                <h1> Reviews </h1><br>
                <p>  Check customer reviews. Check wether if they are satisfied or not with the service or products. These reviews will help a lot in growing our businesses and improving it further. </p><br>
            </div>

            <div class="tables">
                <table>
                    <tr>
                    <th id="tname">Name</th>
                    <th id="temail">Email </th>
                    <th id="tsubject">Subject</th>
                    <th id="tinputs">Inputs</th>
                    </tr>
                    
                    <?php

                    $select = mysqli_query($conn, "SELECT * FROM `user_review`");

                    if($select){
                    while($row = mysqli_fetch_assoc($select)){
                            echo '
                            <tr>
                                <th scope="row">'.$row['name'].'</th>
                                <td> '.$row['email'].'</td>
                                <td> '.$row['subject'].'</td>
                                <td> '.$row['text'].'</td>
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