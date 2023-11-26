<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>

  <!-- Reset CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <!-- Google Fonts -->
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>

  <!-- Font Awesome -->
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <!-- Custom Login Styles -->
  <link rel="stylesheet" href="css/login.css">
  <!-- Bootstrap and other CSS -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animsition.min.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body style="background-image: url('./img/bg.png'); background-size: cover; background-repeat: no-repeat; font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
  <header id="header" class="header-scroll top-header headrom">
    <nav class="navbar navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/icn.png" alt=""> </a>
        <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
          <ul class="nav navbar-nav">
            <li class="nav-item"> <a class="nav-link active" href="index.php">Home<span class="sr-only">(current)</span></a> </li>
            <?php
            if (empty($_SESSION["user_id"])) {
              echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Register</a> </li>';
            } else {


              echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
            }

            ?>

          </ul>
        </div>
      </div>
    </nav>
  </header>
  <?php
  include("connection/connect.php");
  error_reporting(0);
  session_start();
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($_POST["submit"])) {
      $loginquery = "SELECT * FROM users WHERE username='$username' && password='" . md5($password) . "'"; //selecting matching records
      $result = mysqli_query($db, $loginquery); //executing
      $row = mysqli_fetch_array($result);

      if (is_array($row)) {
        $_SESSION["user_id"] = $row['u_id'];
        echo "<script>
                alert('Login successful!');
                setTimeout(function(){
                    window.location.href = 'index.php';
                }, 1000); // 1 second delay
              </script>";
      } else {
        $message = "Invalid Username or Password!";
      }
    }
  }
  ?>


  <div class="pen-title">
    <h1><b>Login Here</b></h1>
  </div>

  <div class="module form-module">
    <div class="toggle">

    </div>

    <div class="form">
      <h2>Login to your account</h2>
      <span style="color:red;"><?php echo $message; ?></span>
      <span style="color:green;"><?php echo $success; ?></span>
      <form action="" method="post">
        <input type="text" placeholder="Username" name="username" />
        <div class="input-group">
          <input type="password" class="form-control" placeholder="Password" name="password" id="exampleInputPassword1" />
          <div class="input-group-append">
            <span class="input-group-text" id="togglePassword">
              <i class="fas fa-eye" aria-hidden="true"></i>
            </span>
          </div>
        </div>
        <input type="submit" id="buttn" name="submit" value="Login" class="btn btn-primary" />
      </form>

    </div>

    <div class="cta">Not registered?<a href="registration.php" style="color:#5c4ac7;"> Create an account</a></div>
  </div>
  <br>
  <div class="row justify-content-center">
    <div class="col-auto">
      <a href="index.php" class="btn btn-secondary">Go to Home Page</a>
    </div>
  </div>
  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#exampleInputPassword1');

    togglePassword.addEventListener('click', function() {
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);

      if (type === 'text') {
        this.querySelector('i').classList.remove('fa-eye');
        this.querySelector('i').classList.add('fa-eye-slash');
      } else {
        this.querySelector('i').classList.remove('fa-eye-slash');
        this.querySelector('i').classList.add('fa-eye');
      }
    });
  </script>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

</body>

</html>