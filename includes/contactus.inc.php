<?php
if(isset($_POST["submit"])){
    include_once '../classes/dbh.classes.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $text = $_POST['text'];

    $sql = "INSERT INTO user_review(name, email, subject, text) VALUES ('$name','$email', '$subject', '$text');";
    mysqli_query($conn, $sql);

    header("location:../php/users/Home Page/home.php");
}
