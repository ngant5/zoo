<?php
session_start();
include('../../connection.php');
$conn = conn_db();
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $parentId = 0;
        $categoryName = "";
        $sql_msg = "";
        $user_id = $_SESSION['user']["id"];
        $id = $_GET['id'];
        $sql_category = "SELECT * FROM category WHERE id = $id";
        $result_category = mysqli_query($conn, $sql_category);
        if (mysqli_num_rows($result_category) == 1) {
            $row = mysqli_fetch_assoc($result_category);
            } else {
                echo "a";
                // header("Location: http://localhost/some_php/dashboard.php");
                // die();
                }
            } else {
                echo 'b';
                // header("Location: http://localhost/some_php/dashboard.php");
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["categoryName"]) && !empty($_POST["categoryName"])) {
            $categoryName = $_POST["categoryName"];
        } else {
            $cateNameErr = "Category Name is required";
        }
        if (empty($cateNameErr)) {
            $conn = conn_db();
            $sql = "UPDATE category SET category.id = $id, category.cate_name = '{$categoryName}', category.parent_id = {$parentId}, category.user = {$user_id} WHERE id = $id ";
            
            if (mysqli_query($conn, $sql)) {
                $last_id = mysqli_insert_id($conn);
                header("Location: http://localhost/zoo/admin/menu/list.php");
            } else {
                $sql_msg = "Add Fail";
            }
            
            $categoryName = $id = "";
            // mysqli_close($conn);
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
      <div class="card-header">Edit Menu</div>
      <div class="card-body">
        
        <form method="post" action="edit.php?id=<?=$row['id']?>">
          <div class="form-group">
          <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                    <input type="text" id="firstName" class="form-control" placeholder="Menu name" name="categoryName" value="<?=$row['cate_name']?>" required="required" autofocus="autofocus">
                    <label for="firstName">Menu name</label>
                </div>
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
