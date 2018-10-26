<!DOCTYPE html>
<?php include 'header.php'; ?>
<?php
 require_once('auth.php');
 ?>
<?php
$db=mysqli_connect("localhost","root","") or die ("Error Occures");
mysqli_select_db($db,"customer") or die("Error Occures");
$sql = "SELECT * FROM wellness";
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
        <h1>Wellness</h1>

    </center>
    <br>
    <center>
      <button id="myBtn" class="button3">Insert New Item</button>
      <!-- modal starts -->
      <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <div class="modal-body">

            <form action="action/wellnessInsert.php" method="post" enctype="multipart/form-data">
              <div class="container">
                <div class="container signin">
                  <center>
                    <h1>Insert New Wellness Item</h1>
                    <p>Please fill in this form Correctly to Insert new Wellness Item</p>
                  </center>
                </div>
                <hr>
                <center>
                    <label for="ItemCode"><b>Item Code</b></label>
                    <br>
                    <input type="text" placeholder="Enter Name" name="ItemCode" required>
                    <br>
                    <label for="ItemName"><b>Item Name</b></label>
                    <br>
                    <input type="text" placeholder="Enter Email" name="ItemName" required>
                    <br>
                    <label for="Discription"><b>Discription</b></label>
                    <br>
                    <input type="text" placeholder="Enter Discription" name="Discription" required>
                    <br>
                    <label for="Price"><b>Price LKR</b></label>
                    <br>
                    <input type="Text" placeholder="Repeat Password" name="Price" required>
                    <br>
                    <label for="image"><b>Image</b></label>
                    <br>
                    <input type="hidden" name="size" value="1000000">
                    <input type="file" name="image">
                    <hr>
                    <input type="submit" class="registerbtn" name="submit" value="Insert"></input>
                </center>
              </div>

              <div class="container signin">
                <p>Already have an account? <a href="login.php">Sign in</a>.</p>
              </div>
            </form>
          </div>
          <!-- <div class="modal-footer">
            <h3>Modal Footer</h3>
          </div> -->
        </div>

      </div>
      <!-- modal ends -->
    </center>
    <br>

    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Enter Item Code" style="float:right;margin-right:140px;margin-bottom:5px;">
    <br>
    <center>
    <table id="myTable">
      <tr>
        <th>ItemCode</th>
        <th>Item Name</th>
        <th>Discription</th>
        <th>price LKR</th>
        <th>Action</th>
      </tr>

      <?php
        $count = 0;

        while($row = mysqli_fetch_assoc($records)) {

          echo "<tr>";
					echo "<td>".$row["ItemCode"]."</td>";
					echo "<td>".$row["ItemName"]."</td>";
					echo "<td>".$row["Discription"]."</td>";
					echo "<td>".$row["Price"]."</td>";
          echo "<td>
              <form method='post' action='wellnessFill.php'>
              <input type='hidden' name='id' value=".$row["ItemCode"].">
              <button id=".$count." class='button1'>Edit</button>
              </form>
              <form method='post' action='action/wellnessDel.php' onsubmit='return delAl()'>
              <input type='hidden' name='id' value=".$row["ItemCode"].">
              <button type='submit' class='button2'>Delete</button>
              </form>
          </td>";
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
