<?php 

include 'db_connect.php';

if(isset($_POST['update'])){

$Menu=$_POST['Menu'];
$ID=$_POST['id'];
$sql="UPDATE mess_list SET mess_menu = '{$Menu}' WHERE mess_id=$ID";

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
