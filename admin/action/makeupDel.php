<?php

  $id=$_POST['id'];
  $sql = "DELETE FROM makeup WHERE ItemCode='$id'";
  $db=mysqli_connect("localhost","root","") or die ("Error Occures");
  mysqli_select_db($db,"customer") or die("Error Occures");
  mysqli_query($db, $sql);
  header("Location: http://localhost/Customer/admin/makeup.php");

  ?>
