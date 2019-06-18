<?php


include('config.php');
$id=$_GET['id'];


?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 500px;
  margin: 20px 400px ;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
	body{
	background-color: black;
}
	/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
	#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 8px;
}

#myTable tr {
  border-bottom: 1px solid black;
}

</style>
</head>
<body>
	<div class="container-fluid mt-10">

<h2 class="text-light mt-5" style="text-align:center">Credit Management System Users</h2>

<div class="card">
	 <?php
				$query="select * from user where user_id=$id";
$result=mysqli_query($mysqli,$query);
$num=mysqli_num_rows($result);
			if($num > 0){
	while($row=mysqli_fetch_array($result)){
			?>
  <img src="74785.jpg" alt="John" style="width:100%">
  <h1><?php echo $row['user_name']; ?></h1>
  <p class="title"><?php echo $row['user_email']; ?></p>
  <div style="margin: 24px 0;">
	   
    <a href="#"><i class="fa fa-user"></i><?php echo $row['current_credit']; ?></a> 
    <?php
	         }
									 
			}
			?> 
  </div>
  <p><button id="myBtn">Credit Transfer</button></p>
</div>
		
		
		
		
		<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>My Customers</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

<table id="myTable" class="table table-striped table-dark table-hover mt-5 pb-5">
	
  <tr class="header">
    <th style="width:40%;">Name</th>
    <th style="width:40%;">Email</th>
	  <th style="width:40%;">Action</th>
	 
  </tr>
	
	 <?php
				$query="select * from user where user_id!=$id";
$result=mysqli_query($mysqli,$query);
$num=mysqli_num_rows($result);
			if($num > 0){
	while($row=mysqli_fetch_array($result)){
			?>
  <tr>
    <td><?php echo $row['user_name']; ?></td>
    <td><?php echo $row['user_email']; ?></td>
	  <td><a href="transfer.php?transfer_id=<?php echo $row['user_id']; ?>&id=<?php echo $id; ?>"><button  type="button" class="btn btn-success" style="width:100%;height:15%;"><h6>Transfer Credit</h6></button></a></td>
<!--	  <a data-id="<//?=$id?>" transfer_id="<//?=$row['user_id']?>"class="open-AddCallDialog btn btn-success btn-xs" href="#addCallDialog">Call Borrower</a>-->
  </tr>
  
	<?php
	         }
									 
			}
			?>
</table>

  </div>
			
			
			
			
		
</div>
		
		
</div>
	
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
	
	
</body>
</html>
