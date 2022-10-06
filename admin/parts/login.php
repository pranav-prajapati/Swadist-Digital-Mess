<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'db_connect.php';
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT * FROM admin WHERE email='$email'";
    $result=mysqli_query($conn,$sql);

    $num=mysqli_num_rows($result);

    if($num==1){
        $row=mysqli_fetch_assoc($result);
        
        if(password_verify($password,$row['password'])){
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['email']=$row['email'];
            $_SESSION['user_id']=$row['ID'];
            $_SESSION['adminname']=$row['adminname'];
            
            header('location:../admin.php');
           
        }
        else{
            // echo 1;
            
            $error="Wrong Login Credentials";
            header('location:login.php?loginfailed=true&error='.$error);
        }
       
    }
    else{
        // echo 2;
        header('location:login.php?loginfailed=true');
    }
    
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
  width: 10%;
  border-radius: 50%;
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
<br>


<form method="post">
  
<div class="imgcontainer">
    <img src="/Mini_Project/image/avatar2.png" alt="Avatar" class="avatar">
  </div>
  <div class="container">
  <b><h2 class="text-center my-3" style="color: white;">LOGIN HERE</h2></b>
  
    <label for="uname"><b>EMAIL ID</b></label>
  
    <input type="text" id="email" placeholder="Enter Email id" name="email" required>
    <div id="validate" class="invalid-feedback">
         Please Enter Correct Email Address..
        </div>

    <label for="psw"><b>Password</b></label>
    <input type="password"  id="pass" placeholder="Enter Password" name="password" required>
    <div id="validate" class="invalid-feedback">
          Please Enter Correct Password..
        </div>
        
    <b><button type="submit">Login</button></b>
    <span class="new"><a style="color: blue;" href="signup.php">CREATE NEW ACCOUNT</a></span>
  </div>


</form>









<script>

const email = document.getElementById('email');
const pass = document.getElementById("pass");

let validEmail = false;
let validPs = false;


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

  </script>
</body>
</html>


