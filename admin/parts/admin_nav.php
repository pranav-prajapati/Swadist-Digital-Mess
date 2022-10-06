
<!-- <head>

<style>
  .navbar{
background-image: linear-gradient(to right, #02203d, #02203d);
  } 
</style>
</head>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <img src="/Mini_Project/image/SWADIST3.png" style="width:10%" class="img-fluid" alt="Responsive image">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto mx-2">
   
    <li class="nav-item mx-2">
        <a class="nav-link" href="admin.php">Menu</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link" href="order_main.php">Orders</a>
      </li>
      <a class="nav-link btn mx-2 btn-danger ABC text-center"   href="#">LOGOUT</a>
  
      <li style= "color:white;">
    <a >  </a>
    </li> 
    <li style="float:right"><a class="active" href="#about">About</a></li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
 
    </ul>
    
  </div>
</nav>

-->
 


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<!-- <link rel="stylesheet" href="css/all.min.css"> -->

<style>

  @import url('https://fonts.googleapis.com/css?family=Muli&display=swap');
body {
  margin: 0;
  font-family: 'Muli', sans-serif;

}

.sidebar {
  margin: 0;
  padding: 0;
  width: 250px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
  text-transform: uppercase;


}
 
.sidebar a.active {
  background-color: #02203d;
  color: white;
  text-align: center;
}
div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

.sidebar a:hover:not(.active) {
  background-color: #02203d;
  color: white;
}


@media screen and (max-width: 1000px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  
}


@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  
}

@media screen and (max-width: 600px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>
<body>

<?php    
     $session_id=$_SESSION['user_id'];
    $qu="SELECT * FROM admin WHERE ID=$session_id";
    
    $res=mysqli_query($conn,$qu);
    $row2=mysqli_fetch_assoc($res);
?>
<div class="sidebar">
<a class="active"><img src="/Mini_Project/image/SWADIST3.png" style="width:90%" class="text-center img-fluid" alt="Responsive image"><h1> SWADIST </h1> </a>
<b><a><span><i class="fas fa-2x fa-user-cog"></i></i></span> <?php echo $_SESSION['adminname'];?>
        </a></b>
        <hr>
<a href="admin.php"><i class="fas fa-utensils mx-2"></i>MENU</a>
<a href="order_main.php"> <i class="fas fa-concierge-bell mx-2"></i>ORDERS</a>
<a href="edit.php?ID=<?php echo $row2['ID']; ?>"> <i class="fas fa-edit mx-2"></i>Edit Profile</a>
<a  href="../admin/parts/logout.php"><i class="fas fa-sign-out-alt mx-2"></i>Logout</a>
  
</div>


 <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>
</html>
