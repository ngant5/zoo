<?php
   session_start();
   if(empty($_SESSION['user'])) {
     header("Location: http://localhost/zoo/admin/login.php");
   }
    include('../../connection.php');
    $conn = conn_db();
    $target_dir = $target_file = $image = "";
    $user_id = $_SESSION['user']["id"];
    $datetime = getdate();
    $sql_msg = "";
    $query = "SELECT * FROM category WHERE parent_id = 0";
    $result = mysqli_query($conn, $query);

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $row[] = '';
        $category = $title = $detail = "";
        $categoryErr = $titleErr = $detailErr = "";
        $target_dir = $target_file = $image = "";
        $user_id = $_SESSION['user']["id"];
        $sql_msg = "";
        $query = "SELECT * FROM category WHERE parent_id = 0";
        $result_category = mysqli_query($conn, $query);
        $id = $_GET['id'];
        $sql_content = "SELECT * FROM content left join users on content.user_id = users.user_id
                                              left join category on content.cate_id = category.id WHERE content_id = $id";
        $result_content = mysqli_query($conn, $sql_content);
        if (mysqli_num_rows($result_content) == 1) {
            $row = mysqli_fetch_assoc($result_content);
            $category = $row['cate_name'];
            $detail = $row['detail'];
            $detail = $row['detail'];
            $image = $row['img_id'];
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["category"]) && !empty($_POST["category"])) {
            $category = $_POST["category"];
        } else {
            $categoryErr = "Category is required";
        }
        if (isset($_POST["title"]) && !empty($_POST["title"])) {
            $title = $_POST["title"];
        } else {
            $titleErr = "Title is required";
        }
        if (isset($_POST["detail"]) && !empty($_POST["detail"])) {
            $detail = $_POST["detail"];
        } else {
            $detail = "Detail is required";
        }
        if(!empty($_FILES['image']['name'])) {
            if (isset($_FILES['image'])) {
                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES['image']['name']);
                $image = $_FILES['image']['name'];
                $img = move_uploaded_file($_FILES['image']['tmp_name'], $target_file);    
            }
        }
        if (empty($categoryErr) && empty($titleErr) && empty($detailErr)) {
            $conn = conn_db();
            $sql = "UPDATE content SET content.title = '{$title}', content.detail = '{$detail}', content.cate_id = {$category}, content.user_id = {$user_id}, content.img_id = '{$image}' WHERE content_id = $id";
            mysqli_query($conn, $sql);
            header("Location: http://localhost/zoo/admin/page/list.php");
                }
                else {
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
      <div class="card-header">Add Page</div>
      <div class="card-body">
        <form method="post" action="edit.php?id=<?=$row['content_id']?>" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
            <div class="col-md-12">
                <select  class="col-md-12 form-control" name="category">
                <?php
                    while ($row_parent = mysqli_fetch_assoc($result_category)) {
                        $_parent[] = $row_parent;
                    }
                    echo "<option value='$id'>Select main category</option>";
                    foreach ($_parent as $key => $value) : ?>
                    <option value="<?=$value['id']?>" <?=$row['cate_id'] == $value['id'] ? "selected" : ""  ?>><?=$value['cate_name']?></option>
                    <?php endforeach ?>
                </select>
            </div>
            </div>
            </div>
            <div class="form-group">
          <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                    <input type="text" id="firstName" class="form-control" name="title" value="<?=$row['title']; ?>">
                    <label for="firstName">Title</label>
                </div>
               </div>
            </div>
          </div>
          <div class="form-group" >
            <div class="form-row">
                <div class="col-md-12">
                    <div class="form-label-group">
                        <textarea type="text" id="firstName" class="form-control" placeholder="Detail" name="detail" rows="5"><?php echo $row['detail']; ?></textarea>
                    </div>
                </div>
              </div>
          </div>
          <div class="form-group">
            <div class="form-row">
                <div class="col-md-12">
                    <?php echo "<img style='width:120px;' src='../uploads/".$row['img_id']."'>"; ?>
                    <input type="file" name="image">
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
