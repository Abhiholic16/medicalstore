<?php
session_start();
error_reporting(0);
 if(!isset($_SESSION['username']))
{
    header("Location:login.php");
}
 include 'config.php';
 $no=0;
 $sql ="SELECT MAX(ord) AS ord FROM orders;";
 $records = mysqli_query($conn,$sql); // fetch data from database
 if(!$_SESSION['ord'])
 {
   while($data=mysqli_fetch_array($records))
   {
      
       $ord_no=$data['ord'] ;
	      
   }
   $no=$ord_no+1;
   $_SESSION['ord']=$no;
 }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
	  <link rel="stylesheet" href="homepagecss.css">
	  <title>Welcome</title>
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
     .submit{
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

    .submit:hover 
	{
     box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    }
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
         .button1{border-radius: 5px;background-color: #f44336;} 
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
	  </style>
	  <script>
	     function box()
	     {
            alert("Product Added successfully");
	     }
	  </script>
  </head>
  <body>
    <nav>
	      <label class="logo"><?php echo("Welcome ".$_SESSION['username']);?></label>
	      <ul>
		     
			  <li><a class="active6" href="welocme.php">Medicines</a></li>
			  <li><a href="check_order.php">My Order</a></li>
			  <li><a href="history.php">Previous Orders</a></li>
			  <li><a href="logout.php">Logout</a></li>
          </ul>
	  </nav>
	  <br><br><br>
	  <h1 align="center">SYRUP</h1><br>
	  <?php
	  include 'config.php';
	  if(isset($_POST['submit']))
      {    
        header("Location:order.php");	
      }
      ?> 
	 <form action="" method="post">
	 <input type="submit" class="button1" name="submit" style="margin-left:1165px;"value="Purchase"><br>
	 </form><br>
	  <table style="width:99.3%;margin-left:5px;">
      <tr height="40px">
       <th style="width:60px;">Id</th>
	   <th style="width:21%;">Medicine Name</th>
	   <th style="width:10%;">Price</th>
	   <th>DOE</th>
	   <th>Quantity</th>
	   <th>Image</th>
	   <th>Select</th>
      </tr>
	 <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='1'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	    <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit1" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($_POST['input'])?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit1']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'];
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	 
	 
	  <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='2'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit2" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit2']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	 <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='3'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit3" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit3']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	 
	 <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='4'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit4" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit4']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	  
	  <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='5'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit5" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit5']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	 </table><br><br>
	 
	 <h1 align="center">TABLET</h1><br>
	  <table style="width:99.3%;margin-left:5px;">
      <tr height="40px">
       <th style="width:60px;">Id</th>
	   <th style="width:21%;">Medicine Name</th>
	   <th style="width:10%;">Price</th>
	   <th>DOE</th>
	   <th>Quantity</th>
	   <th>Image</th>
	   <th>Select</th>
      </tr>
	 <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='6'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit6" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit6']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	 <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='7'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit7" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit7']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	 <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='8'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit8" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit8']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	 <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='9'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit9" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit9']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	 <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='10'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit10" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit10']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	 </table><br><br>
	 
	 <h1 align="center">CAPSULE</h1><br>
	  <table style="width:99.3%;margin-left:5px;">
      <tr height="40px">
       <th style="width:60px;">Id</th>
	   <th style="width:21%;">Medicine Name</th>
	   <th style="width:10%;">Price</th>
	   <th>DOE</th>
	   <th>Quantity</th>
	   <th>Image</th>
	   <th>Select</th>
      </tr>
	 <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='11'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit11" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit11']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	 <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='12'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit12" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit12']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	 <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='13'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit13" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit13']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	 </table><br><br>
	 
	 <h1 align="center">DROPS</h1><br>
	  <table style="width:99.3%;margin-left:5px;">
      <tr height="40px">
       <th style="width:60px;">Id</th>
	   <th style="width:21%;">Medicine Name</th>
	   <th style="width:10%;">Price</th>
	   <th>DOE</th>
	   <th>Quantity</th>
	   <th>Image</th>
	   <th>Select</th>
      </tr>
	 <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='14'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit14" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit14']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	 <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='15'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit15" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit15']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	 <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='16'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit16" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit16']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	 </table><br><br>
	 
	 
	 
	 <h1 align="center">INHALER</h1><br>
	  <table style="width:99.3%;margin-left:5px;">
      <tr height="40px">
       <th style="width:60px;">Id</th>
	   <th style="width:21%;">Medicine Name</th>
	   <th style="width:10%;">Price</th>
	   <th>DOE</th>
	   <th>Quantity</th>
	   <th>Image</th>
	   <th>Select</th>
      </tr>
	 <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='17'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit17" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit17']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	  <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='18'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit18" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit18']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	  <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='19'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit19" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit19']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	 </table><br><br>
	 
	 
	 <h1 align="center">INJECTION</h1><br>
	  <table style="width:99.3%;margin-left:5px;">
      <tr height="40px">
       <th style="width:60px;">Id</th>
	   <th style="width:21%;">Medicine Name</th>
	   <th style="width:10%;">Price</th>
	   <th>DOE</th>
	   <th>Quantity</th>
	   <th>Image</th>
	   <th>Select</th>
      </tr>
	 <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='20'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit20" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit20']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	  <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='21'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit21" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit21']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	  <?php
       include 'config.php';
	   $records = mysqli_query($conn,"select * from product where med_id='22'"); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
       ?>
	   <form method="post" action="">
       <tr>
       <td><?php echo $data['med_id']; ?></td>
	   <td><?php echo $data['med_name']; ?></td>
	   <td><?php echo "₹".$data['price']; ?></td>
	   <td><?php echo $data['doe']; ?></td>
	   <td><input type="number" name="input" value=1 style="text-align:center;width:80px " ></td>
	   <td><img  src="<?php echo($data['img']);?>"  width="130" height="130"></td>
	   <td><input name="submit22" type="submit" class="submit" value="Add to Cart" onclick="box()" value=<?php echo($input)?>></td>
       </tr>
	   </form>
      <?php
	     include 'config.php';
	     if(isset($_POST['submit22']))
        {
	      $name=$_SESSION['username'];
		  $med_name=$data['med_name'] ;
	      $med_id=$data['med_id'] ; 
		  $input=$_POST['input'];
		  $price=$data['price'];
		  $total=$input*$price;
		  $no= $_SESSION['ord'];
	      $sql ="INSERT INTO `orders`(`name`, `id`, `medname`, `price`, `total`, `quantity`, `date`, `time`, `ord`) VALUES ('$name','$med_id','$med_name','$price','$total','$input',NOW(),NOW(),'$no');";
	      mysqli_query($conn,$sql);
	    }
	   }
	    
     ?>
	 </table><br><br>
  </body>
</html>