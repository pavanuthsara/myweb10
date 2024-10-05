<?php 
require_once '../inc/connection.php';
session_start(); 

if(!isset($_SESSION['adminid'])){
    header("Location: sign-in.php");
} 

if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    $uid = $_POST['uid'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $update_sql = "UPDATE user SET userName='$username', name='$name', email='$email' 
                    WHERE userId='$uid'";
   

    if($connection->query($update_sql)){
        header("Location: read.php?add-employee-message=User updated successfully!");
    } else{
        header("Location: read.php?add-employee-message=Error");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin - Plan details</title>
	<link rel="stylesheet" type="text/css" href="read-plan.css">
</head>

<body>
	<div class="main-container">
        <div class="head">
            <br>
            <h1 style="font-size:3vw">Apartment INC</h1>
            <h5 style="font-size:20px">Find Your Dream Apartment with Ease</h5> <br>
        </div>

        <ul class="nav1">
            <li class="nav1"><a href="../admin.php">Admin dashboard</a></li>
            <li class="nav2"><a href="../logout.php">Log Out</a></li>
        </ul>

        <div class="view-employee"> 
            <div><b>Users Details</b></div> <br>
                <?php 
                // require_once '../inc/connection.php';
                $sql = "SELECT * FROM user ORDER BY userId ASC";
                $result = $connection->query($sql);
                
                if(!$result){
                    die("Invalid query or no results found!");
                }else{ 
                    echo "<style>
                    .view-employee{
                        height: 60vh;
                    }
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
                    echo "<tr><th>User Id</th> <th>Userame</th> <th>Name</th> <th>Email</th> </tr>";
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['userId']."</td>";
                        echo "<td>".$row['userName']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>"; 
                    echo '</div>';
                } 
                $connection->close();
                ?>
                
            </div>

            <div class="form-container">
                <form action="read.php" method="post" id="emp-form">
                    <h3><u>Update user  details</u></h3>
                <div class="emp-details">
                    <label for="">User ID</label>
                    <input type="text" name="uid">
                </div>

                <div class="emp-details">
                    <label for="">Usename</label>
                    <input type="text" name="username">
                </div>

                <div class="emp-details">
                    <label for="">Name</label>
                    <input type="text" name="name">
                </div>

                <div class="emp-details">
                    <label for="">Email</label>
                    <input type="text" name="email">
                </div>
                

                <button type="submit" name="submit">Update</button>
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
	</div>


</body>
</html>