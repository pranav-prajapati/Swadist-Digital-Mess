<!DOCTYPE html>
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
    <title>Swadist</title>

    
</head>


<!-- <body style="background-image: linear-gradient(to right,#dbdfa5,#dbdfa5)"> -->
    <body style="">

    <?php include 'partials/header.php'; // included---- Nav-bar ?>
    <?php include 'partials/connection.php'; ?>


    <!-------------------------------Caraosel---------------------------------------------->
    <section id="caraosel">

        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/banner.png" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1><label></label></h1>
                        <p></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/food2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 style="text-shadow: 2px 2px 4px #000000">DINE WITH YOUR NEAR ONCE</h1>
                        <p></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/food3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 style="text-shadow: 2px 2px 4px #000000">FOOD IS LOVE</h1>
                        <p></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images/food4.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 style="text-shadow: 2px 2px 4px #000000">FOOD IS LOVE</h1>
                        <p></p>
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>


    <!-----------------------------Messes-Menu-Cards------------------------------------>

    <section id="card-details">
        <div class="container">

            <h1>Mess Menu</h1>
            <hr>

            <div id="details" class="row justify-content-center ">

                <?php

                      $sql="SELECT * FROM `mess_list`";
                      $result=mysqli_query($conn,$sql);
                      $row_arr=array();

                      while($row=mysqli_fetch_assoc($result)){
                        $dt = new DateTime($row['date']);
                        
                        $image=$row['mess_image'];
                        echo "<div class='col-md-4 my-2'>
                        <!-- <div class='card  shadow p-3 mb-5' style='width: 18rem; background-color:#cfd8dc;'> -->
                            <div class='card shadow mb-5' style='border-radius:20px; width: 16rem; background-color:#dfd9d9;'>

                          <img src='$image' style='border-radius: 20px 20px 0px 0px;'  class='card-img-top' alt='Loading'>
                          
                            <h5 class='card-title'><a class='text-light'></a></h5>
                            <b><h5 class='card-text text-center' style='color:#263238'>".$row['mess_name']."</b>
                            <hr>
                            <h6 class='p-2' style='color:black;'><b>Date : </b> ".$dt->format('j , F  Y ')."</h6>
                            <div id='menu'>
                            <h5 class='p-2' style='color:black' class='card-text'><b>Menu : </b>".$row['mess_menu']."</h5>
                            </div>";
                            if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
                                echo "<center><a href='order_disp.php?id=".$row['mess_id']."' class='my-2 btn btn-success text-center' style='background-color:#02203d; color:white;'>ORDER NOW</a>";
                            }
                            else {
                                echo "<hr><small><span class='p-2' style='color:#CE0000'><center><b>Please Login to order a Food.</b></center></span></small>";
                            }
                            
                        echo"
                        </div>
                      </div>";

                        $row_arr[]=$row;
                      }
                    ?>

            </div>
        </div>
    </section>

    <?php include 'partials/footer.php' // included footer ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->


    
</body>

</html>













































<!-- #codeByPra9 -->