-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2020 at 10:47 AM
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
(3, 'Leisure', 2, 2, 1),
(4, 'Dinning', 2, 2, 1);

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
(8, 'The Seafood Bar', 'For The Seafood Bar, a seafood traiteur and restaurant in the heart of Amsterdam Old South, we developed a logo, graphic ID and advertising material.', 4, 1, 'sea-food.jpg', '2020-01-13 16:41:19'),
(9, 'For Kids', 'A multitude of fun activities awaits kids! From a water playground for a splashing good time, close encounters with farmyard animals, to a wild carousel ride and many more!', 3, 1, 'for-kids.jpg', '2020-01-13 16:42:05'),
(10, 'Wildlife Tours', 'Make your visit extra wild! Go behind-the-scenes and get closer to our wildlife! Learn how our animals are cared for, discover their unique traits and get the opportunity to feed some of them.', 3, 1, 'wil-tour.jpg', '2020-01-13 16:42:29'),
(11, 'Feed the Animals', 'Catch our animals when they are most active Ã¢â‚¬â€œ during feeding sessions! Listen to our keepers share stories and even get to feed the animals yourself.', 3, 1, 'feed-animal.jpg', '2020-01-13 16:44:44');

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
(1, 'superadmin', '21232f297a57a5a743894a0e4a801fc3', 1, 1);

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
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
