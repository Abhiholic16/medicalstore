<!DOCTYPE html>
<?php
session_start();
include 'config.php';
error_reporting(0);
$username=$_SESSION['username'];
$ord=$_SESSION['ord'];
$sum=$_SESSION['sum'];
$sql="select name from customer where username='$username'";
$records = mysqli_query($conn,$sql); 
while($data = mysqli_fetch_array($records))
{
   $name=$data['name'];

}
 if (isset($_POST['submit']))
 {
    $id=$_POST['id'];
	$sql ="INSERT INTO `payment`(`username`, `transaction _id`, `ord`, `amount`) VALUES ('$username','$id','$ord','$sum')";
    $result =mysqli_query($conn, $sql);
	  
 }
 if(isset($_POST['submit']))
 {
       header("Location:check_order.php");	 
 }
 
?>
<html>
  <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width,initial-scale=1.0">
   <link rel="stylesheet" href="homepagecss.css">
   <title>Payment</title>
   <style>
    h1{color:rgb(144,135,176);font-family:arial;font-size:20px;margin-left: 40px;}
	.div1{margin-left: 40px;}
	   p{color:red; font-size:18px;}
      
	  table {
         border-collapse: collapse;
        
      }
	  label{ font-weight: bold;font-size:21px;}
	  .button1 
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
         .button1{border-radius: 5px;}
  		 .button1
		  {
			border:none;
			outline:none;
			cursor:pointer;
			text-transform:uppercase;
			color:white;
			translation:.3s;
		  }
		  .button1:hover
		  {
		    opacity:.7;
		  }
		   input{padding:2.5px;background-color:#f8f8f8; border: 2px solid #ccc;}
		  .div2{
          float:right;
		  margin-right:25%;
          width: 20%;
          padding:3px;
          }
   </style>
   <script>
	     function box()
	     {
            alert("Order Added successfully");
	     }
	  </script>
  </head>
  <body>
    <nav>
	      <ul>
		      <li><a  href="welcome.php">Medicines</a></li>
			  <li><a href="logout.php">Logout</a></li>
          </ul>
	</nav><br><br>
   <h1>MAKE PAYMENT</h1><br><hr>
   <div class="div1">
   <br><br>
	  <b><p>Total Amount to be Paid : <?php echo "₹".$_SESSION['sum'];?></p></b>
	  <br>
   <br><br>
   
   <form method="post" action="" >
   <div class="div2">
   <img src="QR.jpeg" width="200" height="200"><br><br>
   <h1>9503648381<h1>
   </div>
   <label>Name:</label> 
   <input type="text" name="name" style="margin-left:160px;" value="<?php echo $name;?>" readonly><br><br>
   <label>Username:</label>
   <input type="text" name="username" style="margin-left:123px;" value="<?php echo  $username;?>" readonly><br><br>
   <label>Order No:</label>
   <input type="text" name="ord" style="margin-left:129px;"  value="<?php echo $ord;?>" readonly><br><br>
   <label>Transaction ID:</label>
   <input type="text" name="id" style="margin-left:80px;" required><br><br>
   <label>Total Amount</label>
   <input type="text" name="amount" value="<?php echo $_SESSION['sum'];?>" style="margin-left:99px;" required  readonly><br><br>
   <br><br>
   <input type="submit" name="submit" class="button1" value="Make Payment" onclick="box()">
   </form>
   
   
   </div>
   <?php mysqli_close($conn); // Close connection ?>
  </body>
</html>