<?php
	include('./connection.php');
	include('./common/cm-header.php');
?>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6wWy83m1Mj-WVV446QA0c6yVB4AseJNQ"></script>
	<style>
		.map {
			width: 300px;
			height: 300px;
		}
		.email {
			background-color: #a9a685;
			border-color: #a9a685;
		}
	</style>
	<div class="banner-header">
		<div class="container">
		</div>
	</div>
	<!--header-->
	 <div class="content">
 		<div class="contact">
		 <div class="container">
		 	<div class="company_ad">
				<div class="col-md-3"></div>
					<div class="col-md-6"><h3>Who We Are</h3></div>
				<div class="col-md-3"></div>
				<div class="clearfix"></div>
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<p><b>Our Zoo, is run by around 250 staff together with approximately 300 volunteers who run the Activity Centre and organise our animal encounter and outreach sessions. Our team engages with local community groups, schools and supports conservation projects within the field.</b></p>
					<p><b>Zoo, also called zoological garden or zoological park, place where wild animals and, in some instances, domesticated animals are exhibited in captivity. In such an establishment animals can generally be given more intensive care than is possible in nature reserves or sanctuaries. Most long-established zoos exhibit general collections of animals, but some formed more recently specialize in particular groups—e.g., primates, big cats, tropical birds, or waterfowl. Marine invertebrates, fishes, and marine mammals often are kept in separate establishments known as aquariums (see aquarium). </b></p>
				</div>
				<div class="clearfix"></div>
				</br>

			</div>
		 	<div class="company_ad">
			 	<div class="col-md-3"></div>
				<div class="col-md-6"><h3>Business Opportunities</h3></div>
				<div class="col-md-3"></div>
				<div class="clearfix"></div>
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<p><b>
						The Zoo Planet (ZP) is the private, nonprofit, partner of the Saigon Zoo and Botanical Gardens.
						Through various agreements with the Ho Chi Minh City and the Zoo, ZP manages seven essential Zoo departments, including fundraising, membership, publications, marketing, special events, volunteers and concessions and retail.
					</b></p><br>
					<p><b>
						ZP occasionally issues Requests for Proposals for various business opportunities in connection with our activities at the Zoo. We encourage you to check this page regularly if your business is interested in working with us.
					</b></p><br>
					<p><b>
						Enquiries can be emailed to zoo-planet@gmail.com
					</b>
					</p><br>
					<a href="mailto:zoo-planet@gmail.com?subject=[New Contact Message]" class="btn btn-info btn-lg email">
						<span class="glyphicon glyphicon-envelope"></span>  <b>CONTACT US</b>
					</a>
				</div>
				<div class="col-md-1"></div>
				<div class="clearfix"> </div>
				
			 </div>
		 </div>
 			<div class="container">
				<div class="contact_top">
				<div class="col-md-2 contact_left"></div>
			 		<div class="col-md-4 contact_left">
					 	<div id="map-canvas" class="map"> </div>
				 </div>
			    <div class="col-md-5 company-right">
					   <div class="company_ad">
							<h3>Contact Info</h3>
							 <p>The Zoo Planet Inc.</p>
			      			<address>
								 <p>24 Phan Liem, Da Kao Ward, District 1, Ho Chi Minh City, Vietnam</p>
								 <p>Telephone : +84 1800 1779</p>
								 <p>Email : <a href="mailto:zoo-planet@gmail.com">zoo-planet@gmail.com</a></p>
							</address>
						</div>
						<!-- <button type="submit" id="mailtobutton" class="btn btn-primary">Email Us</button> -->
						<!-- <a href="mailto:zoo-planet@gmail.com" class="btn btn-info btn-lg email">
							<span class="glyphicon glyphicon-envelope"></span>  <b>CONTACT US</b>
						</a> -->
				</div>
				<div class="col-md-1 company-right"></div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<?php
	include('./common/cm-footer.php');
	?>
	<script>
		function initialize() {
			var myLatlng = new google.maps.LatLng(10.789120, 106.695340);
			var mapOptions = {
				center: myLatlng,
				zoom: 15
			};

			var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

			var infowindow = new google.maps.InfoWindow({
				content: '<div id="content"><a href="http://localhost/zoo/index.php">THE ZOO PLANET</a> <br/> 24 Phan Liem, Da Kao Ward, District 1, Ho Chi Minh City, Vietnam</div>',
				position: myLatlng
			});

			infowindow.open(map);
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>