<!DOCTYPE html>
<html lang="en">
<?php

session_start();
error_reporting(0);
include("connection/connect.php");
if (isset($_POST['submit'])) {
   if (
      empty($_POST['firstname']) ||
      empty($_POST['lastname']) ||
      empty($_POST['email']) ||
      empty($_POST['phone']) ||
      empty($_POST['password']) ||
      empty($_POST['cpassword']) ||
      empty($_POST['cpassword'])
   ) {
      $message = "All fields must be Required!";
   } else {

      $check_username = mysqli_query($db, "SELECT username FROM users where username = '" . $_POST['username'] . "' ");
      $check_email = mysqli_query($db, "SELECT email FROM users where email = '" . $_POST['email'] . "' ");



      if ($_POST['password'] != $_POST['cpassword']) {
         echo "<script>alert('Password not match');</script>";
      } elseif (strlen($_POST['password']) < 6) {
         echo "<script>alert('Password Must be >=6');</script>";
      } elseif (strlen($_POST['phone']) < 10) {
         echo "<script>alert('Invalid phone number!');</script>";
      } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
         echo "<script>alert('Invalid email address please type a valid email!');</script>";
      } elseif (mysqli_num_rows($check_username) > 0) {
         echo "<script>alert('Username Already exists!');</script>";
      } elseif (mysqli_num_rows($check_email) > 0) {
         echo "<script>alert('Email Already exists!');</script>";
      } else {
         $mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('" . $_POST['username'] . "','" . $_POST['firstname'] . "','" . $_POST['lastname'] . "','" . $_POST['email'] . "','" . $_POST['phone'] . "','" . md5($_POST['password']) . "','" . $_POST['address'] . "')";
         mysqli_query($db, $mql);

         // Show success message using JavaScript alert
         echo '<script>alert("Registration successful!");</script>';

         // Redirect to the login page after a short delay
         echo '<script>
                 setTimeout(function(){
                     window.location.href = "login.php";
                 }, 1000); // 1 second delay
               </script>';
      }
   }
}


?>


<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">
   <link rel="icon" href="#">
   <title>Registration</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link href="css/font-awesome.min.css" rel="stylesheet">
   <link href="css/animsition.min.css" rel="stylesheet">
   <link href="css/animate.css" rel="stylesheet">
   <link href="css/style.css" rel="stylesheet">
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <style>
      .error-msg {
         color: #dc3545;
         font-size: 0.9em;
         margin-top: 5px;
      }
   </style>
</head>

<body>
   <div style=" background-image: url('./img/bg.png'); background-size: cover; background-repeat: no-repeat;">
      <header id="header" class="header-scroll top-header headrom">
         <nav class="navbar navbar-dark">
            <div class="container">
               <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
               <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/icn.png" alt=""> </a>
               <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                  <ul class="nav navbar-nav">
                     <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
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
      <div class="page-wrapper">

         <h1 style="text-align: center;">Register Here</h1>

         <div class="container">
            <ul>


            </ul>
         </div>

         <section class="contact-page inner-page">

            <div class="container ">
               <div class="row ">
                  <div class="col-md-12">
                     <div class="widget">
                        <div class="widget-body">
                           <form action="" method="post">
                              <div class="row">
                                 <div class="form-group col-sm-12">
                                    <label for="exampleInputEmail1">User-Name</label>
                                    <input class="form-control" type="text" name="username" id="example-text-input">
                                    <br>
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">First Name</label>
                                    <input class="form-control" type="text" name="firstname" id="example-text-input">
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">Last Name</label>
                                    <input class="form-control" type="text" name="lastname" id="example-text-input-2">
                                    <br>
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">Email Address</label>
                                    <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">Phone number</label>
                                    <input class="form-control" type="text" name="phone" id="example-tel-input-3">
                                    <br>
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label for="exampleInputPassword1">Password</label>
                                    <div class="input-group">
                                       <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                                       <div class="input-group-append">
                                          <span class="input-group-text" id="togglePassword1">
                                             <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group col-sm-6">
                                    <label for="exampleInputPassword2">Confirm password</label>
                                    <div class="input-group">
                                       <input type="password" class="form-control" name="cpassword" id="exampleInputPassword2">
                                       <div class="input-group-append">
                                          <span class="input-group-text" id="togglePassword2">
                                             <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                          </span>
                                       </div>
                                    </div>
                                    <br>
                                 </div>

                                 <div class="form-group col-sm-12">
                                    <label for="exampleTextarea">Address</label>
                                    <textarea class="form-control" id="exampleTextarea" name="address" rows="3"></textarea>
                                 </div>

                              </div>
                              <br><br>
                              <div class="row justify-content-center">
                                 <div class="col-sm-4 text-center">
                                    <input type="submit" value="Register" name="submit" class="btn btn-primary">
                                    <a href="index.php" class="btn btn-danger">Go to Home Page</a>

                                 </div>

                              </div>


                           </form>


                        </div>

                     </div>

                  </div>

               </div>
            </div>
         </section>

      </div>

      <script src="js/jquery.min.js"></script>
      <script src="js/tether.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/animsition.min.js"></script>
      <script src="js/bootstrap-slider.min.js"></script>
      <script src="js/jquery.isotope.min.js"></script>
      <script src="js/headroom.js"></script>
      <script src="js/foodpicky.min.js"></script>
      <script>
         const togglePassword1 = document.querySelector('#togglePassword1');
         const password1 = document.querySelector('#exampleInputPassword1');

         togglePassword1.addEventListener('click', function(e) {
            const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
            password1.setAttribute('type', type);

            this.querySelector('i').classList.toggle('fa-eye-slash');
            this.querySelector('i').classList.toggle('fa-eye');
         });

         const togglePassword2 = document.querySelector('#togglePassword2');
         const password2 = document.querySelector('#exampleInputPassword2');

         togglePassword2.addEventListener('click', function(e) {
            const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
            password2.setAttribute('type', type);

            this.querySelector('i').classList.toggle('fa-eye-slash');
            this.querySelector('i').classList.toggle('fa-eye');
         });
      </script>
      <script>
         document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('form').addEventListener('submit', function(e) {
               const firstName = document.querySelector('input[name="firstname"]');
               const lastName = document.querySelector('input[name="lastname"]');
               const username = document.querySelector('input[name="username"]');
               const email = document.querySelector('input[name="email"]');
               const phone = document.querySelector('input[name="phone"]');
               const password = document.querySelector('input[name="password"]');
               const confirmPassword = document.querySelector('input[name="cpassword"]');
               const address = document.querySelector('textarea[name="address"]');
               const form = document.querySelector('form');

               // Remove previous error messages
               form.querySelectorAll('.error-msg').forEach(function(error) {
                  error.remove();
               });

               let hasError = false;

               // Validation logic
               if (firstName.value.trim() === '') {
                  addErrorMessage(firstName, 'First name is required');
                  hasError = true;
               }

               // Add other validations for remaining fields here...
               if (lastName.value.trim() === '') {
                  addErrorMessage(lastName, 'Last name is required');
                  hasError = true;
               }
               if (username.value.trim() === '') {
                  addErrorMessage(username, 'Username is required');
                  hasError = true;
               }
               if (email.value.trim() === '') {
                  addErrorMessage(email, 'Email is required');
                  hasError = true;
               }
               if (phone.value.trim() === '') {
                  addErrorMessage(phone, 'Phone number is required');
                  hasError = true;
               }
               if (password.value.trim() === '') {
                  addErrorMessage(password, 'Password is required');
                  hasError = true;
               } else if (phone.value.trim().length !== 10 || isNaN(phone.value.trim())) {
                  addErrorMessage(phone, 'Please enter a valid 10-digit phone number');
                  hasError = true;
               }


               if (confirmPassword.value.trim() === '') {
                  addErrorMessage(confirmPassword, 'Password is required');
                  hasError = true;
               }
               if (address.value.trim() === '') {
                  addErrorMessage(address, 'Address is required');
                  hasError = true;
               }

               // Prevent form submission if there are errors
               if (hasError) {
                  e.preventDefault();
               }
            });

            // Function to add error message
            function addErrorMessage(inputField, message) {
               const errorSpan = document.createElement('span');
               errorSpan.classList.add('error-msg');
               errorSpan.innerText = message;
               inputField.parentNode.appendChild(errorSpan);
            }
         });
      </script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>