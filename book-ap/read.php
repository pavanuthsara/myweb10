<?php 
session_start(); 
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User - claim requests details</title>
	<link rel="stylesheet" type="text/css" href="style-claim.css">
</head>

<body>
	<div class="main-container">
        <div class="head">
            <br>
            <h1 style="font-size:3vw">Apartment INC</h1>
            <h5 style="font-size:20px">Find Your Dream Apartment with Ease</h5> <br>
        </div>

        <ul class="nav1">
            <li class="nav1"><a href="../user.php">User dashboard</a></li>
            <li class="nav2"><a href="../logout.php">Log Out</a></li>
        </ul>

        <div class="view-employee"> 
            <div><b>Your claim requests</b></div> <br>
                <?php 
                require_once '../inc/connection.php';
                $userid = $_SESSION['userid'];
                $sql = "SELECT * FROM apartment WHERE userId = '$userid'";
                $result = $connection->query($sql);
                
                if(!$result){
                    die("Invalid query or no results found!");
                }else{ 
                    echo "<style>
                    table, th,td{
                        padding: 5px 15px;
                        border: 1px solid black;
                        border-collapse: collapse;
                    }
                    
                    .edit-button{
                        text-decoration: none;
                        display: inline-block;
                        background-color: #0ed58f;
                        color:black;
                        padding: 10px;
                        cursor: pointer;
                        border-radius: 5px;
                    }
                    
                    .delete-button{
                        text-decoration: none;
                        display: inline-block;
                        background-color: #ca0939;
                        color:white;
                        padding: 10px;
                        cursor: pointer;
                        border-radius: 5px;
                    }
                    .center-table{
                        display: flex;
                        box-sizing: border-box;
                        justify-content: center;
                        align-items: center;
                        padding:10px;
                    }
                    </style>";
                    echo '<div class="center-table">';
                    echo "<table>";
                    echo "<tr><td>Apartment Id</td> <td>Name</td> <td>Address</td> <td>Available Homes</td></tr>";
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['aid']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['address']."</td>";
                        echo "<td>".$row['availableHomes']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>"; 
                    echo '</div>';
                } 
                //$connection->close();
                ?>
                <hr>
            </div>

            <?php

                require_once '../inc/connection.php';

                //checking if a user is logged in 

                if(!isset($_SESSION['username'])){
                    header("Location: sign-in.php");
                } 

                if($_SERVER["REQUEST_METHOD"] == "POST"){

                    
                    $aid = $_POST['aid'];
                    $aname = $_POST['name'];
                    $address = $_POST['address'];
                    $homes = $_POST['homes'];

                    $update_sql = "UPDATE apartment SET  name='$aname', address='$address', availableHomes='$homes'
                    WHERE aid='$aid'";

                    if($connection->query($update_sql)){
                        header("Location: read.php");
                        // echo "<script>alert('successfully updated!')</script>";
                    } else{
                        exit("error!");
                    }
                }

                

            ?>

            <div class="form-container">
                <form action="read.php" method="post" id="emp-form" enctype="multipart/form-data">
                    <h3><u>Update apartment details - form</u></h3>
                    <!--<p><small>[Add payment details according to your payment slip]</small></p>-->

                <div class="emp-details">
                    <label for="">Apartment ID</label> <br>
                    <input type="text" name="aid">
                </div>


                <div class="emp-details">
                    <label for="">Apartment name</label> <br>
                    <input type="text" name="name">
                </div>

                <div class="emp-details">
                    <label for="">Apartment address</label> <br>
                    <input type="text" name="address">
                </div>

                <div class="emp-details">
                    <label for="">Available no of homes</label> <br>
                    <input type="text" name="homes">
                </div>

                <div class="emp_details">
                    <p>This data is submitted according to</p> 
                    User ID : <b><?php echo $_SESSION['userid']."  "; ?></b> <br>
                    User Name : <b><?php echo "  ".$_SESSION['username']; ?></b>
                </div> <br>

                <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">

                <button type="submit" name="submit">Submit claim request</button>
                <br>
                <p>
                    <?php
                    if(isset($_GET['add-employee-message'])){
                        echo $_GET['add-employee-message'];
                    }
                    ?>
                </p>
                </form>

            </div>
            
            
            <footer>
                <hr>
                &copy; 2024 Copyright Reserved - Shield Plus Insurance <br>
                <small>email@shieldplus.com</small>
            </footer>
</body>
</html>