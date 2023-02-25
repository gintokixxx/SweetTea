<?php

if(isset($_POST["submit"])){
    include_once '../classes/dbh.classes.php';

    $productName = $_POST['pr_name'];
    $productPrice = $_POST['pr_price'];
    $productCategory = $_POST['pr_category'];
    $productDescription = $_POST['pr_description'];

    if(strcmp($productCategory,"Snacks") == 0){
        $productType = "Snacks";
    } else {
        $productType = "Drinks";    
    }

    $sql = "INSERT INTO items (pr_name, pr_category, pr_description, pr_type, pr_price) VALUES ('$productName', '$productCategory', '$productDescription', '$productType', '$productPrice');";
    mysqli_query($conn, $sql);

    //IMAGE UPLOAD
    $img_name = $_FILES['pr_image']['name'];
	$img_size = $_FILES['pr_image']['size'];
	$tmp_name = $_FILES['pr_image']['tmp_name'];
	$error = $_FILES['pr_image']['error'];

	if ($error === 0) {
		$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
		$img_ex_lc = strtolower($img_ex);

		$allowed_exs = array("jpg", "jpeg", "png"); 

		if (in_array($img_ex_lc, $allowed_exs)) {
			$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
			$img_upload_path = '../img/uploads/'.$new_img_name;
			move_uploaded_file($tmp_name, $img_upload_path);

			// Insert into Database
			$sql = "INSERT INTO items_img(image_url, pr_name) VALUES('$new_img_name', '$productName')";
			mysqli_query($conn, $sql);
		} else {
			$em = "You can't upload files of this type"; 
			header("Location: index.php?error=$em");
		}
	}
    $conn->close();
}