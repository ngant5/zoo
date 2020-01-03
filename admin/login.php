<?php
session_start();

require "../connection.php";
$user = $pass = $msg = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $conn = conn_db();
    $sql = "SELECT * FROM users WHERE username = '{$user}' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        if ($row['password'] == md5($pass)) {
            $session_user = [
                'id' => $row['user_id'],
                'username' => $row['username'],
                'role' => $row['role_id'],
                'status' => $row['status']
            ];
            $_SESSION['user'] = $session_user;
            header("Location: http://localhost/zoo/admin/index.php");
        } else {
            $msg = "The username or password is incorrect";
        }
    } else {
        $msg = "The username or password is incorrect";
    }
    mysqli_close($conn);
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

  <title>Zoo - Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form method="post">
          <div class="form-group" >
            <div class="form-label-group">
              <input type="text" class="form-control" placeholder="Username" name="user" required="required" autofocus="autofocus">
              <label for="inputEmail">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div>
          <button class="btn btn-primary btn-block">Login</button>
        </form>
        <div class="text-center">
          <!-- <a class="d-block small mt-3" href="register.html">Register an Account</a> -->
          <!-- <a class="d-block small" href="../admin/forgot-password.php">Forgot Password?</a> -->
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
