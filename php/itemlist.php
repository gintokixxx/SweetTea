<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Sweettea</title>
    <link rel="stylesheet" href="../css/report.css">
</head>
<body>
    <div class="centerbox">
        <div class="whitebox">

            <div class="profile">
                <div class="logotab">
                    <img id="logo" src="../img/acclogo.png" alt="Account Profile Logo">
                </div>

                <div class="nameaddress">
                    <p>ADMIN</p>
                    <p>Email@gmail.com</p> 
                </div>
            </div>

            <div class="button">
                <a href="#" id="report" class="buttonss"> Reports</a>
                <a href="#" id="order" class="buttonss"> Orders</a>
                <a href="#" id="item" class="buttonss"> Items</a>
            </div>

        </div>

        <div class="wcontents"> 
            <div class="content">
                <p><span class="heading">Item List</span><br><br>
                    Breakdown of total sales and order volume per day or per month. Use this to see whether your business is trending upwards or downwards over time.
                <br> <br><span class="heading">₱19,000</span>
                </p>
            </div>

            <div class="tables">
                <table>
                    <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Variation</th>
                    <th>Price</th>
                    <th>Actions</th>
                    </tr>
                    
                    <?php
                    include "../classes/dbh.classes.php";

                    $select = mysqli_query($conn, "SELECT * FROM items") or die("Query Failed");

                    if($select){
                        while($row =mysqli_fetch_assoc($select)){
                            $id = $row['produdct_id'];
                            $name = $row['product_name'];
                            $type = $row['product_type'];
                            $category = $row['product_category'];
                            $price = $row['product_price'];
                            echo '
                            <tr>
                                <th scope="row">'.$id.'</th>
                                <td> '.$name.'</td>
                                <td> '.$type.'</td>
                                <td> '.$category.'</td>
                                <td> '.$price.'</td>
                                <td>
                                <button> <a href="#">Add Variation </a> </button>
                                <button> <a href="#">Edit </a> </button>
                                <button> <a href="delete.php?deleteid='.$id.'">Remove </a> </button>
                                </td>
                            </tr>
                            
                            '
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
        
    </div>
</body>

</html>