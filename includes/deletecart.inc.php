<?php

include "../classes/dbh.classes.php";

$deleteId = $_GET['deleteid'];
$delete = mysqli_query($conn, "DELETE FROM `usercart` WHERE cart_id = $deleteId") or die("Query Failed");;

header("location:../php/users/cart.php?delete=success");