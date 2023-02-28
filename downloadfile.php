<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login-applicant.php");
    exit;
}
else{
    $now = time(); // Checking the time now when home page starts.

    if ($now > $_SESSION['expire']) {
        echo "your login time has expired";
        session_destroy();
       
    }
}
?>
<!DOCTYPE html>
    <head>
        <title>Apply Page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./assets/css/home.css">
        <link rel="stylesheet" href="./assets/css/bootstrap.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
        <link rel="shortcut icon" href="./assets/img/IMG-20230221-WA0004.jpg" type="image/x-icon">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">

        </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>              
    </head>
    <style>
        
       @import url(./assets/css/apply.css);
       @import url(./assets/css/downloadfile.css);
       

        
    </style>
    <body>
        <div class="sticky">
            <div class="main">
                <div class="logo">
                    <a href="./index.html"><img class="image" src="./assets/img/IMG-20230221-WA0004.jpg" alt="logo"></a>
                </div>
                <div class="nav-bar">
                    <a class="index" href="./index.html"><i class="fas fa-home"></i> Home</a>
                    <a class="contactus" href="./applypage.html"><i class="fas fa-mouse"></i> Apply</a>
                    <a class="aboutus" href="./about-us.html"><i class="fas fa-user-tie"></i> About Us</a>
                </div>
                <div class="search-icon">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                </div>
                    <div class="login">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-sign-in"></i>  Login
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#"><i class="fas fa-user-md"></i>  As an applicant</a></li>
                              <li><a class="dropdown-item" href="#"><i class="fas fa-unlock"></i> As an Employee</a></li>
                              <li><a class="dropdown-item" href="./login-applicant.html"> <i class="fas fa-lock"></i>  As Admin</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content-main">
            <div class="profile">
            <?php
            echo  "<h2 class='header'>Welcome!  " . $_SESSION['firstname'] ." ". $_SESSION['surname'] . "</h2>";

            ?> 
            <div class="info">
                <h3 class="instruction">Set of instructions</h3>
                <ol>
                    <li>Please click on button to download file.</li>
                    <li>Fill the form manually and send to this email: <b>mastereyeservices@gmail.com.</b></li>
                    <li>Please attach this reference number to the form: <b><?php
                 echo    $_SESSION['reference'];
               ?></b> as evidence of payment</li>
                </ol>
            </div>
               <a class="form" href="./assets/img/application-form.pdf" download=""><button class="btn btn-success">Download File <i class="fas fa-download"></i></button></a>
               <a class="logout" href="logout.php"><button class="btn btn-danger">Logout <i class="fas fa-sign-out-alt"></i></button></a>
            </div>
        </div>
           
        <footer class="footer1">
            <br>
            <br>
            <br>
            <div class="container text-left">
                <div class="row">
                  <div class="col">
                    <h3 class="columns">ADDRESS</h3>
                    <br>
                    <h4 class="columns">JOS OFFICE:</h4>
                    <p>37, J.B. HOUSE CHURCH STREET</p>
                    <p>JOS, PLATEAU STATE</p>
                    <br>
                    <h4 class="columns">ABUJA OFFICE:</h4>
                    <p>SUIT 215, PLOT 630, CADASTRAL ZONE A09</p>
                    <p>DURUMI-AREA 1, GARKI, FCT-ABUJA</p>
                  </div>
                  <div class="col">
                    <h3 class="columns">OUR MISSION</h3>
                    <p class="inner-mission">
                        <br>
                        <i>Defining your safety and security</i>
                    </p>
                  </div>
                  <div class="col">
                    <h3 class="columns">CONTACT US</h3>
                    <br>
                    <h4 class="columns">Contact:</h4><p>091228455445, 09122749660</p>
                    <h4 class="columns">E-mail:</h4><p>mastereyeservicesltd@aol.com</p>
                  </div>
                </div>
              </div>
            <div>
            </div>
            <div class="copy">
                <p>MASTER-EYE SECURITY SERVICES LTD. Powered by Github .</p>
            </div>
          
        </footer>
        <script type="text/javascript" src="./assets/js/apply.js">
        </script>
        <script src="https://js.paystack.co/v1/inline.js"></script> 
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <script type="text/javascript"></script>
    </body>
</html>
