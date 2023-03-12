<?php
class Model
{
    private $server = "localhost";
    private $username = "root";
    private $password = '';
    private $database = "projekti";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->database);
        } catch (Exception $ex) {
            echo 'Connection failed' . $ex->getMessage();
        }
    }


    public function insert()
    {
        if (isset($_POST['submit'])) {

            $childsname = $_POST['childsname'];
            $parentsname = $_POST['parentsname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if (empty($childsname) || empty($parentsname) || empty($lastname) || empty($email) || empty($password)) {
                echo "<script>alert('Please fill in all the fields');</script>";
                echo "<script>window.location.href = 'register.php';</script>";
            }

            if (strlen($password) < 3) {
                echo "<script>alert('Password must be at least 3 characters long');</script>";
                echo "<script>window.location.href = 'register.php';</script>";
            }

            if ($password != $confirm_password) {
                echo "<script>alert('Passwords do not match');</script>";
                echo "<script>window.location.href = 'register.php';</script>";
            }

            echo $childsname;
            echo $parentsname;
            echo $lastname;
            echo $email;
            echo $password;

            $query = "INSERT INTO users (ChildName,ParentName,LastName,Password,Email) VALUES ('$childsname','$parentsname','$lastname','$password', '$email')";
            if ($sql = $this->conn->query($query)) {
                echo "<script>alert('User registered successfully');</script>";
                echo "<script>window.location.href = 'dashboard.php';</script>";
            } else {
                echo "<script>alert('failed');</script>";
                echo "<script>window.location.href = 'dashboard.php';</script>";
            }
        }
    }

    // public function teamfetch()
    // {
    //     $data = null;
    //     $query = "SELECT * FROM TeamContent";
    //     if ($sql = $this->conn->query($query)) {
    //         while ($row = mysqli_fetch_assoc($sql)) {
    //             $data[] = $row;
    //         }
    //     }
    //     return $data;
    // }

    // public function homefetch()
    // {
    //     $data = null;
    //     $query = "SELECT * FROM HomeContent";
    //     if ($sql = $this->conn->query($query)) {
    //         while ($row = mysqli_fetch_assoc($sql)) {
    //             $data[] = $row;
    //         }
    //     }
    //     return $data;
    // }

    // public function projectsfetch()
    // {
    //     $data = null;
    //     $query = "SELECT * FROM ProjectsContent";
    //     if ($sql = $this->conn->query($query)) {
    //         while ($row = mysqli_fetch_assoc($sql)) {
    //             $data[] = $row;
    //         }
    //     }
    //     return $data;
    // }


    public function fetch()
    {
        $data = null;
        $query = "SELECT * FROM users";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function delete($id)
    {

        $query = "DELETE FROM users where ID = '$id'";
        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($id)
    {

        $data = null;

        $query = "SELECT * FROM users WHERE ID = '$id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function update($data)
    {

        $query = "UPDATE users SET ChildName='$data[ChildName]',ParentName='$data[ParentName]',LastName='$data[LastName]',Email='$data[Email]', Password='$data[Password]'  WHERE ID='$data[ID] '";

        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }


}
?>