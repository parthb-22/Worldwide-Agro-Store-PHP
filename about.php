<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Worldwide Agro Store</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Poppins:wght@200;600;700&display=swap"
      rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
    <style>
      #logo {
        /* position: absolute; */
        /* left: 0px; */
        max-height: 60px;
        max-width: 100%;
        /* margin-top: 30px; */
      }
      .image-container {
        position: relative;
        border: 6px solid #6b6eff8c; /* A bold red border */
        border-radius: 20px; /* Larger rounded corners */
        padding: 10px; /* Spacing between the image and the border */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* A subtle shadow effect */
        overflow: hidden; /* Hide overflowing content */

        /* You can customize the size and positioning as needed */
        width: 100%;
        text-align: center;
      }

      .image-container img {
        width: 100%;
        height: auto;
        object-fit: cover; /* Maintain aspect ratio and cover the container */
        transition: transform 0.3s ease-in-out; /* Add a hover effect if needed */
      }

      /* Add a hover effect when the image container is hovered */
      .image-container:hover {
        transform: scale(1.05);
      }

      /* Add a hover effect for the border */
      .image-container:hover {
        border-color: #2ecc71; /* Green border on hover */
      }
    </style>
  </head>

  <body>
    <!-- Spinner Start -->
    <div
      id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div
        class="spinner-grow text-primary"
        style="width: 3rem; height: 3rem"
        role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div class="container-fluid sticky-top">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
          <a href="index.php" class="navbar-brand">
            <!-- <h2 class="text-white">Hairnic</h2> -->
            <img src="./img/logo.png" alt="Logo" id="logo" />
          </a>
          <button
            type="button"
            class="navbar-toggler ms-auto me-0"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto">
              <a href="index.php" class="nav-item nav-link">Home</a>
              <a href="about.php" class="nav-item nav-link active">About</a>
              <a href="product.php" class="nav-item nav-link">Products</a>
              <div class="nav-item dropdown">
                <a
                  href="#"
                  class="nav-link dropdown-toggle"
                  data-bs-toggle="dropdown"
                  >Know More</a
                >
                <div class="dropdown-menu bg-light mt-2">
                  <a href="feature.html" class="dropdown-item">Features</a>
                  <!-- <a href="how-to-use.html" class="dropdown-item">How To Use</a> -->
                  <a href="testimonial.html" class="dropdown-item"
                    >Testimonial</a
                  >
                  <!-- <a href="blog.html" class="dropdown-item">Blog Articles</a>
                  <a href="404.html" class="dropdown-item">404 Page</a> -->
                </div>
              </div>
              <a href="contact.php" class="nav-item nav-link">Contact</a>
              <a href="./admin/index.php" class="nav-item nav-link">Admin Login</a>
              
                            
            </div>
            <!-- <a href="" class="btn btn-dark py-2 px-4 d-none d-lg-inline-block"
              >Shop Now</a
            > -->
          </div>
        </nav>
      </div>
    </div>
    <!-- Navbar End -->

    <!-- Hero Start -->
    <div class="container-fluid bg-primary hero-header mb-5">
      <div class="container text-center">
        <h1 class="display-4 text-white mb-3 animated slideInDown">About Us</h1>
        <nav aria-label="breadcrumb">
          <ol
            class="breadcrumb justify-content-center mb-0 animated slideInDown">
            <li class="breadcrumb-item">
              <a class="text-white" href="#">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a class="text-white" href="#">Pages</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              About
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- Hero End -->

    <!-- Feature Start -->
    <div class="container-fluid py-5">
      <div class="container">
        <div class="row g-4">
          <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
            <div
              class="feature-item position-relative bg-primary text-center p-3">
              <div class="border py-5 px-3">
                <i class="fa fa-leaf fa-3x text-dark mb-4"></i>
                <h5 class="text-white mb-0">100% Natural</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
            <div
              class="feature-item position-relative bg-primary text-center p-3">
              <div class="border py-5 px-3">
                <i class="fa fa-tint-slash fa-3x text-dark mb-4"></i>
                <h5 class="text-white mb-0">Free of Chemicals</h5>
              </div>
            </div>
          </div>
          <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
            <div
              class="feature-item position-relative bg-primary text-center p-3">
              <div class="border py-5 px-3">
                <i class="fa fa-heart fa-3x text-dark mb-4"></i>
                <h5 class="text-white mb-0">Low Fat</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Feature End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
      <div class="container">
        <div class="row g-5 align-items-center">
          <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
            <div class="image-container">
              <img
                class="img-fluid animated pulse infinite"
                src="img/owner-photo.png"
                style="animation: none" />
            </div>
          </div>
          <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
            <h1 class="text-primary mb-4">
              Worldwide Agro
              <span class="fw-light text-dark"
                >The Promise of Flavour & Health</span
              >
            </h1>
            <p class="mb-4">
              वाई प्रांतातील सेलम हळदीला सध्या बाजारपेठेत मोठ्या प्रमाणात मागणी
              वाढत चालली आहे.<br /><b>Worldwide Agro</b> हा उडतरे,वाई येथील भेसळ
              विरहीत चमकदार (केशरी-पिवळा) रंग आणि उत्कृष्ठ चव असणाऱ्या हळद पावडर
              आणि इतर ऍग्रो प्रॉडक्ट्स चे उत्पादन घेत असून,
              <b>थेट शेतकरी ते ग्राहकांपर्यंत</b> आपले उत्पादन पोहोचवित आहोत.
            </p>
            <a class="btn btn-primary py-2 px-4" href="">Shop Now</a>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->

    <!-- Newsletter Start -->
    <!-- <div class="container-fluid newsletter bg-primary py-5 my-5">
      <div class="container py-5">
        <div
          class="mx-auto text-center wow fadeIn"
          data-wow-delay="0.1s"
          style="max-width: 600px">
          <h1 class="text-white mb-3">
            <span class="fw-light text-dark">Let's Subscribe</span> The
            Newsletter
          </h1>
          <p class="text-white mb-4">
            Subscribe now to get 30% discount on any of our products
          </p>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-7 wow fadeIn" data-wow-delay="0.5s">
            <div class="position-relative w-100 mt-3 mb-2">
              <input
                class="form-control w-100 py-4 ps-4 pe-5"
                type="text"
                placeholder="Enter Your Email"
                style="height: 48px" />
              <button
                type="button"
                class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2">
                <i class="fa fa-paper-plane text-white fs-4"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- Newsletter End -->
    <br />
    <br />
    <!-- Footer Start -->
    <div class="container-fluid bg-white footer">
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.php" class="d-inline-block mb-3">
              <!-- <h1 class="text-primary">Hairnic</h1> -->
              <img src="./img/logo.png" alt="Logo" id="logo" />
            </a>
            <p class="mb-0">
              हा उडतरे,वाई येथील भेसळ विरहीत चमकदार (केशरी-पिवळा) रंग आणि
              उत्कृष्ठ चव असणाऱ्या हळद पावडर आणि इतर ऍग्रो प्रॉडक्ट्स चे उत्पादन
              घेत असून, <b>थेट शेतकरी ते ग्राहकांपर्यंत</b> आपले उत्पादन
              पोहोचवित आहोत.
            </p>
          </div>
          <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.3s">
            <h5 class="mb-4">Get In Touch</h5>
            <p>
              <i class="fa fa-map-marker-alt me-3"></i>At. Po.
              Udtare,Wai,Satara.
            </p>
            <p><i class="fa fa-phone-alt me-3"></i>+91 8788459811</p>
            <p style="font-size: 15px">
              <i class="fa fa-envelope me-3"></i>worldwideexim97@gmail.com
            </p>
            <div class="d-flex pt-2">
              <!-- <a class="btn btn-square btn-outline-primary me-1" href=""
                ><i class="fab fa-twitter"></i
              ></a> -->
              <a
                class="btn btn-square btn-outline-primary me-1"
                target="_blank"
                href="https://www.facebook.com/profile.php?id=100094770774529&mibextid=LQQJ4d"
                ><i class="fab fa-facebook-f"></i
              ></a>
              <a
                class="btn btn-square btn-outline-primary me-1"
                target="_blank"
                href="https://instagram.com/worldwideagro_?igshid=OGQ5ZDc2ODk2ZA=="
                ><i class="fab fa-instagram"></i
              ></a>
              <a
                class="btn btn-square btn-outline-primary me-1"
                target="_blank"
                href="https://wa.me/+918788459811"
                ><i class="fab fa-whatsapp"></i
              ></a>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
            <h5 class="mb-4">Our Products</h5>
            <a class="btn btn-link" href="">आदर्श हळद पावडर (सेलम)</a>
            <a class="btn btn-link" href="">आदर्श वर्ल्डटॉम टोमेटो पावडर</a>
            <a class="btn btn-link" href="">आदर्श वर्ल्डऑनियन पावडर</a>
            <a class="btn btn-link" href="">आदर्श वर्ल्डमधुर गुळ पावडर</a>
            <a class="btn btn-link" href="">आदर्श वर्ल्ड मिरची पावडर</a>
            <a class="btn btn-link" href="">आदर्श आले पावडर</a>
          </div>
          <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
            <h5 class="mb-4">Popular Link</h5>
            <a class="btn btn-link" href="about.php">About Us</a>
            <a class="btn btn-link" href="contact.php">Contact Us</a>
            <!-- <a class="btn btn-link" href="">Privacy Policy</a>
            <a class="btn btn-link" href="">Terms & Condition</a>
            <a class="btn btn-link" href="">Career</a> -->
          </div>
        </div>
      </div>
      <div class="container wow fadeIn" data-wow-delay="0.1s">
        <div class="copyright">
          <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
              &copy; <a class="border-bottom" href="#">Worldwide Agro Store</a>,
              All Right Reserved.

              <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
              <br />Designed By
              <a
                class="border-bottom"
                target="_blank"
                href="https://www.linkedin.com/in/parth-bujawadekar/"
                >Parth Bujawadekar,CodeGen Technologies,Satara</a
              >
            </div>
            <!-- <div class="col-md-6 text-center text-md-end">
              <div class="footer-menu">
                <a href="">Home</a>
                <a href="">Cookies</a>
                <a href="">Help</a>
                <a href="">FAQs</a>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
      ><i class="bi bi-arrow-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
  </body>
</html>
