<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <script type="text/javascript" src="../js/validation.js"></script>
  <link rel="stylesheet" href="../css/logInRegisterStyle.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Rubik+80s+Fade&display=swap" rel="stylesheet" />
</head>

<body>
  <header>
    <div class="nav">
      <div class="logo">
        <h1 class="logotekst">Fireflies</h1>
        <img src="../images/firefly.png" alt="firefly" />
      </div>
      <ul>
        <li><a class="links" href="home.php">Home</a></li>
        <li><a class="links" href="schedule.php">Schedule</a></li>
        <li><a class="links" href="merchandise.php">Merchandise</a></li>
        <li><a class="links" href="teachers.php">Teachers</a></li>
        <li><a class="links" href="login.php">Login</a></li>
        <li><a class="links register" href="register.php">Register</a></li>
      </ul>
    </div>
    <div class="colour2"></div>
  </header>
  <div class="header" style="height: 100%">
    <h1 style="font-size: 300%">Welcome to our kindegarten!</h1>
    <h4>Signing up your child!</h4>
  </div>

  <div class="user_input_box">
    <div class="box-content">
      <h4>Sign up</h4>
      <?php
      include 'Model.php';
      $model = new Model();
      $insert = $model->insert();
      ?>
      <form method="post" action="">
        <div class="form-row">
          <input name="parentsname" type="text" id="name" placeholder="Your Name" />
        </div>
        <div class="form-row">
          <input name="childsname" type="text" id="name" placeholder="Child's Name" />
        </div>
        <div class="form-row">
          <input name="lastname" type="text" id="last-name" placeholder="Last name" />
        </div>

        <div class="form-row">
          <input name="email" type="email" placeholder="Email" id="email" oninput="validate()" />
          <p id="email-error">Please enter a valid email!</p>
        </div>

        <div class="form-row">
          <input name="password" type="password" placeholder="Password" id="password" oninput="validate()" />
          <p id="password-error">Please enter a valid password!</p>
        </div>

        <div class="form-row">
          <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm-password" />
        </div>

        <div>
          <input name="submit" type="submit" class="button" value="Create acc" />
        </div>
      </form>
      <div class="login_button">
        <p>Have and account? Login!</p>
        <button class="button" onclick="window.location.href='login.php'">
          Login
        </button>
      </div>
    </div>
  </div>
</body>

</html>