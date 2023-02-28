
<?php
  if(isset($_POST["submit"])){
   
  session_start();
  // declaring the session mechanism
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
      header("Location:login-applicant.php");
  }
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "paystack_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email = $_REQUEST["email"];
$password = $_REQUEST["reference"];

    $sql = "SELECT * FROM candidate_table WHERE email = '$email' AND reference = '$password' limit 1 ";
    
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email; 
            $_SESSION["start"] = time();
            $_SESSION["expire"] =  $_SESSION['start'] + (3000);
            header("location:downloadfile.php");
            while($row = mysqli_fetch_assoc($result)){
             $_SESSION["firstname"] = $row["firstname"];
              $_SESSION["surname"] = $row["surname"];
              $_SESSION["reference"] = $row["reference"];
           }
          
  }

  $conn->close();

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
        
       @import url(./assets/css/login-applicant.css);
        
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
                              <li><a class="dropdown-item" href="#"> <i class="fas fa-lock"></i>  As Admin</a></li>
                            </ul>
                          </div>
                    </div>
                </div>
        </div>
        
        <div class="content-main">
            <h1 class="header">Login as an applicant</h1>
            <hr class="line">
            <div class="header-1">
                <h3>Login with your details</h3>
            </div>
            <div class="content-container">
                <div class="content-image">
                    <img class="image-login" src="./assets/img/Ouriginal_Header_Element-1.png" alt="Security man">
                </div>
                <div class="content-signup">
                    
                    <form action="login-applicant.php" method="POST" >
                        <div class="wrapper">
                            
                            <label for="email-address"><b>Email:</b></label>
                            <input type="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                            title="login with a valid email" class="form-control" id="email-address" 
                            autocomplete="on"  placeholder="e.g example123@gmail.com" name="email"  required aria-required="true">
                            <?php
                                
                            ?>
                            <br><br>
                            <label for="phone-number"><b>Password:</b></label>
                           <div class="input-container">
                            <input type="password"  class="form-control" name="reference" id="reference" autocomplete="on" placeholder="Your password is your reference number"
                             required>
                           </div>
                           
                           <br>
                            <button  type="submit" name="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Proceed to login  <i class="fas fa-sign-in-alt">  </i>
                            </button>
                            <br>
                            <br>
                            <div class="signup">
                            <span>
                                <p> Need an account? <b><a href="applypage.html">Signup</a></b></p>
                                
                            </span>
                        </div>
                            </div>
                        </div>
                    </form>
                </div>
                </div> 
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
            <style>
                .social{
                    display:flex;
                    column-gap: 20px;
                    justify-content: space-between;
                    width: 200px;
                   margin-left:520px;
                }
                .fa-facebook, .fa-linkedin, .fa-whatsapp{
                    font-size: 30px;
                    
                }
                .fa-facebook{
                    color: #3b5998;
                }
                .fa-linkedin{
                    color:#0072b1;
                }
                .fa-whatsapp{
                    color:#075e54;
                }
            </style>
            <div class="copy">
                <p>MASTER-EYE SECURITY SERVICES LTD. Powered by Github .</p>

               <div class="social">
               <a href="https://www.facebook.com/profile.php?id=100083360731755&mibextid=ZbWKwL" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook"></i></a>
                <a href="https://www.linkedin.com/in/elisha-adamu-505552134/" target="_blank" rel="noopener noreferrer"><i class="fab fa-linkedin"></i></i></a>
                <a href="tel:07067206984" target="_blank" rel="noopener noreferrer"><i class="fab fa-whatsapp"></i></i></a>
               </div>



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