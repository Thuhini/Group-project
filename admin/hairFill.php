<?php include 'header.php'; ?>
<?php
<<<<<<< HEAD
 require_once('auth.php');
 ?>
<?php
=======
>>>>>>> 1717e532022095b00a00757d7711fb2c23830a94

  $id=$_POST['id'];
  global $ic;
  global $in;
  global $dis;
  global $pri;
  $db=mysqli_connect("localhost","root","") or die ("Error Occures");
  mysqli_select_db($db,"customer") or die("Error Occures");
  $sql = "SELECT * FROM hair WHERE ItemCode='$id'";
  $records = mysqli_query($db,$sql);
  $row = mysqli_fetch_assoc($records);
  $ic=$row["ItemCode"];
  $in=$row["ItemName"];
  $dis=$row["Discription"];
  $pri=$row["Price"];
  //header("Location: http://localhost/Customer/admin/skin.php");

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="../css/register.css">
  </head>
  <body>
    <br>
      <a type="button" id="myBtn" class="button3" href="hair.php" style="margin-left:25px;background-color: #ee4e0d;">Back</a>

            <form action="action/updateHair.php" method="post" enctype="multipart/form-data">
              <div class="container">
                <div class="container signin">
                  <center>
                    <h1>Update Hair Item</h1>
                    <p>Please Make changes correctly to form to Update
                       Hair Item</p>
                  </center>
                </div>
                <hr>
                <center>
                    <label for="ItemCode"><b>Item Code</b></label>
                    <br>
                    <input type="text" placeholder="Enter Name" name="ItemCode" value="<?php echo $ic ?>" readonly>
                    <br>
                    <label for="ItemName"><b>Item Name</b></label>
                    <br>
                    <input type="text" placeholder="Enter Email" name="ItemName" value="<?php echo $in ?>" required>
                    <br>
                    <label for="Discription"><b>Discription</b></label>
                    <br>
                    <input type="text" placeholder="Enter Discription" name="Discription" value="<?php echo $dis ?>"required>
                    <br>
                    <label for="Price"><b>Price LKR</b></label>
                    <br>
                    <input type="Text" placeholder="Repeat Password" name="Price" value="<?php echo $pri ?>" required>
                    <br>
                    <label for="image"><b>Image</b></label>
                    <br>
                    <input type="hidden" name="size" value="1000000">
                    <input type="file" name="image">
                    <hr>
                    <input type="submit" class="registerbtn" name="submit" value="Update"></input>
                </center>
              </div>

              <div class="container signin">

              </div>
            </form>
  </body>
</html>
