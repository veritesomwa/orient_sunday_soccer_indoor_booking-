$(document).ready(function () {
  $("#banner").slideDown(1000);

  $("#togglePassword").on("click", function () {
    const passwordField = $("#password");
    const type =
      passwordField.attr("type") === "password" ? "text" : "password";
    passwordField.attr("type", type);

    $(this).text(type === "password" ? "Show" : "Hide");
  });

  // login form

  $("#form-login").on("submit", function (e) {
    e.preventDefault();
    const username_email = document.querySelector("#username_email").value;
    const password = document.querySelector("#password").value;

    let hasError = false;

    if (username_email === "") {
      // document.querySelector(".error-username_email").innerHTML =
      //   "This field is required";
      hasError = true;
    } else {
      document.querySelector(".error-username_email").innerHTML = "";
    }

    if (password === "") {
      // document.querySelector(".error-password").innerHTML =
      //   "This field is required";
      hasError = true;
    } else {
      document.querySelector(".error-password").innerHTML = "";
    }

    let $error = $("#error");

    if (!hasError) {
      $.ajax({
        url: "includes/login_post.php",
        type: "POST",
        data: $(this).serialize(),
      })
        .then((res) => {
          console.log("Raw response:", res);
          try {
            let data = JSON.parse(res);
            console.log("Parsed data:", data);

            if (data.error) {
              $error.removeClass("d-none").html(data.error);
              return;
            }
            localStorage.setItem("token", data.token);
            location.href = "";
          } catch (e) {
            console.error("JSON parse error:", e);
            $error.removeClass("d-none").html("Error parsing server response");
          }
        })
        .fail((jqXHR, textStatus, errorThrown) => {
          $error.removeClass("d-none").html("Error attempting to login");
        });
    }
  });

  // registration form
  $("#form-register").on("submit", (e) => {
    e.preventDefault();

    const firstname = document.querySelector("#regfirstname").value;
    const lastname = document.querySelector("#reglastname").value;
    const email = document.querySelector("#regemail").value;
    const regpassword = document.querySelector("#regpassword").value;
    const confirmPassword = document.querySelector("#regpassword2").value;
    const phone_number = document.querySelector("#regphone_number").value;

    let hasError = false;
    function capitalize(str) {
      return str.charAt(0).toUpperCase() + str.slice(1);
    }

    function isValidEmail(email) {
      const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return re.test(email);
    }

    function isValidPhoneNumber(phoneNumber) {
      const re = /^\+?[1-9]\d{1,14}$/;
      return re.test(phoneNumber);
    }

    function isValidPassword(password) {
      const re =
        /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;
      return re.test(password);
    }

    if (firstname === "") {
      // document.querySelector(".error-regfirstname").innerHTML =
      //   "This field is required";
      hasError = true;
    } else {
      document.querySelector(".error-regfirstname").innerHTML = "";
    }

    if (lastname === "") {
      // console.(firstname)
      // document.querySelector(".error-reglastname").innerHTML =
      //   "This field is required";
      hasError = true;
    } else {
      document.querySelector(".error-reglastname").innerHTML = "";
    }

    if (email === "") {
      // document.querySelector(".error-regemail").innerHTML =
      //   "This field is required";
      hasError = true;
    } else {
      document.querySelector(".error-regemail").innerHTML = "";
    }

    if (!isValidEmail(email)) {
      // document.querySelector(".error-regemail").innerHTML =
      //   "Invalid email address";
      hasError = true;
    } else {
      document.querySelector(".error-regemail").innerHTML = "";
    }

    if (regpassword === "") {
      // document.querySelector(".error-regpassword").innerHTML =
      //   "This field is required";
      hasError = true;
    } else {
      document.querySelector(".error-regpassword").innerHTML = "";
    }
    if (confirmPassword === "") {
      // document.querySelector(".error-regpassword").innerHTML =
      //   "This field is required";
      hasError = true;
    } else {
      document.querySelector(".error-regpassword2").innerHTML = "";
    }

    // if (!isValidPassword(regpassword)) {
    //   document.querySelector(".error-regpassword").innerHTML =
    //     "Invalid password";
    //   hasError = true;
    // } else {
    //   document.querySelector(".error-regpassword").innerHTML = "";
    // }

    if (phone_number === "") {
      // document.querySelector(".error-regphone_number").innerHTML =
      //   "This field is required";
      hasError = true;
    } else {
      document.querySelector(".error-regphone_number").innerHTML = "";
    }

    if (!isValidPhoneNumber(phone_number)) {
      document.querySelector(".error-regphone_number").innerHTML =
        "Invalid phone number: start with your country code";
      hasError = true;
    } else {
      document.querySelector(".error-regphone_number").innerHTML = "";
    }

    if (confirmPassword !== regpassword) {
      document.querySelector(".error-regpassword2").innerHTML =
        "Passwords do not match";
      hasError = true;
    } else {
      document.querySelector(".error-regpassword2").innerHTML = "";
    }

    let $error = $("#reg_error");

    if (!hasError) {
      $.ajax({
        url: "__register.post.php",
        type: "POST",
        data: $("#form-register").serialize(),
      })
        .then((res) => {
          console.log("Raw response:", res);
          try {
            let data = JSON.parse(res);
            console.log("Parsed data:", data);

            if (data.error) {
              $error.removeClass("d-none").html(data.error);
              return;
            }
            localStorage.setItem("token", data.token);
            location.href = "";
          } catch (e) {
            console.error("JSON parse error:", e);
            $error.removeClass("d-none").html("Error parsing server response");
          }
        })
        .fail((jqXHR, textStatus, errorThrown) => {
          $error.removeClass("d-none").html("Error attempting to Registration");
        });
    }
  });
});
