<?php
session_start();

include 'db_connect.php';

if (isset($_POST['submit'])) {

   $adminname = mysqli_real_escape_string($conn, $_POST['adminname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phno = mysqli_real_escape_string($conn, $_POST['phno']);
  $hallname = mysqli_real_escape_string($conn, $_POST['hallname']);

  $password = mysqli_real_escape_string($conn, $_POST['pass']);
  $cpassword = mysqli_real_escape_string($conn, $_POST['cpass']);

  $pass = password_hash($password, PASSWORD_BCRYPT);
  $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

  $emailq = "SELECT * FROM admin WHERE email='$email'";
  $query = mysqli_query($conn, $emailq);
  $emailcount = mysqli_num_rows($query);

  if ($emailcount > 0) {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
    <strong>Signup failed!</strong> Email already exist!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  } else {
    if ($password === $cpassword) {
      $insert = "INSERT INTO admin(`adminname`, `mess_name`, `email`, `phno`, `password`, `cpassword`) VALUES('$adminname', '$hallname', '$email', '$phno', '$pass', '$cpass')";

      $iquery = mysqli_query($conn, $insert);
      if ($iquery) {
        $_SESSION['alert'] = "SIGN-UP Successfully";
        $_SESSION['alert-code'] = "success";
      } else {
        $_SESSION['alert'] = "Inserted Not Successfully";
        $_SESSION['alert-code'] = "error";
      }
    } else {
      echo "Pasword are not matched";
    }
  }
}

?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>SIGNUP</title>

  <style>
body {font-family: Arial, Helvetica, sans-serif;}


input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #228B22;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  
}

img.avatar {
  width: 7%;
  border-radius: 70%;
  box-shadow: 0 20px 20px rgba(0, 0, 0, 0.2);
}

.container {
  padding: 16px;
  width:50%;
  box-shadow: 10px 20px 20px rgba(0, 0, 0, 0.2);
}

span.new {
 text-align: center;
 
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.new {
     display: block;
     float: none;
  }
 
}
</style>
</head>

<body style="background-image: url(/Mini_Project/image/form.jpg); ">
<div class="imgcontainer">
    <img src="/Mini_Project/image/signup.png" alt="Avatar" class="avatar">
  </div>

  <div class="container my-3">

    <h1 class="text-center"> SIGNUP HERE..</h1>



    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

    <div class="form-group">
        <label for="exampleInputEmail1"><b>FULL NAME</b></label>
        <input type="text" class="form-control" id="fullname" name="adminname" required>
        <div id="validate" class="invalid-feedback">
          Name Should be incude alphabets only and must include 2 characters
        </div>
      </div>


    <div class="form-group">
        <label for="exampleFormControlSelect1"><b>SELECT HALL</b></label>
        <select name="hallname" class="form-control" name="hall" id="hall" required>
          <option value="">Select Your hall</option>
          <?php



          $hallQuery = "SELECT * FROM mess_list";
          $selectHall = mysqli_query($conn, $hallQuery);

          while ($row = mysqli_fetch_assoc($selectHall)) {
            echo '<option value='.$row ['mess_id'].'>' . $row ['mess_name'] . '</option>';
          }

          ?>


        </select>
      </div>
     

      <div class="form-group">
        <label for="exampleInputPassword1"><b>EMAIL ADDRESS</b></label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
        <div id="validate" class="invalid-feedback">
         Please Enter Correct form of Email Address....
        </div>
      </div>


      <div class="form-group">
        <label for="exampleInputEmail1"><b>PHONE NO.</b></label>
        <input type="text" class="form-control" name="phno" id="phno" required>
        <div id="validate" class="invalid-feedback">
        Phone number contain only 10 digits...
        </div>
      </div>


      


      <div class="form-group">
        <label for="exampleInputPassword1"><b>PASSWORD</b></label>
        <input type="password" class="form-control" name="pass" id="pass" required>

        <div id="validate" class="invalid-feedback">
          Password should be minimum eight characters, at least one uppercase letter, one lowercase
          letter, one number and one special character
        </div>
      </div>


      <div class="form-group">
        <label for="exampleInputPassword1"><b>CONFIRM PASSWORD</b></label>
        <input type="password" class="form-control" name="cpass" id="cpass" required>
        <div id="validate" class="invalid-feedback">
       Please check your confirm password..
        </div>
      </div>




      <button type="submit" class="btn btn-primary" name="submit">SUBMIT</button>
      <h5> <a href="login.php">LOGIN HERE</a></h5>
    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <script src="../js/sweetalert.js"></script>
    <?php
    if (isset($_SESSION['alert']) && $_SESSION['alert'] != '') { ?>
      <script>
        swal({
          title: "<?php echo $_SESSION['alert']; ?>",
          // text: "You clicked the button!",
          icon: "<?php echo $_SESSION['alert-code']; ?>",
          showConfirmButton: false,
          timer: 1500
        });
      </script>
    <?php
      unset($_SESSION['alert']);
    }

    ?>


  </div>



  <script>

const uname = document.getElementById('fullname');
const email = document.getElementById('email');
const phno = document.getElementById('phno');
const pass = document.getElementById("pass");
const cpass = document.getElementById("cpass");
let validUname = false;
let validEmail = false;
let validPhno = false;
let validPs = false;
let validCps = false;




uname.addEventListener('blur', () => {
    console.log("blured");
    let regx = /^[a-zA-Z][(a-zA-Z)]{1,50}$/
    let str = uname.value;
    console.log(regex, str);
    if (regex.test(str)) {
        console.log("Name is valid");
        uname.classList.remove('is-invalid');
        validUname=true;
    } else {
        console.log("Name is not valid");
        uname.classList.add('is-invalid');
       validUname=false;
    }
});


email.addEventListener('blur', () => {
    console.log("email blured");

    let regex = /^([_\-\.0-9a-zA-Z]+)@([_\-\.0-9a-zA-Z]+)\.([a-zA-Z]){2,7}$/;
    let str = email.value;
    console.log(regex, str);
    if (regex.test(str)) {
        console.log("email is valid");
        email.classList.remove('is-invalid');
        validEmail=true;
    } else {
        console.log("email is not valid");
        email.classList.add('is-invalid');
    validEmail=false;
    }


});


phno.addEventListener('blur', () => {

    console.log("ph no blured");

    let regex = /^([0-9]){10}$/;
    let str = phno.value;
    console.log(regex, str);
    if (regex.test(str)) {
        console.log("Phone number is valid");
        phno.classList.remove('is-invalid');
        validPhno=true;
    } else {
        console.log("Phone number is not valid");
        phno.classList.add('is-invalid');
        validPhno=false;
    }


});



pass.addEventListener('blur', () => {

console.log(" no blured");

let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$#!%*?&]{8,}$/;
let str = pass.value;
console.log(regex, str);
if (regex.test(str)) {
  
    pass.classList.remove('is-invalid');
    validPs=true;
} else {
    console.log("Phone number is not valid");
    pass.classList.add('is-invalid');
    validPs=false;
}


});





cpass.addEventListener('blur', () => {

console.log(" no blured");

let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$#!%*?&]{8,}$/;
let str = cpass.value;
console.log(regex, str);
if (regex.test(str)) {
  
    cpass.classList.remove('is-invalid');
    validCps=true;
} else {
    console.log("Phone number is not valid");
    cpass.classList.add('is-invalid');
    validCps=false;
}


});










  </script>

</body>

</html>