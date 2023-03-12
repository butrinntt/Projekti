<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Merchandise</title>
  <link rel="stylesheet" href="../css/merchandiseStyle.css" />
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
        <li>
          <a class="links merchandise" href="merchandise.php">Merchandise</a>
        </li>
        <li><a class="links" href="teachers.php">Teachers</a></li>
        <li><a class="links" href="login.php" id="LoginBtn">Login</a></li>
        <li><a class="links" href="register.php" id="regBtn">Register</a></li>
      </ul>
    </div>
    <div class="colour"></div>
  </header>
  <main>
    <div class="merchandises">
      <?php
      session_start();
      include 'Model.php';
      $model = new Model();
      $data = $model->merchandisefetch();
      function image($img, $type, $text)
      {
        echo "<img src=\"$img\" alt=\"$type\" />
           <h1>$text</h1>";
      }

      foreach ($data as $index => $card) {
        ?>
        <a href="#">
          <div class="merch">
            <?php echo image($card['img'], $card['type'], $card['text']); ?>
          </div>
        </a>
      <?php } ?>
      <!-- <a href="#">
        <div class="merch">
          <img src="<?php echo $rows[0]['img']; ?>" alt="<?php echo $rows[0]['type']; ?>" />
          <h1>
            <?php echo $rows[0]['text']; ?>
          </h1>
        </div>
      </a>
      <a href="#">
        <div class="merch">
          <img src="../images/abacus.jpg" alt="abacus" />
          <h1>Abacus</h1>
        </div>
      </a>
      <a href="#">
        <div class="merch">
          <img src="../images/pencilCase.jpg" alt="pencilCase" />
          <h1>Pencil case</h1>
        </div>
      </a>
      <a href="#">
        <div class="merch">
          <img src="../images/backpackGirls.jpg" alt="backpackGirls" />
          <h1>Backpack for girls</h1>
        </div>
      </a>
      <a href="#">
        <div class="merch">
          <img src="../images/colours.jpg" alt="colours" />
          <h1>Colours</h1>
        </div>
      </a>
      <a href="#">
        <div class="merch">
          <img src="../images/pens.jpeg" alt="pens" />
          <h1>Pens</h1>
        </div>
      </a> -->
    </div>
  </main>
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