<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Schedule</title>
  <link rel="stylesheet" href="../css/scheduleStyle.css" />
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
        <li><a class="links schedule" href="schedule.php">Schedule</a></li>
        <li>
          <a class="links" href="merchandise.php">Merchandise</a>
        </li>
        <li><a class="links" href="teachers.php">Teachers</a></li>
        <li><a class="links" href="login.php" id="LoginBtn">Login</a></li>
        <li><a class="links" href="register.php" id="regBtn">Register</a></li>
      </ul>
    </div>
    <div class="colour"></div>
  </header>
  <main>
    <div class="schedule1">
      <?php
      include 'Model.php';
      $model = new Model();
      $data = $model->schedulefetch();
      function image($img, $type, $text)
      {
        echo "<img src=\"$img\" alt=\"$type\" />
           <p>$text</p>";
      }

      foreach ($data as $index => $card) {
        ?>
        <div class="sched">
          <?php echo image($card['img'], $card['type'], $card['text']); ?>
        </div>
        </a>
      <?php } ?>
    </div>
    </div>
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