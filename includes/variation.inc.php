<?php

if (isset($_POST["submit"])) {

    include "../classes/dbh.classes.php";

    $productName = $_POST['productName'];
    $nameVariations = $_POST['variantName'];
    $priceVariations = $_POST['variantPrice'];
    
    // Loop through one of the arrays
    for ($i = 0; $i < count($nameVariations); $i++) {

        // Access the corresponding elements in the other array using 
        //the loop counter
        $nameVariation = $nameVariations[$i];
        $priceVariation = $priceVariations[$i];
        
        // Sending Data to DB
        $sql = "INSERT INTO items_variation (pr_name, pr_variation_name, 
        pr_variation_price) VALUES 
        ('$productName', '$nameVariation', '$priceVariation');";
        mysqli_query($conn, $sql);
    }

    $select = mysqli_query($conn, "SELECT * FROM items_variation WHERE pr_name='$productName'") or die("Query Failed");
    $i = 0;

    if($select){
        while($row = mysqli_fetch_assoc($select)){
            if($i==0){
                $startPrice = $row['pr_variation_price'];
            }

            $checkPrice = $row['pr_variation_price'];
            if($checkPrice < $startPrice){
                $startPrice = $checkPrice;
            }

            $i++;
        }
    }

    $sqlVar = "UPDATE items SET pr_varcount=$i, pr_price=$startPrice WHERE pr_name ='$productName';";
    mysqli_query($conn, $sqlVar);

    $conn->close();
    header("location:../php/admin/itemlist.php?itemadded=success");
}