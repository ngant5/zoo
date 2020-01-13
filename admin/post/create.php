<?php
    session_start();
    if(empty($_SESSION['user'])) {
      header("Location: http://localhost/zoo/admin/login.php");
    }
    include('../../connection.php');
    $conn = conn_db();
    $category = $title = $detail = "";
    $categoryErr = $titleErr = $detailErr = "";
    $target_dir = $target_file = $image = "";
    $user_id = $_SESSION['user']["id"];
    $datetime = getdate();
    $sql_msg = "";
    $msg = "";
    function loop_array($array = array(), $parent_id = 0) {
            foreach($array[$parent_id] as $item) {
            ?>
                <option value="<?=$item['id']?>"><?=$item['cate_name']?></option>
            <?php
                while (loop_array($array, $item['id'])) {
                }
            }
        }
    function display_menu() {
        $conn = conn_db();
        $sql = "SELECT * FROM category WHERE category.status = 1";
        $query = mysqli_query($conn, $sql);
        $array = array();
        if (mysqli_num_rows($query)) {
            while ($row = mysqli_fetch_array($query)) {
                $array[$row['parent_id']][] = $row;
            }
            loop_array($array);
        }
    }
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
            move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
        }
        if (empty($categoryErr) && empty($titleErr) && empty($detailErr)) {
            $sql = "INSERT INTO content (title, detail, cate_id, user_id, img_id)
            VALUES ('{$title}', '{$detail}', {$category}, {$user_id}, '{$image}')";
            if (mysqli_query($conn, $sql)) {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Succesfully Added')
                window.location.href='http://localhost/zoo/admin/post/list.php';
                </SCRIPT>");
            } else {
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                window.alert('Add Failed')
                window.location.href='http://localhost/zoo/admin/post/list.php';
                </SCRIPT>");
            }
            $target_dir = $target_file = $image = "";
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

  <title> Admin - Post</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Add Post</div>
      <div class="card-body">
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
            <div class="col-md-12">
                <select class="col-md-12 form-control" name="category" required="required" autofocus="autofocus">
                    <option selected='true' disabled='disabled'>Select category</option>
                    <?php display_menu(); ?>
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