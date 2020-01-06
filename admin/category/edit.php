<?php
    session_start();
    include('../session.php');
    include('../../connection.php');
    $conn = conn_db();
    $user_id = $_SESSION['user']["id"];

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $category_parent = $category_name = "";
        $categoryErr = $parentErr = "";
        $query = "SELECT * FROM category WHERE parent_id = 0";
        $result_category = mysqli_query($conn, $query);
        $id = $_GET['id'];
        $sql_category = "SELECT * FROM category WHERE id = $id";
        $result_content = mysqli_query($conn, $sql_category);
        if (mysqli_num_rows($result_content) == 1) {
            $row = mysqli_fetch_assoc($result_content);
            $category_parent = $row['parent_id'];
            $category_name = $row['cate_name'];
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["category_name"]) && !empty($_POST["category_name"])) {
            $category_name = $_POST["category_name"];
        } else {
            $categoryErr = "Category is required";
        }
        if (isset($_POST["category_parent"]) && !empty($_POST["category_parent"])) {
            $category_parent = $_POST["category_parent"];
        } else {
            $parentErr = "Title is required";
        }
        
        if (empty($categoryErr) && empty($parentErr)) {
            $conn = conn_db();
            $sql = "UPDATE category SET category.id = $id, category.cate_name = '{$category_name}', category.parent_id = {$category_parent}, category.user = {$user_id} WHERE id = $id ";
            mysqli_query($conn, $sql);
            header("Location: http://localhost/zoo/admin/category/list.php");
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

  <title> Admin - User - Register</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Edit Category</div>
      <div class="card-body">
        <form method="post" action="edit.php?id=<?=$row['id']?>">
          <div class="form-group">
            <div class="form-row">
            <div class="col-md-12">
                <select class="col-md-12 form-control" name="category_parent">
                <?php
                    while ($row_parent = mysqli_fetch_assoc($result_category)) {
                        $_parent[] = $row_parent;
                    }
                    echo "<option value='$id'>Select main category</option>";
                    foreach ($_parent as $key => $value) : ?>
                    <option value="<?=$value['id']?>" <?=$row['parent_id'] == $value['id'] ? "selected" : ""  ?>><?=$value['cate_name']?></option>
                    <?php endforeach ?>
                </select>
            </div>
            </div>
            </div>
            <div class="form-group">
          <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                    <input type="text" id="firstName" class="form-control" name="category_name" value="<?=$row['cate_name']; ?>">
                    <label for="firstName">Category</label>
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
