<?php

if(isset($_POST["submit"])){


    //INSTANTIATE SignUpController Class
    include "../classes/dbh.classes.php";

    if(isset($_POST['submit'])){

        session_start();
        
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    
        $select = mysqli_query($conn, "SELECT * FROM regusers_users WHERE name = '$username' AND password = '$password'") or die("Query Failed");
    
        if(mysqli_num_rows($select) > 0){
            while($row =mysqli_fetch_assoc($select)){
                $user_id = $row['users_id'];
            }
            $_SESSION['user_id'] = $user_id;
            header("location:../php/users/menuMilktea.php?access=granted");
            exit();
        } else{
            header("location:../php/users/Home Page/home.php?access=denied");
        }
    }
}