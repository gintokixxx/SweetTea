<?php
if(isset($_POST["submit"])){
    include_once '../classes/dbh.classes.php';


    $productId = $_POST['productId'];

    $select = mysqli_query($conn, "SELECT * FROM items WHERE pr_id=$productId") or die("Query Failed");
    mysqli_query($conn, $select);

    if($select){
        while($row =mysqli_fetch_assoc($select)){
            $name = $row['pr_name'];
            $type = $row['pr_type'];
            $price = $row['pr_price'];
        }
    }
    $quantity = 1;
    $subtotal = $quantity * $price;

    $sql = "INSERT INTO userCart (pr_id, pr_name, pr_type, user_quantity, pr_price, user_subtotal) VALUES ('$productId','$name', '$type', '$quantity', '$price', '$subtotal');";
    mysqli_query($conn, $sql);

    header("location:../php/users/menu.php#$productId");
}