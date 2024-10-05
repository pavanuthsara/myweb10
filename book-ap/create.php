<?php 
session_start(); 

require_once '../inc/connection.php';

//checking if a user is logged in 
if(!isset($_SESSION['username'])){
    header("Location: sign-in.php");
} 

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $aid = $_POST['aid'];
    $userid = $_SESSION['userid'];

    $add_sql = "INSERT INTO booking VALUES (0, '$userid', '$aid')";

    if($connection->query($add_sql)){
        echo "<script>alert('complaint added successfully')</script>";
    } else {
        exit ("error!");
    }

}


// $connection->close();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User - Add payment</title>
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
            
            
            <div class="form-container">
                <form action="create.php" method="post" id="emp-form" enctype="multipart/form-data">
                    <h3><u>Add booking for apartment - form</u></h3>

                <div class="emp-details">
                    <label for="">Apartment ID</label> <br>
                    <input type="text" name="aid">
                </div>

                <div class="emp_details">
                    <p>This data is submitted according to</p> 
                    Username : <b><?php echo $_SESSION['username']."  "; ?></b> <br>
                    User Id : <b><?php echo "  ".$_SESSION['userid']; ?></b> 
                </div> <br>

                <button type="submit" name="submit">Add booking</button>
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

            <?php 
                require_once '../inc/connection.php';
                $sql = "SELECT * FROM apartment";
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
        <footer>
            <hr>
            &copy; 2024 Copyright Reserved - Shield Plus Insurance <br>
            <small>email@shieldplus.com</small>
        </footer>
	</div>


</body>
</html>