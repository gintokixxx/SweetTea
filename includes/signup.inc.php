<?php

if(isset($_POST["submit"])){

    //GRABBING DATA
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];


    //DATABASE CONNECTION  NOTE: TO BE OPTIMIZED
    $conn = new mysqli('localhost', 'root', '', 'totebags');

    if($conn->connect_error){
        die('Connection Failed : ' . $conn->connect_error);
    }
    else {
        $stmt = $conn->prepare("INSERT INTO regusers(name, email, password, cpassword) values(?,?,?,?)");
        $stmt->bind_param("ssss", $name, $email, $password, $cpassword);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}