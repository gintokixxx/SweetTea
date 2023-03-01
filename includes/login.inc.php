<?php

if(isset($_POST["submit"])){


    //INSTANTIATE SignUpController Class
    include "../classes/dbh.classes.php";

    if(isset($_POST['submit'])){

        session_start();
        
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
    
        $select = mysqli_query($conn, "SELECT * FROM regusers WHERE name = '$username' AND password = '$password'") or die("Query Failed");
    
        if(mysqli_num_rows($select) > 0){
            $row = mysqli_fetch_assoc($select);
            $_SESSION['loggedin'] = true;
            header("location:../php/admin/itemlist.php?access=granted");
            exit();
        } else{
            header("location:../php/admin/login.php?access=declined");
        }
    }
}