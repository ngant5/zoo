<?php
    include('./connection.php');
    include('./common/cm-header.php');
?>
<div class="banner-header">
    <div class="container">
        
    </div>
</div>
<!--about-->
<div class="content">
        <div class="about-section">
            <div class="container">
                    <div class="about-grids">
                        <div class="col-md-4 about-grid">
                            <h3>WHO WE ARE</h3>
                            <!-- <img src="images/p5.jpg" class="img-responsive" alt="/"> -->
                            <div class="about1">
                                <p>Our Zoo, is run by around 250 staff together with approximately 300 volunteers who run the Activity Centre and organise our animal encounter and outreach sessions. Our team engages with local community groups, schools and supports conservation projects within the field.</p>
                            </div>
                            </div>
                        <div class="col-md-8 about-grid">
                        <h3>ANIMAL EXPERIENCES</h3>
                            <div class="trend">
                                <p>Our award-winning animal experiences are exciting, educational and unforgettable. Whether you’re looking for that perfect gift, or you would like to add something special to your day visit, our animal experiences are the answer.</p>
                            </div>
                            <div class="trend">
                                <p>Our animal experiences allow you to get up close and personal with some of our most popular animals, such as the giraffes, giant tortoises, rhinos, meerkats and more! As part of your experience, you will meet and chat with the keepers - a great opportunity to learn about the animals and their natural habitat from the people that know them best. Depending on the experience, you may also get to help out with feeding time!</p>
                                <!-- <ul><li><a href="#">New Listing Sign-Up nulla vel</a></li></ul> -->
                            </div>
                        </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    <!--animals-->
		<div class="animals">
			<div class="container">
				<h3>animals</h3>
				<div class="clients">
					<ul id="flexiselDemo3">
						<li><img src="images/m1.jpg" class="img-responsive" alt=""/></li>
						<li><img src="images/m2.jpg" class="img-responsive" alt=""/></li>
						<li><img src="images/m3.jpg" class="img-responsive" alt=""/></li>
						<li><img src="images/m4.jpg" class="img-responsive" alt=""/></li>
						<li><img src="images/m5.jpg" class="img-responsive" alt=""/></li>
						<li><img src="images/m1.jpg" class="img-responsive" alt=""/></li>
						<li><img src="images/m2.jpg" class="img-responsive" alt=""/></li>
						<li><img src="images/m3.jpg" class="img-responsive" alt=""/></li>
						<li><img src="images/m4.jpg" class="img-responsive" alt=""/></li>
						<li><img src="images/m5.jpg" class="img-responsive" alt=""/></li>
					</ul>
						<script type="text/javascript">
					$(window).load(function() {
						$("#flexiselDemo3").flexisel({
							visibleItems: 5,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
							responsiveBreakpoints: {
								portrait: {
									changePoint:480,
									visibleItems: 1
								}, 
								landscape: {
									changePoint:640,
									visibleItems: 2
								},
								tablet: {
									changePoint:768,
									visibleItems: 3
								}
							}
						});
						});
					</script>
					<script type="text/javascript" src="js/jquery.flexisel.js"></script>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
    <!--map-->
    <div class="events">
        <div class="container">
            <h3>Zoo Map</h3>
            <div class="events-grids">
                <div class="col-md-2 event-grid"></div>
                <div class="col-md-8 event-grid">
                    <a href="images/map.png" class="mask">
                    <img src="images/map.png" class="img-responsive zoom-img" alt=""></a>
                </div>
                <div class="col-md-2 event-grid"></div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<?php
include('./common/cm-footer.php');
?>