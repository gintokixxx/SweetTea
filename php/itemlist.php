<!DOCTYPE html>
<html lang="eng">
<head>
    <title>Sweettea</title>
    <link rel="stylesheet" href="../css/itemlist.css">

    <?php
        include "../classes/dbh.classes.php";
    ?>
</head>
<body>
  
        <div class="whitebox">

            <div class="profile">
                <div class="nameaddress">
                    <p>ADMIN</p>
                    <p id="nemail">Email@gmail.com</p> 
                </div>
            </div>

            <div>
                <a href="#" id="report" class="buttonss"> Reports</a>
                <a href="#" id="order" class="buttonss"> Orders</a>
                <a href="#" id="item" class="buttonss"> Items</a>
            </div>
        </div>

        <div class="wcontents"> 
            <div class="content">
                <h1> Item List </h1><br>
                <p>  Breakdown of total sales and order volume per day or per month. Use this to see whether your business is trending upwards or downwards over time. </p><br>
                <h1> P1900.00 </h1><br>
            </div>

            <div class="tables">
                <table>
                    <tr>
                    <th id="tid">ID</th>
                    <th id="tname">Name</th>
                    <th id="ttype">Type</th>
                    <th id="tcategory">Category</th>
                    <th id="tvarcount">Variation Count</th>
                    <th id="tprice">Price Range</th>
                    <th id="tactions">Actions</th>
                    </tr>
                    
                    <?php

                    $select = mysqli_query($conn, "SELECT * FROM items") or die("Query Failed");

                    if($select){
                        while($row =mysqli_fetch_assoc($select)){
                            $id = $row['pr_id'];
                            $name = $row['pr_name'];
                            $type = $row['pr_type'];
                            $category = $row['pr_category'];
                            $varcount = $row['pr_varcount'];
                            $price = $row['pr_price'];
                            echo '
                            <tr>
                                <th scope="row">'.$id.'</th>
                                <td> '.$name.'</td>
                                <td> '.$type.'</td>
                                <td> '.$category.'</td>
                                <td> '.$varcount.'</td>
                                <td> '.$price.'</td>
                                <td>
                                <button id="addB"> <a href="#">Add Variation </a> </button>
                                <button id="editB"> <a href="#">Edit </a> </button>
                                <button id="removeB"> <a href="delete.php?deleteid='.$id.'">Remove </a> </button>
                                </td>
                            </tr>
                            ';
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
</body>

</html>