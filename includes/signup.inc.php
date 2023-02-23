<?php

if(isset($_POST["submit"])){

    include "../classes/dbh.classes.php";

    //GRABBING DATA
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = $_POST["email"];
    $cpassword = $_POST["cpassword"];


    //INSTANTIATE SignUpController Class
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

    $stmt = $conn->prepare("INSERT INTO regusers(name, email, password) values(?,?,?)");
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();
    $stmt->close();
    $conn->close();


    //GOING BACK TO FRONT PAGE
    
    header("location:../php/reg.php?error=none");
}