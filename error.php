<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION["errorMessage"])){
    $_SESSION["errorMessage"] = "Unfortunately your message was not send due to technical ";
    $_SESSION["errorMessage"] .= "problems. Please try again later or contact with us by phone.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,shrink-to-fit=no">
    <meta property="og:title" content="Restaurant">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:locale" content="en_US">
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/styles.min.css">    
    <title>Restaurant | Message sent</title>
</head>
<body class="bg-dark">
    <header class="container-fluid position-absolute px-0">
        <nav class="navbar navbar-expand-md nabvar-dark bg-transparent px-0">
            <a href="index.html" class="navbar-brand ml-3">
                <img src="img/navbar_logo.png" alt="logo"/>
                <span class="navbar-text font-logo text-primary font-weight-bold">
                    Restaurant
                </span>
            </a>
            <button class="navbar-toggler mr-3" data-toggle="collapse" data-target="#main-nav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main-nav">
                <ul class="navbar-nav ml-auto font-menu rounded-0">
                    <li class="nav-item">
                        <a href="index.html" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="dropdown-toggle nav-link"
                            data-toggle="dropdown">
                            Menu
                        </a>
                        <div class="dropdown-menu py-0">
                            <a href="regular-menu.html" class="dropdown-item">
                                Regular Menu
                            </a>
                            <a href="specials-menu.html" class="dropdown-item">
                                Specials Menu 
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="reservation.html" class="nav-link">Reservation</a>
                    </li>
                    <li class="nav-item">
                        <a href="about.html" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="contact.html" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="user.php" class="nav-link">
                            <span class="fa fa-user-o"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <section class="user-s1 container-fluid minh-25vh border-bottom border-dark">
        </section>
        <section class="user-s2 align-items-center d-flex bg-white text-white minh-50vh p-5">
            <div class="row mx-0 w-100">
              <div class="col-10 col-sm-8 col-md-6 col-lg-4 offset-1 offset-sm-2 offset-md-3 offset-lg-4 text-center">
                    <div class="alert alert-danger">
                        <h3 class="text-center font-header">Error!</h3>
                        <p class="initialism">
                            <?php
                                echo $_SESSION["errorMessage"];
                            ?>
                        </p>                  
                        <a href="reservation.html" 
                            class="btn btn-danger">Back</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="index-s6 container-fluid align-items-center d-flex bg-dark text-white minh-25vh border-top border-primary px-0">
            <div class="row justify-content-center mx-0 w-100">
                <div class="col-12 col-md-6 index-sub-s2 minh-25vh"></div>
                <div class="col-12 col-md-6 minh-25vh text-center py-3 d-flex align-items-center">
                    <div class="w-100">
                        <h3 class="text-primary m-3 font-weight-bold">
                        Contact us
                        </h3> 
                        <ul class="list-unstyled initialism">
                            <li>2nd Floor, CH Building,</li>
                            <li>New Design Str 12, NY</li>
                            <li>(+1)-888-123-3456</li>
                            <li>contact&#64;restaurant.rt</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main> 
    <footer class="container-fluid bg-dark font-weight-bold text-center text-primary p-3 border-top border-primary">
        <small class="my-0">
            Copyright &copy; 2020-2022 Tomasz Pankowski. All rights reserved.
            <a class="text-primary" href="privacy.html">Privacy policy</a>
        </small>
    </footer>
    <div class="modal fade" id="privacyModal">
        <div class="modal-dialog font-header">
            <div class="modal-content border-green p-2">
                <div class="modal-header text-center">
                    <h4 class="font-header text-green font-weight-bold">GPDR Declaration</h4>
                    <a href="#privacyModal" 
                        data-target="#privacyModal"
                        data-dismiss="modal"
                        class="close text-green">
                        &times;
                    </a>
                </div>
                <div class="modal-body">
                    <p class="initialism">
                        This website is a <span class="text-danger"> demo version </span> of real website,  It doesn't collect and process,
                        in long term meaning (longer than needed for website operation during visitor's
                        presence), any user (visitor) data.
                    </p>
                    <p class="initialism pt-2">
                        All information collected during visitor's 
                        presence on this website is used only for technical purposes, required for 
                        correct operation of website or demonstration purposes related to technical 
                        mechanisms and presentation of its operation... 
                        <a href="privacy.html" class="text-green font-weight-bold">More about privacy</a>
                    </p>                        
                    <p class="initialism pt-2">
                        If you accept privacy policy please click button "accept". If you 
                        refuse it, leave page by closing it in your web browser, please.
                    </p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-dark mx-auto"
                        onclick="acceptPrivacyPolicy()">
                        Accept
                    </button>
                </div>
            </div>
        </div>
    </div>  
    <script src="js/main.min.js"></script>
</body>
</html>
<?php $_SESSION["errorMessage"]=null ?>