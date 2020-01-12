-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2020 at 09:12 AM
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
(2, 'Leisure & Dinning', 0, 2, 1),
(3, 'Whats Up', 0, 2, 0),
(4, 'Leisure', 2, 2, 1),
(5, 'Dinning', 2, 2, 1);

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
(1, 'ELEPHANT', 'At first glance, African elephants look similar to Asian elephants, but they are different species that live in different parts of the world. Yet in Elephant Odyssey, you can see both species! How to tell them apart? African elephants have very large ears that are shaped like the continent of Africa, while Asian elephants have smaller ears. Also, an Asian elephant back is rounded, but an African elephant back has a dip or sway in it. A wonderful feature of Elephant Odyssey is our Elephant Care Center, where you may watch keepers scrubbing an elephant foot or observe a training session. It a great place to chat with our keepers, too. Be sure to check out the life-size statues of wooly mammoths for some great photo ops!', 1, 1, 'elephant.jpg', '2020-01-10 15:00:14'),
(2, 'BEE-EATER', 'The harpy eagle is legendary, although few people have seen one in the wild. Fortunately, you can view one here at the Zoo! Named after harpies of Greek mythology, this dark gray bird of prey has a very distinctive look, with feathers atop its head that fan into a bold crest when the bird feels threatened. Some smaller gray feathers create a facial disk that may focus sound waves to improve the bird hearing, similar to owls. The harpy eagle legs can be as thick as a small child wrist, and its curved back talons are larger than grizzly bear claws! The harpy may not be the largest bird of prey (that title belongs to the Andean condor), but this extraordinary creature is the heaviest and most powerful of birds.', 1, 1, 'bee-eater.jpg', '2020-01-10 15:01:03'),
(3, 'BONONO', 'Bonobos are quite possibly the most intelligent primates on Earth (other than us, of course!). The Zoo Planet was one of the first zoos to exhibit these highly endangered primates. One characteristic bonobos are especially known for is their ability to get along: unlike humans or chimpanzees, they have never been observed killing one of their own kind. These clever apes are fun to watch. Their exhibit is dominated by giant rock outcroppings, and ropes and hammocks attached to bamboo sway poles, on which the playful bonobos nimbly climb or rest. Waterfalls and streams add to the African rain forest atmosphere. But the real show is the bonobos themselves—do they remind you of anyone?', 1, 1, 'bonono.jpg', '2020-01-10 15:05:06'),
(4, 'KFC', 'All of our food is freshly prepared in our restaurants using only the highest quality ingredients. Enjoy a delicious KFC meal today. There something for everyone!', 5, 2, 'kfcmenu.jpg', '2020-01-10 15:08:34'),
(5, 'Bibimbap Charlotte Street', 'Bibimbap has opened up on Londonâ€™s Charlotte Street, bringing our speciality in Koreaâ€™s national dish.\r\n\r\nWe specialise in various different types of bibimbap\r\nincluding Dol Sot, Bulgogi, Mushroom and Fillet Beef.\r\n\r\nYou can find us just around the corner from Goodge\r\nStreet Station and a short walk away from Oxford St.', 5, 2, 'foodmenu.jpg', '2020-01-10 15:09:20'),
(6, 'Camp', 'Our camps encourage kids to explore with self-learning opportunities, team-bonding activities as well as unique insights into wildlife.', 4, 2, 'Camps.jpg', '2020-01-12 10:45:20'),
(7, 'For Kids', 'A multitude of fun activities awaits kids! From a water playground for a splashing good time, close encounters with farmyard animals, to a wild carousel ride and many more!', 4, 2, 'for-kids.jpg', '2020-01-12 11:00:12'),
(8, 'Wildlife Tours', 'Make your visit extra wild! Go behind-the-scenes and get closer to our wildlife! Learn how our animals are cared for, discover their unique traits and get the opportunity to feed some of them.', 4, 2, 'wil-tour.jpg', '2020-01-12 11:00:55'),
(9, 'Feed the Animals', 'Catch our animals when theyâ€™re most active â€“ during feeding sessions! Listen to our keepers share stories and even get to feed the animals yourself.', 4, 2, 'feed-animal.jpg', '2020-01-12 11:03:08'),
(10, 'Leisure', 'LeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisureLeisure', 4, 2, 'coffee.jfif', '2020-01-12 14:31:41'),
(11, 'Paella', 'In the Valencia region, they claim you can eat a different rice dish every day of the year, but letâ€™s stick with the most traditional version for now. Ingredients for paella Valenciana include chicken or rabbit, saffron, runner beans and butter beans. But the all-important element is the rice, ideally the bomba or Calasparra varieties grown on Spainâ€™s east coast, which are particularly good for absorbing all the flavours.', 5, 2, 'foodmenu.jpg', '2020-01-12 14:43:48'),
(12, 'The Cake Bake Shop', 'From Colonial Gingerbread to Classic Layer, the Stories and Recipes Behind More Than 125 of Our Best-Loved Cakes: A Baking Book', 5, 2, 'cakeshop.jpg', '2020-01-12 14:49:16'),
(13, 'Coffee House', 'For the 25 coffee roasters on this list, itâ€™s a mÃ©lange of all of these things. From Maine to California, these roasters offer the best coffee America has to offer.', 5, 2, 'coffeemenu.jpg', '2020-01-12 14:50:35'),
(14, 'Pizza In Town', '\r\n\r\nVietnamese food is delicious, but sometimes you just want to stuff your face with all the greasy cheese and crust your body can handle. Luckily for you, Ho Chi Minh City is home to some damn good pizza. Here are the best.', 5, 2, 'Pizzamenu.jpg', '2020-01-12 14:52:12'),
(15, 'The Seafood Bar', 'For The Seafood Bar, a seafood traiteur and restaurant in the heart of Amsterdam Old South, we developed a logo, graphic ID and advertising material. ', 5, 2, 'Seafood.png', '2020-01-12 14:53:03'),
(16, 'Lotteria', 'Lotteria is a chain of fast-food restaurants in East Asia that grew out of its first shop in Tokyo, Japan in September 1972. Taking its name from its parent company, Lotte Corporation, it currently has franchises in Japan, South Korea, Indonesia, Vietnam, Cambodia and Myanmar.[1] The origin of the name is a combination of corporate names Lotte and Cafe', 5, 2, 'lotteria.jpg', '2020-01-12 15:00:40');

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
(2, 'admin'),
(3, 'user');

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
(2, 'admin', '202cb962ac59075b964b07152d234b70', 2, 1),
(3, 'nga', '25f9e794323b453885f5181f1b624d0b', 2, 1),
(1, 'superadmin', '202cb962ac59075b964b07152d234b70', 1, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
