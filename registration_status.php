<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header("Location: index.php");
    exit();
}

$student_id = $_SESSION['student_id'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eLEARNING - eLearning HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

  <!-- Toolbar Start -->
  <div class="container-fluid bg-light py-2 border-bottom">
    <div class="row align-items-center px-3">
        <div class="col-md-6 text-center text-md-start">
            <small><a href="mailto:info@elearning.com" class="fa fa-envelope text-primary me-2"></a><a href="mailto:info@elearning.com"><span class="text-dark">info@elearning.com</span></a></small>
            <small class="ms-md-4 d-block d-md-inline"><a href="tel:+91 86704 36605" class="fa fa-phone-alt text-primary me-2"></a><a href="tel:+91 86704 36605"><span class="text-dark">+91 86704 36605</span></a></small>
        </div>
        <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
            <a class="text-primary me-2" href="https://www.facebook.com/TekhaliBazarNYCTC/"><i class="fab fa-facebook-f"></i></a>
            <a class="text-primary me-2" href="https://www.whatsapp.com/channel/0029VaDbtbcAzNbxPCKQzN44"><i class="fab fa-whatsapp"></i></a>
            <a class="text-primary me-2" href="https://maps.app.goo.gl/6a6a5bRJmR91663aA"><i class="fas fa-map-marker-alt"></i></a>
            <a class="text-primary" href="https://www.instagram.com/tekhalibazarnyctc/"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</div>
<!-- Toolbar End -->




            <!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
      <img src="img/logo.jpg" alt="Edufuture Academy Logo" style="max-height: 60px;">
    </a>
    <button class="navbar-toggler me-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto p-4 p-lg-0">
        <a href="index.php" class="nav-item nav-link active"><i class="fa fa-home me-2"></i>Home</a>
  
        <!-- Courses dropdown -->
        <?php
            include ("connection.php");  // Fetch categories
            $sql = "SELECT category_id, category_name FROM course_category";
            $result = $connect->query($sql);
        ?>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-laptop-code me-2"></i>Courses
            </a>
            <div class="dropdown-menu fade-down m-0">
                <?php while($row = $result->fetch_assoc()): ?>
                <a href="course/category.php?id=<?= $row['category_id']; ?>" class="dropdown-item">
                    <i class="fa fa-book me-2"></i><?= htmlspecialchars($row['category_name']); ?>
                </a>
                <?php endwhile; ?>
            </div>
        </div>
  
        <!-- Enquiry dropdown -->
        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="font-size: 14px;">
            <i class="fa fa-envelope me-2"></i>Enquiry
          </a>
          <div class="dropdown-menu fade-down m-0">
            <a href="atc-enquiry.html" class="dropdown-item"><i class="fa fa-building me-2"></i>ATC Enquiry</a>
            <a href="student-enquiry.html" class="dropdown-item"><i class="fa fa-user-graduate me-2"></i>Student Enquiry</a>
          </div>
        </div>
  
        <!-- Student Zone dropdown -->
        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="font-size: 14px;">
            <i class="fa fa-user-check me-2"></i>Student Zone
          </a>
          <div class="dropdown-menu fade-down m-0">
            <a href="online-verification.html" class="dropdown-item"><i class="fa fa-check-circle me-2"></i>Online Verification</a>
            <a href="online-exam.html" class="dropdown-item"><i class="fa fa-edit me-2"></i>Online Exam</a>
            <a href="results.html" class="dropdown-item"><i class="fa fa-chart-line me-2"></i>Results</a>
          </div>
        </div>
  
        <!-- Download dropdown -->
        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="font-size: 14px;">
            <i class="fa fa-download me-2"></i>Download
          </a>
          <div class="dropdown-menu fade-down m-0">
            <a href="admission-form.html" class="dropdown-item"><i class="fa fa-file-alt me-2"></i>Admission Form</a>
            <a href="admit-card-download.html" class="dropdown-item"><i class="fa fa-id-card me-2"></i>Admit Card</a>
            <a href="notice-board.html" class="dropdown-item"><i class="fa fa-bullhorn me-2"></i>Notice Board</a>
          </div>
        </div>
  
        <!-- Contact  -->
        <a href="contact.php" class="nav-item nav-link"><i class="fa fa-address-book me-2"></i>Contact Us</a>
        
        <!-- About -->
        <a href="about.php" class="nav-item nav-link"><i class="fa fa-info-circle me-2"></i>About</a>
  
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
      
              <!-- Other Menu Items -->
      
              <?php if (isset($_SESSION['student_logged_in'])): ?>
                <!-- Profile Dropdown -->
                <div class="nav-item dropdown">
                  <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-user-circle me-2"></i> Hi, <?= $_SESSION['student_name']; ?>
                  </a>
                  <div class="dropdown-menu fade-down m-0">
                    <a href="profile.php" class="dropdown-item"><i class="fa fa-user me-2"></i> Profile</a>
                    <a href="logout.php" class="dropdown-item"><i class="fa fa-sign-out-alt me-2"></i> Logout</a>
                  </div>
                </div>
              <?php else: ?>
                <!-- Login / Register -->
                <a href="#" class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="fa fa-sign-in-alt me-2"></i>Login</a>
                <a href="admission.php" class="nav-item nav-link"><i class="fa fa-user-plus me-2"></i>Register</a>
              <?php endif; ?>
      
            </div>
          </div>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->
  


        <!-- Scrolling Banner Start -->
<div class="scrolling-banner bg-dark text-warning py-2 px-3">
    <div class="scrolling-text">
        <strong>Edufuture Academy, An Autonomous Body/Institute Regd. under Trust Act, Govt. of W.B. Based on Indian Trust. Regd. MSME Govt. of India.</strong>
    </div>
</div>
<!-- Scrolling Banner End -->


<div class="container mt-5">
        <div class="card shadow text-center">
            <div class="card-header bg-warning text-dark">
                <h4>Registration Status</h4>
            </div>
            <div class="card-body">
                <p class="fs-5">Your registration has been received.</p>
                <p class="text-danger fw-bold">Your Student ID: <?php echo $student_id; ?></p>
                <p class="text-muted">Status: <strong>Pending Verification</strong></p>
            </div>
        </div>
    </div>

   


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

   <!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content shadow-lg">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="loginModalLabel">Edufuture Academy Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="authenticate.php" method="POST">
          <div class="modal-body">
            <?php if (isset($_GET['error'])): ?>
              <div class="alert alert-danger text-center">❌ Invalid Credentials</div>
            <?php endif; ?>
  
            <!-- Redirect Page -->
            <input type="hidden" name="redirect" value="<?= basename($_SERVER['PHP_SELF']); ?>">
  
            <!-- Login Type Selector -->
            <div class="mb-3">
              <label for="login_type" class="form-label">Login As</label>
              <select name="login_type" class="form-select" required>
                <option value="student">Student</option>
              </select>
            </div>
  
            <!-- Username/Email/Student ID -->
            <div class="mb-3">
              <label for="username" class="form-label">Username / Email / Student ID</label>
              <input type="text" name="username" class="form-control" required>
            </div>
  
            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
          </div>
  
          <div class="modal-footer flex-column">
            <button type="submit" class="btn btn-primary w-100 mb-2">Login</button>
  
            <!-- Register Link -->
            <p class="text-center mb-0">Don't have an account? 
              <a href="admission.php" class="text-decoration-none">Register here</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <?php if (isset($_GET['error'])): ?>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
      loginModal.show(); // ✅ this is the correct method to show the modal
    });
  </script>
  <?php endif; ?>
  
  <!-- login modal end -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>