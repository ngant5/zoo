-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2020 at 06:27 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cate_name`, `parent_id`, `user`, `status`) VALUES
(1, 'Characters', 0, 2, 1),
(2, 'Leisure & Dining', 0, 2, 1),
(3, 'Leisure', 2, 2, 1),
(4, 'Dining', 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci,
  `cate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `title`, `detail`, `cate_id`, `user_id`, `img_id`, `date_post`) VALUES
(1, 'ELEPHANT', 'At first glance, African elephants look similar to Asian elephants, but they are different species that live in different parts of the world. Yet in Elephant Odyssey, you can see both species! How to tell them apart? African elephants have very large ears that are shaped like the continent of Africa, while Asian elephants have smaller ears. Also, an Asian elephant back is rounded, but an African elephant back has a dip or sway in it. A wonderful feature of Elephant Odyssey is our Elephant Care Center, where you may watch keepers scrubbing an elephant foot or observe a training session. It a great place to chat with our keepers, too. Be sure to check out the life-size statues of wooly mammoths for some great photo ops!', 1, 1, 'p4.jpg', '2020-01-13 15:40:37'),
(2, 'BEE-EATER', 'The harpy eagle is legendary, although few people have seen one in the wild. Fortunately, you can view one here at the Zoo! Named after harpies of Greek mythology, this dark gray bird of prey has a very distinctive look, with feathers atop its head that fan into a bold crest when the bird feels threatened. Some smaller gray feathers create a facial disk that may focus sound waves to improve the bird hearing, similar to owls. The harpy eagle legs can be as thick as a small child wrist, and its curved back talons are larger than grizzly bear claws! The harpy may not be the largest bird of prey (that title belongs to the Andean condor), but this extraordinary creature is the heaviest and most powerful of birds.', 1, 1, 'bee-eater.jpg', '2020-01-13 15:42:08'),
(3, 'BONONO', 'Bonobos are quite possibly the most intelligent primates on Earth (other than us, of course!). The Zoo Planet was one of the first zoos to exhibit these highly endangered primates. One characteristic bonobos are especially known for is their ability to get along: unlike humans or chimpanzees, they have never been observed killing one of their own kind. These clever apes are fun to watch. Their exhibit is dominated by giant rock outcroppings, and ropes and hammocks attached to bamboo sway poles, on which the playful bonobos nimbly climb or rest. Waterfalls and streams add to the African rain forest atmosphere. But the real show is the bonobos themselvesâ€”do they remind you of anyone?', 1, 1, 'bonono.jpg', '2020-01-13 15:42:47'),
(4, 'KFC', 'KFC was one of the first American fast food chains to expand internationally, opening outlets in Canada, the United Kingdom, Mexico, and Jamaica by the mid-1960s. Throughout the 1970s and 1980s, it experienced mixed fortunes domestically, as it went through a series of changes in corporate ownership with little or no experience in the restaurant business. In the early-1970s, KFC was sold to the spirits distributor Heublein, which was taken over by the R.J. Reynolds food and tobacco conglomerate; that company sold the chain to PepsiCo. The chain continued to expand overseas, however, and in 1987, it became the first Western restaurant chain to open in China. ', 4, 1, 'kfcmenu.jpg', '2020-01-13 15:54:38'),
(6, 'The Coffe House', 'The Coffe House, perhaps best known for boasting one of the most beautiful coastlines of the world, has an up and coming cafe scene worth checking out when you are in town. If you get tired of doing absolutely nothing at the beach, then head to one of these air-conditioned venues with a good book or your laptop, order a nice cold cup of ca phe sua da (Vietnamese ice coffee) and waste the rest of the day away. These are our absolute favorite spots in the city.', 4, 1, 'coffeemenu.jpg', '2020-01-13 16:35:22'),
(7, 'Pizza In Town', 'Vietnamese food is delicious, but sometimes you just want to stuff your face with all the greasy cheese and crust your body can handle. Luckily for you, Ho Chi Minh City is home to some damn good pizza. Here are the best.', 4, 1, 'pizza.jpg', '2020-01-13 16:39:56'),
(8, 'The Seafood Bar', 'For The Seafood Bar, a seafood traiteur and restaurant in the heart of Amsterdam Old South, we developed a logo, graphic ID and advertising material.\r\nThis well-regarded seafood restaurant comes complete with a small fish shop and a cookery school. Popular choices include the seafood casserole, salt & chilli squid, Carlingford oysters and Strangford Lough mussels. Consider one of the suggested dish and beer pairings from the blackboard.', 4, 2, 'sea-food.jpg', '2020-01-13 16:41:19'),
(9, 'For Kids', 'A multitude of fun activities awaits kids! From a water playground for a splashing good time, close encounters with farmyard animals, to a wild carousel ride and many more!', 3, 1, 'for-kids.jpg', '2020-01-13 16:42:05'),
(10, 'Wildlife Tours', 'Make your visit extra wild! Go behind-the-scenes and get closer to our wildlife! Learn how our animals are cared for, discover their unique traits and get the opportunity to feed some of them.', 3, 1, 'wil-tour.jpg', '2020-01-13 16:42:29'),
(11, 'Feed the Animals', 'Catch our animals when they are most active Ã¢â‚¬â€œ during feeding sessions! Listen to our keepers share stories and even get to feed the animals yourself.', 3, 1, 'feed-animal.jpg', '2020-01-13 16:44:44'),
(12, 'Lion', 'The lion (Panthera leo) is a species in the family Felidae; it is a muscular, deep-chested cat with a short, rounded head, a reduced neck and round ears, and a hairy tuft at the end of its tail. It is sexually dimorphic; adult male lions have a prominent mane, which is the most recognisable feature of the species. With a typical head-to-body length of 184â€“208 cm (72â€“82 in) they are larger than females at 160â€“184 cm (63â€“72 in). It is a social species, forming groups called prides. A lion pride consists of a few adult males, related females and cubs. Groups of female lions usually hunt together, preying mostly on large ungulates. The lion is an apex and keystone predator, although some lions scavenge when opportunities occur, and have been known to hunt humans, although the species typically does not.', 1, 1, 'lion.jpg', '2020-01-13 19:07:12'),
(13, 'Amphibians', 'Amphibians can live both in fresh water and on land, although all amphibian species depend upon water for reproduction and to keep their skin moist. They range in size from frogs less than a half-inch long, to a giant salamanders that reach five feet in length.', 1, 1, 'amphibians.jpg', '2020-01-13 19:08:18'),
(14, 'Reptiles', 'Reptiles are cold-blooded, usually egg-laying vertebrates (animals with backbones). Their skin is covered with scales or plates. Unlike mammal young, which are dependent upon their mothers for some time after birth, most reptiles are independent from day one. There are more than 6,500 reptile species.', 1, 1, 'reptiles.jpg', '2020-01-13 19:09:06'),
(15, 'CHOPSTICKS RESTAURANT', 'For a bit of historical context to go along with your meal, give the wonderful Chopsticks Restaurant a try. The restaurant is set in the former villa of South Vietnamâ€™s vice president, Tran Van Huong, who sided along with the US until Vietnamese reunification in 1975. The home has been exquisitely restored and the setting radiates sophistication, and the food couldnâ€™t be better. Here, itâ€™s all about beautifully prepared dishes and fresh ingredients, showcasing traditional Vietnamese cuisine. On a recent trip I guided, this was everyoneâ€™s favourite meal of the trip!', 4, 1, 'foodmenu.jpg', '2020-01-13 19:14:51'),
(16, 'Kid Active', 'Children learn best when their bodies and minds are stimulated. The Kid Active pre-school range encourages children to explore their imaginations, move their bodies in different ways and allows them to have fun on their own or with friends.', 3, 2, 'Active-Kids.jpg', '2020-01-13 19:24:30'),
(17, 'Penguin', 'Penguin, (order Sphenisciformes), any of 18 species of flightless marine birds that live only in the Southern Hemisphere. The majority of the 18 species live not in Antarctica but rather between latitudes 45Â° and 60Â° S, where they breed on islands. A few penguins inhabit temperate regions, and one, the Galapagos penguin (Spheniscus mendiculus), lives at the Equator.', 1, 1, 'm4.jpg', '2020-01-13 19:46:52'),
(18, 'Lac Alaotra bamboo lemur', 'The Lac Alaotra bamboo lemur (Hapalemur alaotrensis), also known as the Lac Alaotra gentle lemur, Alaotran bamboo lemur, Alaotran gentle lemur, Alaotra reed lemur, or locally as the bandro, is a bamboo lemur. It is endemic to the reed beds in and around Lac Alaotra, in northeast Madagascar. It is about 40 cm (16 in) long, with a similar length tail, and is a brownish-gray colour. It is the only bamboo lemur to live in and feed on papyrus reeds, and other reeds and grasses, and some authorities argue that it should be regarded as a subspecies of the eastern lesser bamboo lemur (Hapalemur griseus). ', 1, 2, 'Lac Alaotra.jpg', '2020-01-13 20:35:29'),
(19, 'African Wild Dog', 'The African wild dog is one of the most social dogs, and it lives in packs in the South African savanna. Its short fur features a motley array of colours and patterns â€“ the yellow, grey, white and black patches give the African wild dog its distinctive look.', 1, 1, 'African Wild Dog.jpg', '2020-01-14 10:24:11'),
(20, 'Chilean Flamingo', 'Flamingos use their unique bill like a ladle and eject the water through a type of filter at the edge of their bill, leaving only tiny aquatic organisms behind. The feather colour of the pink birds with the long neck is a result of their diet: small reddish crustaceans are the cause. The flamingoâ€™s liver transforms their pigments into small particles that travel to the feathers. ', 1, 1, 'Chilean Flamingo.jpg', '2020-01-14 10:54:54'),
(21, 'Bairdâ€™s Tapir', 'The Bairdâ€™s tapir is a highly endangered species in its native homeland â€“ the tropical Central American rainforest. According to estimates, there are less than 5500 animals living in the wild. They are mostly solitary and mostly feed off of leaves, buds and fruit.', 1, 1, 'Bairdâ€™s Tapir.jpg', '2020-01-14 10:55:21'),
(22, 'Ankole-Watusi', 'The pastoral tribes of Eastern Africa have been breeding Angkole-Watusi cattle for 5,000 years.\r\nThis domestic breed was created by crossing ancient Egyptian longhorn cattle with South Asian zebu.', 1, 1, 'Ankole-Watusi.jpg', '2020-01-14 10:56:03'),
(23, 'Asian Black Bear', 'Attracted by bear bile: Bear bile has been a popular ingredient in traditional Chinese medicine for thousands of years. Special farms keep the bears in appalling conditions for the purpose of abtaining their bile - even it has long been possible to produce it synthetically in a laboratory.', 1, 1, 'Asian Black Bear.jpg', '2020-01-14 10:56:51'),
(24, 'Abyssinian Ground Hornbill', 'The Abyssinian ground hornbill definitely isnâ€™t a vegetarian, even small mammals tend to end up in its beak from time to time. At a size of about 1 m, its wings reach an impressive span of up to 185 cm.', 1, 1, 'Abyssinian Ground Hornbill.jpg', '2020-01-14 10:57:20'),
(25, 'Polar Bear', 'With the standing height of the polar bear, also called ice bear, reaching up to three metres, it is one of the biggest land-based predators on Earth. It has no natural enemies in its home in the arctic and is a solitary animal that spends its time hunting for seals.', 1, 1, 'Polar Bear.jpg', '2020-01-14 10:59:36'),
(26, 'Pygmy Hippopotamus', 'The shy and noctural pygmy hippopotamuses are native to the forests and swamps of western Africa. They primarily feed off of aquatic plants, grass and fruit.', 1, 1, 'Pygmy Hippopotamus.jpg', '2020-01-14 11:00:06'),
(27, 'Grantâ€™s Zebra', 'Grantâ€™s zebras live in small herds in the East African steppe. They are characterised by relatively short legs and wide, horse-like hooves. They also have the thickest stripes compared to other zebra species such as the GrÃ©vyâ€™s zebra or the mountain zebra.', 1, 1, 'Grantâ€™s Zebra.jpg', '2020-01-14 11:00:42'),
(28, 'Gaur', 'Strong but vulnerable: The gaur or Indian bison has no natural enemies left, since the tiger is now practically extinct in India. Hunting and loss of habitat are an increasing threat to its survival. Targeted breeding programmes in zoos are making an important constribution to keeping this species alive. Zoo Berlin is responsible for keeping the breeding book for this species.', 1, 1, 'Gaur.jpg', '2020-01-14 11:01:20'),
(29, 'Coati', 'The small forest-dweller with the striped tail and conspicuously long nose has a very varied diet. Besides plants and fruit, coatis also feed on insects, spiders and scorpions, sometimes even on vertebrates such as lizards or rodents. In their native South America, they are common throughout the continent. Their name is derived from the indigenous American language Tupi.', 1, 1, 'Coati.jpg', '2020-01-14 11:02:06'),
(30, 'Panda', 'The giant panda has an insatiable appetite for bamboo. A typical animal eats half the dayâ€”a full 12 out of every 24 hoursâ€”and relieves itself dozens of times a day. It takes 28 pounds of bamboo to satisfy a giant panda daily dietary needs, and it hungrily plucks the stalks with elongated wrist bones that function rather like thumbs. Pandas will sometimes eat birds or rodents as well.', 1, 1, 'Panda.jpg', '2020-01-14 11:03:22'),
(31, 'Fun Walls', 'Do you think you have got what it takes to rise to the top? Tackle our challenging climbing walls to test your strength and agility. Are you brave enough to take on the giant staircase and our leap of faith? Weâ€™ll make sure you are safe throughout and our experienced supervisors are on hand every step of the way.', 3, 2, 'funwall.jpg', '2020-01-14 11:14:34'),
(32, 'Soft Play', 'Explore, tumble and learn in our jam-packed multi-level play areas, which are perfect for younger children. Exciting mini games offer the opportunity to take on friends in this safe, secure and stimulating play zone.', 3, 2, 'Soft Play.jpg', '2020-01-14 11:17:57'),
(33, 'Interactive', 'The revolutionary Interactive zone is exclusive to Injoy. This innovative and immersive experience allows guests escape to another land to create characters, bring them to life and take them on a journey into augmented reality. Our state-of-the art digital technology will mesmerise you for hours. It has to be seen to be believed and will keep you coming back for more.', 3, 2, 'Interactive.jpg', '2020-01-14 11:19:14'),
(34, 'Parties', 'Come and celebrate your special event by booking one of our Injoy tailored party packages. Jump for joy, climb the walls and explore new adventures in our spellbinding parks before munching through our party menu. We have something for every occasion, so let us know and weâ€™ll start planning your big day today.', 3, 2, 'Parties.jpg', '2020-01-14 11:19:58'),
(35, 'Arts & Cooking Classes', 'Produce a masterpiece at our fun-filled art and cooking classes. Our dedicated and friendly teams help to bring out the creative genius in everyone in these hands-on activity sessions.', 3, 2, 'Arts & Cooking Classes.jpg', '2020-01-14 11:20:48'),
(36, 'Trampoline Park', 'Our trampoline parks offer you and your family the chance to bounce around to your heartâ€™s content and enjoy hours of spring-loaded fun. You can even challenge yourself to beat our ninja course, just like in the TV show, and take on your friends in our dodgeball arena.', 3, 2, 'Trampoline Park.jpg', '2020-01-14 11:21:43'),
(37, 'Burger Town', 'For those not in the Los Angeles area, Grubhub is promoting select Burger King restaurants on its app today in 16 cities only* as â€œBurger Town presented by Burger Kingâ€ restaurants. The rebranded â€œBurger Townâ€ menu will include Call of Duty themed BKÂ® Meals with the opportunity to get a code to unlock bonus in game content. The Burger Town menu will be available exclusively via Grubhub delivery. Guests nationwide can also order a Call of Duty themed BK Meal from their local BK restaurant on Grubhub.', 4, 2, 'burger town.png', '2020-01-14 11:25:17'),
(38, 'Shan Restaurant', 'Shan Restaurant serves a variety of savory recipes from India and Pakistanis rich tapestry of culture and culinary traditions. Every dish is meticulously prepared in authentic Indian home-style, using only natural spices and ingredients. We never add preservatives or artificial colorings. As a result Shan Restaurant many delectable dishes are lean, low in fat and healthy. Shan Restaurant is delighted to offer you daily specials which includes all variety of foods. We are here to serve you.Come and share the Experience. We serve only Halal Food.', 4, 2, 'Shan Restaurant.jpg', '2020-01-14 11:29:09'),
(39, 'Anjappar ', 'Established in Chennai in the year 1964, Anjappar is the pioneer in bringing the foods of the famed Chettiars to the people world around. Over the years they mastered the art of using spice to give one taste buds the best food experience.', 4, 2, 'Anjappar.jpg', '2020-01-14 11:32:59'),
(40, 'Little India', 'Little India was the winner of the \"Best Asian Restaurant\" award in the inaugural Leicestershire Restaurant awards in 2005 and we were part of the Leicester team that was victorious in the national Curry Capital competition in 2007.', 4, 2, 'Little India.png', '2020-01-14 11:34:43'),
(41, 'Diamond Kebab', 'One Of The Best Restaurant In The Zoo Planet.\r\nThere are shawarmas, flatbreads, meaty loaded fries and pita bread. Whatever way you like your kebab, youâ€™ll find something here that will have you drooling and quickly planning your next meal.', 4, 2, 'Diamond Kebab.jpg', '2020-01-14 11:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'superadmin'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role_id`, `status`) VALUES
(2, 'admin', '0192023a7bbd73250516f069df18b500', 2, 1),
(3, 'nga', '0192023a7bbd73250516f069df18b500', 2, 0),
(1, 'superadmin', '0192023a7bbd73250516f069df18b500', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cate_name` (`cate_name`),
  ADD KEY `cate_id` (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `content_ibfk_2` FOREIGN KEY (`cate_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
