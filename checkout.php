<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/menuviews.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
    
    <title>check out</title>
</head>

<body>
    <?php
     include 'partials/header.php';
     $loggedin=$_SESSION['loggedin'];

        if($loggedin!=true){
            echo '<script> location.replace("index.php"); </script>';
        }
       

        $session_id=$_SESSION['user_id'];
        $no_order=true;
        $sql="SELECT * FROM `users` where id=$session_id";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
  
          // $userid=$row['id'];
          $firstname=$row['first name'];
          $lastname=$row['last name'];
          $phno=$row['user_phone_no'];



        echo '<div class="container my-5">
        <div class="jumbotron" style="background-image:url(images/chk.jpg); color:white;">
            <h1 class="display-4" style="text-shadow: 2px 2px 4px #000000">CHECK YOUR ORDER</h1>
            
            <h6 class="my-3" style="text-shadow: 2px 2px 4px #000000" >Name : <b><h5> '.$firstname.' '.$lastname.' </b></h5>
               
            </h6>

            <h6 class="my-3" style="text-shadow: 2px 2px 4px #000000">Contact No : <b><h5> '.$phno.' </b></h5>
               
            </h6>

            <h4 class="my-3" style="text-shadow: 2px 2px 4px #000000">Order Summary:
               
            </h4>
            <table class="table table-striped">
                <thead class="table-dark">
                    <th scope="row">Sr.NO</th>
                    <th scope="row">Order To</th>
                    <th scope="row">Quantity</th>
                    <th scope="row">Amount</th>
                </thead>';


                $sql2="SELECT * FROM `order` where order_by=$session_id";
                $result2=mysqli_query($conn,$sql2);
                $order_no=1;
        while($row2=mysqli_fetch_assoc($result2)){
         $no_order=false;
   
        
           $quantity=$row2['quantity'];
           $amount=$row2['amount'];
           $mess=$row2['order_for'];
           $date=$row2['date'];
           $order_id=$row2['order_id'];
   
           $sql3="SELECT * FROM `mess_list` where mess_id=$mess";
           $result3=mysqli_query($conn,$sql3);
           $row3=mysqli_fetch_assoc($result3);
   
           $mess_name=$row3['mess_name'];
           
           echo '<tbody class="bg-light text-dark">
           <tr>
               <th scope="row">'.$order_no.'</th>
               <td>'.$mess_name.'</td>
               <td>'.$quantity.'</td>
               <td>'.$amount.'</td>
           </tr>
           
       ';
   
           $order_no++;
         };
            
   
         $sql="SELECT sum( amount ) FROM `order` where order_by=$session_id";
         $result=mysqli_query($conn,$sql);
         $row=mysqli_fetch_assoc($result);
         $totalamount=$row['sum( amount )'];
  
                
            ?>
    <tr>
        <th scope="row"></th>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <th scope="row"><strong>Total Amount<strong></th>
        <td></td>
        <td></td>
        <td style="color:#008000"><b><h5><?php echo $totalamount ?></h5><b></td>
    </tr>
    </tbody>
    </table>

    <!-- <form method='POST' action="partials/_checkouthandler.php"> -->
    <form id="confirm">
         <div class="form-group my-3">
            <h5 for="exampleFormControlTextarea1" style="text-shadow: 2px 2px 4px #000000">Add Your Delivery Address below :</h5>
            <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
        </div>

        <div class="my-3">
        <h5 style="text-shadow: 2px 2px 4px #000000">Payment Mode :</h5>
        </div>
       

        <div class="form-check">
        
            <input class="form-check-input" type="radio" name="paymentmethod" id="paymentmethod" value="COD" required>
            <span class="form-check" for="flexRadioDefault1">
                Cash On Delivery
            </span>
        </div>
        <br>
        <p class="lead text-center  mx-3">
            <a class="btn btn-danger mx-3 btn-lg" href="index.php" role="button">CANCEL</a>
            <button type="submit" id="checkout" onclick="formregistration()" class="btn btn-success btn-lg" >CHECKOUT</button>
        </p>

    </form>

    </div>
    </div>
    <?php include 'partials/footer.php'; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>

function formregistration() {

let registrationform = document.querySelector('#confirm');
// let message = document.querySelector('#message')
let submit = document.querySelector('#checkout');
registrationform.addEventListener('submit',function(){
    submit.setAttribute("disabled", true)
    submit.innerHTML="Please Wait"
})

let html = ""
registrationform.onsubmit = async (e) => {
    e.preventDefault();

    let response = await fetch('partials/_checkouthandler.php', {
        method: 'POST',
        body: new FormData(registrationform)
    });

    res = await response.text();

    if (res == 1) {
        window.location.assign("partials/_order_confirm.php")
    }

    if(res){
        submit.removeAttribute("disabled")
        submit.innerHTML="can't send OTP...Click to Try Again"
    }
    

}

}


</script>

   
</body>

</html>
































<!-- #codeByPra9 -->