<?php 
session_start();
include 'config.php';
$name=$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="homepagecss.css">
  <title>Check Order</title>
  <style>
    
	  h1{color:rgb(144,135,176);font-family:arial;font-size:20px;margin-left: 40px;}
	  .div1{margin-left: 40px;}
	  h3{margin-left:1100px;font-size:20px;}
	  h2{font-size:20px;}
	  h4{font-size:20px;margin-left:400px;}
	  table {
         border-collapse: collapse;
        
      }

      th, td {
       text-align: left;
        padding: 8px;
      }

     tr:nth-child(even){background-color: #f2f2f2}

      th {
      background-color: #04AA6D;
      color: white;
     }
	
  </style>
</head>
<body>
   <form method="post" action="">
   <nav>
	      <ul>
		     
			  <li><a class="active8" href="welcome.php">Home</a></li>
			  <li><a href="logout.php">Logout</a></li>
          </ul>
	  </nav>
	</form>
	
	  
	   <div class="div1">
	   <?php
	     $n=0;
          include 'config.php';
          $name=$_SESSION['username'];
		  $no=0;
          $sql ="SELECT MAX(ord) AS ord FROM orders;";
          $records = mysqli_query($conn,$sql); // fetch data from database
           while($data=mysqli_fetch_array($records))
          {
      
             $ord_no=$data['ord'] ;
	      
          }
          $_SESSION['ord']=$ord_no;
          $sql ="select name from orders where name='$name'";
	      $records = mysqli_query($conn,$sql); // fetch data from database
          while($data = mysqli_fetch_array($records))
          {
          
	         $n=$data['name'] ;
             			 
			
          }
	    if($n)
		{
	  ?>
	   <br><br><br>
	  <h1>Your All Orders</h1><br><hr>
	   <br><br>
	   <table style="width:95%">
       <tr height="40px">
       <th>Sr.No</th>
	   <th>Medicine Name</th>
	   <th>Cost</th>
       <th>Quantity</th>
	   <th>Total</th>
	   <th>Date</th>
       </tr>
	    <?php
         include 'config.php';
		 $x=1;
		 $n=$_SESSION['username'];
         $sql ="select * from orders where name='$name'";
	     $records = mysqli_query($conn,$sql); // fetch data from database
         while($data = mysqli_fetch_array($records))
         {
	        $medname=$data['medname'] ;  
			$price=$data['price'];
			$total=$data['total'];
			$quantity=$data['quantity'];
			$date=$data['date'];
           
			 ?>
	       <tr>
           <td><?php echo $x; ?></td>
	       <td><?php echo $medname; ?></td>
	       <td><?php echo $price; ?></td>
	       <td><?php echo $quantity; ?></td>
	       <td><?php echo $total." ₹"; ?></td>
		   <td><?php echo $date; ?></td>
           </tr>
	      <?php
	       $x=$x+1;
		 }
	     ?> 
	  <br>
	  </table>
	  <br><br><br><br>
	 </div>
	   <?php
	    }
		else
	    {
	  ?> 
	    <br><br><br><br><br><br><br><br><br>
	    <h4>SORRY YOU HAVE NOT PLACED ANY ORDER YET...</h4>
	  <?php
		}
		
      ?>		
	
</body>
</html>










	   
      