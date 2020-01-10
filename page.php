<?php
include('./connection.php');
include('./common/cm-header.php');
?>
<div class="banner-header">
	<div class="container">
		<h2>Services</h2>
	</div>
</div>
<div class="content">
<!--services-->
	<div class="services-section">
		<div class="container">
			<div class="welcome-grids">
				<?php
				if (!empty( $_GET['id'])) {
					$conn = conn_db();
					$row[] = '';
					$id = $_GET["id"];
					$sql = "SELECT * FROM content left join category on content.cate_id = category.id WHERE category.id = {$id}";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							if ($row['parent_id'] == 0) {
				?>
				<div class="col-md-5 welcome-grid">
					<img style="height: 300px;" src="./admin/uploads/<?php echo $row['img_id']; ?>" class="img-responsive" alt="" />
						<div class="wel-info">
							<h4><?=$row['title'] ?></a></h4>
							<p class="card-text"><i><?=$row['detail'] ?></i></p>
						</div>
				</div>
			<?php
				} else {
			?>
				<div class="col-md-5 welcome-grid">
					<img style="height: 300px;" src="./admin/uploads/<?php echo $row['img_id']; ?>" class="img-responsive" alt="" />
					<div>
						<button class="wel-info" type="button"><h4><a href="<?="http://localhost/zoo/detail.php?id={$row['content_id']}" ?>"><?=$row['title'] ?></a></h4></button>
					</div>
				</div>
			<?php
					}
				}
			}
		mysqli_close($conn);
		} else {
			echo "Updating...";
		}
			?>
				<div class="clear-fix"></div>
			</div>
		</div>
	</div>
	<!--services-->
</div>
<?php
    include('./common/cm-footer.php');
?>
<script src="./js/script.js"></script>
