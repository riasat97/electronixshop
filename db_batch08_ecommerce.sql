-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2014 at 02:50 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_batch08_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(2) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_email_address` varchar(256) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email_address`, `admin_password`) VALUES
(1, 'sagar', 'sagar@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `customer_id` int(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `cell_number` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `first_name`, `last_name`, `email_address`, `cell_number`, `address`, `city`, `district`, `zip_code`, `country`, `password`) VALUES
(1, 'faisal', 'ahmed', 'faisal.ahmed3133@gmail.com', '01763297075', ' uttara,dhaka', 'Dhaka', 'kushtia', '1110', 'Bangladesh', '123456'),
(2, 'faisal', 'ahmed', 'faisal.ahmed3133@gmail.com', '01763297075', ' dddd', 'Dhaka', 'kushtia', '1110', 'Bangladesh', '123456'),
(7, 'archita', 'biswas', 'archita@gmail.com', '457568765', ' yrgr', 'gfrhgr', 'hnghng', 'ngng', 'ngngb', '202cb962ac59075b964b07152d234b70'),
(8, 'sfwsf', 'dfgda', 'aqua.primera@gmail.com', '656546', ' gnhgn', 'nbgn', 'nbn', 'nhn', 'nhnh', '250cf8b51c773f3f8dc8b4be867a9a02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` int(7) NOT NULL AUTO_INCREMENT,
  `customer_id` int(7) NOT NULL,
  `shipping_id` int(8) NOT NULL,
  `payment_id` int(8) NOT NULL,
  `order_total` float(10,2) NOT NULL,
  `ordered_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=ucs2 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `ordered_date_time`) VALUES
(9, 13, 4, 11, 12500.00, '2013-11-26 10:29:21'),
(8, 12, 3, 10, 15000.00, '2013-11-24 14:03:29'),
(7, 12, 3, 9, 12500.00, '2013-11-24 13:59:38'),
(10, 13, 4, 12, 0.00, '2013-11-26 10:30:38'),
(11, 13, 4, 13, 0.00, '2013-11-26 10:32:43'),
(12, 13, 4, 14, 0.00, '2013-11-26 10:32:50'),
(13, 13, 4, 15, 2500.00, '2013-11-26 10:53:25'),
(14, 13, 4, 16, 0.00, '2013-11-26 10:54:33'),
(15, 13, 4, 17, 45000.00, '2013-11-26 11:48:52'),
(16, 13, 4, 18, 45000.00, '2013-11-26 11:49:14'),
(17, 13, 4, 19, 45000.00, '2013-11-26 11:55:44'),
(18, 14, 5, 20, 131000.00, '2014-01-19 18:46:15'),
(19, 14, 5, 21, 131000.00, '2014-01-19 18:48:13'),
(20, 14, 5, 22, 0.00, '2014-01-19 18:54:31'),
(21, 14, 5, 23, 2000.00, '2014-01-19 18:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE IF NOT EXISTS `tbl_order_details` (
  `order_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(7) NOT NULL,
  `product_id` int(3) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float(10,2) NOT NULL,
  `product_sales_quantity` int(11) NOT NULL,
  `subtotal` float(10,2) NOT NULL,
  PRIMARY KEY (`order_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=ucs2 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `subtotal`) VALUES
(11, 9, 14, 'Pen Drive With Free Bracelet', 2500.00, 5, 12500.00),
(9, 7, 14, 'Pen Drive With Free Bracelet', 2500.00, 5, 12500.00),
(10, 8, 14, 'Pen Drive With Free Bracelet', 2500.00, 6, 15000.00),
(12, 13, 14, 'Pen Drive With Free Bracelet', 2500.00, 1, 2500.00),
(13, 15, 7, 'Motorola 156 MX-VL', 45000.00, 1, 45000.00),
(14, 16, 7, 'Motorola 156 MX-VL', 45000.00, 1, 45000.00),
(15, 17, 7, 'Motorola 156 MX-VL', 45000.00, 1, 45000.00),
(16, 18, 11, 'intel core i7', 70000.00, 1, 70000.00),
(17, 18, 9, 'Samsung Webcam update', 5000.00, 1, 5000.00),
(18, 18, 10, 'Motorola 156 MX-VL', 50000.00, 1, 50000.00),
(19, 18, 14, 'Pen Drive With Free Bracelet', 2500.00, 1, 2500.00),
(20, 18, 13, 'Pen Drive With Free Car', 1500.00, 1, 1500.00),
(21, 18, 12, 'Pen Drive 143', 2000.00, 1, 2000.00),
(22, 19, 11, 'intel core i7', 70000.00, 1, 70000.00),
(23, 19, 9, 'Samsung Webcam update', 5000.00, 1, 5000.00),
(24, 19, 10, 'Motorola 156 MX-VL', 50000.00, 1, 50000.00),
(25, 19, 14, 'Pen Drive With Free Bracelet', 2500.00, 1, 2500.00),
(26, 19, 13, 'Pen Drive With Free Car', 1500.00, 1, 1500.00),
(27, 19, 12, 'Pen Drive 143', 2000.00, 1, 2000.00),
(28, 21, 12, 'Pen Drive 143', 2000.00, 1, 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `payment_id` int(7) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(30) NOT NULL,
  `payment_status` varchar(15) NOT NULL DEFAULT 'Pending',
  `payment_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=ucs2 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_type`, `payment_status`, `payment_date_time`) VALUES
(10, 'cash_on_delivery', 'Pending', '2013-11-24 14:03:29'),
(9, 'cash_on_delivery', 'Pending', '2013-11-24 13:59:38'),
(8, 'cash_on_delivery', 'Pending', '2013-11-24 13:54:50'),
(7, 'cash_on_delivery', 'Pending', '2013-11-24 13:53:45'),
(6, 'cash_on_delivery', 'Pending', '2013-11-24 13:53:09'),
(11, 'cash_on_delivery', 'Pending', '2013-11-26 10:29:21'),
(12, 'cash_on_delivery', 'Pending', '2013-11-26 10:30:38'),
(13, 'cash_on_delivery', 'Pending', '2013-11-26 10:32:43'),
(14, 'cash_on_delivery', 'Pending', '2013-11-26 10:32:50'),
(15, 'cash_on_delivery', 'Pending', '2013-11-26 10:53:25'),
(16, 'cash_on_delivery', 'Pending', '2013-11-26 10:54:33'),
(17, 'cash_on_delivery', 'Pending', '2013-11-26 11:48:52'),
(18, 'cash_on_delivery', 'Pending', '2013-11-26 11:49:14'),
(19, 'cash_on_delivery', 'Pending', '2013-11-26 11:55:44'),
(20, 'cash_on_delivery', 'Pending', '2014-01-19 18:46:15'),
(21, 'cash_on_delivery', 'Pending', '2014-01-19 18:48:13'),
(22, 'cash_on_delivery', 'Pending', '2014-01-19 18:54:31'),
(23, 'cash_on_delivery', 'Pending', '2014-01-19 18:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(5) NOT NULL AUTO_INCREMENT,
  `category_id` int(3) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(4) NOT NULL,
  `product_short_description` text NOT NULL,
  `product_long_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_quantity`, `product_short_description`, `product_long_description`, `product_image`, `product_status`, `created_date_time`) VALUES
(7, 7, 'Motorola 156 MX-VL', 45000, 97, 'Motorola 156 MX-VL', 'Motorola 156 MX-VL', 'http://localhost/ecommerce_batch08_day30/uploads/products/big_pic3.jpg', 1, '2013-10-01 22:04:26'),
(8, 7, 'Iphone Apple update', 70000, 200, 'Iphone Appleupdate', 'Iphone Appleupdate', 'http://localhost/ecommerce_batch08_day30/uploads/products/laptop.gif', 1, '2013-10-01 22:06:03'),
(9, 8, 'Samsung Webcam update', 5000, 48, 'Samsung Webcam', 'Samsung Webcam', 'http://localhost/ecommerce_batch08_day30/uploads/products/laptop.gif', 1, '2013-10-01 22:06:30'),
(10, 8, 'Motorola 156 MX-VL', 50000, 18, 'Motorola 156 MX-VL', 'Motorola 156 MX-VL\r\nMotorola 156 MX-VL\r\nMotorola 156 MX-VL', 'http://localhost/ecommerce_batch08_day30/uploads/products/laptop.gif', 1, '2013-10-01 22:07:02'),
(11, 9, 'intel core i7', 70000, 48, 'intel core i7', 'intel core i7\r\nintel core i7\r\nintel core i7', 'http://localhost/ecommerce_batch08_day30/uploads/products/laptop.png', 1, '2013-10-01 22:07:53'),
(12, 10, 'Pen Drive 143', 2000, 37, 'Special Price For This Eid :)', '8GB\r\nSpecial Price For This Eid :)', 'http://localhost/ecommerce_batch08_day30/uploads/products/pen_luxo2_edited.jpg', 1, '2013-10-02 18:16:18'),
(13, 10, 'Pen Drive With Free Car', 1500, 78, 'Pen Drive With Free Car', '16GB\r\nFaster Data Transfer Like BMW', 'http://localhost/ecommerce_batch08_day30/uploads/products/special-pen-drive06.jpg', 1, '2013-10-02 18:18:07'),
(14, 10, 'Pen Drive With Free Bracelet', 2500, 36, 'Pen Drive With Free Bracelet', '20GB\r\nPen Drive With Free Bracelet', 'http://localhost/ecommerce_batch08_day30/uploads/products/bbbb.jpg', 1, '2013-10-02 18:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

CREATE TABLE IF NOT EXISTS `tbl_product_category` (
  `category_id` int(2) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `category_description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `category_image` varchar(100) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`category_id`, `category_name`, `category_description`, `publication_status`, `category_image`, `created_date_time`) VALUES
(7, 'Notebook', 'There Goes On Notebook Related All Product!', 1, 'http://localhost/ecommerce_batch08_day30/uploads/notebook.jpg', '2013-10-01 20:49:24'),
(8, 'Laptop', 'There Goes On Notebook Related All Product! UPDATE CHK', 1, 'http://localhost/ecommerce_batch08_day30/uploads/big_pic.jpg', '2013-10-01 20:49:46'),
(9, 'computer', '', 1, 'http://localhost/ecommerce_batch08_day30/uploads/computer1.jpg', '2013-10-01 20:52:06'),
(10, 'Pen Drive', 'All kind Of Pen Drive!!!', 1, 'http://localhost/ecommerce_batch08_day30/uploads/camera.png', '2013-10-02 18:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping_info`
--

CREATE TABLE IF NOT EXISTS `tbl_shipping_info` (
  `shipping_id` int(7) NOT NULL AUTO_INCREMENT,
  `customer_id` int(5) NOT NULL,
  `full_name` varchar(30) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `cell_number` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`shipping_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_shipping_info`
--

INSERT INTO `tbl_shipping_info` (`shipping_id`, `customer_id`, `full_name`, `email`, `cell_number`, `address`, `city`, `country`, `zip_code`) VALUES
(1, 0, 'juhm,j', 'dfs@g.com', 'mnhm h', 'jmhgm', 'j,mjh', ',jm,j', ',mj,j'),
(3, 0, 'sagar', 'p.charming1609@yahoo.com', '543463', 'hgh', 'hgthnh', 'gthtd', 'hgth'),
(4, 0, 'sagar', '', '', '', '', '', ''),
(5, 0, '', '', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
