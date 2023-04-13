<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Work+Sans&display=swap"
    rel="stylesheet">
  <title>Blip | Dashboard</title>

  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Work Sans', sans-serif;
      background-image: url("../images/backround.jpg");
      background-repeat: no-repeat;
      background-size: cover;

    }

    .input-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin: 20px 0px;
      width: 300px;
    }

    .container {
      background-color: rgba(230, 128, 12, 0.8);
      height: 70vh;
      width: 70vh;
      background-image: linear-gradient(var(--main-color), var(--secondary-color));
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      margin-top: 6%;
      margin-left: 33%;
      border-radius: 3%;
    }

    .btn {
      background-color: black;
      padding: 5px 10px;
      border-radius: 0px;
      border: 1px solid black;
      text-align: center;
      color: #f3f1f1;
      transition: .4s;
      cursor: pointer;
      margin-bottom: 2%;
    }

    .btn:hover {
      background-color: #373636;
    }

    .Header {
      color: black;
      font-family: "Segoe Script", Tahoma, Geneva, Verdana, sans-serif;
      letter-spacing: 1px;
    }

    .label {
      margin-right: 3%;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-5">
        <h1 class="Header">Fireflies Dashboard</h1>
        <hr style="height: 2px;background-color: black;border: 0;margin-bottom: 5%;margin-top: 2%;">
      </div>
    </div>
    <div class="row">
      <div>
        <?php
        include 'Model.php';
        $model = new Model();
        $id = $_REQUEST['ID'];
        $row = $model->edit($id);

        if (isset($_POST['update'])) {
          if (isset($_POST['ChildName']) && isset($_POST['ParentName']) && isset($_POST['LastName']) && isset($_POST['Email']) && isset($_POST['Password'])) {

            $data['ID'] = $id;
            $data['ChildName'] = $_POST['ChildName'];
            $data['ParentName'] = $_POST['ParentName'];
            $data['LastName'] = $_POST['LastName'];
            $data['Email'] = $_POST['Email'];
            $data['Password'] = $_POST['Password'];

            $update = $model->update($data);

            if ($update) {
              echo "<script>alert('User update successful');</script>";
              echo "<script>window.location.href = 'dashboard.php';</script>";
            } else {
              echo "<script>alert('User update failed');</script>";
              echo "<script>window.location.href = 'dashboard.php';</script>";
            }

          } else {
            echo "<script>alert('Empty');</script>";
            header("Location: edit.php?ID=$id");
          }
        }
        ?>
        <form action="" method="post">
          <div class="input-container">
            <label for="" class="label">Child's Name</label>
            <input type="text" name="ChildName" value="<?php echo $row['ChildName']; ?>">
          </div>
          <div class="input-container">
            <label for="" class="label">Parent's Name</label>
            <input type="text" name="ParentName" value="<?php echo $row['ParentName']; ?>">
          </div>
          <div class="input-container">
            <label for="" class="label">Last Name</label>
            <input type="text" name="LastName" value="<?php echo $row['LastName']; ?>">
          </div>
          <div class="input-container">
            <label for="" class="label">Email</label>
            <input type="email" name="Email" value="<?php echo $row['Email']; ?>">
          </div>
          <div class="input-container">
            <label for="" class="label">Password</label>
            <input type="text" name="Password" value="<?php echo $row['Password']; ?>">
          </div>
          <div class="input-container">
            <button type="submit" name="update" class="btn">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>