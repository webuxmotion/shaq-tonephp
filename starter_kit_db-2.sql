-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: starter-kit-mysql-app:3306
-- Generation Time: Sep 28, 2021 at 11:53 PM
-- Server version: 5.7.35
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `starter_kit_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_language`
--

CREATE TABLE `app_language` (
  `id` int(11) NOT NULL,
  `code` varchar(5) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_language`
--

INSERT INTO `app_language` (`id`, `code`, `name`) VALUES
(1, 'en', 'English'),
(2, 'ru', 'Russian'),
(3, 'ua', 'Ukrainian\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_group`
--

CREATE TABLE `attribute_group` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attribute_group`
--

INSERT INTO `attribute_group` (`id`, `title`) VALUES
(1, 'Механизм'),
(2, 'Стекло'),
(3, 'Ремешок'),
(4, 'Корпус'),
(5, 'Индикация');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_product`
--

CREATE TABLE `attribute_product` (
  `attr_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attribute_product`
--

INSERT INTO `attribute_product` (`attr_id`, `product_id`) VALUES
(1, 1),
(1, 46),
(1, 48),
(1, 49),
(1, 50),
(1, 52),
(2, 4),
(2, 5),
(2, 11),
(2, 15),
(2, 16),
(2, 17),
(2, 20),
(2, 21),
(2, 22),
(2, 47),
(3, 12),
(3, 23),
(3, 24),
(3, 25),
(3, 26),
(3, 51),
(4, 2),
(4, 3),
(4, 27),
(4, 28),
(5, 1),
(5, 4),
(5, 5),
(5, 12),
(5, 13),
(5, 46),
(6, 2),
(6, 29),
(6, 30),
(6, 31),
(6, 32),
(6, 33),
(6, 51),
(7, 3),
(7, 6),
(8, 1),
(8, 46),
(9, 2),
(9, 14),
(10, 4),
(10, 5),
(10, 13),
(11, 7),
(11, 8),
(11, 9),
(11, 10),
(12, 46),
(14, 3),
(16, 1),
(16, 4),
(16, 5),
(18, 46),
(19, 51),
(19, 52);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value`
--

CREATE TABLE `attribute_value` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `attr_group_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attribute_value`
--

INSERT INTO `attribute_value` (`id`, `value`, `attr_group_id`) VALUES
(1, 'Механика с автоподзаводом', 1),
(2, 'Механика с ручным заводом', 1),
(3, 'Кварцевый от батарейки', 1),
(4, 'Кварцевый от солнечного аккумулятора', 1),
(5, 'Сапфировое', 2),
(6, 'Минеральное', 2),
(7, 'Полимерное', 2),
(8, 'Стальной', 3),
(9, 'Кожаный', 3),
(10, 'Каучуковый', 3),
(11, 'Полимерный', 3),
(12, 'Нержавеющая сталь', 4),
(13, 'Титановый сплав', 4),
(14, 'Латунь', 4),
(15, 'Полимер', 4),
(16, 'Керамика', 4),
(17, 'Алюминий', 4),
(18, 'Аналоговые', 5),
(19, 'Цифровые', 5);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'brand_no_image.jpg',
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `title`, `alias`, `img`, `description`) VALUES
(1, 'Casio', 'casio', 'abt-1.jpg', 'In sit amet sapien eros Integer dolore magna aliqua'),
(2, 'Citizen', 'citizen', 'abt-2.jpg', 'In sit amet sapien eros Integer dolore magna aliqua'),
(3, 'Royal London', 'royal-london', 'abt-3.jpg', 'In sit amet sapien eros Integer dolore magna aliqua'),
(4, 'Seiko', 'seiko', 'seiko.png', NULL),
(5, 'Diesel', 'diesel', 'diesel.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `parent_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `alias`, `parent_id`, `keywords`, `description`) VALUES
(1, 'Men', 'men', 0, 'Men', 'Men'),
(2, 'Women', 'women', 0, 'Women', 'Women'),
(3, 'Kids', 'kids', 0, 'Kids', 'Kids'),
(4, 'Электронные', 'elektronnye', 1, 'Электронные', 'Электронные'),
(5, 'Механические', 'mehanicheskie', 1, 'mehanicheskie', 'mehanicheskie'),
(6, 'Casio', 'casio', 4, 'Casio', 'Casio'),
(7, 'Citizen', 'citizen', 4, 'Citizen', 'Citizen'),
(8, 'Royal London', 'royal-london', 5, 'Royal London', 'Royal London'),
(9, 'Seiko', 'seiko', 5, 'Seiko', 'Seiko'),
(10, 'Epos', 'epos', 5, 'Epos', 'Epos'),
(11, 'Электронные', 'elektronnye-11', 2, 'Электронные', 'Электронные'),
(12, 'Механические', 'mehanicheskie-12', 2, 'Механические', 'Механические'),
(13, 'Adriatica', 'adriatica', 11, 'Adriatica', 'Adriatica'),
(14, 'Anne Klein', 'anne-klein', 12, 'Anne Klein', 'Anne Klein');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `code` varchar(3) NOT NULL,
  `symbol_left` varchar(10) NOT NULL,
  `symbol_right` varchar(10) NOT NULL,
  `value` float(15,2) NOT NULL,
  `base` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `title`, `code`, `symbol_left`, `symbol_right`, `value`, `base`) VALUES
(1, 'гривна', 'UAH', '', 'грн.', 25.80, '0'),
(2, 'доллар', 'USD', '$', '', 1.00, '1'),
(3, 'Еврo', 'EUR', '€', '', 0.95, '0');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `product_id`, `img`) VALUES
(1, 2, 's-1.jpg'),
(2, 2, 's-2.jpg'),
(3, 2, 's-3.jpg'),
(4, 48, '7ae84eddd8445e16db81d897802e6bda.png'),
(5, 48, '01af463b5667245b447120c18577ecf4.jpg'),
(6, 48, '8356b48c0ce21234e0a7edee4db252cf.jpg'),
(7, 49, '505488b25af7cd26219b077fd8f9b6cc.png'),
(8, 50, '778e4169eaf04acd527e33323bac05cb.jpeg'),
(9, 50, '69a495dada11b1e2e908c72ffbe19e7e.jpeg'),
(10, 50, '8f7f723dc19f9d09e9e3869444aa9410.jpeg'),
(11, 50, 'c6ef3f39eb9b2f65b99bb26f8bf1f2c1.png'),
(16, 51, '0fa881e1fda0b4f021309a585f496a87.png');

-- --------------------------------------------------------

--
-- Table structure for table `modification`
--

CREATE TABLE `modification` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modification`
--

INSERT INTO `modification` (`id`, `product_id`, `title`, `price`) VALUES
(1, 1, 'Silver', 300),
(2, 1, 'Black', 300),
(3, 1, 'Dark Black', 305),
(4, 1, 'Red', 310),
(5, 2, 'Silver', 80),
(6, 2, 'Red', 70);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT NULL,
  `currency` varchar(10) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `status`, `date`, `update_at`, `currency`, `note`) VALUES
(1, 1, '0', '2019-11-03 14:47:58', NULL, 'UAH', 'Ok'),
(2, 1, '1', '2019-11-03 14:54:26', '2019-11-03 14:56:02', 'UAH', 'dd'),
(3, 1, '0', '2019-11-03 14:54:50', NULL, 'UAH', '20640');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `qty`, `title`, `price`) VALUES
(1, 1, 1, 1, 'Casio MRP-700-1AVEF', 7740),
(2, 2, 2, 1, 'Casio MQ-24-7BUL', 1806),
(3, 3, 3, 2, 'Casio GA-1000-1AER', 10320);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` tinyint(3) UNSIGNED NOT NULL,
  `brand_id` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `content` text,
  `price` float NOT NULL DEFAULT '0',
  `old_price` float NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'no_image.jpg',
  `hit` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `brand_id`, `title`, `alias`, `content`, `price`, `old_price`, `status`, `keywords`, `description`, `img`, `hit`) VALUES
(1, 6, 1, 'Casio MRP-700-1AVEF', 'casio-mrp-700-1avef', '', 300, 0, '1', '', '', 'p-1.png', '0'),
(2, 6, 1, 'Casio MQ-24-7BUL', 'casio-mq-24-7bul', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla. Quisque volutpat nulla risus, id maximus ex aliquet ut. Suspendisse potenti. Nulla varius lectus id turpis dignissim porta. Quisque magna arcu, blandit quis felis vehicula, feugiat gravida diam. Nullam nec turpis ligula. Aliquam quis blandit elit, ac sodales nisl. Aliquam eget dolor eget elit malesuada aliquet. In varius lorem lorem, semper bibendum lectus lobortis ac.</p>\n\n                                            <p>Mauris placerat vitae lorem gravida viverra. Mauris in fringilla ex. Nulla facilisi. Etiam scelerisque tincidunt quam facilisis lobortis. In malesuada pulvinar neque a consectetur. Nunc aliquam gravida purus, non malesuada sem accumsan in. Morbi vel sodales libero.</p>', 70, 80, '1', NULL, NULL, 'p-2.png', '1'),
(3, 6, 1, 'Casio GA-1000-1AER', 'casio-ga-1000-1aer', NULL, 400, 0, '1', NULL, NULL, 'p-3.png', '1'),
(4, 7, 2, 'Citizen JP1010-00E', 'citizen-jp1010-00e', NULL, 400, 0, '1', NULL, NULL, 'p-4.png', '1'),
(5, 7, 2, 'Citizen BJ2111-08E', 'citizen-bj2111-08e', NULL, 500, 0, '1', NULL, NULL, 'p-5.png', '1'),
(6, 7, 2, 'Citizen AT0696-59E', 'citizen-at0696-59e', NULL, 350, 355, '1', NULL, NULL, 'p-6.png', '1'),
(7, 6, 3, 'Q&Q Q956J302Y', 'q-and-q-q956j302y', NULL, 20, 0, '1', NULL, NULL, 'p-7.png', '1'),
(8, 6, 4, 'Royal London 41040-01', 'royal-london-41040-01', NULL, 90, 0, '1', NULL, NULL, 'p-8.png', '1'),
(9, 6, 4, 'Royal London 20034-02', 'royal-london-20034-02', NULL, 110, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(10, 6, 4, 'Royal London 41156-02', 'royal-london-41156-02', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam tristique, diam in consequat iaculis, est purus iaculis mauris, imperdiet facilisis ante ligula at nulla. Quisque volutpat nulla risus, id maximus ex aliquet ut. Suspendisse potenti. Nulla varius lectus id turpis dignissim porta. Quisque magna arcu, blandit quis felis vehicula, feugiat gravida diam. Nullam nec turpis ligula. Aliquam quis blandit elit, ac sodales nisl. Aliquam eget dolor eget elit malesuada aliquet. In varius lorem lorem, semper bibendum lectus lobortis ac.</p>\n\n                                            <p>Mauris placerat vitae lorem gravida viverra. Mauris in fringilla ex. Nulla facilisi. Etiam scelerisque tincidunt quam facilisis lobortis. In malesuada pulvinar neque a consectetur. Nunc aliquam gravida purus, non malesuada sem accumsan in. Morbi vel sodales libero.</p>', 100, 0, '1', NULL, NULL, 'no_image.jpg', '1'),
(11, 3, 2, 'Тестовый товар', 'testovyy-tovar', 'контент...', 10, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(12, 7, 2, 'Часы 1', 'chasy-1', NULL, 100, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(13, 7, 2, 'Часы 2', 'chasy-2', NULL, 105, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(14, 7, 2, 'Часы 3', 'chasy-3', NULL, 110, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(15, 7, 2, 'Часы 4', 'chasy-4', NULL, 115, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(16, 7, 2, 'Часы 5', 'chasy-5', NULL, 115, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(17, 7, 2, 'Часы 6', 'chasy-6', NULL, 120, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(20, 7, 2, 'Часы 7', 'chasy-7', NULL, 120, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(21, 7, 2, 'Часы 8', 'chasy-8', NULL, 120, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(22, 7, 2, 'Часы 9', 'chasy-9', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(23, 7, 2, 'Часы 10', 'chasy-10', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(24, 7, 2, 'Часы 11', 'chasy-11', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(25, 7, 2, 'Часы 12', 'chasy-12', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(26, 7, 2, 'Часы 13', 'chasy-13', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(27, 7, 2, 'Часы 14', 'chasy-14', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(28, 7, 2, 'Часы 15', 'chasy-15', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(29, 7, 2, 'Часы 16', 'chasy-16', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(30, 7, 2, 'Часы 17', 'chasy-17', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(31, 7, 2, 'Часы 18', 'chasy-18', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(32, 7, 2, 'Часы 19', 'chasy-19', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(33, 7, 2, 'Часы 20', 'chasy-20', NULL, 125, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(34, 1, 1, 'asdf', '', '', 1, 2, '0', 'asdf', 'sdf', 'no_image.jpg', '0'),
(41, 6, 1, 'asdf', '$2y$10$fuGS7OYVxHH.0tlljS.PtuE8.JX2Piv6B4YzMR31eF1Yfid/VG3uC', NULL, 0, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(42, 1, 1, 'sdfsdf', '$2y$10$z5oyr/qhJjoREDxzmFe8qe6rl.PUXuiFOBKUnGup0z3b6YdN0TT9K', NULL, 0, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(43, 1, 1, 'sdfsdf', '$2y$10$5nVg41O65r4McNQVfwhpr.b0KuKT/bvuJuIwQZ2UQBAk1w61E8rBG', NULL, 0, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(44, 1, 1, 'sdfsdf', '$2y$10$7uWQ2ckD.jRPCb0WRPfJrOa/63gNZ1grAFByZrtMY6rBevhW4Y28O', NULL, 0, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(45, 6, 1, 'sdfsdf', '$2y$10$WWntS20p.EEiVCLS3UFfae.1MFkdr8YMRRSKfb3miG2G5q/TvYI4S', NULL, 0, 0, '1', NULL, NULL, 'no_image.jpg', '0'),
(46, 4, 1, 'New product', 'new-product', '<p>old price</p>\r\n', 20, 333, '1', 'aaa', 'ddd', 'no_image.jpg', '1'),
(47, 2, 1, 'new related', 'new-related', '<p>ddd</p>\r\n', 20, 40, '1', 'related women', 'related women description', 'no_image.jpg', '1'),
(48, 4, 1, 'ddd', 'ddd', '', 11, 0, '1', '', '', 'c93370a5d3376cd48f8c7a1a6695e3cf.png', '0'),
(49, 3, 1, 'kids', 'kids', '', 33, 0, '1', 'a', '', '54b42f9c68e20c568e35ef34692f0b9c.jpg', '0'),
(50, 3, 1, 'new related', 'new-related-50', '<p>content</p>\r\n', 111, 0, '1', 'aaa', '', '476c5d46515e5abae6200e970f354709.png', '1'),
(51, 1, 1, 'kid mendsdfd', 'kid-mendsdfd', '<p>kid contentdfdf</p>\r\n', 20, 100, '1', '', '', '1755183d1b136c0a772d0488635ef469.jpeg', '1'),
(52, 4, 1, 'ddd', 'ddd-52', '<p>dfdf</p>\r\n', 100, 444, '1', 'dd', 'ddd', 'a455767ce8ffb0618b88b080fd49b9a3.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product_translation`
--

CREATE TABLE `product_translation` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT '0',
  `language_code` char(3) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_translation`
--

INSERT INTO `product_translation` (`id`, `product_id`, `language_code`, `title`, `description`) VALUES
(1, 1, 'ru', 'текс', 'описание'),
(2, 1, 'en', 'Text', 'Description'),
(3, 1, 'ua', 'Урка', 'Опис'),
(4, 2, 'ru', 'текс2', 'описание2'),
(5, 2, 'ua', 'Урка2', 'Опис2'),
(6, 2, 'en', 'Text2', 'Description2'),
(7, 3, 'en', '3-Casio GA-1000-1AER', '3-'),
(8, 3, 'ru', '3-Casio GA-1000-1AER', '3-'),
(9, 3, 'ua', '3-Casio GA-1000-1AER', '3-'),
(10, 4, 'en', '4-Citizen JP1010-00E', '4-'),
(11, 4, 'ru', '4-Citizen JP1010-00E', '4-'),
(12, 4, 'ua', '4-Citizen JP1010-00E', '4-'),
(13, 5, 'en', '5-Citizen BJ2111-08E', '5-'),
(14, 5, 'ru', '5-Citizen BJ2111-08E', '5-'),
(15, 5, 'ua', '5-Citizen BJ2111-08E', '5-'),
(16, 6, 'en', '6-Citizen AT0696-59E', '6-'),
(17, 6, 'ru', '6-Citizen AT0696-59E', '6-'),
(18, 6, 'ua', '6-Citizen AT0696-59E', '6-'),
(19, 7, 'en', '7-Q&Q Q956J302Y', '7-'),
(20, 7, 'ru', '7-Q&Q Q956J302Y', '7-'),
(21, 7, 'ua', '7-Q&Q Q956J302Y', '7-'),
(22, 8, 'en', '8-Royal London 41040-01', '8-'),
(23, 8, 'ru', '8-Royal London 41040-01', '8-'),
(24, 8, 'ua', '8-Royal London 41040-01', '8-'),
(25, 9, 'en', '9-Royal London 20034-02', '9-'),
(26, 9, 'ru', '9-Royal London 20034-02', '9-'),
(27, 9, 'ua', '9-Royal London 20034-02', '9-'),
(28, 10, 'en', '10-Royal London 41156-02', '10-'),
(29, 10, 'ru', '10-Royal London 41156-02', '10-'),
(30, 10, 'ua', '10-Royal London 41156-02', '10-'),
(31, 11, 'en', '11-Тестовый товар', '11-'),
(32, 11, 'ru', '11-Тестовый товар', '11-'),
(33, 11, 'ua', '11-Тестовый товар', '11-'),
(34, 12, 'en', '12-Часы 1', '12-'),
(35, 12, 'ru', '12-Часы 1', '12-'),
(36, 12, 'ua', '12-Часы 1', '12-'),
(37, 13, 'en', '13-Часы 2', '13-'),
(38, 13, 'ru', '13-Часы 2', '13-'),
(39, 13, 'ua', '13-Часы 2', '13-'),
(40, 14, 'en', '14-Часы 3', '14-'),
(41, 14, 'ru', '14-Часы 3', '14-'),
(42, 14, 'ua', '14-Часы 3', '14-'),
(43, 15, 'en', '15-Часы 4', '15-'),
(44, 15, 'ru', '15-Часы 4', '15-'),
(45, 15, 'ua', '15-Часы 4', '15-'),
(46, 16, 'en', '16-Часы 5', '16-'),
(47, 16, 'ru', '16-Часы 5', '16-'),
(48, 16, 'ua', '16-Часы 5', '16-'),
(49, 17, 'en', '17-Часы 6', '17-'),
(50, 17, 'ru', '17-Часы 6', '17-'),
(51, 17, 'ua', '17-Часы 6', '17-'),
(52, 20, 'en', '20-Часы 7', '20-'),
(53, 20, 'ru', '20-Часы 7', '20-'),
(54, 20, 'ua', '20-Часы 7', '20-'),
(55, 21, 'en', '21-Часы 8', '21-'),
(56, 21, 'ru', '21-Часы 8', '21-'),
(57, 21, 'ua', '21-Часы 8', '21-'),
(58, 22, 'en', '22-Часы 9', '22-'),
(59, 22, 'ru', '22-Часы 9', '22-'),
(60, 22, 'ua', '22-Часы 9', '22-'),
(61, 23, 'en', '23-Часы 10', '23-'),
(62, 23, 'ru', '23-Часы 10', '23-'),
(63, 23, 'ua', '23-Часы 10', '23-'),
(64, 24, 'en', '24-Часы 11', '24-'),
(65, 24, 'ru', '24-Часы 11', '24-'),
(66, 24, 'ua', '24-Часы 11', '24-'),
(67, 25, 'en', '25-Часы 12', '25-'),
(68, 25, 'ru', '25-Часы 12', '25-'),
(69, 25, 'ua', '25-Часы 12', '25-'),
(70, 26, 'en', '26-Часы 13', '26-'),
(71, 26, 'ru', '26-Часы 13', '26-'),
(72, 26, 'ua', '26-Часы 13', '26-'),
(73, 27, 'en', '27-Часы 14', '27-'),
(74, 27, 'ru', '27-Часы 14', '27-'),
(75, 27, 'ua', '27-Часы 14', '27-'),
(76, 28, 'en', '28-Часы 15', '28-'),
(77, 28, 'ru', '28-Часы 15', '28-'),
(78, 28, 'ua', '28-Часы 15', '28-'),
(79, 29, 'en', '29-Часы 16', '29-'),
(80, 29, 'ru', '29-Часы 16', '29-'),
(81, 29, 'ua', '29-Часы 16', '29-'),
(82, 30, 'en', '30-Часы 17', '30-'),
(83, 30, 'ru', '30-Часы 17', '30-'),
(84, 30, 'ua', '30-Часы 17', '30-'),
(85, 31, 'en', '31-Часы 18', '31-'),
(86, 31, 'ru', '31-Часы 18', '31-'),
(87, 31, 'ua', '31-Часы 18', '31-'),
(88, 32, 'en', '32-Часы 19', '32-'),
(89, 32, 'ru', '32-Часы 19', '32-'),
(90, 32, 'ua', '32-Часы 19', '32-'),
(91, 33, 'en', '33-Часы 20', '33-'),
(92, 33, 'ru', '33-Часы 20', '33-'),
(93, 33, 'ua', '33-Часы 20', '33-'),
(94, 34, 'en', '34-asdf', '34-sdf'),
(95, 34, 'ru', '34-asdf', '34-sdf'),
(96, 34, 'ua', '34-asdf', '34-sdf'),
(97, 41, 'en', '41-asdf', '41-'),
(98, 41, 'ru', '41-asdf', '41-'),
(99, 41, 'ua', '41-asdf', '41-'),
(100, 42, 'en', '42-sdfsdf', '42-'),
(101, 42, 'ru', '42-sdfsdf', '42-'),
(102, 42, 'ua', '42-sdfsdf', '42-'),
(103, 43, 'en', '43-sdfsdf', '43-'),
(104, 43, 'ru', '43-sdfsdf', '43-'),
(105, 43, 'ua', '43-sdfsdf', '43-'),
(106, 44, 'en', '44-sdfsdf', '44-'),
(107, 44, 'ru', '44-sdfsdf', '44-'),
(108, 44, 'ua', '44-sdfsdf', '44-'),
(109, 45, 'en', '45-sdfsdf', '45-'),
(110, 45, 'ru', '45-sdfsdf', '45-'),
(111, 45, 'ua', '45-sdfsdf', '45-'),
(112, 46, 'en', '46-New product', '46-ddd'),
(113, 46, 'ru', '46-New product', '46-ddd'),
(114, 46, 'ua', '46-New product', '46-ddd'),
(115, 47, 'en', '47-new related', '47-related women description'),
(116, 47, 'ru', '47-new related', '47-related women description'),
(117, 47, 'ua', '47-new related', '47-related women description'),
(118, 48, 'en', '48-ddd', '48-'),
(119, 48, 'ru', '48-ddd', '48-'),
(120, 48, 'ua', '48-ddd', '48-'),
(121, 49, 'en', '49-kids', '49-'),
(122, 49, 'ru', '49-kids', '49-'),
(123, 49, 'ua', '49-kids', '49-'),
(124, 50, 'en', '50-new related', '50-'),
(125, 50, 'ru', '50-new related', '50-'),
(126, 50, 'ua', '50-new related', '50-'),
(127, 51, 'en', '51-kid mendsdfd', '51-'),
(128, 51, 'ru', '51-kid mendsdfd', '51-'),
(129, 51, 'ua', '51-kid mendsdfd', '51-'),
(130, 52, 'en', '52-ddd', '52-ddd'),
(131, 52, 'ru', '52-ddd', '52-ddd'),
(132, 52, 'ua', '52-ddd', '52-ddd');

-- --------------------------------------------------------

--
-- Table structure for table `related_product`
--

CREATE TABLE `related_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `related_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `related_product`
--

INSERT INTO `related_product` (`product_id`, `related_id`) VALUES
(1, 2),
(1, 5),
(2, 5),
(2, 10),
(5, 1),
(5, 7),
(5, 8),
(47, 2),
(47, 5),
(51, 2),
(52, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_language`
--
ALTER TABLE `app_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_group`
--
ALTER TABLE `attribute_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_product`
--
ALTER TABLE `attribute_product`
  ADD PRIMARY KEY (`attr_id`,`product_id`);

--
-- Indexes for table `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `value` (`value`),
  ADD KEY `attr_group_id` (`attr_group_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modification`
--
ALTER TABLE `modification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`,`brand_id`),
  ADD KEY `hit` (`hit`);

--
-- Indexes for table `product_translation`
--
ALTER TABLE `product_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `translation_id` (`product_id`),
  ADD KEY `language_code` (`language_code`);

--
-- Indexes for table `related_product`
--
ALTER TABLE `related_product`
  ADD PRIMARY KEY (`product_id`,`related_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_language`
--
ALTER TABLE `app_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attribute_group`
--
ALTER TABLE `attribute_group`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `modification`
--
ALTER TABLE `modification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `product_translation`
--
ALTER TABLE `product_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
