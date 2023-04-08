"use strict";
const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function () {
  // toggle the type attribute
  const type =
    password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);

  // toggle the icon
  this.classList.toggle("bi-eye");
});

// tel
// var input = document.querySelector("#phone");
// var iti = window.intlTelInput(input, {
//   initialCountry: "ps",
//   separateDialCode: true,
//   utilsScript: "js/utils.js",
// });
