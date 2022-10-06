
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>forgot password</title>
  </head>
  <body>
    <div class="container">

        <form id="register">
            <h2>update your password here</h2>
            <hr>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" name="loginemail1" aria-describedby="emailHelp" required>
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" class="form-control" id="updatepassword" name="updatepassword">
              <div id="validate" class="invalid-feedback">
                password should be Minimum eight characters, at least one uppercase letter, one lowercase
                letter, one number and one special character
            </div>
            </div>
            
            <button type="submit" id="updatepwd" class="btn btn-primary" onclick="formregistration()" disabled>Update Password</button>
          </form>
          
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->

    <script>
        let newpwd = document.getElementById('updatepassword')
        // console.log(newpwd)
        let updatepwd = document.getElementById('updatepwd')
        
        // updatepwd.addEventListener('click', formregistration())
        
        newpwd.addEventListener('blur', function() {
            // console.log("blurred")
            let regx = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$#!%*?&]{8,}$/
            let str = newpwd.value
            // console.log(regx,str)
            if (regx.test(str)) {
                console.log("password is valid")
                newpwd.classList.remove('is-invalid')
                pwd = true
            } else {
                console.log("password is invalid")
                newpwd.classList.add('is-invalid')
                pwd = false
            }
        })
        
        
        newpwd.addEventListener('blur', function() {
            if (pwd) {
                // console.log('validated')
                updatepwd.removeAttribute("disabled")
            } else {
                // console.log("not validated ")
                updatepwd.setAttribute("disabled", true)
            }
        })
        
        
        
        
        
        
        function formregistration() {
        
        let registrationform = document.querySelector('#register');
        // let message = document.querySelector('#message')
        
        registrationform.addEventListener('submit',function(){
            updatepwd.setAttribute("disabled", true)
            updatepwd.innerHTML="Please Wait"
        })
        
        let html = ""
        registrationform.onsubmit = async (e) => {
            e.preventDefault();
        
            let response = await fetch('_forgotpassword.php', {
                method: 'POST',
                body: new FormData(registrationform)
            });
        
            res = await response.text();
        
            if(res){
                updatepwd.removeAttribute("disabled")
                updatepwd.innerHTML="Submit"
            }
        
            if (res == 1) {
                window.location.assign("forgotpassword_verification.php")
            }
            
            if(res == 0){
                
                updatepwd.innerHTML="user doesn't exist...go and signup"
            }
        }
        
        }
        </script>
  </body>
</html>

















<!-- #codeByPra9 -->