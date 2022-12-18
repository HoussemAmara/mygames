<?php
  session_start();
  # redirect to home if logged in
  if (isset($_SESSION['username'])) { 
    header("Location: index.php");
    exit;
  }


  include_once("parts\_db.php");

  if(isset($_POST['submit'])){
    // retrieve the form data
    $email = $_POST['email'];
    $username = $_POST['name'];
    $password = $_POST['password'];
    if (empty($username) || empty($email) || empty($password)) {
      $error = "You must fill the form";
    }else{
      // create an INSERT query
      $query = "INSERT INTO `new_table`(`email`, `username`, `password`) VALUES ('$email','$username','$password');";

      
      $result = query_db($query);

      // execute the query
      if ($result) {
        // Set a session variable 
        $_SESSION['username'] =$username;
        
      } else {
        // display an error message
        $error = "Error: " . $query . "<br>" . mysqli_error($conn); echo $error; 
      }
      
    }
      
  }

	include "parts\_header.php"
?>
    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="img/normal-breadcrumb.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="normal__breadcrumb__text">
              <h2>Sign Up</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Signup Section Begin -->
    <section class="signup spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="login__form">
              <h3>Sign Up</h3>
              <?php if (isset($error) and $error) { ?>
              <div class="alert alert-danger" role="alert"><?= $error ?></div>
              <?php } ?>
              <form action="signup.php" method="post">
                <div class="input__item">
                  <input type="text" placeholder="Email address" name="email" />
                  <span class="icon_mail"></span>
                </div>
                <div class="input__item">
                  <input type="text" placeholder="Your Name" name="name" />
                  <span class="icon_profile"></span>
                </div>
                <div class="input__item">
                  <input
                    type="password"
                    placeholder="Password"
                    name="password"
                  />
                  <span class="icon_lock"></span>
                </div>
                <button
                  type="submit"
                  value="submit"
                  name="submit"
                  class="site-btn"
                >
                  Login Now
                </button>
              </form>
              <h5>
                Already have an account? <a href="./login.php">Log In!</a>
              </h5>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="login__social__links">
              <h3>Login With:</h3>
              <ul>
                <li>
                  <a href="#" class="facebook"
                    ><i class="fa fa-facebook"></i> Sign in With Facebook</a
                  >
                </li>
                <li>
                  <a href="#" class="google"
                    ><i class="fa fa-google"></i> Sign in With Google</a
                  >
                </li>
                <li>
                  <a href="#" class="twitter"
                    ><i class="fa fa-twitter"></i> Sign in With Twitter</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Signup Section End -->

<?php
	include_once "parts\_footer.php"
?>