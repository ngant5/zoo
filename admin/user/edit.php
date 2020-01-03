<?php
session_start();
include('../../connection.php');
$conn = conn_db();
$sql_msg = "";
$nameErr  = $passErr = "";
$name  = $pass = "";

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE user_id = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        } else {
            echo "a";
            // header("Location: http://localhost/wint_zoo/admin/user/dashboard.php");
            // die();
            }
        } else {
            echo "b";
            // header("Location: http://localhost/wint_zoo/admin/dashboard.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["name"]) && !empty($_POST["name"])) {
        $name = $_POST["name"];
    } else {
        $nameErr = "Username is required";
    }
    if (empty($nameErr) && empty($passErr) ) {
        $sql = "UPDATE users SET users.user_id = $id, users.username = '{$name}'  WHERE user_id = $id";
        if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            header("Location: http://localhost/zoo/admin/user/view.php?id={$id}");
        } else {
            $sql_msg = "Add Fail";
        }
        $name = $pass = "";
        
    }
}
// mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Admin - User - Register</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Edit Account</div>
      <div class="card-body">
        
        <form method="post" action="edit.php?id=<?=$id?>">
          <div class="form-group">
          <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                    <input type="text" id="firstName" class="form-control" placeholder="First name" name="name" value="<?=$row['username'] ?>" required="required" autofocus="autofocus">
                    <label for="firstName">User name</label>
                </div>
               </div>
            </div>
          </div>
          <!-- <div class="form-group" >
            <div class="form-row">
                <div class="col-md-12">
              <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" required="required">
                  <label for="inputPassword">Password</label>
                    </div>
                </div>
              </div>
          </div> -->
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
            <button class="btn btn-primary" type="submit">OK</button>
            <button class="btn btn-primary"><a class="text-white" href="./view.php?id=<?=$row['user_id']?>">Cancel</a></button>
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
