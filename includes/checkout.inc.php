<?php

if (isset($_POST["submit"])) {

    include "../classes/dbh.classes.php";

    $selectCart = mysqli_query($conn, "SELECT * FROM `usercart`") or die("Query Failed");
    $purchaseName = "";
    $purchaseTotal = 0;
    $count = mysqli_num_rows($selectCart);

    if(mysqli_num_rows($selectCart) > 0){
        while($row = mysqli_fetch_assoc($selectCart)){
            $count = $count - 1;
        
            $purchaseTotal += $row['user_subtotal'];

            $purchaseName .= $row['user_quantity'] . "x " . $row['pr_size'] . " " . $row['pr_name'];

            if($row['user_addons'] != ""){
                $purchaseName .= " with " . $row['user_addons'];
            }

            if($count > 0){
                $purchaseName .= ", ";
            }
        }
    }


    $customerName = $_POST['customerName'];
    $customerNumber = $_POST['customerNumber'];
    $customerPayment = $_POST['e-payment'];
    $customerNews = $_POST['review'];

    $sql = "INSERT INTO order_history (customer_name, customer_phone, customer_payment, customer_news, customer_purchase, customer_total) VALUES 
    ('$customerName', '$customerNumber', '$customerPayment', '$customerNews', '$purchaseName', '$purchaseTotal');";

    $delete = "DELETE FROM usercart; ";
    
    mysqli_query($conn, $sql) or die("Insert Failed");
    mysqli_query($conn, $delete) or die("Delete Cart Failed");

    $conn->close();
}