<?php

$connect = mysqli_connect("localhost", "root", "", "totebags");

if(!empty($_POST["username"])){
    $query = "SELECT * FROM regusers WHERE name ='" .$_POST["username"] . "'";
    $result = mysqli_query($connect, $query);
    $count = mysqli_num_rows($result);
    
    if($count > 0){
        echo "<small> User already exist. </small>";
        echo "<script> $('#signup').prop('disabled', true);</script>";
    }
    else{
        echo "<small> &nbsp; </small>";
        echo "<script> $('#signup').prop('disabled', false);</script>";
    }
}