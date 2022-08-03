<?php 
session_start();
error_reporting(0);
include 'config.php';
           
		
if(isset($_POST['submit']))
{    
   header("Location:payment.php");	
}

if(isset($_POST['submit2']))
{    
   header("Location:welcome.php");	
}

?>
<!DOCTYPE html>
<html>
 <head>
   <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
	  <link rel="stylesheet" href="homepagecss.css">
	  <title>Cart items</title>
	  <style>
	   h1{color:rgb(144,135,176);font-family:arial;font-size:20px;margin-left: 40px;}
	   .div1{margin-left: 40px;}
	   p{color:red; font-size:18px;}
      
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
	 .div2
	 {
		margin-left: 1110px; 
		font-size:20px;
	 }
	 .div5{
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

     .div5:hover 
	{
		
      box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    }
	
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
		  .inline{display: inline-block;margin-left:1100px;}
	  </style>
      </head>
     <body>
     <nav>
	      <label class="logo"><?php echo("Welcome ".$_SESSION['username']);?></label>
	      <ul>
		     
			  <li><a href="logout.php">Logout</a></li>
          </ul>
	  </nav>
	  <br><br>
	  <h1>CART ITEMS</h1><br>
      <hr>
	  <div class=div1>
      <br><br>
	  <b><p>Item Added to Cart Successfully.</p></b>
	  <br>
      <table style="width:94%">
      <tr height="40px">
       <th>Sr.No</th>
	   <th>Product Name</th>
	   <th>Price</th>
       <th>Quantity</th>
	   <th>Total</th>
      </tr>
	  <?php
	     $x=1;
		 $sum=0;
         include 'config.php';
		 $name=$_SESSION['username'];
         $ord=$_SESSION['ord'];
         $sql="select * from orders where name='$name' AND ord='$ord'";
         $records = mysqli_query($conn,$sql); 
         while($data = mysqli_fetch_array($records))
         {
	       $medname=$data['medname'];
           $med_price=$data['price']; 
           $quantity=$data['quantity'];
           $total=$data['total'];
		   $sum=$total+$sum;
			 ?>
	       <tr>
           <td><?php echo $x; ?></td>
	       <td><?php echo $medname; ?></td>
	       <td><?php echo "₹".$med_price; ?></td>
	       <td><?php echo $quantity; ?></td>
	       <td><?php echo "₹".$total; ?></td>
           </tr>
	      <?php
	       $x=$x+1;
		 }
		 $_SESSION['sum']=$sum;
		 if($sum<=0)
         {
	       header("Location:welcome.php");	 
         }
	     ?>
       </table>	<br> 
    	 
	   <div class="inline">
	   <b><h3>Total Cost: <?php echo("₹".$sum);?></h3></b><br><br>
	   <form method="post" action="">
	   <input type="submit" name="submit" class="button2" value="Place Order" >
	   </form>
	   </div>
	   <form method="post" action="">
	   <input type="submit" name="submit2" class="button1" value="Add Medicine" >
	   </form>
	   </div>
	   
 </body>
</html>