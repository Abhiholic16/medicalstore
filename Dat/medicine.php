 <?php
  if(isset($_POST['submit']))
  {
	 header("Location:login.php");
  }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="UTF-8">
      <link rel="stylesheet" href="homepagecss.css">
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
	  <link rel="stylesheet" href="homepagecss.css">
	  <title>medicines</title>
	  <style>
	  a.active6,a:hover
     {
	   background:#1b9bff;
	   transition:.5s;
     }
	 label
	 {
		 color:red;
	 }
    table, th, td 
	{
      border: 1px solid black;
      border-collapse: collapse;
	  text-align: center;
	  
    }
    th 
	{
       background-color: #96D4D4;
    }
     input{
     background-color: #4CAF50; /* Green */
     border: none;
     color: white;
     padding: 10px 20px;
     text-align: center;
     text-decoration: none;
     display: inline-block;
     font-size: 16px;
     margin: 4px 2px;
     cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
     transition-duration: 0.4s;
    }

    input:hover 
	{
     box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    }
	a.active2,a:hover
    {
      background:#1b9bff;
	  transition:.5s;
    }
     h2{color:rgb(144,135,176);font-family:arial;font-size:20px;margin-left: 40px;}
	     .button2 
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
			 margin-left:1115px;
         }
         .button2{border-radius: 5px;background-color: #f44336;} 
         
  		 .button2
		  {
			border:none;
			outline:none;
			cursor:pointer;
			text-transform:uppercase;
			color:white;
			translation:.3s;
		  }
		  .button2:hover
		  {
		    opacity:.7;
		  }
	</style>
 </head>
 <body>
 <nav>
	      <label class="logo">ONLINE MEDICAL STORE</label>
	      <ul>
		      <li><a href="homepage.html">Home</a></li>
			  <li><a href="about.html">About</a></li>
			  <li><a class="active2" href="medicine.php">Medicines</a></li>
			  <li><a href="login.php">Login</a></li>
			  <li><a href="registration.php">Register</a></li>
			  <li><a href="feedback.php">Feedback</a></li>
          </ul>
	  </nav>
	  <br><br>
	  <form action="" method="post">
	  <h2>AVAILABLE MEDICINES <input type="submit" name="submit" class="button2" value="Buy Now"></h2><br>
      </form>
	  <hr><br>
      <h1 align="center">SYRUP</h1><br>
	  <table style="width:97%;margin-left:20px;">
      <tr height="40px">
       <th style="width:5%;">Id</th>
	   <th style="width:25%;">Medicine Name</th>
	   <th>Price</th>
       <th>DOM</th>
	   <th>DOE</th>
	   <th>Image</th>
	 
     </tr>
	 <?php
	
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_type='syrup'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
      ?>
	  <form method="post" action="">
      <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['dom']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
      </tr>
	  </form>
     <?php
     }
     ?>
	 </table>
	 
	 <br><br><h1 align="center">TABLET</h1><br>
	 <table style="width:97%;margin-left:20px;">
      <tr height="40px">
       <th style="width:5%;">Id</th>
	   <th style="width:25%;">Medicine Name</th>
	   <th>Price</th>
       <th>DOM</th>
	   <th>DOE</th>
	   <th>Image</th>
	 
     </tr>
	 <?php
	
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_type='tablet'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
      ?>
	  <form method="post" action="">
      <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['dom']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
      </tr>
	  </form>
     <?php
     }
     ?>
	 </table>
	 
	 
	 <br><br><h1 align="center">CAPSULE</h1><br>
	 <table style="width:97%;margin-left:20px;">
      <tr height="40px">
       <th style="width:5%;">Id</th>
	   <th style="width:25%;">Medicine Name</th>
	   <th>Price</th>
       <th>DOM</th>
	   <th>DOE</th>
	   <th>Image</th>
	 
     </tr>
	 <?php
	
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_type='capsule'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
      ?>
	  <form method="post" action="">
      <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['dom']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
      </tr>
	  </form>
     <?php
     }
     ?>
	 </table>
	 
	 
	 
	 <br><br><h1 align="center">DROPS</h1><br>
	 <table style="width:97%;margin-left:20px;">
      <tr height="40px">
       <th style="width:5%;">Id</th>
	   <th style="width:25%;">Medicine Name</th>
	   <th>Price</th>
       <th>DOM</th>
	   <th>DOE</th>
	   <th>Image</th>
	 
     </tr>
	 <?php
	
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_type='drop'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
      ?>
	  <form method="post" action="">
      <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['dom']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
      </tr>
	  </form>
     <?php
     }
     ?>
	 </table>
	 
	 
	 
	 <br><br><h1 align="center">INHALERS</h1><br>
	 <table style="width:97%;margin-left:20px;">
      <tr height="40px">
       <th style="width:5%;">Id</th>
	   <th style="width:25%;">Medicine Name</th>
	   <th>Price</th>
       <th>DOM</th>
	   <th>DOE</th>
	   <th>Image</th>
	 
     </tr>
	 <?php
	
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_type='inhaler'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
      ?>
	  <form method="post" action="">
      <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['dom']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
      </tr>
	  </form>
     <?php
     }
     ?>
	 </table>
	 
	 
	 
	 <br><br><h1 align="center">INJECTION</h1><br>
	 <table style="width:97%;margin-left:20px;">
      <tr height="40px">
       <th style="width:5%;">Id</th>
	   <th style="width:25%;">Medicine Name</th>
	   <th>Price</th>
       <th>DOM</th>
	   <th>DOE</th>
	   <th>Image</th>
	 
     </tr>
	 <?php
	
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_type='injection'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
      ?>
	  <form method="post" action="">
      <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['dom']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
      </tr>
	  </form>
     <?php
     }
     ?>
	 </table>
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
    
	 <br><br>
	 <?php mysqli_close($conn); // Close connection ?>
</body>
</html>