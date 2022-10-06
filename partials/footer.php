<!doctype html>

<head>
    <style>
    .site-footer {
        clear: both;

        /* background-color:#26272b; */
        background-color: #1d1e22;


        /* padding:45px 0 110px; */
        padding: 45px 0 30px;
        font-size: 15px;
        line-height: 20px;
        color: #737373;
        position: absolute;

        width: 100%;
    }

    .site-footer hr {
        border-top-color: #bbb;
        opacity: 0.5;
    }

    .site-footer hr.small {
        margin: 20px 0
    }

    .site-footer a {
        color: #fff;
        font-size: 16px;
        text-transform: uppercase;
        margin-top: 5px;
        letter-spacing: 2px;
        text-align: center;
    }

    .site-footer a:hover {
        color: #3366cc;
        text-decoration: none;
    }

    .footer-links {
        padding-left: 0;
        list-style: none
    }

    .footer-links li {
        display: block
    }

    .footer-links a {
        color: #737373
    }

    .footer-links a:active,
    .footer-links a:focus,
    .footer-links a:hover {
        color: #3366cc;
        text-decoration: none;
    }

    .footer-links.inline li {
        display: inline-block
    }

    .site-footer {
        text-align: center;
    }

    .copyright-text {
        text-align: center;
    }

    .copyright-text {

        margin: 10px;

    }

    @media (max-width:991px) {
        .site-footer [class^=col-] {
            margin-bottom: 30px
        }
    }

    @media (max-width:767px) {
        .site-footer {
            padding-bottom: 0
        }

        .site-footer .copyright-text,
        .site-footer {
            text-align: center;
        }
    }
    </style>
</head>

<body>
    <footer class="site-footer">
        <div class="container">
            <div class="row">
            <div class="col-xs-6 mx-4 col-md-2">
                    <a href="index.php">Home</a>

                </div>

                <div class="col-xs-6 col-md-2">
                    <a href="about.php">About</a>

                </div>

                <div class="col-xs-6 col-md-2">
                    <a href="">Contact</a>

                </div>

                <?php
                
                  if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
                    echo '<div class="col-xs-6 col-md-2">
                    <a href="partials/_logouthandler.php">Logout</a>
                    </div>';
                  } 
                  else {
                    // include 'login_view.php';
                    echo '<div class="col-xs-6 col-md-2">
                    <a href="" data-toggle="modal" data-target="#loginModal">Login</a>  
                    </div>';
                  }

                ?>


                <div class="col-xs-6 col-md-3">
                    <a href="">Feedback</a>

                </div>

            </div>
            <hr>
        </div>
        <div class="container">


            <div class="cp">
                <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by Digital Mess.
                </p>
            </div>

            <div class="icons">
                <a href=""> <i class="fa fa-instagram mx-2" aria-hidden="true"></i></a>

                <a href=""> <i class="fa fa-facebook mx-2" aria-hidden="true"></i></a>

                <a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>

            </div>



        </div>
        </div>
    </footer> <!-- Site footer -->

    </html>


    <!-- <div class="container-fluid bg-dark text-light py-3">
    <p class="text-center mb-0">Copyright 2020 Digital Mess | All rights reserved </p>
</div> -->



























<!-- #codeByPra9 -->