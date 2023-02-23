<?php 
    include "../classes/dbh.classes.php";

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];

        $delete = mysqli_query($conn, "DELETE * FROM items WHERE id='$id'") or die("Query Failed");
        if($delete){
            echo"Deleted Successfully";
        } else{
            die(mysqli_error($conn));
        }
    }
