-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 05:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion-corner`
--
CREATE DATABASE IF NOT EXISTS `fashion-corner` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `fashion-corner`;

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `S.No` int(3) NOT NULL,
  `Item` varchar(10) NOT NULL,
  `Description` varchar(30) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` text NOT NULL,
  `Phone` bigint(12) NOT NULL,
  `Date/Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `S.No` int(11) NOT NULL,
  `ID` smallint(6) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Quantity` smallint(2) NOT NULL,
  `total_quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `S.No` int(2) NOT NULL,
  `Name` text NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `Date/Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`S.No`, `Name`, `Email`, `Password`, `Date/Time`) VALUES
(1, 'Akshay', 'akshaykatoch@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '2024-05-24 17:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `S.No` int(3) NOT NULL,
  `orderID` varchar(8) NOT NULL,
  `FullName` text NOT NULL,
  `EmailAddress` text NOT NULL,
  `Address` text NOT NULL,
  `City` varchar(20) NOT NULL,
  `State` varchar(20) NOT NULL,
  `PinCode` bigint(8) NOT NULL,
  `CardName` varchar(6) NOT NULL,
  `CardNo` bigint(16) NOT NULL,
  `ExpYear` int(4) NOT NULL,
  `ExpMonth` text NOT NULL,
  `cvv` int(4) NOT NULL,
  `productID` smallint(6) NOT NULL,
  `productName` varchar(80) NOT NULL,
  `productImage` mediumtext NOT NULL,
  `Items` int(3) NOT NULL,
  `Status` varchar(12) NOT NULL,
  `Total_Cost` bigint(10) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `ID` smallint(6) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Description` mediumtext NOT NULL,
  `Price` varchar(8) NOT NULL,
  `Actual_Price` int(6) NOT NULL,
  `Image` mediumtext NOT NULL,
  `Old_Price` varchar(20) NOT NULL,
  `Save` varchar(10) NOT NULL,
  `size_chart` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`ID`, `Name`, `Description`, `Price`, `Actual_Price`, `Image`, `Old_Price`, `Save`, `size_chart`) VALUES
(21311, 'The G.O.A.T Jacket', '<h4 class=\"description_heading\" > The GOAT</h4>\n<p class=\"description_para\" > The greatest of all time; that says it all. This design celebrates an underestimated creature who stands for peace, has restrained strength and stays level-headed through all of life’s moments. It’s all about your picking your battles, and letting your strength shine in the ones you choose to fight.\n<br><br></p>\n<ul class=\"description_list\" > \n    <li class=\"description_item\" > Height of the Male model - 6\'0</li>\n    <li class=\"description_item\" > Male Model wearing Size - L</li>\n    <li class=\"description_item\" > GSM: 330-350</li>\n    <li class=\"description_item\" > Fit - Regular (Please refer to our size chart)</li>\n    <li class=\"description_item\" > Composition: 60%Cotton + 40% Polyester </li>\n</ul>', '2,805', 2805, '../../assets/photo11@2x.png', '₹ 3,300.00 M.R.P', 'SAVE 15%', '../../assets/size_chart/price-for-photo1@2x.png'),
(21312, 'The OVRLS', '<h4 class=\"description_heading\" > The OVRLS</h4>\n<p class=\"description_para\" > Simple yet impactful. This design has a bold personality with powerful typography that represents staying cool and collected, yet still being true to yourself. The clean lines and strategic use of space emphasize clarity and confidence. It’s a perfect blend of modern aesthetics and timeless appeal.\n<br><br></p>\n<ul class=\"description_list\" > \n    <li class=\"description_item\" > Height of the Male model - 6\'0</li>\n    <li class=\"description_item\" > Male Model wearing Size - L</li>\n    <li class=\"description_item\" > GSM: 330-350</li>\n    <li class=\"description_item\" > Fit - Regular (Please refer to our size chart)</li>\n    <li class=\"description_item\" > Composition: 50%Cotton + 50% Polyester </li>\n</ul>\n', '1,949', 1949, '../../assets/photo21@2x.png', '₹ 2,599.00 M.R.P', 'SAVE 25%', '../../assets/size_chart/price-for-photo-21@2x.png'),
(21313, 'The Bloom Oversized ', '<h4 class=\"description_heading\" > The Bloom Oversized</h4>\n<p class=\"description_para\" >There is no better sweatshirt than this Bloom Unisex Oversized Sweatshirt. Made from premium materials, it offers both comfort and style. Make your look glam with sneakers and you\'re ready for the evening. Perfect for any occasion, it’s a versatile addition to your wardrobe\n<br><br></p>\n<ul class=\"description_list\" > \n    <li class=\"description_item\" > Height of the Female model - 5\'6</li>\n    <li class=\"description_item\" > Female Model wearing Size - S</li>\n    <li class=\"description_item\" > GSM: 330-350</li>\n    <li class=\"description_item\" > Fit - Oversized (Please refer to our size chart)</li>\n    <li class=\"description_item\" > Composition: Cotton 42%, Polyester 58%</li>\n</ul>\n\n\n\n', '1,499', 1499, '../../assets/2_f05d727d-6eb6-4bad-a3f0-f3f26adc06a3.jpg', '₹ 1,899.00 M.R.P', 'SOLD OUT', '../../assets/size_chart/women-2-product-5.PNG'),
(21314, 'The Conqueror Jacket', '<h4 class=\"description_heading\" > The Conqueror</h4>\n<p class=\"description_para\" >Get ready to roar. This design oozes strength and power, and the raw instinct that comes with it to follow your dreams. Change doesn’t happen in silence, it requires breaking through, and breaking free. Perfect for any occasion, it’s a versatile addition to your wardrobe\n<br><br></p>\n<ul class=\"description_list\" > \n    <li class=\"description_item\" > Height of the Male model - 6\'0</li>\n    <li class=\"description_item\" > Male Model wearing Size - L</li>\n    <li class=\"description_item\" > GSM: 330-350</li>\n    <li class=\"description_item\" > Fit - Regular (Please refer to our size chart)</li>\n    <li class=\"description_item\" > Composition - 60%Cotton + 40% Polyester </li>\n</ul>', ' 2,464', 2464, '../../assets/photo41@2x.png', '₹ 2,899.00 M.R.P', 'SAVE 15%', '../../assets/size_chart/price-for-photo-41@2x.png'),
(21315, 'Relaxed Fit Womens ', '<h4 class=\"description_heading\" >T-Shirt</h4>\n<p class=\"description_para\" >Relaxed fit printed t-shirts have a comfortable fit and feature bold eye-catching prints. The term \"relaxed\" refers to the fact that the t-shirt is intentionally designed to be a little larger than the wearer\'s usual size, creating a comfortable look rather than a fitted look.\n<br><br></p>\n<ul class=\"description_list\" > \n    <li class=\"description_item\" > Height of the Female model - 5\'6</li>\n    <li class=\"description_item\" > Female Model wearing Size - S</li>\n    <li class=\"description_item\" > GSM: 220</li>\n    <li class=\"description_item\" > Fit - Relaxed (Please refer to our size chart)</li>\n    <li class=\"description_item\" > Composition: Cotton 100% </li>\n</ul>', ' 799', 799, '../../assets/CopyofDSC01603.jpg', '₹ 999.00 M.R.P', 'SOLD OUT', '../../assets/size_chart/women-2-product-3.PNG'),
(21316, 'Falcon Jacket', '<h4 class=\"description_heading\" >The Falcon</h4>\n<p class=\"description_para\" >Feeling the heat? This design is all about persistence and resilience in the face of uncertainty. Be as brave as a strong eagle that spreads its wings and flies toward freedom and success. Get ready to finally unchain yourself. Perfect for any occasion, it’s a versatile addition to your wardrobe\n<br><br></p>\n<ul class=\"description_list\" > \n    <li class=\"description_item\" > Height of the Male model - 6\'0</li>\n    <li class=\"description_item\" > Male Model wearing Size - L</li>\n    <li class=\"description_item\" > GSM: 330-350</li>\n    <li class=\"description_item\" > Fit - Regular (Please refer to our size chart)</li>\n    <li class=\"description_item\" > Composition - 60%Cotton + 40% Polyester </li>\n</ul>', '2,024', 2024, '../../assets/photo61@2x.png', '₹ 2,699.00 M.R.P', 'SAVE 25%', '../../assets/size_chart/price-for-photo-61@2x.png'),
(21317, 'Relaxed Fit Womens ', '<h4 class=\"description_heading\" >Raglon Crop-Top</h4>\n<p class=\"description_para\" >Relaxed fit printed t-shirts have a comfortable fit and feature bold eye-catching prints. The term \"relaxed\" refers to the fact that the t-shirt is intentionally designed to be a little larger than the wearer\'s usual size, creating a comfortable look rather than a fitted look. \n<br><br>This crop-top has a plain lining on inside.</p>\n<ul class=\"description_list\" > \n    <li class=\"description_item\" > Height of the Female model - 5\'6</li>\n    <li class=\"description_item\" > Female Model wearing Size - S</li>\n    <li class=\"description_item\" > GSM: 220</li>\n    <li class=\"description_item\" > Fit - Relaxed (Please refer to our size chart)</li>\n    <li class=\"description_item\" > Composition: Cotton 100% </li>\n</ul>', '799', 799, '../../assets/CopyofDSC01686.jpg', '₹ 899.00 M.R.P', 'SAVE 20%', '../../assets/size_chart/women-2-product-2.PNG'),
(21318, 'Acid Embossed Hoodie', '<h4 class=\"description_heading\" >Acid Embassed Hoodie</h4>\n<p class=\"description_para\" >Embrace vibrancy with our electrifying Neon Acid Lime hoodie featuring captivating embossed textures. Radiating boldness, this color energizes your style, ensuring you stand out with a striking and lively flair. Perfect for any occasion, it’s a versatile addition to your wardrobe\n<br><br></p>\n<ul class=\"description_list\" > \n    <li class=\"description_item\" > Height of the Male model - 6\'0</li>\n    <li class=\"description_item\" > Male Model wearing Size - L</li>\n    <li class=\"description_item\" > GSM: 340</li>\n    <li class=\"description_item\" > Fit - Oversized (Please refer to our size chart)</li>\n    <li class=\"description_item\" > Composition - 60%Cotton + 40% Polyester </li>\n</ul>', '1,749', 1749, '../../assets/1_eb86e209-c9b0-4c04-a7ae-c5087fb1c20f.jpg', '', 'SOLD OUT', '../../assets/size_chart/men-2-product-5.PNG'),
(21319, 'Relaxed Fit Raglan ', '<h4 class=\"description_heading\" >Crop-Top</h4>\n<p class=\"description_para\" >The Crop Tops feature a loose, flowy cut that drapes over the body, providing a relaxed and comfortable fit. They can be paired with high-waisted jeans or shorts for a casual look. These tops are versatile and can be worn by people with a variety of body types. Perfect for any occasion, it’s a versatile addition to your wardrobe\n<br><br></p>\n<ul class=\"description_list\" > \n    <li class=\"description_item\" > Height of the Female model - 5\'8</li>\n    <li class=\"description_item\" > Female Model wearing Size - S</li>\n    <li class=\"description_item\" > GSM: 180</li>\n    <li class=\"description_item\" > Fit - Relaxed (Please refer to our size chart)</li>\n    <li class=\"description_item\" > Composition: Cotton 100% </li>\n</ul>', '599', 599, '../../assets/DSC00550.jpg', '₹ 899.00 M.R.P', 'SOLD OUT', '../../assets/size_chart/women-product-2.PNG'),
(21320, 'Blaze Ribbed Full ', '<h4 class=\"description_heading\" >Crop-Top</h4>\n<p class=\"description_para\" >Our Crop Tops are designed to hug the body, creating a sleek and streamlined silhouette. They are made from stretchy, form-fitting materials, which help to accentuate the curves of the wearer\'s body.\nThey can be paired with high-waisted jeans or skirts for a casual daytime look. They also work well with statement accessories, such as bold jewellery or a statement bag.\n<br><br></p>\n<ul class=\"description_list\" > \n    <li class=\"description_item\" > Height of the Female model - 5\'8</li>\n    <li class=\"description_item\" > Female Model wearing Size - S</li>\n    <li class=\"description_item\" > GSM: 220</li>\n    <li class=\"description_item\" > Fit - Skin (Please refer to our size chart)</li>\n    <li class=\"description_item\" > Composition: Cotton Rib 95% and 5% Lycra </li>\n</ul>', '799', 799, '../../assets/custom_resized_a7e046f0-bfea-4517-83d3-b4a73725494b.jpg', '₹ 999.00 M.R.P', 'SAVE 20%', '../../assets/size_chart/women-product-1.PNG'),
(21321, 'Triumph Grey Sweatsh', '<h4 class=\"description_heading\" >Triumph Grey Sweatsh</h4>\n<p class=\"description_para\" >A grey canvas of change and freedom. With the majestic lion print, embrace the courage to redefine your journey and express your untamed spirit. It\'s more than apparel; it\'s a visual anthem for those seeking liberation and transformation.\n<br><br></p>\n<ul class=\"description_list\" > \n    <li class=\"description_item\" > Height of the Male model - 6\'0</li>\n    <li class=\"description_item\" > Male Model wearing Size - L</li>\n    <li class=\"description_item\" > GSM: 340</li>\n    <li class=\"description_item\" > Fit - Oversized (Please refer to our size chart)</li>\n    <li class=\"description_item\" > Composition: 60%Cotton + 40% Polyester </li>\n</ul>', '1,769', 1769, '../../assets/2_f00c9d0f-c345-4707-a607-3ace5ae7d625.jpg', '₹ 2,199.00 M.R.P', 'SAVE 20%', '../../assets/size_chart/men-2-product-1.PNG'),
(21322, 'Relaxed Fit Raglan ', '<h4 class=\"description_heading\" >Crop-Top</h4>\n<p class=\"description_para\" >The Crop Tops feature a loose, flowy cut that drapes over the body, providing a relaxed and comfortable fit. They can be paired with high-waisted jeans or shorts for a casual look. These tops are versatile and can be worn by people with a variety of body types.\n<br><br>This crop-top has a plain lining on inside.</p>\n<ul class=\"description_list\" > \n    <li class=\"description_item\" > Height of the Female model - 5\'8</li>\n    <li class=\"description_item\" > Female Model wearing Size - S</li>\n    <li class=\"description_item\" > GSM: 180</li>\n    <li class=\"description_item\" > Fit - Skin (Please refer to our size chart)</li>\n    <li class=\"description_item\" > Composition: Cotton 100% </li>\n</ul>', '599', 599, '../../assets/DSC00618.jpg', '', 'SOLD OUT', '../../assets/size_chart/women-product-3.PNG'),
(21323, 'Midnight Black Crop ', '<h4 class=\"description_heading\" >Crop-Top</h4>\n<p class=\"description_para\" >Our Crop Tops are designed to hug the body, creating a sleek and streamlined silhouette. They are made from stretchy, form-fitting materials, which help to accentuate the curves of the wearer\'s body.\nThey can be paired with high-waisted jeans or skirts for a casual daytime look. They also work well with statement accessories, such as bold jewellery or a statement bag.\n<br><br></p>\n<ul class=\"description_list\" > \n    <li class=\"description_item\" > Height of the Female model - 5\'8</li>\n    <li class=\"description_item\" > Female Model wearing Size - S</li>\n    <li class=\"description_item\" > GSM: 220</li>\n    <li class=\"description_item\" > Fit - Skin (Please refer to our size chart)</li>\n    <li class=\"description_item\" > Composition: Cotton 100% </li>\n</ul>', '799', 799, '../../assets/DSC00750.jpg', '', 'ONLY FEW', '../../assets/size_chart/women-product-4.PNG'),
(21324, 'Ultramarine Ribbed ', '<h4 class=\"description_heading\" >Crop-Top</h4>\n<p class=\"description_para\" >Our Crop Tops are designed to hug the body, creating a sleek and streamlined silhouette. They are made from stretchy, form-fitting materials, which help to accentuate the curves of the wearer\'s body. They can be paired with high-waisted jeans or skirts for a casual daytime look. They also work well with statement accessories, such as bold jewellery or a statement bag.\n<br><br></p>\n<ul class=\"description_list\" > \n    <li class=\"description_item\" > Height of the Female model - 5\'8</li>\n    <li class=\"description_item\" > Female Model wearing Size - S</li>\n    <li class=\"description_item\" > GSM: 220</li>\n    <li class=\"description_item\" > Fit - Skin (Please refer to our size chart)</li>\n    <li class=\"description_item\" > Composition: Cotton Rib 95% and 5% Lycra </li>\n</ul>', '799', 799, '../../assets/DSC01002.jpg', '₹ 999.00 M.R.P', 'SAVE 20%', '../../assets/size_chart/women-product-5.PNG'),
(21325, 'Fearless Navy Sweats', '<h4 class=\"description_heading\" >Navy Tiger</h4>\n<p class=\"description_para\" >Embrace the untamed allure of our Navy Tiger Horizon Sweatshirt, where the fierce print symbolizes the courage to change. In every stripe, find the essence of freedom and the strength to rewrite your narrative. Elevate your style with this unique garment, a visual anthem of liberation and transformation. Perfect for any occasion, it’s a versatile addition to your wardrobe\n<br><br></p>\n<ul class=\"description_list\" > \n    <li class=\"description_item\" > Height of the Male model - 6\'0</li>\n    <li class=\"description_item\" > Male Model wearing Size - L</li>\n    <li class=\"description_item\" > GSM: 340</li>\n    <li class=\"description_item\" > Fit - Oversized (Please refer to our size chart)</li>\n    <li class=\"description_item\" > Composition: 60%Cotton + 40% Polyester </li>\n</ul>', '1,699', 1699, '../../assets/1_3cbdee39-0021-443f-bbd1-64ea279bb79b.jpg', '', 'ONLY FEW', '../../assets/size_chart/men-3-product-6.PNG'),
(21326, 'The Marine Shaket', '<h4 class=\"description_heading\" >Arctic Freedom</h4>\n<p class=\"description_para\" >Arctic Freedom Flannel Dive into a sea of change with our Frost Blue Oversized Flannel Shirt—more than just a garment, it\'s a canvas for transformation. The oversized silhouette embodies the freedom to express yourself, while the cool frosty blue hue symbolizes the fresh start of winter. Experience the embrace of change and the liberation of style in the Arctic Freedom Flannel\n<br><br></p>\n<ul class=\"description_list\" > \n    <li class=\"description_item\" > Height of the Mmale model - 6\'0</li>\n    <li class=\"description_item\" > Male Model wearing Size - L</li>\n    <li class=\"description_item\" > GSM: 340</li>\n    <li class=\"description_item\" > Fit - Oversized (Please refer to our size chart)</li>\n    <li class=\"description_item\" > Composition: 50% Cotton + 30% Polyester + 20% Rayon </li>\n</ul>', '1,860', 1, '../../assets/1_a7148cc9-b352-45fe-adc9-0ac63fe15151.jpg', '', 'ONLY FEW', '../../assets/size_chart/men-3-product-4.PNG'),
(21327, 'Relaxed Fit Raglan ', '<h4 class=\"description_heading\" >Crop-Top</h4>\n<p class=\"description_para\" >Our Crop Tops are designed to hug the body, creating a sleek and streamlined silhouette. They are made from stretchy, form-fitting materials, which help to accentuate the curves of the wearer\'s body. They can be paired with high-waisted jeans or skirts for a casual daytime look. They also work well with statement accessories, such as bold jewellery or a statement bag.\n<br><br></p>\n<ul class=\"description_list\" > \n    <li class=\"description_item\" > Height of the Female model - 5\'8</li>\n    <li class=\"description_item\" > Female Model wearing Size - S</li>\n    <li class=\"description_item\" > GSM: 220</li>\n    <li class=\"description_item\" > Fit - Skin (Please refer to our size chart)</li>\n    <li class=\"description_item\" > Composition: Cotton Rib 95% and 5% Lycra </li>\n</ul>', '419', 419, '../../assets/20230803-DSC02040.jpg', '₹ 599.00 M.R.P', 'SAVE 30%', '../../assets/size_chart/women-3-product-3.PNG'),
(21328, 'Red Embossed Hoodie', '<h4 class=\"description_heading\" >Red Embossed Hoodie</h4>\n<p class=\"description_para\" >Command attention with our striking Bright Red Embossed Hoodie - a hue that ignites confidence and makes a bold statement. Embrace the vibrancy of this timeless color, adding an electrifying touch to your wardrobe.\n<br><br>This hoodie has a plain lining on inside.</p>\n<ul class=\"description_list\" > \n    <li class=\"description_item\" > Height of the Male model - 6\'0</li>\n    <li class=\"description_item\" > Male Model wearing Size - L</li>\n    <li class=\"description_item\" > GSM: 340</li>\n    <li class=\"description_item\" > Fit - Oversized (Please refer to our size chart)</li>\n    <li class=\"description_item\" > Composition: 50% Cotton + 30% Polyester + 20% Rayon </li>\n</ul>', '1,749', 1749, '../../assets/1_9577d097-4ce3-46ed-8549-364566b8b00a.jpg', '', 'SOLD OUT', '../../assets/size_chart/men-3-product-3.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `S.No` int(11) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Date/Time` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='stores emails of user for promotion emails and updates';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`S.No`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`S.No`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`S.No`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`S.No`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`S.No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `S.No` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `S.No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `S.No` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `S.No` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `S.No` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
