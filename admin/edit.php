<?php
include '../admin/parts/db_connect.php';
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
  <style>
*{
    box-sizing: border-box;
}

.jumbotron {
	
	border-radius:10px;
	box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);


	overflow: hidden;
	
	
}



  </style>  


    <title>Edit</title>
  </head>
  <body>

      <div class="row">
          <div class="col-md-2">
<?php include '../admin/parts/admin_nav.php';  ?>
          </div>
          <div class="col my-5">
              
              <div class="container" >
              <div class="jumbotron" style="background-image:url(../image/jum.jpg);">
                  <h1 class="text-center">EDIT YOUR PROFILE</h1>
  <?php
if (isset($_GET['ID'])) {
    $id = $_GET['ID'];



    $sql1 = "SELECT * FROM admin WHERE ID=$id";
    $result1 = mysqli_query($conn, $sql1) or die("Query failed");

    if (mysqli_num_rows($result1)) {

        while($row1 = mysqli_fetch_assoc($result1)) {

?>

                <form method="POST" action="./parts/profile_edit.php">
                <input type="hidden" class="form-control" name="id" value="<?php echo $row1['ID']; ?>" id="exampleInputPassword1">
                <div class="form-group mx-5 my-3">
    <h4 for="exampleInputPassword1">Name</h4>
    <input type="text" class="form-control" name="name" value="<?php echo $row1['adminname']; ?>" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="form-group mx-5 my-3">
    <h4 for="exampleInputEmail1">Email address</h4>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row1['email']; ?>" placeholder="Enter email">

  </div>
  <div class="form-group mx-5 my-3">
    <h4 for="exampleInputPassword1">Phone No.</h4>
    <input type="text" class="form-control" name="phno" value="<?php echo $row1['phno']; ?>" id="exampleInputPassword1" placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-primary mx-5 my-2" name="submit">Submit</button>
</form>




                <?php
        }
    }
}


?></div>
              </div>

          </div></div>
</body>
</html>

