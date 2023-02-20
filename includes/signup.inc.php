<?php

if(isset($_POST["submit"])){

    //GRABBING DATA
    $name = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];


    //INSTANTIATE SignUpController Class
    include "../classes/dbh.classes.php";
    $query = $conn->prepare("SELECT * FROM regusers WHERE name = ?");
    $query->bind_param("s", $name);
    $query->execute();
    $query->store_result();
    $result = $query -> num_rows();

    if($result > 0){
        $query->close();
        $conn->close();
        header("location:../php/reg.php?error=username");
    } else {
        $query->close();
    }

    $stmt = $conn->prepare("INSERT INTO regusers(name, email, password, cpassword) values(?,?,?,?)");
    $stmt->bind_param("ssss", $name, $email, $password, $cpassword);
    $stmt->execute();
    $stmt->close();
    $conn->close();


    //GOING BACK TO FRONT PAGE
    header("location:../php/reg.php?error=none");
}