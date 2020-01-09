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
			<div class="services-grids">
			<?php
				$conn = conn_db();
				$row[] = '';
				$id = $_GET["id"];
				$sql = "SELECT * FROM content left join category on content.cate_id = category.id WHERE category.id = {$id}";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0) {
					$i = 1;
					while ($row = mysqli_fetch_assoc($result)) {
			?>
				<div class="col-md-3 services-grid">
					<img src="./admin/uploads/<?php echo $row['img_id']; ?>" class="img-responsive" alt="" />
					<div class="services-info">
						<h4><?= $row['title'] ?></h4>
						<?php
							if ($row['parent_id'] != 0) {
								?>
								<button class="btn btn-info" id="view">Detail</button>
								<p class="card-text" id="show" hidden><?= $row['detail'] ?></p>
								<div class="clearfix"></div>
								<?php
							}
						?>
						<p class="card-text" id="show" hidden><?= $row['detail'] ?></p>
					</div>
					<div class="clearfix"></div>
				</div>
				<?php
						}
					}
					mysqli_close($conn);
				?>
			</div>
		</div>
	</div>
	<!--services-->

</div>
<?php
    include('./common/cm-footer.php');
?>
<script src="./js/script.js"></script>