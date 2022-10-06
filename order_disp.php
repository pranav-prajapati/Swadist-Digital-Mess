<!doctype html>
<html lang='en'>

<head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <link rel="stylesheet" href="css/menuviews.css" />
    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css'
        integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='css/order_view.css'>

    <title>Order</title>
</head>

<body>
    <?php 
    
        include 'partials/header.php';

        include 'partials/connection.php';

        $loggedin=$_SESSION['loggedin'];

        if($loggedin!=true){
            echo '<script> location.replace("index.php"); </script>';
        }
    ?>

    <div class='container'>

        <?php

            $id=$_GET['id'];
            $sql="SELECT * FROM `mess_list` WHERE mess_id=$id";
            $result=mysqli_query($conn,$sql);

            $row=mysqli_fetch_assoc($result);
            
            echo "<div class='jumbotron my-4' style='background-image:url(images/bg2.jpg); color:white;'>
            <h1 class='display-5 mb-2' style='color:black; text-transform:uppercase; background-color:rgba(255, 255, 255, 0.603);  text-shadow: 1px 1px 2px #000000'>".$row['mess_name']." mess</h1>
            <h5 class='my-4' style='letter-spacing: 1px; text-shadow: 1px 1px 2px #000000'>".$row['mess_menu']."</h5>
            <hr class='my-4 bg-light'>
            <form method='POST' id='form'>
            <div class='quantity '>
                <button class='btn minus-btn disabled' type='button'>-</button>
                <input type='text' name='quantity' id='quantity' value='1'>
                <button class='btn plus-btn' type='button'>+</button>
            </div>

            <!--will calculate price---->
            <p class='total-price'>
                <span>Total Payable Amount : <i class='fa fa-inr' aria-hidden='true'></i></span>
                <span id='price' name='amount' style='color: rgb(245, 245, 245)'><b>50</b></span>
            </p>
            <input type='hidden' name='amount' id='price1' value='50'>
            <input type='hidden' name='id' value=".$_GET['id'].">  
            <a class='btn btn-success btn-lg mx-2 ' href='index.php' role='button'>Add more</a>
            <span id='addtocart'><button type='submit' class='btn btn-primary btn-lg' onclick='formregistration()'>ORDER NOW</button></span>
            </div>
            </form>";
        

           

        
        ?>
    </div>

    <?php include 'partials/footer.php'; ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'
        integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'>
    </script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx' crossorigin='anonymous'>
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js' integrity='sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js' integrity='sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN' crossorigin='anonymous'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js' integrity='sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s' crossorigin='anonymous'></script>
    -->

    <script>
    //setting default attribute to disabled of minus button
    document.querySelector('.minus-btn').setAttribute('disabled', 'disabled');

    //taking value to increment decrement input value
    var valueCount

    //taking price value in variable
    var price = document.getElementById('price').innerText;

    //price calculation function
    function priceTotal() {
        var total = valueCount * price;
        document.getElementById('price').innerText = total
        let new1=document.getElementById('price1').value=total
        // console.log(new1)
    }

    //plus button
    document.querySelector('.plus-btn').addEventListener('click', function() {
        //getting value of input
        valueCount = document.getElementById('quantity').value;

        //input value increment by 1
        valueCount++;

        //setting increment input value
        document.getElementById('quantity').value = valueCount;

        if (valueCount > 1) {
            document.querySelector('.minus-btn').removeAttribute('disabled');
            document.querySelector('.minus-btn').classList.remove('disabled')
        }

        //calling price function
        priceTotal()
        
    })

    //plus button
    document.querySelector('.minus-btn').addEventListener('click', function() {
        //getting value of input
        valueCount = document.getElementById('quantity').value;

        //input value increment by 1
        valueCount--;

        //setting increment input value
        document.getElementById('quantity').value = valueCount

        if (valueCount == 1) {
            document.querySelector('.minus-btn').setAttribute('disabled', 'disabled')
        }

        //calling price function
        priceTotal()

    })

    function formregistration() {

let registrationform = document.querySelector('#form');
// console.log(registrationform)
// let message = document.querySelector('#message')

// registrationform.addEventListener('submit',function(){
//     submit.setAttribute("disabled", true)
//     submit.innerHTML="Please Wait"
// })


registrationform.onsubmit = async (e) => {
    e.preventDefault();

    let response = await fetch('addtocart.php', {
        method: 'POST',
        body: new FormData(registrationform)
    });

    res = await response.text();

    if(res){
        let addtocart=document.getElementById('addtocart')
        addtocart.innerHTML=`<a style='color:white' class='btn btn-warning btn-lg' href='cart.php' role='button'>Go To Cart</a>`
    }

}

}



        function preventBack() { 
            window.history.forward();  
        } 
          
        setTimeout("preventBack()", 0); 
          
        window.onunload = function () { null }; 
 
    </script>

</body>

</html>
























































<!-- #codeByPra9 -->