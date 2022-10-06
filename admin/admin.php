<?php
session_start();

if (!isset($_SESSION['email'])) {
  echo "You are Logout";
  header("location: ../admin/parts/login.php");
}

include '../admin/parts/db_connect.php';
// include '../admin/admin_nav';


// $sql = "SELECT * FROM menu";

// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_array($result);
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

<style>

</style>

</head>

<body style="background-image: url(../image/form2.png);">
<div class="row">
  <div class="col-md-2">
  <?php include '../admin/parts/admin_nav.php'; ?>
  </div>
<div class="col">
  <div class="container">

    <div class="jumbotron my-5 ab" style="background-image:url(../image/jum.jpg);">
<div class="row">
<div class="col-md-2">
<img src="/Mini_Project/image/foodart.png" style="width:30%px" class="img-fluid" alt="Responsive image">

</div>
<div class="col">
    <?php    
     $session_id=$_SESSION['user_id'];
    $qu="SELECT * FROM admin WHERE ID=$session_id";
    
    $res=mysqli_query($conn,$qu);
    $row2=mysqli_fetch_assoc($res);

    $mess=$row2['mess_name'];
    
    ?>


<?php   
$qu2="SELECT * FROM mess_list WHERE mess_id = $mess";

$res2=mysqli_query($conn,$qu2);
$row3=mysqli_fetch_assoc($res2);

?>
       <h1 class="display-3"> <?php echo $row3 ['mess_name'] ?> </h1>

     <?php  
    //  $query="SELECT mess_menu FROM mess_list WHERE  mess_id='$hallname' ";
    //  $result2=mysqli_query($conn,$query);
    //  $row=mysqli_fetch_assoc($result2);
     ?>
      <h4  name="Menu" style="opacity:0.9"><?php echo $row3 ['mess_menu']; ?> </h4>
      <hr class="my-4">
      <a class="btn btn-primary btn-lg" href="../admin/parts/menu_update.php?id=<?php echo $row3['mess_id']; ?>" role="button">UPDATE MENU</a>
    </div>
    </div>
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