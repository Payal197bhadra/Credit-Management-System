<?php
include("config.php");
$id=$_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bg-image {
  /* The image used */
  background-image: url("past.jpg");
  
  /* Add the blur effect */
  filter: blur(8px);
  -webkit-filter: blur(8px);
  
  /* Full height */
  height: 100%; 
  
  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* Position text in the middle of the page/image */
.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  border: 3px solid #f1f1f1;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}
	button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 10px 25px;
  color: black;
  background-color: #ddd;
  text-align: center;
  cursor: pointer;
}

button:hover {
  background-color: #555;
  color: white;
}
</style>
</head>
<body>

<div class="bg-image"></div>

<div class="bg-text">
	 <?php
				$query="select * from user where user_id=$id";
$result=mysqli_query($mysqli,$query);
$num=mysqli_num_rows($result);
			if($num > 0){
	while($row=mysqli_fetch_array($result)){
			?>
  <h2>Successful Message</h2>
  <h1 style="font-size:50px">Congratulation! You have successfully transfered the credit.</h1>
  <p>To check your current credit click on the below link:</p>
	<a href="profile.php?id=<?php echo $id; ?>"><button>Click Me</button></a>
	<?php
	}
			}
		?>
</div>

</body>
</html>
