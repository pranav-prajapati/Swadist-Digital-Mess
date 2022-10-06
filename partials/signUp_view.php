<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup Here!!!</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <form method="POST" action="partials/_signuphandler.php"> -->
                <form id="register">
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="First name" id="firstname"
                                name="firstname" required>
                            <div id="validate" class="invalid-feedback">
                                first name Should be incude alphabets only and must include 2 characters
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="Last name" id="lastname"
                                name="lastname" required>
                            <div id="validate" class="invalid-feedback">
                                last name Should be incude alphabets only and must include 2 characters
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        Email address
                        <input type="email" class="form-control" id="signupemail" aria-describedby="emailHelp"
                            name="signupemail" required>
                        <div id="validate" class="invalid-feedback">
                            Enter Valid Email Address
                        </div>
                    </div>
                    <div class="form-group">
                        Password
                        <input type="password" class="form-control" id="signuppassword" name="signuppassword" required>
                        <div id="validate" class="invalid-feedback">
                            password should be Minimum eight characters, at least one uppercase letter, one lowercase
                            letter, one number and one special character
                        </div>
                    </div>
                    <div class="form-group">
                        Confirm Password
                        <input type="password" class="form-control" id="signupcpassword" name="signupcpassword"
                            required>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            Phone No.
                            <input type="tel" class="form-control" id="phno" name="phno" required>
                            <div id="validate" class="invalid-feedback">
                                Enter valid Phone Number
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            Hall Name
                            <select id="hallname" class="form-control" name="hallname" id="hallname" required>
                                <option value="">Select Your hall</option>


                                <?php
                                    include "partials/connection.php";
                                    $sql="SELECT mess_name FROM `mess_list`";
                                    $result=mysqli_query($conn,$sql);
                                    

                                    while($row=mysqli_fetch_assoc($result)){
                                        $hall=$row['mess_name'];
                                        echo "<option>$hall</option>";
                                    }
                    
                                ?>

                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <h6 style="font-size:15px">Room No.</h6>
                            <input type="text" class="form-control" id="roomno" name="roomno" required>
                        </div>
                    </div>

                    <button type="submit" id="submit" onclick="formregistration()"
                        class="btn btn-primary" disabled>Signup</button>
                    <!-- <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
                        <button class="btn btn-primary" style="pointer-events: none;" type="button" disabled>Disabled
                            button</button>
                    </span> -->
                    <button type="reset" id="reset" class="btn btn-primary">Reset</button>
                    <strong><span id="message"></span></strong>
                    
                </form>
            </div>

        </div>
    </div>
</div>


<!-- Validation Script for signup form -->
<script>
    const firstname = document.getElementById("firstname")
    const lastname = document.getElementById("lastname")
    const email = document.getElementById("signupemail")
    const phoneno = document.getElementById("phno")
    const password = document.getElementById('signuppassword')
    const cpassword = document.getElementById('signupcpassword')
    const hallname = document.getElementById('hallname')
    const roomno = document.getElementById('roomno')


    let fname = false
    let lname = false
    let email1 = false
    let phone = false
    let pwd = false

    //Name validation
    firstname.addEventListener('blur', function () {
        // console.log("blurred")
        let regx = /^[a-zA-Z][(a-zA-Z)]{1,50}$/
        let str = firstname.value
        // console.log(regx,str)
        if (regx.test(str)) {
            console.log("fname is valid")
            firstname.classList.remove('is-invalid')
            fname = true
        } else {
            console.log("fname is invalid")
            firstname.classList.add('is-invalid')
            fname = false
        }
    })

    lastname.addEventListener('blur', function () {
        // console.log("blurred")
        let regx = /^[a-zA-Z][(a-zA-Z)]{1,50}$/
        let str = lastname.value
        // console.log(regx,str)
        if (regx.test(str)) {
            console.log("lname is valid")
            lastname.classList.remove('is-invalid')
            lname = true
        } else {
            console.log("lname is invalid")
            lastname.classList.add('is-invalid')
            lname = false
        }
    })


    //Email validation
    email.addEventListener('blur', function () {
        // console.log("blurred")
        let regx = /^([_\.\-A-Za-z0-9]+)@([_\.\-A-Za-z0-9]+)\.([a-zA-Z]{2,7})$/
        let str = email.value
        // console.log(regx,str)
        if (regx.test(str)) {
            console.log("email is valid")
            email.classList.remove('is-invalid')
            email1 = true
        } else {
            console.log("email is invalid")
            email.classList.add('is-invalid')
            email1 = false
        }
    })

    //password validation
    password.addEventListener('blur', function () {
        // console.log("blurred")
        let regx = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$#!%*?&]{8,}$/
        let str = password.value
        // console.log(regx,str)
        if (regx.test(str)) {
            console.log("password is valid")
            password.classList.remove('is-invalid')
            pwd = true
        } else {
            console.log("password is invalid")
            password.classList.add('is-invalid')
            pwd = false
        }
    })

    //phone number validation
    phoneno.addEventListener('blur', function () {
        // console.log("blurred")
        let regx = /^[0-9]{10}$/
        let str = phoneno.value
        // console.log(regx,str)
        if (regx.test(str)) {
            console.log("phone number is valid")
            phoneno.classList.remove('is-invalid')
            phone = true
        } else {
            console.log("phone number is invalid")
            phoneno.classList.add('is-invalid')
            phone = false
        }
    })

    //TO enable signin button
    let input = document.getElementsByTagName('input')
    // console.log(input)

    for (let index = 0; index < input.length; index++) {
        // console.log(input[index])
        input[index].addEventListener('blur', function () {
            if (fname && lname && email1 && pwd && phone) {
                // console.log('validated')
                submit.removeAttribute("disabled")
            } else {
                // console.log("not validated ")
                submit.setAttribute("disabled", true)
            }
        })

    }


    function formregistration() {

        let registrationform = document.querySelector('#register');
        let message = document.querySelector('#message')

        registrationform.addEventListener('submit',function(){
            submit.setAttribute("disabled", true)
            submit.innerHTML="Please Wait"
        })

        let html = ""
        registrationform.onsubmit = async (e) => {
            e.preventDefault();

            let response = await fetch('partials/_signuphandler.php', {
                method: 'POST',
                body: new FormData(registrationform)
            });

            res = await response.text();

            if(res){
                submit.removeAttribute("disabled")
                submit.innerHTML="Submit"
            }

            let success = "Succesfully inserted"
            let pwd = "password doesn't match"
            let exist = "user already exist"

            if (res == 1) {
                window.location.assign("partials/_verification.php?email="+email.value)
            }

            if (res == 2) {
                html += `${exist}`
                message.innerHTML = html
                message.style.color = "red"
            }

            if (res == 0) {
                html += `${pwd}`
                message.innerHTML = html
                message.style.color = "red"
            }

        }

    }


</script>






















<!-- #codeByPra9 -->