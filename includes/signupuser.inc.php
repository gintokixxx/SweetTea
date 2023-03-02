<?php

if(isset($_POST["submit"])){

    include "../classes/dbh.classes.php";

    //GRABBING DATA
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = $_POST["email"];


    //INSTANTIATE SignUpController Class
    $query = $conn->prepare("SELECT * FROM regusers_users WHERE name = ?");
    $query->bind_param("s", $name);
    $query->execute();
    $query->store_result();
    $result = $query -> num_rows();

    if($result > 0){
        $query->close();
        $conn->close();
        header("location:../php/admin/reg.php?error=username");
    } else {
        $query->close();
    }

    $stmt = $conn->prepare("INSERT INTO regusers_users(name, email, password) values(?,?,?)");
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();
    $stmt->close();
    $conn->close();


    //GOING BACK TO FRONT PAGE
    
    header("location:../php/users/userSignin.php?error=none");
}