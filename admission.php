
<?php
session_start(); // Make sure this is at the very top of the file
?>

<!DOCTYPE html>
<html lang="en-IN">
<head>
    <meta charset="utf-8">
    <title>Edufuture Academy - Best Learning Platform for Computer Courses in India</title>
    <meta name="description" content="Edufuture Academy offers top-notch courses in Tally, Programming, Graphic Design, Digital Marketing, Web Development, and more. Enhance your skills with expert-led training.">
    <meta name="keywords" content="Edufuture Academy, Tally courses, Programming courses, Graphic Design, Digital Marketing, Web Development, online learning, skill development, best courses in India">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" href="img/favicon.io.ico" sizes="40x40">

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
      <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
          <i class="fa fa-laptop-code me-2"></i>Courses
        </a>
        <div class="dropdown-menu fade-down m-0">
          <a href="diploma.html" class="dropdown-item"><i class="fa fa-graduation-cap me-2"></i>Diploma</a>
          <a href="certificate.html" class="dropdown-item"><i class="fa fa-certificate me-2"></i>Certificate</a>
          <a href="advanced.html" class="dropdown-item"><i class="fa fa-rocket me-2"></i>Advance</a>
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

      <!-- Login / Register -->
      <a href="#" class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#loginModal">
            <i class="fa fa-sign-in-alt me-2"></i>Login
      </a>
      <a href="admission.php" class="nav-item nav-link"><i class="fa fa-user-plus me-2"></i>Register</a>
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


<?php if (isset($_SESSION['error'])): ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: '<?php echo addslashes($_SESSION['error']); ?>'
      });
    });
  </script>
  <?php unset($_SESSION['error']); ?>
<?php endif; ?>

  
<!-- form start -->
    <div class="container mt-5 mb-5">
    <div class="card shadow">
      <div class="card-header text-center bg-primary text-white">
        <h4>Student Registration Form</h4>
      </div>
      <div class="card-body">
        <form id="submitData" action="submit.php" method="POST" enctype="multipart/form-data">
          <div class="row g-3">

            <div class="col-md-6">
              <label class="form-label">Student Name</label>
              <input type="text" name="student_name" id="signupName" onkeyup="namevalid()"class="form-control" required>
              <div class="form-text" id="nameError"></div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Father's Name</label>
              <input type="text" name="father_name" id ="fathersignupName" onkeyup="fathernamevalid()"class="form-control" required>
              <div class="form-text" id="fathernameError"></div>
            </div>
            <div class="col-md-6">
              <label class="form-label">Mobile Number</label>
              <input type="number" name="mobile" id="signupPhone" onkeyup="phonevalid()"  class="form-control" required>
              <div class="form-text" id="phoneError"></div>
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" name="email" id="signupEmail" onkeyup="emailvalid()"  class="form-control" required>
              <div class="form-text" id="emailError"></div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Password</label>
               <div class="input-group">
                 <input type="password" name="password" id="signupPass" onkeyup="passwordvalid()" class="form-control" required>
                 <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('signupPass')">
                  <i class="fa fa-eye"></i>
                 </button>
             </div>
             <div class="form-text" id="passwordError"></div>
            </div>

            <div class="col-md-6">
               <label class="form-label">Confirm Password</label>
                <div class="input-group">
              <input type="password" name="confirm_password" id="signupCnfPass" onkeyup="cnfPasswordvalid()" class="form-control" required>
               <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('signupCnfPass')">
                  <i class="fa fa-eye"></i>
              </button>
            </div>
             <div class="form-text" id="cnfPasswordError"></div>
            </div>


            <div class="col-12">
              <label class="form-label">Address</label>
              <textarea class="form-control" id="signupAddress" name="address" rows="2" placeholder="Your full address" required></textarea>
              
            </div>

            <div class="col-md-4">
              <label class="form-label">City</label>
              <input type="text" class="form-control" id="signupCity" name="city" placeholder="City name" >
            </div>

            <div class="col-md-4">
              <label class="form-label">District</label>
              <input type="text" name="district" class="form-control" >
            </div>

           <!-- State Dropdown -->
<div class="col-md-4">
  <label class="form-label">State</label>
  <select name="state" class="form-select" required>
    <option value="" selected>Select your state</option>
    <option value="Andhra Pradesh">Andhra Pradesh</option>
    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
    <option value="Assam">Assam</option>
    <option value="Bihar">Bihar</option>
    <option value="Chhattisgarh">Chhattisgarh</option>
    <option value="Goa">Goa</option>
    <option value="Gujarat">Gujarat</option>
    <option value="Haryana">Haryana</option>
    <option value="Himachal Pradesh">Himachal Pradesh</option>
    <option value="Jharkhand">Jharkhand</option>
    <option value="Karnataka">Karnataka</option>
    <option value="Kerala">Kerala</option>
    <option value="Madhya Pradesh">Madhya Pradesh</option>
    <option value="Maharashtra">Maharashtra</option>
    <option value="Manipur">Manipur</option>
    <option value="Meghalaya">Meghalaya</option>
    <option value="Mizoram">Mizoram</option>
    <option value="Nagaland">Nagaland</option>
    <option value="Odisha">Odisha</option>
    <option value="Punjab">Punjab</option>
    <option value="Rajasthan">Rajasthan</option>
    <option value="Sikkim">Sikkim</option>
    <option value="Tamil Nadu">Tamil Nadu</option>
    <option value="Telangana">Telangana</option>
    <option value="Tripura">Tripura</option>
    <option value="Uttar Pradesh">Uttar Pradesh</option>
    <option value="Uttarakhand">Uttarakhand</option>
    <option value="West Bengal">West Bengal</option>
  </select>
</div>

<!-- Pin Code Input -->
<div class="col-md-4">
  <label class="form-label">Pin Code</label>
  <input type="text" name="pin_code" class="form-control" id="signupPin" onkeyup="pinvalid()" pattern="[1-9][0-9]{5}" maxlength="6" placeholder="6-digit PIN code" required>
  <div class="form-text " id="pinError"></div>
</div>


            <div class="col-md-4">
              <label class="form-label">Gender</label>
              <select name="gender" class="form-select" required>
                <option value="">-- Select Gender --</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
              </select>
            </div>

            <div class="col-md-4">
              <label class="form-label">Date of Birth</label>
              <input type="date" name="dob" class="form-control" >
            </div>

            <div class="col-md-4">
                <label class="form-label">Caste</label>
                  <select name="caste" class="form-select" required>
                    <option value="">Select your Caste</option>
                    <option value="general">General</option>
                    <option value="sc">SC</option>
                    <option value="st">ST</option>
                    <option value="obc">OBC</option>
                  </select>
            </div>
          

            <div class="col-md-4">
              <label class="form-label">Religion</label>
              <input type="text" name="religion" class="form-control" >
            </div>

            <div class="col-md-4">
              <label class="form-label">Nationality</label>
              <input type="text" name="nationality" class="form-control" >
            </div>
            <div class="col-md-6">
              <label class="form-label">Aadhaar Number</label>
              <input type="number" name="aadhaar" id="signupAadhaar" onkeyup="aadhaarvalid()" pattern="[0-9]{16}" class="form-control" required>
              <div class="form-text" id="aadhaarError"></div>
            </div>

            <div class="col-md-6">
              <label class="form-label">Qualification</label>
              <input type="text" name="qualification" class="form-control" >
            </div>

            <div class="col-md-6">
              <label class="form-label">Profile Image</label>
              <input type="file" name="profile_image" class="form-control" accept="image/*" >
            </div>


          <!-- Course Selection -->
<div class="col-md-6 mb-3">
  <label for="course" class="form-label fw-semibold">Select a Course</label>
  <select name="course" id="course" class="form-select  shadow-sm" required>
    <option value="">-- Select Course --</option>

    <optgroup label="📚 Certificate of Diploma">
      <option value="Diploma in Modern Computer Office Application (1 Year)">Diploma in Modern Computer Office Application (1 Year)</option>
      <option value="Diploma in Computer Application & Programming (1 Year)">Diploma in Computer Application & Programming (1 Year)</option>
      <option value="Diploma in Computer Office Application (1 Year)">Diploma in Computer Office Application (1 Year)</option>
    </optgroup>

    <optgroup label="🗣️ Language Courses">
      <option value="Communicative English (6 Months)">Communicative English (6 Months)</option>
    </optgroup>

    <optgroup label="📄 Certificate of Accounting">
      <option value="Certificate of Tally (6 Months)">Certificate of Tally (6 Months)</option>
    </optgroup>
  </select>
</div>

            <!-- Link to Open Login Modal -->
             <!-- Submit Button -->
          <div class="col-12 text-center mt-4">
             <button type="submit" class="btn btn-primary px-4">Submit</button>
          </div>
           <!-- Link to Open Login Modal -->
          <div class="col-12 text-center mt-3">
              <p>Already have an account? 
                <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="text-decoration-none">Login here</a>
               </p>
          </div>



          </div>
        </form>
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
      <div class="modal-header bg-primary text-center text-white">
        <h5 class="modal-title" id="loginModalLabel">Edufuture Academy Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="authenticate.php" method="POST">
        <div class="modal-body">
          <?php if (isset($_GET['error'])): ?>
            <?php if ($_GET['error'] == 1): ?>
              <div class="alert alert-danger text-center">❌ Invalid Credentials</div>
            <?php elseif ($_GET['error'] == 2): ?>
              <div class="alert alert-warning text-center"><?= htmlspecialchars($_GET['message']); ?></div>
            <?php endif; ?>
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

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary w-100">Login</button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/valid.js"></script>

</body>

</html>