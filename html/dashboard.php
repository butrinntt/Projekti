<?php
session_start();

if(!isset($_SESSION['UserType'])){
  echo "<script>window.location.href = 'home.php'</script>";
}

if($_SESSION['UserType'] != 'admin'){
    echo "<script>alert('You are not an admin!');</script>";
    echo "<script>window.location.href = 'home.php'</script>";
    // header("Location: home.php");
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Work+Sans&display=swap"
    rel="stylesheet">
  <title>Fireflies Dashboard</title>

  <style>

    .container {
      margin-top: 2%;
      margin-left: 15%;
      margin-right: 15%;
      border-radius: 3%;
      justify-content: center;
      background-color: rgba(230, 128, 12, 0.8);
      height: 93.5vh;
    }

    body {
      margin: 0;
      background-image: url("../images/backround.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      box-sizing: border-box;
      font-family: "Manrope", sans-serif;
      color: #000000;
      text-align: center;
      overflow-y: scroll;
    }

    .row {
      justify-content: center;
      width: 90%;
      margin-left: 5%;
      
    }

    .btn {
      background-color: black;
      padding: 5px 10px;
      border-radius: 0px;
      border: 1px solid black;
      text-align: center;
      color: #f3f1f1;
      transition: .4s;
    }

    .btn:hover {
      background-color: #373636;
    }

    a {
      text-decoration: none;
      color: #3b3b3b;
      font-weight: bold;
      padding-left: 2px;
      padding-right: 2px;
      transition: .4s;
      border-radius: 2px;
    }

    a:hover {
      background-color: #373636;
    }

    .delete {
      background-color: red;
      border-radius: 3px;
      font-size: 16px;
      color: #f3f1f1;
      padding: 1px 10px;
    }

    .edit {
      background-color: green;
      border-radius: 3px;
      font-size: 16px;
      color: #f3f1f1;
      padding: 1px 19px;
    }

    .Header {
      color: black;
      margin-left: 1%;
      font-family: "Segoe Script", Tahoma, Geneva, Verdana, sans-serif;
      letter-spacing: 1px;
    }

    .table {
      margin-top: 2%;
      width: 100%;
      text-align: center;
      font-size: 18px;
      
    }
    .table th{
      font-size: 20px;
    }

    .buttons {
      margin-left: 5.5%;
      display: flex;
      width: 84%;
      justify-content: space-between;
    }

    .nav {
      width: 100%;
      display: flex;
      flex-direction: row;
      align-items: center;
    }

    .nav img {
      width: 7%;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-5">
        <div class="nav">
          <h1 class="Header">Fireflies Dashboard</h1>
          <img src="../images/firefly.png" alt="firefly" />
        </div>
        <hr style="height: 2px;background-color: black; margin-bottom: 3%;border: 0;">
      </div>
    </div>
    <div class="buttons">
      <a href="register.php" class="btn">Add New User</a>
      <a href="home.php" class="btn">Home</a>
    </div>
    <div class="row">
      <div class="inside">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Child's Name</th>
              <th>Parent's Name</th>
              <th>Last Name</th>
              <th>Password</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include 'Model.php';
            $model = new Model();
            $rows = $model->fetch();
            $i = 1;
            if (!empty($rows)) {
              foreach ($rows as $row) {
                ?>
                <tr>
                  <td>
                    <?php echo $i++; ?>
                  </td>
                  <td>
                    <?php echo $row['ChildName']; ?>
                  </td>
                  <td>
                    <?php echo $row['ParentName']; ?>
                  </td>
                  <td>
                    <?php echo $row['LastName']; ?>
                  </td>
                  <td>
                     <?php echo $row['Password']; ?>
                  </td>
                  <td>
                     <?php echo $row['Email']; ?>
                  </td>
                  <td>
                    <a href="delete.php?ID=<?php echo $row['ID']; ?>" class="delete">Delete</a>
                    <a href="edit.php?ID=<?php echo $row['ID']; ?>" class="edit">Edit</a>
                  </td>
                </tr>

                <?php
              }
            } else {
              echo "no data";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>