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
                                    <?php
                                }
                            ?>
                            <p class="card-text" id="show" hidden><?= $row['detail'] ?></p>
                        </div>
                    </div>
                    <?php
                            }
                        }
                        mysqli_close($conn);
                    ?>
					<div class="clearfix"></div>
                </div>
            </div>
        </div>
		<!--services-->
	<!--feature-->
				<div class="feature">
					<div class="container">
						<h3>Our Features</h3>
						<div class="feature-grids">
								<div class="col-md-4 feature-grid">
										<span class="glyphicon glyphicon-camera" aria-hidden="true"></span>
										<h4>Earum Rerum</h4>
										<p>Masagni dolores eoquie voluptate msequi nesciunt. Nique porro quisquam est qui dolorem ipsumquia dolor sitamet consectet, adipisci unumquam eius.</p>
									</div>
									<div class="col-md-4 feature-grid">
										<span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span>
										<h4>Itaque Earum</h4>
										<p>Masagni dolores eoquie voluptate msequi nesciunt. Nique porro quisquam est qui dolorem ipsumquia dolor sitamet consectet, adipisci unumquam eius.</p>
									</div>
									<div class="col-md-4 feature-grid">
										<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
										<h4>Assumenda est</h4>
										<p>Masagni dolores eoquie voluptate msequi nesciunt. Nique porro quisquam est qui dolorem ipsumquia dolor sitamet consectet, adipisci unumquam eius.</p>
									</div>
									<div class="clearfix"></div>
								</div>
					</div>
				</div>
				<!--feature-->
<!--specials-->
				<div class="specials-section">
					<div class="container">
						<div class="specials-grids">
							<div class="col-md-3 specials1">
								<h3>timings</h3>
									<p>10:30 Am - 10:45 Am Dino Chat</p>
									<p>11:00 Am - 11:15 Am Panda</p>
									<p>11:30 Am - 12:00 PM Farm Chat</p>
									<p>12:00 Pm - 01:00 Pm Feeding</p>
							</div>
							<div class="col-md-3 specials1">
								<h3> details</h3>
								<ul>
									<li><a href="about.html">About Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Terms & Conditions</a></li>
									<li><a href="contact.html">SiteMap</a></li>
								</ul>
							</div>
							<div class="col-md-3 specials1">
								<h3>contact</h3>
								<address>
									<p>The Company Name Inc.</p>
									<p>Glasgow,Le 99 Pr 45.</p>
									<p>Telephone : +1 800 603 6035</p>
									<p>FAX : +1 800 889 9898</p>
									<p>Email : <a href="mailto:example@mail.com">example@mail.com</a></p>
								</address>
							</div>
							<div class="col-md-3 specials1">
								<h3>social</h3>
								<ul>
									<li><a href="#">facebook</a></li>
									<li><a href="#">twitter</a></li>
									<li><a href="#">google+</a></li>
									<li><a href="#">vimeo</a></li>
								</ul>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
            </div>
<?php
    include('./common/cm-footer.php');
?>
<script src="./js/script.js"></script>
<!-- <script>
    // $(document).ready(function(){
    //     $("#view").click(function(){
    //         $("#show").toggle();
    //     });
    // });
</script> -->