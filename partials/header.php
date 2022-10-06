
<?php
session_start();



echo '<section id="nav-bar">
<nav class="navbar navbar-expand-md" style="padding:0px">
  <img src="images/SWADIST3.png" style="width:10%" class="img-fluid" alt="Responsive image">
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto"> 
    
    <li class="nav-item pl">';

    if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
      echo '<li class="nav-item">
      <img src="images/user.png" class="pt-2 pb-0 " alt="user-icon">
        </li>  
      <li class="nav-item">
          
          <div class="dropdown">
  <button class="nav-link btn  text-center mx-2 text-light" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  '.ucfirst($_SESSION['username']).' '.ucfirst($_SESSION['lastname']).'
    <i class="fa fa-angle-down" aria-hidden="true"></i>

  </button>
  
  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
  <a class="dropdown-item text-center nav-link" href="my_orders.php">My Orders</a>
  </div>
        </li>
        
      <a href="cart.php"><img src="images/cart.jpg" href="cart.php" height="40" width="48" class="pt-2 pb-1 my-0 nav-link" alt="cart-icon" ></a>
      
        <li class="nav-item cl">
        <a class="nav-link btn btn-danger border-secondary text-center mx-2" href="partials/_logouthandler.php">Logout</a>
        </li>';
    }
    else{
      echo'<li class="nav-item pl">
      <a class="nav-link btn link text-center mx-2"  data-toggle="modal" data-target="#loginModal" href="#">LOGIN</a>
    </li>
    <li class="nav-item cl">
      <a class="nav-link btn link border-secondary text-center mx-2"  data-toggle="modal" data-target="#signupModal" href="#">SIGNUP</a>
    </li>';
    }
      
    echo '</ul>
    
  </div>
</nav>

</section>
';

if(isset($_GET['verification'])){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>User Verified!</strong> Now you can login.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

if(isset($_GET['error'])&&$_GET['loginfailed']==true){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Login failed!</strong> '.$_GET['error'].'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}


if(isset($_GET['order'])=="success"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Order Placed Successfully!</strong> Wait till your order confirmation.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

if(isset($_GET['password_update'])=="success"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Your password is successfully updated!!!</strong> now you can login!!.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}

// if(isset($_SESSION['loggedin']))
// {
//   echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
//   <strong>Logged In!</strong> You are Successfully logged in.
//   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//     <span aria-hidden="true">&times;</span>
//   </button>
// </div>';
// }


include 'login_view.php';
include 'signUp_view.php';
?>

























<!-- #codeByPra9 -->