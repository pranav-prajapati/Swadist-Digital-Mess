<?php include 'db_connect.php';
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Menu update</title>
  </head>
  <body style="background-image: url(../image/bg1.png);   background-repeat: repeat-y; background-size: cover;">
  <div class="row">
  <div class="col-md-2"> 

<?php include 'admin_nav.php'; ?>
  </div>
  <div class="col">
<div class="container my-5">    
<div class="jumbotron" style="background-color: #02203d">

<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];



    $sql1 = "SELECT * FROM mess_list WHERE mess_id=$id";
    $result1 = mysqli_query($conn, $sql1) or die("Query failed");

    if (mysqli_num_rows($result1)) {

        while ($row1 = mysqli_fetch_assoc($result1)) {

?>
          
            <form action="updation.php" method="POST" class="text-center">
                <div class="form-group">
                    <h3 style="color:white">UPDATE YOUR MENU </h3>
                    <input type="hidden"  name="id" value="<?php echo $row1['mess_id']; ?>" />
                    <input type="text" class="form-control" aria-describedby="emailHelp" name="Menu" value="<?php echo $row1['mess_menu']; ?>"> 
                    <small id="emailHelp" class="form-text text-muted">Update your menu daily...</small>
                </div>

                <button type="submit" name="update" class="btn btn-success">UPDATE</button>
                <a href="../admin.php" type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
            </form>
<?php
        }
    }
}
?>
</div>
</div>
  </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>
