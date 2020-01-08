<?php
	include('../connection.php');
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Zoo Nactional</title>
	<link rel="stylesheet" type="text/css" href="./asset/css/style.css">
	<link rel="stylesheet" type="text/css" href="./asset/css/mobile.css">
	<script type='text/javascript' src='./asset/js/mobile.js'></script>
</head>
<style>
	.video-fluid {
		width: 100%;
		height: auto;
	}
	.nav-img {
		width: 100%;
	}
</style>
<body>
    <?php include "../common/header-common.php"; ?>
    <div id="body">
        
          <table class="table table-bordered" width="100%" cellspacing="0">
            <div class="row">
              <div class="col-md-3">
                <?php
                  $conn = conn_db();
                  $row[] = '';
                  $id = $_GET["id"];
                  $sql = "SELECT * FROM content left join category on content.cate_id = category.id WHERE category.id = {$id}";
                  // $sql = "SELECT * FROM content WHERE category.id = {$id}";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                      $i = 1;
                      while ($row = mysqli_fetch_assoc($result)) {
                ?>
                      <div class="card border-0 mb-1" style="height: 100%;">
                          <img class=" card-img-top" src="../admin/uploads/<?php echo $row['img_id']; ?>" alt="">
                          <div class="card-body">
                              <h5 class="card-title"><?= $row['title'] ?></h5>
                          </div>
                          <div class="card-footer border-0 bg-white">
                              <button class="btn btn-primary" id="view"></i> View</button>
                              <p class="card-text" id="show"><?= $row['detail'] ?></p>
                          </div>
                      </div>
                  
              <?php
              }
            }
            mysqli_close($conn);
        ?>
        </table>
      </div>
    </div>
    </div>
    <script>
    $(document).ready(function () {
    $("#show").hide();

    $("#view").click(function (e) {
        $("#view").hide();
        $("#show").show();
      });
    });
</script>
	<?php include "../common/footer-common.php"; ?>