-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:8889
-- Üretim Zamanı: 27 Mar 2023, 12:48:05
-- Sunucu sürümü: 5.7.34
-- PHP Sürümü: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `phpmyblog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(19, 'fff'),
(20, 'sfgsdf'),
(21, 'fvf'),
(22, 'vfvf'),
(23, 'sfgvs'),
(24, 'sfbs'),
(25, 'dvsadva'),
(26, 'test 34'),
(27, 'ddd'),
(28, 'dddd'),
(29, 'fffff'),
(30, 'fff'),
(31, 'ffff'),
(32, 'ff'),
(33, 'aa'),
(34, 'll'),
(35, 'ff'),
(36, 'test');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `commenter_name` varchar(150) NOT NULL DEFAULT 'Anonim',
  `comment_detail` text NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(55) NOT NULL,
  `post_created_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `post_desc` varchar(55) NOT NULL,
  `post_content` text NOT NULL,
  `post_img` varchar(500) DEFAULT NULL,
  `post_category` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_created_time`, `post_desc`, `post_content`, `post_img`, `post_category`) VALUES
(50, 'Test', '2023-03-15 06:05:47.590788', 'test', '<p>test</p>', 'http://localhost:8888/PHP-myBLOG/upload/road-g9dc0426d6_1280.jpg', '36'),
(103, 'Test', '2023-03-21 12:49:59.546996', 'Test', '<p>Test</p>', 'http://localhost:8888/PHP-myBLOG/upload/road-g9dc0426d6_1280.jpg', '36'),
(104, 'Test', '2023-03-21 12:50:19.651229', 'Test', '<p>Test</p>', 'http://localhost:8888/PHP-myBLOG/upload/sea-g757a78062_1280.jpg', '36'),
(105, 'Test 34', '2023-03-21 14:22:15.917096', 'test 34', '<p>test 34</p>', 'http://localhost:8888/PHP-myBLOG/upload/sea-g757a78062_1280.jpg', '36'),
(109, 'Test Category', '2023-03-27 07:55:22.186438', 'Test Category', '<p>Test</p>', 'http://localhost:8888/PHP-myBLOG/upload/road-g9dc0426d6_1280.jpg', '26');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sitesettings`
--

CREATE TABLE `sitesettings` (
  `id` int(11) NOT NULL,
  `logo` varchar(55) NOT NULL,
  `header_title` varchar(55) NOT NULL,
  `header_desc` varchar(55) NOT NULL,
  `side_title` varchar(55) NOT NULL,
  `side_desc` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sitesettings`
--

INSERT INTO `sitesettings` (`id`, `logo`, `header_title`, `header_desc`, `side_title`, `side_desc`) VALUES
(1, 'PHP Base Blog Project 34', 'Hello World! 34', 'This is PHP Base Blog Project!', 'Side Title', 'Side Desc');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(11, 'mustafaoguzbaran', '098f6bcd4621d373cade4e832627b4f6', 'mustafaoguzbaran@icloud.com'),
(13, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(14, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(15, 'test1', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(16, 'test43', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(17, 'test3', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(18, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(19, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(20, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(21, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(22, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(23, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(24, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(25, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(26, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(27, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(28, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(29, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(30, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(31, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(32, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(33, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(34, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(35, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(36, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(37, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com'),
(38, 'test', '098f6bcd4621d373cade4e832627b4f6', 'mustaga@gmail.com'),
(39, 'tewataer', '098f6bcd4621d373cade4e832627b4f6', 'teseawga@gmail.com'),
(40, 'register', '098f6bcd4621d373cade4e832627b4f6', 'register@gmail.com'),
(41, 'gsgsgs', '098f6bcd4621d373cade4e832627b4f6', 'fsggs@gmail.com'),
(42, 'sevval', '098f6bcd4621d373cade4e832627b4f6', 'sevval@gmail.com'),
(43, 'psrhpsehslhs', '0b07a31db405aa8cbdb485c98ddf704b', 'ehmsthls@gmail.com'),
(44, 'testsghsgs', '098f6bcd4621d373cade4e832627b4f6', 'argargas@gmail.com'),
(45, 'lsöhklbsmkhlmskmhsdevele vele', '098f6bcd4621d373cade4e832627b4f6', 'testevelevelehabelehubele@gmail.com'),
(46, 'ghfsajgfsdjhfsda', '098f6bcd4621d373cade4e832627b4f6', 'hjsgdjhagsdjhgas@gmail.com'),
(47, 'sdhgfjshdgfjsg', '098f6bcd4621d373cade4e832627b4f6', 'hsdggdfhgsd@gmail.com'),
(48, 'wgfag', 'rerere', 'rfgsga@gmail.com'),
(49, 'rawgarega', 'test', 'sthshs@gmail.com'),
(50, 'regsrehgserhs', 'test', 'shehsthnsrj@gmail.com'),
(51, 'regsrehgserhs', 'test', 'shehsthnsrj@gmail.com'),
(52, 'Hello', 'test', 'heloo@gmail.com'),
(53, 'hdsgfshdg', 'sdfsd', 'sdfsşşs@d.com'),
(54, 'gawrgaerg', 'tega', 'agharharha@gmail.com'),
(55, 'sdfgvsdfgsdf', 'test', 'sfgsfgbsdalgmsbgs@gmafffil.com'),
(56, 'tetretewrt', '098f6bcd4621d373cade4e832627b4f6', 'wertwertgwert@gmail.com'),
(57, 'tewgfawrgaregaerhg', '098f6bcd4621d373cade4e832627b4f6', 'ehgshsths@gmail.com'),
(58, 'mustafawrgerg', '906d7dee9fe8213b1dc85ab59001f425', 'regesrgkmselhse@gmail.com');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Tablo için indeksler `sitesettings`
--
ALTER TABLE `sitesettings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Tablo için AUTO_INCREMENT değeri `sitesettings`
--
ALTER TABLE `sitesettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
