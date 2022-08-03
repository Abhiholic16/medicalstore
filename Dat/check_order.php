<?php 
session_start();
include 'config.php';
$name=$_SESSION['username'];
$sql ="select name from customer where username='$name'";
	   $records = mysqli_query($conn,$sql); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
          
	        $namedata=$data['name'] ;  
			
       }
 
?>
<?php
       
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
         $sql ="select * from orders where name='$name'AND ord='$ord_no'";
	     $records = mysqli_query($conn,$sql); // fetch data from database
         while($data = mysqli_fetch_array($records))
         {
	  
			$time=$data['time'];
			$date=$data['date'];
			 ?>
	       
	      <?php
		 }
?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="homepagecss.css">
  <title>Check Order</title>
  <style>
     a.active7,a:hover
     {
	   background:#1b9bff;
	   transition:.5s;
     }
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
   <form method="post" action="">
   <nav>
	      <label class="logo"><?php echo("Welcome ".$_SESSION['username']);?></label>
	      <ul>
		     
			  <li><a href="welcome.php">Medicines</a></li>
			  <li><a class="active7" href="check_order.php">My Order</a></li>
			  <li><a href="logout.php">Logout</a></li>
          </ul>
	  </nav>
	</form>
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
	  ?>
	  <?php
	    if($n)
		{
	  ?>
	  <br><br><br>
	  <h1>ORDER CONFIRMATION</h1><br><hr>
	   <br><br>
	   <div class="div1">
	   <b><h2>Dear <?php echo $namedata;?> ,<br>Your order has been successfully placed on Date <?php echo($date);?> at <?php echo($time);?> .</h2><br></b>
	   <table style="width:100%">
       <tr height="40px">
       <th>Sr.No</th>
	   <th>Medicine Name</th>
	   <th>Cost</th>
       <th>Quantity</th>
	   <th>Total</th>
       </tr>
	    <?php
	     $x=1;
		 $sum=0;
         include 'config.php';
		 $n=$_SESSION['username'];
		 $ord_no=$_SESSION['ord'];;
        $sql ="select * from orders where name='$name'AND ord='$ord_no'";
	     $records = mysqli_query($conn,$sql); // fetch data from database
         while($data = mysqli_fetch_array($records))
         {
	        $medname=$data['medname'] ;  
			$price=$data['price'];
			$total=$data['total'];
			$quantity=$data['quantity'];
			$time=$data['time'];
			$date=$data['date'];
            $sum=$total+$sum;
			 ?>
	       <tr>
           <td><?php echo $x; ?></td>
	       <td><?php echo $medname; ?></td>
	       <td><?php echo "₹".$price; ?></td>
	       <td><?php echo $quantity; ?></td>
	       <td><?php echo "₹".$total; ?></td>
           </tr>
	      <?php
	       $x=$x+1;
		 }
	     ?> 
	  <br>
	  </table><br><br>
	 
	  <b><h3>Total Cost: <?php echo("₹".$sum);?></h3></b><br><br>
	   
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
	  <?php
		
		session_destroy();
	  ?>
	 </div>
	 
	
</body>
</html>










	   
      