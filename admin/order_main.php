<?php
session_start();
include '../admin/parts/db_connect.php';
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="./css/order.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <style>
  

</style>

  <title>Orders</title>
</head>

<body  style="background-image: url(../image/bg2.jpg);">
<div class="row">
  <div class="col-md-2"> 
<?php include '../admin/parts/admin_nav.php'; ?>
  </div>
  <div class="col">
    <?php


      $session_id = $_SESSION['user_id'];
      $qu = "SELECT * FROM admin WHERE ID=$session_id";
      $res = mysqli_query($conn, $qu);
      $row2 = mysqli_fetch_assoc($res);

      $mess = $row2['mess_name'];


        $query = "SELECT * FROM order_details WHERE order_to=$mess ORDER BY id DESC";

        $result = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                      ?>

                        <?php
                        $name = $row['order_from'];
                        $nameQu = "SELECT * FROM users WHERE id=$name";
                        $nameResult = mysqli_query($conn, $nameQu);
                        $rowx = mysqli_fetch_assoc($nameResult);

                        ?>






<div class="container">
<div class="jumbotron my-5" >
 
           <div class="row">
                      <div class="col-md-3" <?php
                                    if ($row['status'] === 'confirm') {
                                      echo "selected";
                                      echo '<body style="background-color:	rgb(82, 200, 82)">';
                                    } else {
                                      echo '<body style="background-color:rgb(228, 65, 60)">';
                                    }

                                    ?> 
                                   >  <img src="/Mini_Project/image/SWADIST2.png"  class="img-fluid" alt="Responsive image"> 
                       </div> 
        

                       <div class="col course-info" style="background-image: url(../image/jum.jpg);">

                         <div class="container">
                           <div class="row">
                           
                                 <div class="col">  <h6>ORDER #<?php echo $row['id']; ?></h6></div>
                                  <div class="col"> <h6>TIME :<?php echo $row ['date'];?></h6></div>
                           </div>
                                   <hr>

                                   <h5>Name : <?php echo $rowx['first name']; ?></h5>

                                            <div class="row my-2">
                                              <div class="col-md-4">
                                                <h6>Quantity :</h6>
                                                <h5><?php echo $row['qty']; ?></h5>
                                              </div>

                                              <div class="col-md-4">
                                                <h6>Amount :</h6>
                                                <h5><?php echo $row['amount']; ?></h5>
                                              </div>

                                              <div class="col-md-4">
                                                <h6>Payment :</h6>
                                                <h5><?php echo $row['payment_mode']; ?></h5>
                                              </div>
                                            </div>
                                               <hr>

                              <h6>ADDRESS: <?php echo $row['address']; ?></h6>
                              <hr>
                                <form action="../admin/parts/status_update.php" method="POST">
                                  <div class="form-row align-items-center">
                                    <div class="col-auto my-1">
                                      <input type="hidden" value="<?php echo $row['id']; ?>" name="sid">
                                     <b> <label class="mr-sm-2" for="inlineFormCustomSelect" style="color:green;">STATUS</label></b>
                                      <select class="custom-select mr-sm-2" name="status">
                                        <option name="status" id="pending" value="pending" <?php
                                                                                            if ($row['status'] === 'pending') {
                                                                                              echo "selected";
                                                                                            }

                                                                                            ?>>Pending

                                        </option>
                                        <option name="status" id="confirm" value="confirm" <?php
                                                                                            if ($row['status'] === 'confirm') {
                                                                                              echo "selected";
                                                                                            }

                                                                                            ?>>Confirm

                                        </option>
                                      </select>

                                      <button type="submit" name="updt" class="btn btn-danger  mx-5">CHANGE STATUS</button>

                                    </div>

                                  </div>
                                </form>


          </div>



        </div>
      </div>

</div>                                                          </div>


                                                                                          
<?php


    }


?>
</div>

</div></div>

</body>

</html>