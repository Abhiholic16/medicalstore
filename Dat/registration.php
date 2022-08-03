<?php 
 error_reporting(0);
 include 'config.php';
 if (isset($_POST['submit']))
 {
    $name=$_POST['name'];
	$username = $_POST['username'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$dob = $_POST['dob'];
	$address = $_POST['address'];
	if($password == $cpassword)
	{
		$sql = "SELECT * FROM `customer` WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) 
		{
			$sql ="INSERT INTO `customer` (`name`, `username`, `password`, `mobile`, `email`, `dob`, `address`) VALUES ( '$name', '$username', '$password', '$mobile', '$email', '$dob', '$address');";
			$result = mysqli_query($conn, $sql);
			if ($result)
			{
				echo "<script>alert('User Registration Completed.')</script>";
				$name="";
				$username = "";
				$mobile ="";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
				$dob ="";
				$address ="";
			} 
			else 
			{
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} 
		else 
		{
			echo "<script>alert('Woops! Username Already Exists.')</script>";
		}
		
	}
	else 
	{
		echo "<script>alert('Password Do Not Match')</script>";
	}
 }

?>
<!DOCTYPE html>
<html>
   <head>
      <title>registration form</title>
      <link rel="stylesheet" href="homepagecss.css">
      <style>
         label{ font-weight: bold;}
         h1{color:rgb(144,135,176);font-family:arial;font-size:20px}
         .div1{margin:0px 0px 0px 30px;padding:15px;}
         input{padding:2.5px;background-color:#f8f8f8; border: 2px solid #ccc;}
         label{font-size:21px;}
         h1{font-size:25px;}
        .button1,.button2 
         {
             background-color: #4CAF50; /* Green */
             border: none;
             color: white;
             padding: 5px 11px;
             text-align: center;
             text-decoration: none;
             display: inline-block;
             font-size: 16px;
             margin: 5px 0px;
             cursor: pointer;
         }
         .button2{border-radius: 5px;background-color: #f44336;} 
         .button1{border-radius: 5px;}
  		 .button1,.button2
		  {
			border:none;
			outline:none;
			cursor:pointer;
			text-transform:uppercase;
			color:white;
			translation:.3s;
		  }
		  .button1:hover,.button2:hover
		  {
		    opacity:.7;
		  }
		  a.active4,a:hover
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
		<script>
		  function validate()
		  {
		    console.log(document.registration.email);
			return false;
		  }
		</script>
    </head>
    <body>
      <nav>
	      <label class="logo">ONLINE MEDICAL STORE</label>
	      <ul>
		      <li><a href="homepage.html">Home</a></li>
			  <li><a href="about.html">About</a></li>
			  <li><a href="medicine.php">Medicines</a></li>
			  <li><a href="login.php">Login</a></li>
			  <li><a class="active4"href="registration.php">Register</a></li>
			  <li><a href="feedback.php">Feedback</a></li>
          </ul>
	  </nav>
	  <br><br>
   <div class="div1">
   <h1>USER REGISTRATION</h1>
   <hr>
   <br><br>
   <form method="post" action="" name="registration">
   <label>Name</label> 
   <input type="text" name="name" style="margin-left:160px;" required  pattern="[a-zA-Z'-'\s]*"title="Name should have uppercase or lowercase letter" value="<?php echo $name;?>"><br><br>
   <label>Username</label>
   <input type="text" name="username" style="margin-left:122px;" required value="<?php echo $username;?>"><br><br>
   <label>Password</label>
   <input type="password" name="password" style="margin-left:125px;"  value="<?php echo($_POST['password']); ?>" required><br><br>
   <label>Confirm Password</label>
   <input type="password" name="cpassword" style="margin-left:45px;"  value="<?php echo($_POST['cpassword']); ?>" required><br><br>
   <label>Mobile</label>
   <input type="text" name="mobile" style="margin-left:149px;" required pattern="[7-9]{1}[0-9]{9}" title="Number sould in digits"  maxlength="10" value="<?php echo $mobile;?>"><br><br>
   <label>Email</label>
   <input type="email" name="email" style="margin-left:157px;" required pattern="(\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*)" title="There should email in proper formate" maxlength="31"  value="<?php echo $email;?>"><br><br>
   <label>Date of Birth</label>
   <input type="date" name="dob" style="margin-left:94px;" size="100" required value="<?php echo $dob;?>"><br><br>
   <label>Address</label>--
   <input type="text" name="address" style="margin-left:130px;" required title="Address should have uppercase or lowercase letter" value="<?php echo $address;?>"><br><br>
    <br><br>
   <input type="submit" name="submit" class="button1" value="Register">
   <input type="reset" class="button2" value="Reset">
   <br><br>
   <p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
   </form>
  </div>
  
 </body>
</html>