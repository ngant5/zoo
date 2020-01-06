<?php
session_start();
include('../../connection.php');
$conn = conn_db();
    $cateNameErr = $categoryName = "";
    $parentId = 0;
    $user_id = $_SESSION['user']["id"];
    $sql_msg = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["categoryName"]) && !empty($_POST["categoryName"])) {
            $categoryName = $_POST["categoryName"];
        } else {
            $cateNameErr = "Category Name is required";
        }
        if (empty($cateNameErr)) {
            $sql = "INSERT INTO category (cate_name, parent_id, user)
            VALUES ('{$categoryName}', '{$parentId}', '{$user_id}')";
            if (mysqli_query($conn, $sql)) {
                $last_id = mysqli_insert_id($conn);
                header("Location: http://localhost/zoo/admin/menu/list.php");
            } else {
                $sql_msg = "Add Fail";
            }
            $categoryName = "";
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

  <title> Admin - Menu</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Add Menu</div>
      <div class="card-body">
        
        <form method="post">
          <div class="form-group">
          <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                    <input type="text" id="firstName" class="form-control" placeholder="Menu name" name="categoryName" required="required" autofocus="autofocus">
                    <label for="firstName">Menu name</label>
                </div>
               </div>
            </div>
          </div>
            <button class="btn btn-primary" type="submit">Regiter</button>
            <button class="btn btn-primary"><a class="text-white" href="./list.php?>">Cancel</a></button>
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
