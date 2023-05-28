-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 May 2023, 01:03:10
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `tool_tb`
--

create database tool_db;
use tool_db;



-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `price_list`
--

CREATE TABLE `price_list` (
  `unit_id` int(30) NOT NULL,
  `monthly` float NOT NULL,
  `quarterly` float NOT NULL,
  `annually` float NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `price_list`
--

INSERT INTO `price_list` (`unit_id`, `monthly`, `quarterly`, `annually`, `date_updated`) VALUES
(1, 500, 1400, 3999, '2021-09-07 10:25:52'),
(2, 500, 1400, 3999, '2021-09-07 10:34:43'),
(4, 300, 500, 1200, '2023-05-24 00:07:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rent_list`
--

CREATE TABLE `rent_list` (
  `id` int(30) NOT NULL,
  `unit_id` int(30) NOT NULL,
  `tenant_id` int(30) NOT NULL,
  `rent_type` tinyint(1) DEFAULT NULL COMMENT '1 = Monthly, 2 = Quarterly, 3 = Annually',
  `date_rented` date NOT NULL DEFAULT current_timestamp(),
  `date_end` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `billing_amount` float NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `rent_list`
--

INSERT INTO `rent_list` (`id`, `unit_id`, `tenant_id`, `rent_type`, `date_rented`, `date_end`, `status`, `billing_amount`, `date_created`, `date_updated`) VALUES
(1, 1, 1, 2, '2022-09-07', '2022-09-07', 1, 1400, '2021-09-07 14:20:40', '2021-09-07 15:26:24'),
(3, 7, 12, 1, '2023-05-25', NULL, 1, 124, '2023-05-25 02:39:40', NULL),
(4, 2, 12, 1, '2023-05-25', NULL, 1, 124, '2023-05-25 02:58:42', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Storage Unit Rental Management System - PHP'),
(6, 'short_name', 'SURMS - PHP'),
(11, 'logo', 'uploads/1630976340_storage_logo.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/1630976580_storage.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tenants`
--

CREATE TABLE `tenants` (
  `id` int(30) NOT NULL,
  `fullname` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `id_type` varchar(100) NOT NULL,
  `id_no` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_added` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `tenants`
--

INSERT INTO `tenants` (`id`, `fullname`, `gender`, `dob`, `contact`, `address`, `id_type`, `id_no`, `date_created`, `date_added`) VALUES
(1, 'John D Smith', 'Male', '1997-06-23', '09123456789', 'Sample Address 101 St. 0623', 'License ID', 'GBN-1014150723', '2021-09-07 11:55:46', '2021-09-07 13:06:59'),
(2, 'Claire Blake', 'Female', '1997-10-14', '094563213321', 'Sample Address only', 'Sample ID', '0897654123', '2021-09-07 13:08:29', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `unit_list`
--

CREATE TABLE `unit_list` (
  `id` int(30) NOT NULL,
  `unit_number` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = Available, 1 = Unavailable, 3 = Under Maintenance',
  `image` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `unit_list`
--

INSERT INTO `unit_list` (`id`, `unit_number`, `description`, `status`, `image`, `date_created`) VALUES
(1, '10-Inch Drill Press', '&lt;p&gt;Sample Storage Unit&lt;br&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;50x50&lt;/li&gt;&lt;li&gt;sample&lt;/li&gt;&lt;li&gt;test&lt;/li&gt;&lt;li&gt;lorem&lt;/li&gt;&lt;/ul&gt;', 1, 'uploads/1684962660_tool6.jpg', '2021-09-07 09:24:40'),
(2, 'Adult Bicycle Helmet', '&lt;p&gt;Sample unit 2&lt;/p&gt;', 1, 'uploads/1684962720_tool5.jpg', '2021-09-07 09:27:06'),
(4, 'Beginner Level 2 Snowboard', '&lt;p&gt;Sample&lt;/p&gt;', 1, 'uploads/1684962660_tool3.jpg', '2021-09-07 10:34:54'),
(5, 'aTVERKA', '&lt;p&gt;atverka12&lt;/p&gt;', 1, 'uploads/1684958100_tool1.jpg', '2023-05-24 23:50:35'),
(7, 'ASASASS', '&lt;p&gt;ASasaa&lt;/p&gt;', 0, 'uploads/1684962540_tool4.jpg', '2023-05-25 01:09:31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', NULL, 1, '2021-01-20 14:02:37', '2021-06-21 09:55:07'),
(3, 'Mike ', 'Williams', 'mwilliams', 'a88df23ac492e6e2782df6586a0c645f', 'uploads/1630999200_avatar5.png', NULL, 2, '2021-09-07 15:20:40', NULL),
(7, 'Maggie', 'Reilly', 'bokuge', '827ccb0eea8a706c4c34a16891f84e7b', 'uploads/1684952760_pexels-justin-shaifer-1222271.jpg', NULL, 0, '2023-05-24 22:26:04', NULL),
(8, 'Kylynn', 'Pope', 'zodovewyzo', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'uploads/1684952760_pexels-justin-shaifer-1222271.jpg', NULL, 0, '2023-05-24 22:26:47', NULL),
(9, 'Mariko', 'Hickman', 'rakikuvi', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'uploads/1684952880_dsp_interview_img.jpg', NULL, 0, '2023-05-24 22:28:06', NULL),
(10, 'Baxter', 'Bass', 'nuvotynid', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'uploads/1684952940_dsp_interview_img.jpg', NULL, 0, '2023-05-24 22:29:23', NULL),
(11, 'Haley', 'Beasley', 'xibedymoc', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'uploads/1684952940_dsp_plan_img.jpg', NULL, 0, '2023-05-24 22:29:36', NULL),
(13, 'USer', 'User', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'uploads/1684969260_pexels-justin-shaifer-1222271.jpg', NULL, 0, '2023-05-25 03:01:17', NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `price_list`
--
ALTER TABLE `price_list`
  ADD KEY `unit_id` (`unit_id`);

--
-- Tablo için indeksler `rent_list`
--
ALTER TABLE `rent_list`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `unit_list`
--
ALTER TABLE `unit_list`
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
-- Tablo için AUTO_INCREMENT değeri `rent_list`
--
ALTER TABLE `rent_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `unit_list`
--
ALTER TABLE `unit_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `price_list`
--
ALTER TABLE `price_list`
  ADD CONSTRAINT `price_list_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
