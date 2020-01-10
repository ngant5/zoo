<?php
  session_start();
  if(empty($_SESSION['user'])) {
    header("Location: http://localhost/zoo/admin/login.php");
  }
  include('../connection.php');
  $conn = conn_db();
  $pass = $passErr = "";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["pass"])) {
      $pass = md5($_POST["pass"]);
    } else {
      $passErr = "New password is required";
    }
    if (empty($passErr)) {
        $sql = "UPDATE users SET password = '{$pass}' WHERE user_id = $id";
        if (mysqli_query($conn, $sql)) {
            header("Location: http://localhost/zoo/admin");
        } else {
            $sql_msg = "Add Fail";
        }
        $pass = $passErr = "";
    }
}
mysqli_close($conn);
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Change Password</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
        <div class="card-body">
          <div class="text-center mb-4">
            <h4>Change password?</h4>
            <p>Please enter new password.</p>
          </div>
        <form method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="pass" class="form-control" required="required" autofocus="autofocus">
              <label for="inputEmail">New password</label>
            </div>
          </div>
          <button class="btn btn-primary" type="submit">Change Password</button>
          <button class="btn btn-danger"><a class="text-white" href="http://localhost/zoo/admin/index.php">Cancel</a></button>
        </form>
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
