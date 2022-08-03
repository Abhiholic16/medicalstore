<?php 

include 'config.php';

session_start();

error_reporting(0);

if(isset($_SESSION['username']))
{
    header("Location: welcome.php");
}

if (isset($_POST['submit']))
{
	$username= $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM `customer` WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0)		
	{
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: welcome.php");
	} 
	else 
	{
		echo "<script>alert('Woops! Username or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <link rel="stylesheet" href="dashboardcss.css">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
	  <link rel="stylesheet" href="homepagecss.css">
	  <title>Login Form</title>
	  <style>
	     *{
		   margin:0;
		   padding:0;
		   box-sizing:border-box;
		  }
		  .body1
		  {
		   min-height:100vh;
		   background:#eee;
		   display:flex;
		   font-family: sans-serif;
		  }
	
		  .container
		  {
		    margin:auto;
			width:500px;
			max-width:90%;
		  }
		   .container form
		  {
		    width:100%;
			height:100%;
			padding:20px;
			background: white;
			border-radious:4px;
			box-shadow:0 8px 16px rgba(0,0,0,.3);
		  }
		   .container form h1
		  {
		    text-align:center;
			margin-bottom:24px;
			color:#222;
		  }
		   .container form .form-control
		  {
		    width:100%;
			height:40px;
			background:white;
			border-radious:4px;
			border:1px solid silver;
			margin:10px 0 18px 0;
			padding:0 10px;
		  }
		   .container form .btn
		  {
		    margin-left:50%;
			transform:translatex(-50%);
			width:120px;
			height:34px;
			border:none;
			outline:none;
			background:#27a327;
			cursor:pointer;
			font-size:16px;
			text-transform:uppercase;
			color:white;
			border-radious:4px;
			translation:.3s;
		  }
		   .container form .btn:hover
		  {
		    opacity:.7;
		  }
		  a.active3,a:hover
          {
	        background:#1b9bff;
	        transition:.5s;
          }
		  .login-register-text {
           color: #111;
           font-weight: 600;
           }

          .login-register-text a {
           text-decoration: none;
           color: #6c5ce7;
           }
	  </style>
  </head> 
  <body>
   <nav>
	      <label class="logo">ONLINE MEDICAL STORE</label>
	      <ul>
		      <li><a href="homepage.html">Home</a></li>
			  <li><a href="about.html">About</a></li>
			  <li><a href="medicine.php">Medicines</a></li>
			  <li><a class="active3"href="login.php">Login</a></li>
			  <li><a href="registration.php">Register</a></li>
			  <li><a href="feedback.php">Feedback</a></li>
          </ul>
	</nav>
  <div class="body1">
      <div class="container">
	     <form  method="post" action="" class="login-email">
		    <h1>Login</h1>
		    <div class="form-group">
			   <label for="">Username</label>
			   <input type="text" name="username" class="form-control" required value="<?php echo $email;?>">
			</div>
			<div class="form-group">
			   <label for="">Password</label>
			   <input type="password" name="password" class="form-control" value="<?php echo $_POST['password'];?>"required >
          
			</div>
			<div class="input-group">
				<button name="submit" name="submit" class="btn">Login</button>
			</div>
			<br><br>
			<p class="login-register-text">Don't have an account? <a href="registration.php">Register Here</a>.</p>
	     </form>
	  </div>
	</div>
  </body>
</html>