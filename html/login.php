<?php

session_start();

$server = "localhost";
$username = "root";
$password = '';
$database = "projekti";

$data=mysqli_connect($server,$username,$password,$database);

if($data===false){
  die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $email=$_POST["email"];
  $password=$_POST["password"];

  $sql="SELECT * FROM users WHERE email='".$email."' AND password='".$password."' ";

  $result=mysqli_query($data,$sql);

  $row = mysqli_fetch_array($result);


  if($row["UserType"]=="user"){

    $_SESSION["email"]=$row["email"];
    $_SESSION["UserType"]="user";
    header("location:home.php");

  }

  elseif($row["UserType"]=="admin"){

    $_SESSION["email"]=$row["email"];
    $_SESSION["UserType"]="admin";
    header("location:dashboard.php");
    
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <script type="text/javascript" src="../js/validation.js"></script>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Manrope:wght@300&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik+80s+Fade&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <header>
      <div class="nav">
        <h1 class="logotekst">Fireflies</h1>
        <img src="../images/firefly.png" alt="firefly" />
        <ul>
          <li><a class="links" href="home.php">Home</a></li>
          <li><a class="links" href="schedule.php">Schedule</a></li>
          <li><a class="links" href="merchandise.php">Merchandise</a></li>
          <li><a class="links" href="teachers.php">Teachers</a></li>
          <li><a class="links login" href="login.php">Login</a></li>
          <li><a class="links" href="register.php">Register</a></li>
        </ul>
      </div>
      <div class="colour"></div>
    </header>
    <div class="header" style="height: 100%">
      <h1 style="font-size: 300%">Welcome back to our kindergarten!</h1>
    </div>
    <div class="user_input_box1">
      <div class="box-content">
        <h4>Log in</h4>
        <form action="" method="post">
          <div class="form-row">
            <input
              name="email"
              type="email"
              placeholder="Email"
              id="email"
              oninput="validate()"
            />
            <p id="email-error">Please enter a valid email!</p>
          </div>
          <div class="form-row">
            <input
              name="password"  
              type="password"
              placeholder="Password"
              id="password"
              oninput="validate()"
            />
          </div>
          <p id="password-error">Please enter a valid passowrd!</p>
          <button
            class="button"
            id="log-button"
            onclick="window.location.href='login.php'"
          >
            Login
          </button>
        </form>
        <p>Your child isn't in our kindergarten yet? Sign them up now!</p>
        <button
          class="button"
          id="register-button"
          onclick="window.location.href='register.php'"
        >
          Sign up
        </button>
      </div>
    </div>
  </body>
</html>
