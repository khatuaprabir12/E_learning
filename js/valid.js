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
    const regex = /^[0-9]{10}$/;
  
    if (regex.test(phone.value.trim())) {
      success(phone, error, "Valid phone number");
    } else {
      fail(phone, error, "Enter 10 digit number");
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
  
//   location

// Ensure the modal content is fully loaded before applying events
document.addEventListener('DOMContentLoaded', function() {
    const cityData = {
      "Mumbai": { district: "Mumbai Suburban", state: "Maharashtra", pin: "400001" },
      "Delhi": { district: "New Delhi", state: "Delhi", pin: "110001" },
      "Chennai": { district: "Chennai", state: "Tamil Nadu", pin: "600001" },
      "Bengaluru": { district: "Bangalore Urban", state: "Karnataka", pin: "560001" },
      "Kolkata": { district: "Kolkata", state: "West Bengal", pin: "700001" },
      "Lucknow": { district: "Lucknow", state: "Uttar Pradesh", pin: "226001" },
      "Ahmedabad": { district: "Ahmedabad", state: "Gujarat", pin: "380001" },
      "Hyderabad": { district: "Hyderabad", state: "Telangana", pin: "500001" },
      "Pune": { district: "Pune", state: "Maharashtra", pin: "411001" },
      "Jaipur": { district: "Jaipur", state: "Rajasthan", pin: "302001" }
    };

    document.getElementById("signupCity").addEventListener("input", function () {
      const city = this.value.trim();
      const info = cityData[city];

      if (info) {
        document.getElementById("signupDistrict").value = info.district;
        document.getElementById("signupState").value = info.state;
        document.getElementById("signupPin").value = info.pin;
      } else {
        document.getElementById("signupDistrict").value = "";
        document.getElementById("signupState").value = "";
        document.getElementById("signupPin").value = "";
      }
    });
  });