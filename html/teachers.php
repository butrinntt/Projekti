<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Teachers</title>
  <link rel="stylesheet" href="../css/teachersStyle.css" />
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
        <li><a class="links teachers" href="teachers.php">Teachers</a></li>
        <li><a class="links" href="login.php" id="LoginBtn">Login</a></li>
        <li><a class="links" href="register.php" id="regBtn">Register</a></li>
      </ul>
    </div>
    <div class="colour"></div>
  </header>
  <main>
    <div class="main-h1">
      <h1>Meet our teachers!</h1>
    </div>
    <div id="slider">
      <div id="slider-container">
        <?php
      session_start();
      include 'Model.php';
      $model = new Model();
      $data = $model->teachersfetch();
      function image($img, $type, $name)
      {
        echo "<img src=\"$img\" alt=\"$type\" />
           <h1>$name</h1>";
      }

      foreach ($data as $index => $card) {
        ?>
          <div class="teacher">
            <?php echo image($card['img'], $card['name'], $card['name']); ?>
          </div>
      <?php } ?>
      </div>
      <div class="buttons">
        <div id="prev">&lt;</div>
        <div id="next">&gt;</div>
      </div>
    </div>
    <?php
    $data = $model->teachersfetch();
    function image2($img, $name)
    {
      echo "<img src=\"$img\" alt=\"$name\" />";
    }

    foreach ($data as $index => $card) {
      ?>
      <div class="fotoja<?php echo $index + 1 ?>">
        <?php echo ($index % 2 == 0) ? image2($card['img'], $card['name']) : ''; ?>
        <h1>
          <?php echo $card['text'] ?>
        </h1>
        <?php echo ($index % 2 == 1) ? image2($card['img'], $card['name']) : ''; ?>
      </div>
    <?php } ?>
  </main>
  <script>


    var slider = document.getElementById("slider");
    var sliderContainer = document.getElementById("slider-container");
    var slides = sliderContainer.getElementsByClassName("teacher");
    var prev = document.getElementById("prev");
    var next = document.getElementById("next");
    var index = 0;
    function showSlides() {
      for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slides[index].style.display = "block";
    }
    function plusSlides(n) {
      index += n;
      if (index >= slides.length) {
        index = 0;
      }
      if (index < 0) {
        index = slides.length - 1;
      }
      showSlides();
    }
    showSlides();
    prev.onclick = function () {
      plusSlides(-1);
    };
    next.onclick = function () {
      plusSlides(1);
    };  </script>
  <?php

  if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    echo "<script>
      let loginBtn = document.getElementById('LoginBtn');
      loginBtn.href = 'Logout.php';
      loginBtn.innerText = 'Logout';
      </script>";
    echo "<script>
      let regBtn = document.getElementById('regBtn');
      regBtn.href = '';
      regBtn.innerText = '$email';
      </script>";
  }
  ?>
</body>

</html>