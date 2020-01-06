<?php
session_start();
if(empty($_SESSION['user'])) {
  header("Location: http://localhost/zoo/admin/login.php");
}
if ($_SESSION['user']["role"] == 2) {
  header("Location: http://localhost/zoo/admin/dashboard.php");
}
include('../../connection.php');
$sql_msg = "";
$nameErr  = $passErr = "";
$name  = $pass = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["name"]) && !empty($_POST["name"])) {
        $name = $_POST["name"];
    } else {
        $nameErr = "Username is required";
    }
    if (isset($_POST["pass"]) && !empty($_POST["pass"])) {
        $pass = md5($_POST["pass"]);
    } else {
        $passErr = "Password is required";
    }
    if (empty($nameErr) && empty($passErr) ) {
        $conn = conn_db();
        $sql = "INSERT INTO users (username, password) VALUES ('{$name}', '{$pass}')";
        if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            header("Location: http://localhost/zoo/admin/user/view.php?id={$last_id}");
        } else {
            $sql_msg = "Add Fail";
        }
        $name = $pass = "";
        mysqli_close($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Admin - User</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        
        <form method="post">
          <div class="form-group">
          <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                    <input type="text" id="firstName" class="form-control" placeholder="First name" name="name" required="required" autofocus="autofocus">
                    <label for="firstName">User name</label>
                </div>
               </div>
            </div>
          </div>
          <div class="form-group" >
            <div class="form-row">
                <div class="col-md-12">
              <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required="required">
                  <label for="inputPassword">Password</label>
                    </div>
                </div>
              </div>
          </div>
            <!-- <div class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="form-label-group">
                            <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password" required="required">
                            <label for="confirmPassword">Confirm password</label>
                        </div>
                    </div>
                </div>
            </div> -->
            <button class="btn btn-primary" type="submit">Regiter</button>
            <button class="btn btn-primary"><a class="text-white" href="./list.php">Cancel</a></button>
        </form>
      <!-- </div> -->
            </div>
        </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
