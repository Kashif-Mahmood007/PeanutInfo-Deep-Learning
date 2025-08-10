
<?php
session_start();

$signup = false;            // for generating alert if not signup
$error = "";                // the error generating in case if not signup (may password or username wrong)
$loginError = false;        // for generating alert if not login 
$login = false;    


if(isset($_SESSION["loggedin"])){
  $login = true;
}

require "components/_connect.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['signupBtn'])){

      $name = mysqli_real_escape_string($conn ,$_POST['name']);
      $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');

      // We do not need to secure the password here as we are hashing it
      $password = mysqli_real_escape_string($conn, $_POST['password']);
      $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);


      $sql = "SELECT * FROM `signup` WHERE `name` = '$name'";
      $result = mysqli_query($conn, $sql);
      $rows = mysqli_num_rows($result);

      if($rows == 0){
          if($password == $cpassword){
              $hash = password_hash($password, PASSWORD_DEFAULT);
              $sql = "INSERT INTO `signup` (`name`, `password`) VALUES ('$name', '$hash')";
              $result = mysqli_query($conn, $sql);
              $signup = true;
          }

          else{
              $signup = false;
              $error = "The Password and Confirm Password must be same";
          }
      }

      else{
          $signup = false;
          $error = "The username already exits";
      }

  }

  if(isset($_POST['loginBtn'])){
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

      $sql = "SELECT * FROM `signup` WHERE `name` = '$name'";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);

      if($num == 1){
          while($row = mysqli_fetch_assoc($result)){
              if(password_verify($password, $row['password'])){
                  $login = true;      
                  $_SESSION['loggedin'] = true;
                  $_SESSION['userid'] = $row['sno'];
                  $_SESSION['username'] = $name;
              }

              else{
                  $loginError = "The Password not matched, Try to login again";
                  $login = false;
              }
          }
      }
      
      else{
          $loginError = "The Username not found, Try another";
          $login = false;
      }


  }

  if(isset($_POST['logout'])) {
      // session_unset();
      // session_destroy();
      // session_start(); // Restart session to set logout message
      // $_SESSION['logout_success'] = true;
      // header("Location: index.php");
      // exit;

      session_unset();
      session_destroy();
      header("Location: index.php");
      exit;
  }
}

?>


<!-- Alert for error or successfully signup -->

<?php
if(isset($_POST['signupBtn'])){    
    if($signup){
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You account is created Sucessfully.
        <button type="button" class="btn-close btn-close-alert" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }

    else{
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failure!</strong> '. $error. '
        <button type="button" class="btn-close btn-close-alert" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }
}

if(isset($_POST['loginBtn'])){    
    if($login){
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are Logged in Successfully. Welcome '. $_SESSION['username'] .'
        <button type="button" class="btn-close btn-close-alert" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }

    else{
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failure!</strong> '. $loginError. '
        <button type="button" class="btn-close btn-close-alert" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }
}


// if(isset($_SESSION['logout_success'])) {
//   echo '
//   <div class="alert alert-success alert-dismissible fade show" role="alert">
//   <strong>Logged Out!</strong> You have been successfully logged out.
//   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//   </div>';
  
//   unset($_SESSION['logout_success']);     // So it doesn't show again
// }


?>




<?php
echo 
'<nav class="nav">
    <i class="uil uil-bars navOpenBtn"></i>
    <a href="index.php" class="logo">PeanutInfo</a>
    <ul class="nav-links">
      <i class="uil uil-times navCloseBtn"></i>
      <li><a href="index.php">Home</a></li>
      <li><a href="about.php">About Us</a></li>
      <!-- <li><a href="#">Publication</a></li> -->

      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
          aria-expanded="false">
          Image Processing
        </a>
        <ul class="dropdown-menu mt-3" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="image_classification.php">Peanut Classification</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="image_diseases_detection.php">Peanut Disease Detection</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item" href="image_pest_detection.php">Peanut Pest Detection</a></li>
        </ul>
      </li>

      <li><a href="contact.php">Contact Us</a></li>
    </ul>
    <div class="login">';

    if (!$login) {
      echo '
      <button type="button" class="btn login-buttons" data-bs-toggle="modal" data-bs-target="#SignupModal">
      <i class="uil uil-user-plus"></i>SignUp</button>
      <button type="button" class="btn login-buttons" data-bs-toggle="modal" data-bs-target="#LoginModal">
      <i class="uil uil-signin"></i>Login</button>
      ';
  } else {
      echo '
      <div class="nav-user-section">
        <div class="nav-user-info">
            <i class="uil uil-user-circle"></i> 
            Welcome, ' . htmlspecialchars($_SESSION['username']) . '
        </div>
        <form action="index.php" method="post" style="margin: 0;">
            <button type="submit" name="logout" class="btn btn-outline-light btn-sm logout-button">
                <i class="uil uil-signout"></i> Logout
            </button>
        </form>
    </div>
      ';
  }
 
    echo '</div>
  </nav>';

  ?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="components/css/_navbar.css">
  <link rel="stylesheet" href="components/css/_navbar_media_queries.css">
  <title>Document</title>
</head>
<body>


  <!-- Modals for signup and login -->


  <!-- Login Modal -->

<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content custom-modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 custom-modal-title" id="exampleModalLabel">Login Form</h1>
        <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form action = "<?php echo $_SERVER['REQUEST_URI']?>" method = "post">
          <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control custom-input-field" id="name" aria-describedby="emailHelp" name = "name" placeholder="Enter Your Name">
          </div>
          <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control custom-input-field" id="password" name = "password" placeholder="Enter Your Password">
          </div>
          <button type="submit" class="btn custom-btn-primary" name = "loginBtn">Submit</button>
          </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn custom-btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




  <!-- Signup Modal -->


  
<div class="modal fade" id="SignupModal" tabindex="-1" aria-labelledby="SignupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content custom-modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 custom-modal-title" id="exampleModalLabel">Signup Form</h1>
        <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form action = "<?php echo $_SERVER['REQUEST_URI']?>" method = "post">
          <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control custom-input-field" id="name" aria-describedby="emailHelp" name = "name" placeholder="Enter Your Name">
          </div>
          <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control custom-input-field" id="password" name = "password" placeholder="Enter Your Password">
          </div>
          <div class="mb-3">
              <label for="cpassword" class="form-label">Password</label>
              <input type="password" class="form-control custom-input-field" id="cpassword" name = "cpassword" placeholder="Confirm Your Password">
          </div>
          <button type="submit" class="btn custom-btn-primary"  name = "signupBtn">Create Account</button>
          </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn custom-btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</body>
</html>

