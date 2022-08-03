<?php 
 error_reporting(0);
 include 'config.php';
 if (isset($_POST['submit']))
 {
   $name=$_POST['name'];
   $email = $_POST['email'];
   $mobile = $_POST['mobile'];
   $message = $_POST['message'];
   $sql="INSERT INTO `feedback` (`name`, `email`, `phone`, `message`) VALUES ('$name', '$email', '$mobile', '$message')";
   mysqli_query($conn, $sql);
 }
?>
<!DOCTYPE html>
<html>
   <head>
   <title>feedback form</title>
   <link rel="stylesheet" href="feedbackcss.css">
    <link rel="stylesheet" href="homepagecss.css">
	<style>
	      a.active5,a:hover
          {
	        background:#1b9bff;
	        transition:.5s;
          }
	</style>
   </head>
   <body>
      <div class="nav1">
      <nav>
	      <label class="logo">ONLINE MEDICAL STORE</label>
	      <ul>
		      <li><a href="homepage.html">Home</a></li>
			  <li><a class="active5" href="feedback.php">Feedback</a></li>
          </ul>
	  </nav>
	  </div>
      <div class="contact-box">
	     <form action="" method="post">
		   <input type="text" name="name" class="input-field" placeholder="Your Name" required >
		   <input type="email" name="email" class="input-field" placeholder="Your Email" required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" title="There should email in proper formate" maxlength="31">
		   <input type="text" name="mobile" class="input-field"  pattern="[7-9]{1}[0-9]{9}" placeholder="Phone" required  maxlength="10">
		   <textarea type="text" name="message" class="input-field textarea-field" placeholder="Your Message" required>Your Message
		   </textarea><br>
		   <input type="submit" name="submit" class="btn"  value="submit">
		 </form>
	  </div>
   </body>
</html>

