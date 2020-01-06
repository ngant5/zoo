<?php
session_start();
if(empty($_SESSION['user'])) {
  header("Location: http://localhost/zoo/admin/login.php");
}
    include('../session.php');
    include('../../connection.php');
    $conn = conn_db();
    $category = $title = $detail = "";
    $categoryErr = $titleErr = $detailErr = "";
    $target_dir = $target_file = $image = "";
    $user_id = $_SESSION['user']["id"];
    $datetime = getdate();
    $sql_msg = "";
    $msg = "";
    $query = "SELECT * FROM category WHERE parent_id = 0";
    $result = mysqli_query($conn, $query);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["category"]) && !empty($_POST["category"])) {
            $category = $_POST["category"];
        } else {
            $categoryErr = "Category Name is required";
        }
        if (isset($_POST["title"]) && !empty($_POST["title"])) {
            $title = $_POST["title"];
        } else {
            $titleErr = "Title is required";
        }
        if (isset($_POST["detail"]) && !empty($_POST["detail"])) {
            $detail = $_POST["detail"];
        } else {
            $detailErr = "Title is required";
        }
        if (isset($_FILES['image'])) {
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES['image']['name']);
            $image = $_FILES['image']['name'];
        }
        if (empty($categoryErr) && empty($titleErr) && empty($detailErr)) {
            $sql = "INSERT INTO content (title, detail, cate_id, user_id, img_id)
            VALUES ('{$title}', '{$detail}', {$category}, {$user_id}, '{$image}')";
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    mysqli_query($conn, $sql);
                    $last_id = mysqli_insert_id($conn);
                    header("Location: http://localhost/zoo/admin/page/list.php");
                    $sql_msg = "Add successed <a href='view.php/?id={$last_id}' target='_blank' >View</a>";
                }
            } else {
                echo "Add page fail";
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

  <title> Admin - Page</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Add Page</div>
      <div class="card-body">
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
            <div class="col-md-12">
                <select  class="col-md-12 form-control" name="category" required="required" autofocus="autofocus">
                    <?php
                    echo "<option value='$id'>Select category</option>";
                        while($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $parent_name = $row['cate_name'];
                            echo "<option value='$id'>$parent_name</option>";
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
                    <input type="text" id="firstName" class="form-control" placeholder="First name" name="title" required="required" autofocus="autofocus">
                    <label for="firstName">Title</label>
                </div>
               </div>
            </div>
          </div>
          <div class="form-group" >
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-label-group">
                        <textarea type="text" id="firstName" class="form-control" placeholder="Detail" name="detail" rows="5" required="required" autofocus="autofocus"></textarea>
                    </div>
                </div>
              </div>
          </div>
          <div class="form-group">
            <div class="form-row">
                <div class="col-md-12">
                    <input type="file" name="image" required="required">
                </div>
            </div>
        </div>
            <button class="btn btn-primary" type="submit">OK</button>
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