-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2019 at 08:17 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `relentless`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `email`, `password`) VALUES
(1, 'zcalbrecht', 'zcalbrecht@gmail.com', 'Bismarck123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `is_wishlist` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `isbn` int(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `summary` varchar(5000) NOT NULL,
  `date` date NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`isbn`, `title`, `author`, `category`, `summary`, `date`, `price`) VALUES
(441013597, ' Dune', ' Frank Herbert', ' Fiction', ' A vast empire hangs on the precious and unique commodity know as the &quot;spice&quot; which is only found on the remote planet of Dune.', '0000-00-00', 0),
(441104029, ' Children of Dune', ' Frank Herbert', ' Fiction', ' The twin son and daughter of Paul Atreides come of age as they realize their power and their father&apos;s true nature.', '0000-00-00', 0),
(451458737, ' The Peshawar Lancers', ' S.M. Sterling', ' Fiction', ' The British Empire still lives on in an alternate reality where the northern hemisphere was obliterated by a comet and the center of the world becomes the former crown colony of India.', '0000-00-00', 0),
(464832557, ' The Hunger Games', ' Suzanne Collins', ' Fiction', ' Two heroes battle their way through the brutal and nationally televised hunger games in order to win their freedom and stay alive.', '0000-00-00', 0),
(465067107, ' The Design of Everyday Things', ' Donald A. Norman', ' Engineering', ' This book could forever change how you experience and interact with your physical surroundings.', '0000-00-00', 0),
(618574948, ' The Fellowship of the Ring', ' J.R.R. Tolkien', ' Fiction', ' In ancient times the Rings of Power were crafted by the Elvensmiths and Sauron who forged the One Ring and filled it with his own power so that he could rule all others.', '0000-00-00', 0),
(618574956, ' The Two Towers', ' J.R.R. Tolkien', ' Fiction', ' With Gandalf dead the journey of the One Ring is in peril as the Fellowship splits up with Frodo and Sam getting closer to Mordor while Aragorn slowly realizes his own destiny.', '0000-00-00', 0),
(618574972, ' The Return of the King', ' J.R.R. Tolkien', ' Fiction', ' The amazing story reaches its climax as Frodo and Sam go deeper into Mordor while Aragorn and Gandalf defend the last bastion of mankind from the dark forces of Sauron.', '0000-00-00', 0),
(687650194, ' Prayers for a Privileged People', ' Walter Brueggemann', ' Christian Living', ' A beautiful collection of poetic and prophetic prayers to be prayed and pondered and savored and be challenged by.', '0000-00-00', 0),
(1414334907, ' Left Behind', ' Tim LaHaye', ' Fiction', ' A laughable book with a popularized and poorly informed reading of Revelation - oops...I mean it&apos;s a riveting book about the &quot;end times&quot;!', '0000-00-00', 0),
(1453606122, ' Autobiography of Benjamin Franklin', ' Benjamin Franklin', ' Autobiography', ' The life and times of one of the most important early American patriots.', '0000-00-00', 0),
(1470184788, ' Dark Night of the Soul', ' St. John of the Cross', ' Christian Living', ' Faith and doubt collide in this classic work by one of Christianity&apos;s most celebrated mystics.', '0000-00-00', 0),
(1595550789, ' The Total Money Makeover', ' Dave Ramsey', ' Personal Finance', ' This award-winning author teaches you everything you need to know about handling your money wisely and living a debt-free life.', '0000-00-00', 0),
(1613821743, ' The Art of War', ' Sun Tzu', ' Military Strategy', ' The Art of War is the Swiss army knife of military theory--pop out a different tool for any situation.', '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`isbn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
