<?php
    session_start();
    if(empty($_SESSION['user'])) {
    header("Location: http://localhost/zoo/admin/login.php");
    }
    include('../connection.php');
    include('../admin/session.php');
    $conn = conn_db();
    $query = "SELECT * FROM category WHERE parent_id = 0 && status = 1";
    $result = mysqli_query($conn, $query);
    $parentErr = $cateNameErr = $categoryName = "";
    $parentId =  0;
    $sql_msg = "";
    $user_id = $_SESSION['user']["id"];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            $parentId = $_POST["id"];
        } else {
            $parentErr = "Main Category is required";
        }
        if (isset($_POST["categoryName"]) && !empty($_POST["categoryName"])) {
            $categoryName = $_POST["categoryName"];
        } else {
            $cateNameErr = "Category Name is required";
        }
        if (empty($cateNameErr)) {
            $sql = "INSERT INTO category (cate_name, parent_id, user)
            VALUES ('{$categoryName}', {$parentId}, {$user_id})";
            if (mysqli_query($conn, $sql)) {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Succesfully Registered')
                window.location.href='http://localhost/zoo/admin/category/list.php';
                </SCRIPT>");
            } else {
                $sql_msg = "Add Fail";
            }
            $categoryName = $id = "";
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

  <title> Admin - Category</title>

  <!-- Custom fonts for this template-->
  <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="./css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

<div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Add Category</div>
      <div class="card-body">
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
            <div class="col-md-12">
                <select  class="col-md-12 form-control" name="id" autofocus="autofocus">
                    <option selected='true' disabled='disabled'>Select main category</option>
                    <?php
                        while($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $parent_name = $row['cate_name'];
                            echo "<option value='$id'>-$parent_name</option>";
                        }
                        mysqli_close($conn);
                    ?>
                </select>
            </div>
            </div>
            </div>
            <div class="form-group">
          <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                    <input type="text" class="form-control" name="categoryName" required="required" autofocus="autofocus">
                    <label for="firstName">Category Name</label>
                </div>
               </div>
            </div>
          </div>
            <button class="btn btn-primary" type="submit">OK</button>
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
