<?php 
session_start(); 

require_once '../inc/connection.php';

//checking if a user is logged in
if(!isset($_SESSION['adminid'])){
    header('Location: ../admin-login.php');
} 

if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    $sid = $_POST['sid'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $position = $_POST['position'];

    $update_sql = "UPDATE staff SET staffUserName='$username', name='$name', position='$position' 
                    WHERE sid='$sid'";
   

    if($connection->query($update_sql)){
        header("Location: update-emp.php?add-employee-message=Staff member updated successfully!");
    } else{
        header("Location: update-emp.php?add-employee-message=Error");
    }
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin - Add employee</title>
	<link rel="stylesheet" type="text/css" href="add-emp.css">
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

            <?php 
                require_once '../inc/connection.php';
                $sql = "SELECT * FROM staff";
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
                    echo "<tr><th>Staff Id</th> <th>Username</th> <th>Name</th> <th>Position</th></tr>";
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['sid']."</td>";
                        echo "<td>".$row['staffUserName']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['position']."</td>";
                        echo "</tr>";
                    }
                    echo "</table>"; 
                    echo '</div>';
                } 
                //$connection->close();
                ?>
            
            
            <div class="form-container">
                <form action="update-emp.php" method="post" id="emp-form">
                    <h3><u>Update staff member details</u></h3>
                <div class="emp-details">
                    <label for="">Staff ID</label>
                    <input type="text" name="sid">
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
                <label for="position">Job title : </label>
                <select name="position" id="job-title" id="">
                    <option value="Accountant">Accountant</option>
                    <option value="Manager">Manager</option>
                    <option value="Sales Agent">Sales Agent</option>
                    <option value="Marketing Executive">Marketing Executive</option>
                    <option value="Security">Security</option>
                    <option value="Data Analyst">Data Analyst</option>
                    <option value="IT Specialist">IT specialist</option>
                </select>
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
            &copy; 2024 Copyright Reserved<br>
            <small>email@ApartmentINC.com</small>
        </footer>

	</div>


</body>
</html>

<?php 
$connection->close(); ?>