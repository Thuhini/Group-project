<?php
  $db = mysqli_connect("localhost", "root", "", "customer");
  $msg = "";
  $itemcode=$_POST['ItemCode'];
  $itemname=$_POST['ItemName'];
  $discription=$_POST['Discription'];
  $price=$_POST['Price'];

  if (isset($_POST['submit'])) {
    $image = $_FILES['image']['name'];
    $target = "images/".basename($image);
    $sql="UPDATE bathandbody SET ItemName='$itemname' , Discription='$discription' , Price='$price' WHERE ItemCode='$itemcode'";
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "successfully Inserted";

  	}else{
  		$msg = "Failed";
  	}
    header("Location: http://localhost/Customer/admin/body.php");
  }
?>
