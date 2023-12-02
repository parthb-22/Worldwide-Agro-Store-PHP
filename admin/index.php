<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (!empty($_POST["submit"])) {
    $loginquery = "SELECT * FROM admin WHERE username='$username' && password='" . md5($password) . "'";
    $result = mysqli_query($db, $loginquery);
    $row = mysqli_fetch_array($result);

    if (is_array($row)) {
      $_SESSION["adm_id"] = $row['adm_id'];
      header("refresh:1;url=dashboard.php");
    } else {
      echo "<script>alert('Invalid Username or Password!');</script>";
    }
  }
}

?>

<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/login.css">
  <style>
    .form {
      position: relative;
    }

    .login-form input[type="password"] {
      padding-right: 30px;
      /* Increase padding-right to accommodate the eye icon */
    }

    .password-field {
      position: relative;
      margin-bottom: 15px;
      /* Adjust spacing as needed */
    }

    #togglePassword {
      position: absolute;
      top: 35%;
      right: 5px;
      /* Adjust as needed */
      transform: translateY(-50%);
      cursor: pointer;
    }
  </style>

</head>

<body>


  <div class="container">
    <div class="info">
      <h1 style="font-weight: 500;">Admin Panel</h1>
    </div>
  </div>
  <div class="form">
    <div class="thumbnail"><img src="../img/admin-icon.png" /></div>
    <span style="color:red;"><?php echo $message; ?></span>
    <span style="color:green;"><?php echo $success; ?></span>
    <form class="login-form" action="index.php" method="post">
      <input type="text" placeholder="Username" name="username" />
      <div class="password-field">
        <input type="password" placeholder="Password" name="password" id="passwordField" />
        <i class="fa fa-eye" id="togglePassword"></i>
      </div>
      <input type="submit" name="submit" value="Login" />
      <a href="../index.php" class="nav-item nav-link">Go to Home Page</a>
    </form>


  </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='js/index.js'></script>
  <script>
    const passwordField = document.getElementById("passwordField");
    const togglePassword = document.getElementById("togglePassword");

    togglePassword.addEventListener("click", function() {
      const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
      passwordField.setAttribute("type", type);
      if (type === "password") {
        togglePassword.classList.remove("fa-eye-slash");
        togglePassword.classList.add("fa-eye");
      } else {
        togglePassword.classList.remove("fa-eye");
        togglePassword.classList.add("fa-eye-slash");
      }
    });
  </script>
</body>

</html>