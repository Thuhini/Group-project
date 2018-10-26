<!DOCTYPE html>
<?php include 'header.php'; ?>
<?php
 require_once('auth.php');
 ?>
<?php
$db=mysqli_connect("localhost","root","") or die ("Error Occures");
mysqli_select_db($db,"customer") or die("Error Occures");
$sql = "SELECT * FROM customerorders WHERE Status=1 ORDER BY OrderNo DESC";
$records = mysqli_query($db,$sql);
?>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="../css/register.css">
<link rel="stylesheet" href="css/table.css">
<link rel="stylesheet" href="css/modal.css">
  <head>
    <meta charset="utf-8">
    <title>Finished Orders</title>
    <style media="screen">

    </style>
  </head>

  <body>
    <center>
        <h1>Finished Orders</h1>

    <br>

    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter Item Code" style="float:right;margin-right:140px;margin-bottom:5px;">
    <br>
    <center>
    <table id="myTable">
      <tr>
        <th>Order Number</th>
        <th>Store</th>
        <th>ItemCode</th>
        <th>ItemName</th>
        <th>customerName</th>
        <th>Contact Number</th>
        <th>Address</th>
        <th>Quantity</th>
        <th>Payment</th>
      </tr>

      <?php
        $count = 0;

        while($row = mysqli_fetch_assoc($records)) {

          echo "<tr>";
					echo "<td>".$row["OrderNo"]."</td>";
					echo "<td>".$row["StoreType"]."</td>";
					echo "<td>".$row["ItemCode"]."</td>";
					echo "<td>".$row["ItemName"]."</td>";
          echo "<td>".$row["CustomerName"]."</td>";
          echo "<td>".$row["ContactNo"]."</td>";
          echo "<td>".$row["Address"]."</td>";
					echo "<td>".$row["Quantity"]."</td>";
          echo "<td>".$row["Payment"]."</td>";
					echo "</tr>";
          $count++;
        }
      ?>
    </table>

  <center>
    <script src="script/filter.js"></script>
    <script src="script/modal.js"></script>
    <script src="script/delAlert.js"></script>

  </body>
</html>
