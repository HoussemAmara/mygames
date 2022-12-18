<?php
  session_start();
  # redirect to home if logged in
  if (isset($_SESSION['username'])) { 
    header("Location: index.php");
    exit;
  }

  include_once("parts\_db.php");


  // check if the form has been submitted
  if(isset($_POST['submit'])) {
    // retrieve the form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // create a SELECT query
    $query = "SELECT * FROM new_table WHERE email='$email' AND password='$password'";

    // execute the query
    $result = query_db($query);

    // check if the query was successful
    if (mysqli_num_rows($result) > 0) {
      // The login form data was found in the database
      // Fetch the data
      $row = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $row['username'];
      header("Location: index.php");
      exit;
    } else {
      // the login form data was not found in the database
      // display an error message
      $error = "Invalid email or password!";
    }
  }

	include "parts\_header.php"
?>

    <!-- Normal Breadcrumb Begin -->
    <section
      class="normal-breadcrumb set-bg"
      data-setbg="img/normal-breadcrumb.jpg"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="normal__breadcrumb__text">
              <h2>Login</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Login Section Begin -->
    <section class="login spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="login__form">
              <h3>Login</h3>
              <?php if (isset($error) and $error) { ?>
              <div class="alert alert-danger" role="alert"><?= $error ?></div>
              <?php } ?>
              <form action="login.php" method="post">
                <div class="input__item">
                  <input type="text" placeholder="Email address" name="email" />
                  <span class="icon_mail"></span>
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
                  value="Submit"
                  name="submit"
                  class="site-btn"
                >
                  Login Now
                </button>
              </form>
              <a href="#" class="forget_pass">Forgot Your Password?</a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="login__register">
              <h3>Dont’t Have An Account?</h3>
              <a href="./signup.php" class="primary-btn">Register Now</a>
            </div>
          </div>
        </div>
        <div class="login__social">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
              <div class="login__social__links">
                <span>or</span>
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
      </div>
    </section>
    <!-- Login Section End -->

<?php
	include_once "parts\_footer.php"
?>