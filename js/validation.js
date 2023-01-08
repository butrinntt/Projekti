function validate() {
  var email = document.getElementById("email");
  var emailError = document.getElementById("email-error");

  email.addEventListener("input", function (e) {
    var userpattern = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
    var currentValue = e.target.value;
    var vlera = userpattern.test(currentValue);

    if (vlera) {
      emailError.style.display = "none";
    } else {
      emailError.style.display = "block";
    }
  });
  var password = document.getElementById("password");
  var passwordError = document.getElementById("password-error");
  var confirmPassword = document.getElementById("confirm-password");

  password.addEventListener("input", function (e) {
    var userpattern1 = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    var currentValue1 = e.target.value;
    var vlera1 = userpattern1.test(currentValue1);

    if (vlera1) {
      passwordError.style.display = "none";
    } else {
      passwordError.style.display = "block";
    }
  });
  var password = document.getElementById("password");
  var confirmPassword = document.getElementById("confirm-password");
  var confirmPasswordError = document.getElementById("confirm-password-error");

  confirmPassword.addEventListener("input", function (e) {
    if (
      document.getElementById("password") !=
      document.getElementById("confirm-password")
    ) {
      confirmPasswordError.style.display = "block";
    } else {
      confirmPasswordError.style.display = "none";
    }
  });
}
