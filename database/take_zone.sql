-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 03:30 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `take zone`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `productid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `productid`) VALUES
(31, 0, 28),
(32, 0, 22),
(33, 0, 28);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(5) NOT NULL,
  `catname` varchar(100) NOT NULL,
  `catdescription` text NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `catname`, `catdescription`, `image`) VALUES
(41, 'tv', '                    \r\nA TV is a device that displays video content, offering features like HD/4K resolution, smart apps, and streaming capabilities for entertainment.efrsrfs\r\n                    ', '1728733029_tv.jpeg'),
(42, 'laptop', 'A laptop is a portable computer used for work, browsing, and entertainment, offering convenience and mobility in a compact design.', '1728733079_laptop.jpeg'),
(43, 'phone', '                    \r\nA phone is a handheld device used for communication, offering features like calling, texting, internet access, and apps for various tasks.                    ', '1728735430_phone.jpg'),
(44, 'watch', '\r\nA watch is a wearable device designed to tell time, often featuring additional functions like alarms, timers, and, in smartwatches, fitness tracking and notifications.', '1728733208_watch.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `description`) VALUES
(10, 'Ankit Savaliya', 'abc@abc.com', 'product', 'dfsdfsf'),
(11, 'Ankit Savaliya', 'abc@abc.com', 'product', 'your product is good and your facilitate is good');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `productid` int(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `ordered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `productid`, `address`, `phone`, `ordered_at`) VALUES
(25, 19, 34, 'AAKASHVANI', '9737880512', '2024-10-15 17:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `catid` int(10) NOT NULL,
  `subcatid` int(10) NOT NULL,
  `productname` varchar(200) NOT NULL,
  `productdescription` text NOT NULL,
  `productprice` int(10) NOT NULL,
  `image` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `catid`, `subcatid`, `productname`, `productdescription`, `productprice`, `image`) VALUES
(20, 44, 0, 'watch ', 'Analog Watch - For Men PE000017B', 1200, '1728736363_watch.jpg'),
(21, 41, 0, 'LG smart TV', 'LG 32LMBPTC 80 cm (32 inch) HD Ready LED Smart WebOS TV with Quad Core Processor, Active HDR, 60 Hz Refresh Rate, DTS Virtual:X, Dolby Audio  (32LM563BPTC)\r\n', 12990, '1728736460_tv9.jpg'),
(22, 43, 0, 'vivo', 'vivo T3 Ultra (Lunar Gray, 256 GB)  (12 GB RAM)', 35000, '1728736531_vivo.jpg'),
(23, 42, 0, 'Apple MacBook', 'Apple MacBook AIR Apple M2 - (8 GB/256 GB SSD/Mac OS Monterey) MLXY3HN/A  (13.6 Inch, Silver, 1.24 Kg)', 80000, '1728736638_laptop10.jpg'),
(25, 42, 0, 'Hp', 'HP 15s AMD Ryzen 3 Quad Core 5300U - (8 GB/512 GB SSD/Windows 11 Home) 15s-eq2143au Thin and Light Laptop  (15.6 inch, Natural Silver, 1.69 kg, With MS Office)', 45000, '1728736780_hp.jpg'),
(26, 42, 0, 'Acer', 'Acer Swift Go 14 EVO OLED Intel Core i5 13th Gen 13500H - (16 GB/512 GB SSD/Windows 11 Home) SFG14-71-58UB Thin and Light Laptop  (14 Inch, Pure Silver, 1.25 Kg, With MS Office)', 55990, '1728737362_acer.jpg'),
(27, 42, 0, 'Asus', 'ASUS VivoBook K15 OLED AMD Ryzen 7 Octa Core AMD R7-5700U - (16 GB/512 GB SSD/Windows 11 Home) KM513UA-L712WS Thin and Light Laptop  (15.6 Inch, Indie Black, 1.80 Kg, With MS Office)', 55999, '1728737845_asus.jpg'),
(28, 43, 0, 'Samsung', 'SAMSUNG Galaxy S23 FE (Mint, 128 GB)  (8 GB RAM)', 30000, '1728738085_s23.jpg'),
(29, 43, 0, 'iphone', 'Apple iPhone 16 Pro Max (Natural Titanium, 1 TB)', 185000, '1728738208_iphone.jpg'),
(30, 41, 0, 'InnoQ Spectra', 'InnoQ Spectra 80 cm (32 inch) HD Ready LED Smart Android TV with 30W Boom Speakers| 1000+ Smart Apps - Games, Mobile Screen Connect, Pixel Colour Enhancer  (32S-SPECTRA/2)', 9999, '1728738287_tv1.jpg'),
(31, 44, 0, 'watch', 'Mesh Strap Multicolor Dial Quartz Analog Watch - For Men PRVG136', 550, '1728738348_watch2.jpg'),
(32, 44, 0, 'Titan Watch', 'Analog Watch - For Men NP1773SL02', 7699, '1728738420_watch3.jpg'),
(33, 41, 0, 'Samsung Tv', 'SAMSUNG 80 cm (32 Inch) HD Ready LED Smart Tizen TV with Bezel-Free Design | 300+ Free Channels | PurColor | Hyper Real Picture Engine | Triple Protection | SmartThings App Support | TV Key | Connect Share (HDD) | ConnectShare (USB 2.0)  (UA32T4380AKXXL)', 13490, '1728738488_tv2.jpg'),
(34, 43, 0, 'Oppo', 'OPPO K12x 5G with 45W SUPERVOOC Charger In-The-Box (Breeze Blue, 128 GB)  (6 GB RAM)', 14000, '1728738562_oppo.jpg'),
(35, 41, 0, 'LG Tv', 'LG 80 cm (32 inch) HD Ready LED Smart WebOS TV with WEBOS  (32LQ640BPTA)', 18999, '1728738674_tv4.jpg'),
(36, 44, 0, 'Fastrack  Watch', 'Analog Watch - For Men 3240SL02', 1200, '1728738785_watch4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(4) NOT NULL,
  `user` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `user`, `email`, `pass`) VALUES
(19, 'Ankit', 'test@gmail.com', 'ankit'),
(20, 'Ankit', 'techzone@zone.com', 'admin'),
(21, 'test', 'test@gmail.com', 'aaaa'),
(22, 'Ankit', 'abc@abc.com', 'aaa'),
(23, 'mmm', 'mmm@gmail.com', 'mmm'),
(24, 'Ankit', 'techzone@zone.com', 'ANKIT');

-- --------------------------------------------------------

--
-- Table structure for table `sitesettings`
--

CREATE TABLE `sitesettings` (
  `id` int(5) NOT NULL,
  `sitename` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phoneno` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sitesettings`
--

INSERT INTO `sitesettings` (`id`, `sitename`, `address`, `phoneno`, `email`, `image`) VALUES
(1, 'My Site', 'Rajkot,Gujrat<india', '9737880512', 'techzone@zone.com', '1728674050_take_zone (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitesettings`
--
ALTER TABLE `sitesettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sitesettings`
--
ALTER TABLE `sitesettings`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
