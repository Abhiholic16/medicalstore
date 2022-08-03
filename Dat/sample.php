$name=$_SESSION['username'];
       $id=$_SESSION['med_id'];
	   $sql ="select * from product where med_id='$id'";
	   $records = mysqli_query($conn,$sql); // fetch data from database
       while($data = mysqli_fetch_array($records))
       {
      
	      $med_name=$data['med_name'] ;
	      $med_price=$data['price'] ; 
       }
	   $sum=$_SESSION['total'];
	   $quantity=$_SESSION['quantity'];
	   $no=$_SESSION['ord'];
	   $sql ="INSERT INTO `orders`( `name`, `id`, `medname`, `price`, `total`, `quantity`,`date`,`time`,`ord`) VALUES ('$name', ' $id', '$med_name', '$med_price', '$sum','$quantity',NOW(),NOW(),$no);";
	   mysqli_query($conn, $sql);