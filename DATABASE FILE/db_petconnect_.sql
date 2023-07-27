-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 27, 2023 at 04:49 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_petconnect+`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `password`, `email`, `date`) VALUES
(1, 'Admin', '70b4269b412a8af42b1f7b0d26eceff2', 'Abc@gmail.com', '2023-06-17 23:13:26'),
(3, 'Pawsome Haven', 'f11f8ba1fe12453fb1b071ba84680c0d', 'pawsomehaven000@gmail.com', '2023-07-27 09:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `username`, `email`, `phone`, `message`, `date`) VALUES
(1, 'Sample', 'Sample@gmail.com', '0784512425', 'Sample message', '2023-06-24 16:31:52'),
(2, 'john', 'user@gmail.com', '0784512425', 'Sample', '2023-07-21 10:43:01'),
(3, 'john', 'ABC@gmail.com', '078451241231454', 'Done', '2023-07-26 10:32:23');

-- --------------------------------------------------------

--
-- Table structure for table `lost_and_found`
--

DROP TABLE IF EXISTS `lost_and_found`;
CREATE TABLE IF NOT EXISTS `lost_and_found` (
  `lostfound_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(222) NOT NULL,
  `pet_type` varchar(222) NOT NULL,
  `name` varchar(222) NOT NULL,
  `gender` varchar(222) NOT NULL,
  `age` int(11) NOT NULL,
  `image` varchar(222) NOT NULL,
  `location` text NOT NULL,
  `lostfound_date` date NOT NULL,
  `phoneno` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lostfound_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lost_and_found`
--

INSERT INTO `lost_and_found` (`lostfound_id`, `type`, `pet_type`, `name`, `gender`, `age`, `image`, `location`, `lostfound_date`, `phoneno`, `date`) VALUES
(1, 'Lost', 'Cat', 'Exotic shorthair - Rachel', 'Female', 1, '64b6bcf47df48.gif', 'Colombo Fort station', '2023-07-03', '0775462971', '2023-06-24 16:31:52'),
(2, 'Found', 'Dog', 'Boxer', 'Female', 1, '64b6bccd55f81.gif', 'Maradna junction', '2023-07-12', '0777254698', '2023-06-24 16:31:52'),
(3, 'Lost', 'Dog', 'labrador retriever - Mirabel', 'Female', 1, '64b674d58fe34.gif', 'Perera lane, Colombo', '2023-06-06', '0785212365', '2023-06-24 16:31:52'),
(4, 'Lost', 'Cat', 'british shorthair - Silvie', 'Male', 1, '64b9742dd59a6.gif', 'Hendala junction', '2023-07-12', '0785212365', '2023-06-24 16:31:52'),
(5, 'Lost', 'Dog', 'Boxer', 'Male', 4, '64bc0ef5cc307.gif', 'Maradana', '2023-07-13', '0785212365', '2023-06-24 16:31:52'),
(6, 'Lost', 'Other', 'Blue Parrotlet - Shany', 'Female', 4, '64bf996502146.gif', '10, perera lane, Colombo', '2023-07-02', '0785212365', '2023-07-25 09:44:05'),
(7, 'Found', 'Other', 'green ring parakeet - Pinky', 'Female', 1, '64bf9bf65c0db.gif', 'Paramanandha rd, Colombo', '2022-11-26', '0784512535', '2023-07-25 09:55:02');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

DROP TABLE IF EXISTS `pets`;
CREATE TABLE IF NOT EXISTS `pets` (
  `pet_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `pet_name` varchar(222) NOT NULL,
  `breed` varchar(222) NOT NULL,
  `gender` varchar(222) NOT NULL,
  `age` varchar(222) NOT NULL,
  `image` varchar(222) NOT NULL,
  PRIMARY KEY (`pet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`pet_id`, `category_id`, `pet_name`, `breed`, `gender`, `age`, `image`) VALUES
(1, 1, 'Margret shan', 'Boxer', 'Male', '4', '64b957526c507.gif'),
(2, 1, 'Silvie Josh', 'Rottweiler', 'Male', '2', '64bbfcb372dcf.gif'),
(3, 2, 'Scrumpy', 'Perisan cat', 'Female', '4', '64b981eeba645.gif');

-- --------------------------------------------------------

--
-- Table structure for table `pet_adoption`
--

DROP TABLE IF EXISTS `pet_adoption`;
CREATE TABLE IF NOT EXISTS `pet_adoption` (
  `adoption_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(222) NOT NULL,
  `breed` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`adoption_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet_adoption`
--

INSERT INTO `pet_adoption` (`adoption_id`, `user_id`, `pet_id`, `pet_name`, `breed`, `date`) VALUES
(1, 10, 1, 'Margret shan', 'Boxer', '2023-07-21 00:45:34'),
(2, 13, 4, 'Scrumpy', 'Perisan cat', '2023-07-22 23:09:59'),
(3, 1, 2, 'Silvie Josh', 'Rottweiler', '2023-07-25 09:45:37'),
(4, 4, 1, 'Margret shan', 'Boxer', '2023-07-27 16:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `pet_category`
--

DROP TABLE IF EXISTS `pet_category`;
CREATE TABLE IF NOT EXISTS `pet_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet_category`
--

INSERT INTO `pet_category` (`category_id`, `category_name`, `date`) VALUES
(1, 'Dog', '2023-06-22 13:31:16'),
(2, 'Cat', '2023-06-22 13:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) NOT NULL,
  `product_name` varchar(222) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(222) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_category_id`, `product_name`, `description`, `price`, `image`, `quantity`) VALUES
(1, 1, 'Puppy Medium Breed Chicken and Rice', 'A source of novel protein, lamb is highly digestible and a good source of iron, zinc and vitamin B12 which may help boost vitality.', '7500.00', '64c0fa315a6af.jpg', 5),
(2, 1, 'Black Hawk Dog Food Puppy Medium Breed Chicken and Rice - 20kg', 'Made with Australian chicken, a highly digestible lean protein source packed with essential amino acids for strong muscles, healthy bones, and vitality. High-protein Chicken and Rice formula for growing puppies.', '36500.00', '6499a59d919cc.jpg', 510),
(3, 4, 'Dog shelter', 'Welcome to our dog shelter, a haven for furry friends in need of a loving home. We are dedicated to rescuing and caring for abandoned, stray, and neglected dogs, providing them with the care and attention they deserve.', '20000.00', '64bfccf78fe80.gif', 14),
(4, 2, '8 Shaped Cotton Rope Ball Dog Toy', 'Help relieve some of your furry friendâ€™s excess energy with the 8 Shaped Cotton Rope Ball Dog Toy. The toy is designed with durable rope material and features two tennis balls, making it ideal for tug-of-war, tossing and fetching!', '950.00', '64bfcd66c1c81.gif', 8),
(5, 8, 'Cat Scratch Toy Triangular Shape Cardboard Scratcher Cat Toy', 'Triangular Shape Cardboard Cat Scratch Toy Catnip Scratcher has everything your furry feline friend will love. Itâ€™s made out of reinforced corrugated cardboard tough enough to withstand rough scratching.', '2500.00', '64bfcdd8cae7f.gif', 6),
(6, 8, 'Cat Scratching Board Pad Flat Pattern Cat Toy', 'This cat toy Cat Scratching Board Pad Flat Pattern Cat Toy to sharpen and remove the dead outer layer of the cats claws. Satisfies cats natural scratching instincts and enables cats to stretch their bodies and to work of energy.', '1600.00', '64bfce1ab1389.gif', 16),
(7, 7, 'Trixie Soft Harness with Leash', 'made of breathable mesh material, soft harness with fully elasticated leash, comfortable to wear due to soft padding, extra snap buckle ensures a safe hold, with reflective piping, fully adjustable at chest and belly', '4500.00', '64bfce5d57407.gif', 11),
(8, 3, 'Blackcat Beef Liver Slices Cat Treat', 'Blackcat Beef Liver cat treats are made with just one ingredient, so you know exactly what youâ€™re feeding your furbaby.  Satisfy your catâ€™s carnivorous cravings with a healthy single-protein treat. ', '485.00', '64bfce95cb015.gif', 8),
(9, 2, 'Dog Plush Toy, Squeaky Puppy Toy Animal Shapes', 'Get that tail wagging with excitement for the Interactive Dog Plush Toy. These adorable animal shape toys are made with soft, plush fabric and a delightfully-fuzzy texture that will keep your dog engaged and entranced.', '2350.00', '64bfcefb26304.gif', 14),
(10, 6, 'Trixie Protective Collar with hook and loop fastener', 'silicone/nylon/neoprene, ergonomic fit while flexible and stable in shape, continuously adjustable forehead and neck straps as well as neck loop, partly neoprene padded, no problems with panting, drinking and feeding treats and secure due to threefold fastening', '3450.00', '64bfcf5894695.gif', 7),
(11, 6, 'Trixie Parla Scratching Post', 'silicone/nylon/neoprene, ergonomic fit while flexible and stable in shape, continuously adjustable forehead and neck straps as well as neck loop, partly neoprene padded, no problems with panting, drinking and feeding treats and secure due to threefold fastening', '13900.00', '64bfcfd091fda.gif', 2),
(12, 3, 'Blackcat Beef Liver Slices Cat Treat', 'Blackcat Beef Liver cat treats are made with just one ingredient, so you know exactly what youâ€™re feeding your furbaby. Satisfy your catâ€™s carnivorous cravings with a healthy single-protein treat.', '485.00', '64bfd0eb50691.gif', 12);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(222) NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_category_id`, `category_id`, `product_name`, `image`, `date`) VALUES
(1, 1, 'Dog Food', '64953701ca17f.gif', '2023-06-22 13:39:05'),
(2, 1, 'Dog Toys', '64b5670a163f7.png', '2023-07-17 10:36:34'),
(3, 2, 'Cat food', '64bfcc244539c.png', '2023-07-25 13:20:36'),
(4, 1, 'Dog Shelter', '64bf6c824ace8.png', '2023-07-25 06:32:34'),
(5, 2, 'Cat Shelter', '64bf6c993ef3c.png', '2023-07-25 06:32:57'),
(6, 1, 'Dog Accessories', '64bf6cb46638e.png', '2023-07-25 06:33:24'),
(7, 2, 'Cat Accessories', '64bf6cca22600.png', '2023-07-25 06:33:46'),
(8, 2, 'Cat Toy', '64bf6cdab8280.png', '2023-07-25 06:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

DROP TABLE IF EXISTS `product_orders`;
CREATE TABLE IF NOT EXISTS `product_orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(222) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `order_status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_orders`
--

INSERT INTO `product_orders` (`order_id`, `user_id`, `product_name`, `quantity`, `price`, `order_status`, `date`) VALUES
(1, 1, 'Black Hawk Dog Food Puppy Medium Breed Chicken and Rice - 20kg', 5, '36500.00', 'closed', '2023-07-25 17:49:39'),
(2, 1, 'Dog shelter', 1, '20000.00', 'in process', '2023-07-25 17:50:15'),
(3, 1, 'Blackcat Beef Liver Slices Cat Treat', 1, '485.00', 'rejected', '2023-07-25 17:50:44'),
(4, 1, 'Trixie Parla Scratching Post', 1, '13900.00', NULL, '2023-07-25 06:35:16'),
(5, 4, 'Blackcat Beef Liver Slices Cat Treat', 1, '485.00', 'rejected', '2023-07-27 13:48:55'),
(9, 4, '8 Shaped Cotton Rope Ball Dog Toy', 2, '950.00', 'rejected', '2023-07-27 13:51:10'),
(10, 4, '8 Shaped Cotton Rope Ball Dog Toy', 1, '950.00', 'rejected', '2023-07-27 13:58:07'),
(11, 4, '8 Shaped Cotton Rope Ball Dog Toy', 1, '950.00', 'rejected', '2023-07-27 13:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

DROP TABLE IF EXISTS `remark`;
CREATE TABLE IF NOT EXISTS `remark` (
  `remark_id` int(11) NOT NULL AUTO_INCREMENT,
  `form_id` int(11) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`remark_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remark`
--

INSERT INTO `remark` (`remark_id`, `form_id`, `order_status`, `remark`, `remarkDate`) VALUES
(1, 1, 'closed', 'Successfully Delivered!', '2023-07-25 17:49:39'),
(2, 2, 'in process', 'Shipped', '2023-07-25 17:50:15'),
(3, 3, 'rejected', 'Shipping problem', '2023-07-25 17:50:44'),
(4, 5, 'in process', 'Shipped', '2023-07-26 08:02:17'),
(5, 5, 'closed', 'Done', '2023-07-26 11:45:02'),
(6, 5, 'in process', 'S', '2023-07-26 16:44:46'),
(7, 6, 'rejected', 'Shipping problem', '2023-07-27 11:15:58'),
(8, 5, 'rejected', 'Done', '2023-07-27 13:48:55'),
(9, 9, 'rejected', 'Done', '2023-07-27 13:51:10'),
(10, 10, 'rejected', 'Done', '2023-07-27 13:58:07'),
(11, 11, 'rejected', 'Done', '2023-07-27 13:59:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(222) NOT NULL,
  `first_name` varchar(222) NOT NULL,
  `last_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `active_status` int(11) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `first_name`, `last_name`, `email`, `phone`, `password`, `address`, `active_status`, `date`) VALUES
(1, 'Smile', 'John', 'Joe', 'smile@gmail.com', '0784512421', '8e52ad3a2be610cd3ac3214e77657bd8', '10, perera lane, Colombo', 1, '2023-07-27 10:56:00'),
(2, 'Hello', 'Hello', 'Hello', 'Hello@gmail.com', '0784512425', '26b5c3f86027614d7c3bbec4238a97f8', 'Hello rd, lane, Colombo, Sri Lanka', 1, '2023-06-19 16:48:06'),
(3, 'Lakshika', 'Lakshika', 'K', 'lakshi@gmail.com', '0784512400', '70b4269b412a8af42b1f7b0d26eceff2', '10, abc lane, Colombo', 1, '2023-07-22 04:42:38'),
(4, 'User', 'Lakshika', 'K', 'user20000724@gmail.com', '0784512425', '9eeaf04ead83d91063237f9e99d4caee', '10, Perea lane,Colombo', 1, '2023-07-26 08:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

DROP TABLE IF EXISTS `volunteer`;
CREATE TABLE IF NOT EXISTS `volunteer` (
  `volunteer_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(222) NOT NULL,
  `first_name` varchar(222) NOT NULL,
  `last_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`volunteer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`volunteer_id`, `username`, `first_name`, `last_name`, `email`, `phone`, `address`, `date`) VALUES
(2, 'Hema', 'Hema', 'Watson', 'Hema123@gmail.com', '0784512400', '22/5A, Dharmapala street, Colombo-07', '2023-07-27 08:59:13'),
(3, 'Smile', 'A', 'B', 'ABC@gmail.com', '0784512425', 'aaaaaaaaaaaaa', '2023-07-27 09:01:45');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
