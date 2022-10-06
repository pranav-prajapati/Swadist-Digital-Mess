<!doctype html>
<html lang="en">
<!-- Required meta tags -->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/menuviews.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    #ques {
        min-height: 550px;
    }
    </style>
    <title>Orders</title>
  </head>
  <body>

  <?php
     include 'partials/header.php';
     $loggedin=$_SESSION['loggedin'];

        if($loggedin!=true){
            echo '<script> location.replace("index.php"); </script>';
        }
  ?>
<div class="container" id="ques">


  <?php

     $session_id=$_SESSION['user_id'];
     $no_order=true;
     $sql2="SELECT * FROM `order` where order_by=$session_id";
     $result2=mysqli_query($conn,$sql2);
     $order_no=1;
     while($row2=mysqli_fetch_assoc($result2)){
      $no_order=false;

      $sql="SELECT * FROM `users` where id=$session_id";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);

        // $userid=$row['id'];
        $firstname=$row['first name'];
        $lastname=$row['last name'];
        $phono=$row['user_phone_no'];
        $quantity=$row2['quantity'];
        $amount=$row2['amount'];
        $mess=$row2['order_for'];
        $date=$row2['date'];
        $order_id=$row2['order_id'];

        $sql3="SELECT * FROM `mess_list` where mess_id=$mess";
        $result3=mysqli_query($conn,$sql3);
        $row3=mysqli_fetch_assoc($result3);

        $mess_name=$row3['mess_name'];
        
        echo '<div class="jumbotron my-5 shadow p-3 mb-5" style="background-image:url(images/jum.jpg); color:#110c37">
        <h6>ORDER NO : #'.$order_no.'</h6>
        <h8 name="date">DATE : '.$date.'</h8><br>
        <h8 name="phno">CONTACT NO : '.$phono.'</h8>
         <hr class="my-2">
        <h4 name="username">NAME: '.$firstname.' '.$lastname.'</h4><br>
        <div class="row">
        <div class="col-md-2">
       <b> <h7 name="qty">ORDER-TO:  '.$mess_name.'</h7><br>
       </div>
       <div class="col">
        <h7 name="qty">|   DISH QUANTITY:  '.$quantity.'</h7><br>
        </div>
        <div class="col">
        <h7 name="amount">|   AMOUNT: '.$amount.'</h7></b>
        </div>
       </div>
        <form action='.$_SERVER['REQUEST_URI'].' method="POST">
        <input type="hidden" name="removeorder" class="removeorder" value='.$order_id.'>
        <button type="submit" class=" my-3 remove btn btn-success" id='.$order_id.'>REMOVE FROM CART</button>
        </form>
        </div>';

        $order_no++;
      };
         

      



      if($no_order){
        echo '<div class="conainer text-center my-4">
        <img src="images/empty.png" style="width:30%" class="img-fluid" alt="Responsive image">
        <h5 style="color:gray"> Your Cart is Empty!!! <a class="btn btn-success btn-md mx-2 " href="index.php" role="button">CLICK HERE TO ORDER</a></h5>
        
        
        
        </div>';
      }
      
      if($_SERVER['REQUEST_METHOD']=="POST"){
        echo '<meta http-equiv="refresh" content="0.001">';
        $order_id=$_POST['removeorder'];
        $sql="DELETE FROM `order` WHERE `order`.`order_id` = $order_id";
        $result=mysqli_query($conn,$sql);
        }

      $sql="SELECT sum( amount ) FROM `order` where order_by=$session_id";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);
      $totalamount=$row['sum( amount )'];
  

  if($no_order==false){
    echo '<center><div class="jumbotron text-center shadow p-3" style="  width:30%; background: #02203d; color:white;">
        
    <h5>Total Amount : '.$totalamount.'</h5> <a href="checkout.php" class="btn btn-primary">PLACE ORDER</a>
    
    
    
    
    </div>';
  }
        

?>
</div>

<?php
include 'partials/footer.php';
?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };

    </script>  -->
    


  </body>
</html>































<!-- #codeByPra9 -->