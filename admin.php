<?php session_start(); ?>

<!--add database connection-->
<?php require_once 'inc/connection.php'; ?>

<?php 
    //checking if a user is logged in
    if(!isset($_SESSION['adminid'])){
        header('Location: admin-login.php');
    } 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User - Shield Plus</title>
	<link rel="stylesheet" type="text/css" href="./css/admin.css">
</head>

<body>
	<div class="main-container">
		<div class="head">
			<br>
			<h1 style="font-size:3vw">Apartment INC</h1>
			<h5 style="font-size:20px">Find Your Dream Apartment with Ease</h5> <br>
		</div>

		<ul class="nav1">
			<li class="nav1"><a href="home.php">Home</a></li>
			<li class="nav1"><a href="about-us.php">About Us</a></li>
			<li class="nav1"><a href="plans.php">Plans</a></li>
			<li class="nav1"><a href="contact-us.php">Contact Us</a></li>
			<li class="nav1"><a href="">FAQ</a></li>
			<li class="nav2"><a href="logout.php">Log out</a></li> <!-- redirect to home page after log out -->

		</ul>


		<div class="admin-details details">
            <h4 class="title">Admin details</h4>
			<div class="user-details-content">
				<p>Admin ID : <b> <?php echo $_SESSION['adminid'];?></b></p>
				<p>Name : <b> <?php echo $_SESSION['adminName'];?></b></p> 
				<!--<button class="button-green">Edit your details</button>-->
			</div>
			
		</div>

		<!-- Employee crud -->
		<div class="manage-employee details">
            <h4 class="title">Manage Staff</h4>
			<hr>
            <div class="employee-buttons">
			<a href="employee/add-emp.php" class="button-one">Add new staff</a>
            <a href="employee/update-emp.php" class="button-one">Reand & Update staff details</a>
            <a href="employee/delete-emp.php" class="button-one">Delete staff members</a>
            </div>
		</div>	

        <div class="manage-employee details">
            <h4 class="title">Manage Users</h4>
			<hr>
            <div class="employee-buttons">
			<a href="plan/add-plan.php" class="button-one">Add new user</a>
            <a href="plan/read-plan.php" class="button-one">Read plan details</a>
            <a href="plan/update-plan.php" class="button-one">Update plan detail</a>
            <a href="plan/delete-plan.php" class="button-one">Delete plan</a>
            </div>
		</div>	

       


        <?php require_once('inc/footer.php') ?>
	</div>

</body>
</html>

