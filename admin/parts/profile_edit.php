<?php
include 'db_connect.php';

if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phno=$_POST['phno'];
    $ID=$_POST['id'];

    $sql="UPDATE admin SET adminname = '{$name}', email = '{$email}', phno = '{$phno}'  WHERE ID=$ID";
    
    $result=mysqli_query($conn,$sql) or die("Query Failed");
    
    if($result){
        header("location: ../admin.php");
    }
    else{
    echo "Please Check";
    echo mysqli_error($conn);
    }
    
    }
    else{
    header("location: ../admin.php");
    }


?>