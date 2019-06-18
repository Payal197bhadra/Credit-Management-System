<?php

$id=$_GET['id'];
include('config.php');
$errors=array();
$transfer_id=$_GET['transfer_id'];
if($_SERVER['REQUEST_METHOD']=='POST'){
		$nameto=mysqli_real_escape_string($mysqli,$_POST['name']);
		$credit=mysqli_real_escape_string($mysqli,$_POST['credit']);
         	$query="select * from user where user_id=$id";
$result=mysqli_query($mysqli,$query);
$num=mysqli_num_rows($result);
			if($num > 0){
	while($row=mysqli_fetch_array($result)){
		$name=$row['user_name'];
		$current_credit=$row['current_credit'];
		   if($credit > $row['current_credit']){
			 $errors['credit']="Please choose the credit amount less than current credit!";  
		   }
		if($credit<10){
			$errors['credit']="Sorry,Credit can't transfer due to low amount!";
		}
	       }
			}
	
	    $query1="select * from user where user_id=$transfer_id";
$result1=mysqli_query($mysqli,$query1);
$num1=mysqli_num_rows($result1);
			if($num1 > 0){
	while($row1=mysqli_fetch_array($result1)){
		$current_credit_tansfer=$row1['current_credit'];
	}
			}
		if(count($errors)===0){
	$sql="insert into transfer(transfer_credit,to_user,from_user)values(?,?,?)";
			$stmt=$mysqli->prepare($sql);
		$stmt->bind_param('sss',$credit,$nameto,$name);
		if($stmt->execute()){
			
			//login user
			$user_id=$mysqli->insert_id;
			$_SESSION['id']=$user_id;
			$sql="update user set current_credit=($current_credit-$credit) where user_id=$id";
			if($mysqli->query($sql)===true){
					
	
			
			$sql="update user set current_credit=($credit + $current_credit_tansfer) where user_id=$transfer_id";
				if($mysqli->query($sql)===true){
			header('location:successful.php?id='.$id);
				}
			}
			exit();
			
		}
		else{
			$errors['db_error']="Database error: failed to register!";
		}
       }
}
		
	
	


?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, html {
	background-color: black;
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}
	.bg{
		margin-top: 70px;
	}
.bg-img {
  /* The image used */
  background-image: url("74785.jpg");

  min-height: 380px;
margin-top: 10px;
	
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: inherit;
}

/* Add styles to the form container */
.container {
  position: absolute;
  right: 0;
  margin: 30px;
  max-width: 300px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>
</head>
<body>
<div class="container-fluid bg">
<h1 class="text-center text-light">Transfer Credit</h1>
<div class="bg-img">
  <form method="post" action="#" class="container">
	  <?php if(count($errors)>0): ?>
					<div class="alert alert-error text-warning">
						<?php foreach($errors as $error): ?>
						<li><?php echo $error; ?></li>
					    <?php endforeach; ?>
					</div>
					<?php endif; ?>
	  <?php
				$query="select * from user where user_id=$transfer_id";
$result=mysqli_query($mysqli,$query);
$num=mysqli_num_rows($result);
			if($num > 0){
	while($row=mysqli_fetch_array($result)){
			?>
    <h1>Credit transfer form</h1>

    <label for="email"><b>Name</b></label>
    <input type="text" name="name" value="<?php echo $row['user_name']; ?>" >

    <label for="psw"><b>Credit to transfer</b></label>
    <input type="text" placeholder="Enter Credits" name="credit" required>
<?php
	         }
									 
			}
			?> 
    <button type="submit" class="btn">Transfer</button>
  </form>
</div>
</div>
<p>This example creates a form on a responsive image. Try to resize the browser window to see how it always will cover the whole width of the screen, and that it scales nicely on all screen sizes.</p>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
