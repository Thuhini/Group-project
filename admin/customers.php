<!DOCTYPE html>
<?php include 'header.php'; ?>
<?php
 require_once('auth.php');
 ?>
<?php
$db=mysqli_connect("localhost","root","") or die ("Error Occures");
mysqli_select_db($db,"customer") or die("Error Occures");
$sql = "SELECT * FROM users WHERE type='Customer'";
$records = mysqli_query($db,$sql);
?>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="../css/register.css">
<link rel="stylesheet" href="css/table.css">
<link rel="stylesheet" href="css/modal.css">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">

    </style>
  </head>

  <body>
    <center>
        <h1>Our Customer Details</h1>

    <br>

    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter Item Code" style="float:right;margin-right:140px;margin-bottom:5px;">
    <br>
    <center>
    <table id="myTable">
      <tr>
        <th>CustomerNo</th>
        <th>Customer Name</th>
        <th>Customer Email</th>
        <th>Number of Questions</th>
        <th>Total purchase</th>
      </tr>

      <?php
        $count = 0;

        while($row = mysqli_fetch_assoc($records)) {
          $a=$row["email"];
          $sql="SELECT * FROM question WHERE CustomerEmail='$a'";
          $result=mysqli_query($db, $sql);
          $number=mysqli_num_rows($result);



          $query = "SELECT * FROM customerorders WHERE CustomerEmail='$a'";
          $query_run = mysqli_query($db,$query);

          $qty= 0;
          while ($num = mysqli_fetch_assoc ($query_run)) {
              $qty += (int)$num['Payment'];
          }





          echo "<tr>";
					echo "<td>".$row["Id"]."</td>";
					echo "<td>".$row["name"]."</td>";
					echo "<td>".$row["email"]."</td>";
          echo "<td>".$number."</td>";
          echo "<td>".$qty.".00</td>";
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
