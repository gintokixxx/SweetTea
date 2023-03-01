<?php

if(isset($_POST["submit"])){
    include_once '../classes/dbh.classes.php';

	$productName = $_POST['pr_name'];
	$productId = $_POST['pr_id'];
    $productCategory = $_POST['pr_category'];
    $productDescription = $_POST['pr_description'];

	$select = mysqli_query($conn, "SELECT * FROM items WHERE pr_id = $productId") or die("Query Failed");
	if($select){
        while($row =mysqli_fetch_assoc($select)){
			$oldName = $row['pr_name'];
			echo $oldName;
		}
	}

    if(strcmp($productCategory,"Snacks") == 0){
        $productType = "Snacks";
    } else {
        $productType = "Drinks";    
    }

    $sql = "UPDATE items SET pr_name='$productName', pr_type='$productType',pr_category='$productCategory', pr_description='$productDescription' WHERE pr_name='$oldName'";
    mysqli_query($conn, $sql);

	$sqlImg = "UPDATE items_img SET pr_name='$productName' WHERE pr_name='$oldName'";
	mysqli_query($conn, $sqlImg);

	$sqlVariation = "UPDATE items_variation SET pr_name='$productName' WHERE pr_name='$oldName'";
	mysqli_query($conn, $sqlVariation);

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

			//Delete the old image 
			$sqlImgDelete = "DELETE FROM `items_img` WHERE pr_name='$oldName'";
			mysqli_query($conn, $sqlImgDelete);

			// Insert into Database
			$sql = "INSERT INTO items_img(image_url, pr_name) VALUES('$new_img_name', '$productName')";
			mysqli_query($conn, $sql);
		} else {
			$em = "You can't upload files of this type"; 
		}
	}


	$conn->close();
	header("location:../php/admin/itemlist.php?update=success");
}