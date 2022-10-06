<?php
session_start();
include 'partials/connection.php';


if($_SERVER['REQUEST_METHOD']=="POST"){
    $quantity=$_POST['quantity'];
    $amount=$_POST['amount'];
    $orderfor=$_POST['id'];
    $orderby=$_SESSION['user_id'];

    $sql = "INSERT INTO `order` (`quantity`, `amount`, `order_for`, `order_by`, `date`) VALUES ('$quantity','$amount','$orderfor','$orderby',current_timestamp())";

    $result=mysqli_query($conn,$sql);

    if($result){
        echo true;
    }
    
}


?>



































<!-- #codeByPra9 -->