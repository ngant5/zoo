<?php
	include ("./connection.php");
	include('./common/cm-header.php');
?>

<style>
	.head-banner h3 {

	}
</style>
<div class="header-banner">
        <div class="container">
            <div class="head-banner">
                <h3>You've Never Been This Close!</h3>
            </div>
            <div class="banner-grids">
                <div class="col-md-6 banner-grid">
                    <h4>OUR WORK</h4>
                    <p>We’re proud of our successful history saving animals, from toads to bison. Learn what our scientists are currently up to.</p>
                </div>
                <div class="col-md-6 banner-grid">
                <h4>KIDS PROGRAMS</h4>
					<p>There’s always an adventure waiting for you at the Zoo Planet! Check out the fun, educational activities we have in store for you. More nature. More wildlife. More fun!</p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
<!--header-->
<!--welcome-->
<div class="content">
	<div class="welcome">
		<div class="container">
			<h2>welcome to zoo planet</h2>
				<div class="welcome-grids">
					<div class="col-md-3 welcome-grid">
						<img src="images/p1.jpg" alt=" " class="img-responsive" />
						<div class="wel-info">
							<h4>BONOBO</h4>
							<p> </p>
							<button class="btn btn-info" id="view1">Detail</button>
								<p class="card-text" id="show1" hidden>
									Bonobos are quite possibly the most intelligent primates on Earth (other than us, of course!). 
									The Zoo Planet was one of the first zoos to exhibit these highly endangered primates.
									One characteristic bonobos are especially known for is their ability to get along: unlike humans or chimpanzees, they have never been observed killing one of their own kind. 
									These clever apes are fun to watch. 
									Their exhibit is dominated by giant rock outcroppings, and ropes and hammocks attached to bamboo sway poles, on which the playful bonobos nimbly climb or rest. 
									Waterfalls and streams add to the African rain forest atmosphere. 
									But the real show is the bonobos themselves—do they remind you of anyone?
								</p>
						</div>
					</div>
					<div class="col-md-3 welcome-grid">
						<img src="images/p2.jpg" alt=" " class="img-responsive" />
						<div class="wel-info">
							<h4>REPTILE MESA</h4>
							<p> </p>
							<button class="btn btn-info" id="view2">Detail</button>
								<p class="card-text" id="show2" hidden>
									Reptile Mesa has all kinds of exotic-looking plants (including, appropriately, dragon trees!) from all kinds of exotic locations. 
									The task of maintaining a varied plant collection while creating natural habitats for the animal residents can be challenging. 
									For example, in the green iguana exhibit on Reptile Mesa, the evergreen shrub, Xylosma sp., was selected because it is not a particularly flavorful plant from an iguana's point of view—so, the lizards would not consume it as fast as we planted it, which can often occur. 
									Moreover, this plant is sturdy enough to allow these large-bodied lizards, which can weigh up to 8 or 10 pounds (3 to 5 kilograms), to bask on top of them.
								</p>
						</div>
					</div>
					<div class="col-md-3 welcome-grid">
						<img src="images/p3.jpg" alt=" " class="img-responsive" />
						<div class="wel-info">
							<h4>BEE-EATER</h4>
							<p> </p>
							<button class="btn btn-info" id="view3">Detail</button>
								<p class="card-text" id="show3" hidden>
									The harpy eagle is legendary, although few people have seen one in the wild. Fortunately, you can view one here at the Zoo! 
									Named after harpies of Greek mythology, this dark gray bird of prey has a very distinctive look, with feathers atop its head that fan into a bold crest when the bird feels threatened. 
									Some smaller gray feathers create a facial disk that may focus sound waves to improve the bird’s hearing, similar to owls. 
									The harpy eagle's legs can be as thick as a small child's wrist, and its curved back talons are larger than grizzly bear claws! 
									The harpy may not be the largest bird of prey (that title belongs to the Andean condor), but this extraordinary creature is the heaviest and most powerful of birds. 
								</p>
						</div>
					</div>
					<div class="col-md-3 welcome-grid">
						<img src="images/p4.jpg" alt=" " class="img-responsive" />
						<div class="wel-info">
							<h4>ELEPHANT</h4>
							<p> </p>
							<button class="btn btn-info" id="view4">Detail</button>
								<p class="card-text" id="show4" hidden>
									At first glance, African elephants look similar to Asian elephants, but they are different species that live in different parts of the world.
									Yet in Elephant Odyssey, you can see both species! How to tell them apart? African elephants have very large ears that are shaped like the continent of Africa, while Asian elephants have smaller ears. 
									Also, an Asian elephant's back is rounded, but an African elephant's back has a dip or sway in it. 
									A wonderful feature of Elephant Odyssey is our Elephant Care Center, where you may watch keepers scrubbing an elephant’s foot or observe a training session. 
									It’s a great place to chat with our keepers, too. Be sure to check out the life-size statues of wooly mammoths for some great photo ops!
								</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
		</div>
	</div>
<!--welcome-->
			
	<!--animals-->
		<!-- <div class="animals">
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
	</div> -->
<!--models-->
<!--testimonials-->
<div class="testimonials">
	<div class="container">
			<h3>Honestly I have to say the Zoo Planet is one of the best zoos I've ever been to!</h3>
		<h4><a href="#">Anuj Kacker</a></h4>
	</div>
</div>
<!--testimonials-->
<!--events-->
<div class="events">
	<div class="container">
		<h3>events</h3>
		<div class="events-grids">
			<div class="col-md-3 event-grid">
				<a href="#" class="mask">
				<img src="images/camp.jpg" class="img-responsive zoom-img" alt=""></a>
			</div>
			<div class="col-md-3 event-grid1">
				<h4>Summer Camp</h4>
				<h5>Registration Opens January 22, 2020!</h5>
				<p>Create a welcoming, fun and safe camp experience for all</p>
			</div>
			<div class="col-md-3 event-grid">
				<a href="#" class="mask">
					<img src="images/birthday-parties.jpg" class="img-responsive zoom-img" alt=""></a>
			</div>
			<div class="col-md-3 event-grid1">
				<h4>Birthday Parties</h4>
				<h5>Anytime</h5>
				<p>The Zoo Planet offers two varieties of Birthday parties: A "Choose your Own Adventure" package and a more inclusive "Birthday Safari". </p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--events-->
<!--specials-->
	

<?php
	include('./common/cm-footer.php');
?>
<script src="./js/script.js"></script>