<?php

if (isset($_POST["submitButton"])) {

    include "../classes/dbh.classes.php";

    $productIdArray = $_POST['cartProductId'];
    $cartIdArray = $_POST['cartCartId'];
    $productNameArray = $_POST['cartProductName'];
    $userQuantityArray = $_POST['cartUserQuantity'];
    $productPriceArray = $_POST['cartProductPrice'];
    $userAddonsArray = $_POST['cartUserAddons'];
    $userSubtotalArray = $_POST['cartUserSubtotal'];

    
    // Loop through one of the arrays
    for ($i = 0; $i < count($cartIdArray); $i++) {

        // Access the corresponding elements in the other array using 
        //the loop counter
        $productId = $productIdArray[$i];
        $cartId = $cartIdArray[$i];
        $productName = $productNameArray[$i];
        $userQuantity = $userQuantityArray[$i];
        $productPrice = $productPriceArray[$i];
        $userAddons = $userAddonsArray[$i];
        $userSubtotal = $userSubtotalArray[$i];

        $select = mysqli_query($conn, "SELECT * FROM `items_variation` WHERE pr_name = '$productName' AND pr_variation_price = $productPrice") or die("Select Failed");
        if($select){
            while($row = mysqli_fetch_assoc($select)){
                $productSize = $row['pr_variation_name'];
        }}
        
        // Sending Data to DB
        $sql = "UPDATE usercart SET user_quantity = $userQuantity, pr_size = '$productSize', pr_price = $productPrice, user_addons = '$userAddons', user_subtotal = $userSubtotal WHERE cart_id = $cartId;"; 
        mysqli_query($conn, $sql) or die("Query Failed");
    }

    $conn->close();
}