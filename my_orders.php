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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
     $sql2="SELECT * FROM `order_details` where order_from=$session_id";
     $result2=mysqli_query($conn,$sql2);
     $order_no=1;
     while($row2=mysqli_fetch_assoc($result2)){
      $no_order=false;

      $sql="SELECT * FROM `users` where id=$session_id";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);

        // $userid=$row['id'];
       
        $quantity=$row2['qty'];
        $amount=$row2['amount'];
        $mess=$row2['order_to'];
        $date=$row2['date'];
        $status=$row2['status'];
        $address=$row2['address'];
        $paymentmethod=$row2['payment_mode'];

        $sql3="SELECT * FROM `mess_list` where mess_id=$mess";
        $result3=mysqli_query($conn,$sql3);
        $row3=mysqli_fetch_assoc($result3);

        $mess_name=$row3['mess_name'];
        
        echo '<div class="jumbotron my-5 shadow p-3 mb-5" style="  background-image: linear-gradient(to right, #485563, #29323c); color:white;">
      
        <h6 name="date">Order : '.$order_no.'</h6>
        <h6 name="date">Date : '.$date.'</h6><hr>
        <h5 name="qty">Order To  :  '.$mess_name.'</h5>
        <h5 name="qty">Order Status  :  '.$status.'</h5>
        <h5 name="qty">Dish Quantity  :  '.$quantity.'</h5>
        <h5 name="qty">Your Address  :  '.$address.'</h5>
        <h5 name="qty">Payment Method  :  '.$paymentmethod.'</h5>
        <h5 name="amount">Amount  : '.$amount.'</h5>
       
        
        </div>';

        $order_no++;
      };

      if($no_order){
        echo '<div class="jumbotron my-5 shadow p-3 mb-5" style="background: #02203d; color:white;">
        <h1> You have not placed any order yet!!! <a class="btn btn-success btn-lg mx-2 " href="index.php" role="button">click here to order</a></h1>
        
        </div>';
      }
  ?>

</div>

<?php
include 'partials/footer.php';
?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->

    <!-- <script>

    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };

    </script>  -->
    


  </body>
</html>









































<!-- #codeByPra9 -->