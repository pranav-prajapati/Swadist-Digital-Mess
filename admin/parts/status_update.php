<?php
include 'db_connect.php';
if(isset($_REQUEST['updt'])){
   $id=$_POST['sid'];
    $status=$_POST['status'];



$sql="UPDATE order_details SET status= '$status' WHERE id= $id";
echo $sql;


$result3=mysqli_query($conn,$sql) or die("Query Failed");

if($result3){
    
    header("location: ../order_main.php");
}
else{
    
echo "Please Check";
echo mysqli_error($conn);
}
}else{

    
    header("location: ../order_main.php");
}

?>