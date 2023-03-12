<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" href="../css/homeStyle.css" />
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
        <li><a class="links home" href="home.php">Home</a></li>
        <li><a class="links" href="schedule.php">Schedule</a></li>
        <li><a class="links" href="merchandise.php">Merchandise</a></li>
        <li><a class="links" href="teachers.php">Teachers</a></li>
        <li><a class="links" href="login.php" id="LoginBtn">Login</a></li>
        <li><a class="links" href="register.php" id="regBtn">Register</a></li>
      </ul>
    </div>
    <div class="colour"></div>
  </header>
  <main>
    <div class="main-h1">
      <h1>Fireflies kindergarten</h1>
    </div>
    <?php
    include 'Model.php';
    $model = new Model();
    $data = $model->homefetch();

    function image($img, $type)
    {
      echo "<img src=\"$img\" alt=\"$type\" />";
    }

    foreach ($data as $index => $card) {
      ?>
      <div class="fotoja<?php echo $index + 1 ?>">
        <?php echo ($index % 2 == 0) ? image($card['img'], $card['type']) : ''; ?>
        <h1>
          <?php echo $card['text'] ?>
        </h1>
        <?php echo ($index % 2 == 1) ? image($card['img'], $card['type']) : ''; ?>
      </div>
    <?php } ?>
  </main>

  <?php
  session_start();

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