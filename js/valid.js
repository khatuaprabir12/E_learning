// Name validation
function namevalid() {
    const name = document.getElementById("signupName");
    const error = document.getElementById("nameError");
    const regex = /^[A-Za-z\s]{3,}$/;
  
    if (regex.test(name.value.trim())) {
      success(name, error, "Looks good!");
    } else {
      fail(name, error, "Enter a valid name (min 3 letters)");
    }
  }

  // Father Name validation
function fathernamevalid() {
  const name = document.getElementById("fathersignupName");
  const error = document.getElementById("fathernameError");
  const regex = /^[A-Za-z\s]{3,}$/;

  if (regex.test(name.value.trim())) {
    success(name, error, "Looks good!");
  } else {
    fail(name, error, "Enter a valid fathername (min 3 letters)");
  }
}

  
  // Email validation
  function emailvalid() {
    const email = document.getElementById("signupEmail");
    const error = document.getElementById("emailError");
    const regex = /^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/;
  
    if (regex.test(email.value.trim())) {
      success(email, error, "Valid email");
    } else {
      fail(email, error, "Invalid email format");
    }
  }
  
  // Phone validation
  function phonevalid() {
    const phone = document.getElementById("signupPhone");
    const error = document.getElementById("phoneError");
    const regex = /^[6-9][0-9]{9}$/;
  
    if (regex.test(phone.value.trim())) {
      success(phone, error, "Valid phone number");
    } else {
      fail(phone, error, "Enter 10 digit number");
    }
  }

  // Aadhaar validation
  function aadhaarvalid() {
    const phone = document.getElementById("signupAadhaar");
    const error = document.getElementById("aadhaarError");
    const regex = /^[0-9]{12}$/;
  
    if (regex.test(phone.value.trim())) {
      success(phone, error, "Valid Aadhaar number");
    } else {
      fail(phone, error, "Enter 12 digit number");
    }
  }
  
  // PIN code validation
  function pinvalid() {
    const pin = document.getElementById("signupPin");
    const error = document.getElementById("pinError");
    const regex = /^[0-9]{6}$/;
  
    if (regex.test(pin.value.trim())) {
      success(pin, error, "Valid PIN");
    } else {
      fail(pin, error, "Enter 6 digit PIN code");
    }
  }


  function togglePassword(id) {
    const input = document.getElementById(id);
    input.type = input.type === "password" ? "text" : "password";
  }
  
  // Password regex validation
  function passwordvalid() {
    const password = document.getElementById("signupPass");
    const error = document.getElementById("passwordError");
  
    // At least 6 characters, one uppercase, one lowercase, one number, one special char
    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?#&])[A-Za-z\d@$!%*?#&]{6,}$/;
  
    if (regex.test(password.value.trim())) {
      success(password, error, "Strong password");
    } else {
      fail(password, error, "Must be 6 chars with uppercase, lowercase, number & special char");
    }
  
    // Trigger confirm check too
    cnfPasswordvalid();
  }
  
  // Confirm Password match validation
  function cnfPasswordvalid() {
    const password = document.getElementById("signupPass");
    const confirm = document.getElementById("signupCnfPass");
    const error = document.getElementById("cnfPasswordError");
  
    if (confirm.value.trim() === password.value.trim() && password.value.trim() !== "") {
      success(confirm, error, "Passwords match");
    } else {
      fail(confirm, error, "Passwords do not match");
    }
  }
  
  
    // Helper functions
    function success(input, errorDiv, message) {
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
        errorDiv.textContent = message;
        errorDiv.style.color = "green";
      }
      
      function fail(input, errorDiv, message) {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        errorDiv.textContent = message;
        errorDiv.style.color = "red";
      }


      document.getElementById("submitData").addEventListener("submit", function (e) {
        const allInputs = document.querySelectorAll("#submitData input[required]");
        let isValid = true;
      
        allInputs.forEach((input) => {
          if (!input.classList.contains("is-valid")) {
            isValid = false;
            input.classList.add("is-invalid");
          }
        });
      
        if (!isValid) {
          e.preventDefault(); // stop form submission
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please fill all fields correctly before submitting!',
            confirmButtonColor: '#3085d6'
          });
        }
      });
      
      
     
      
      // 
      

