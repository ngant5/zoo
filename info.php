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
			 
				
				<div class="contact_top">
				<div class="col-md-2 contact_left"></div>
			 		<div class="col-md-4 contact_left">
					 
					 	<div id="map-canvas" class="map"> </div>
				 </div>
			    <div class="col-md-4 company-right">
					   <div class="company_ad">
							<h3>Contact Info</h3>
						

							 <p>The Zoo Planet Inc.</p>
			      			<address>
								 <p>24 Phan Liem, Da Kao Ward, District 1, Ho Chi Minh City, Vietnam</p>
								 <p>Telephone : 1800 1779</p>
							</address>
							
						</div>
						 
						<!-- <button type="submit" id="mailtobutton" class="btn btn-primary">Email Us</button> -->
						<a href="mailto:zoo-planet@gmail.com" class="btn btn-info btn-lg email">
							<span class="glyphicon glyphicon-envelope"></span>  <b>CONTACT US</b>   
							
						</a>
				</div>	
				<div class="col-md-2 company-right"></div>
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
				content: '<div id="content"><a href="http://localhost/doanhk2/">WINT ZOO</a> <br/> 24 Phan Liem, Da Kao Ward, District 1, Ho Chi Minh City, Vietnam</div>',
				position: myLatlng
			});

			infowindow.open(map);
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>