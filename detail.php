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
				$conn = conn_db();
				$row[] = '';
                $id = $_GET["id"];
                
				$sql = "SELECT * FROM content WHERE content_id = {$id}";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
			?>
                <div class="col-md-3 welcome-grid"></div>
				<div class="col-md-6 welcome-grid">
					<img style="height: 350px;" src="./admin/uploads/<?php echo $row['img_id']; ?>" class="img-responsive" alt="" />
					<p class="card-text" id="show"><?= $row['detail'] ?></p>
				</div>
                <div class="col-md-3 welcome-grid"></div>
				<div class="clear-fix"></div>
				<?php
						}
				}
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


<?php
							mysqli_close($conn);
						?>