-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2020 at 06:09 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"shopping\",\"table\":\"state\"},{\"db\":\"shopping\",\"table\":\"special_order\"},{\"db\":\"shopping\",\"table\":\"users\"},{\"db\":\"shopping\",\"table\":\"orders\"},{\"db\":\"shopping\",\"table\":\"subcategory\"},{\"db\":\"shopping\",\"table\":\"products\"},{\"db\":\"shopping\",\"table\":\"category\"},{\"db\":\"shopping\",\"table\":\"admin\"},{\"db\":\"shopping\",\"table\":\"userlog\"},{\"db\":\"shopping\",\"table\":\"log_attempt\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2020-09-26 04:05:42', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `shopping`
--
CREATE DATABASE IF NOT EXISTS `shopping` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shopping`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', '8c71eede42e38709e9e836021b0b9b9b', '2017-01-24 16:21:18', '11-09-2020 06:00:34 PM'),
(2, 'Admin', '8c71eede42e38709e9e836021b0b9b9b', '2020-09-08 08:01:42', '11-09-2020 06:00:34 PM'),
(3, 'Admin', '8c71eede42e38709e9e836021b0b9b9b', '2020-09-08 08:01:47', '11-09-2020 06:00:34 PM');

-- --------------------------------------------------------

--
-- Table structure for table `available_yarn`
--

CREATE TABLE `available_yarn` (
  `yarn_id` int(11) NOT NULL,
  `yarn_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_yarn`
--

INSERT INTO `available_yarn` (`yarn_id`, `yarn_name`) VALUES
(1, 'Nylon'),
(2, 'Polypropylene'),
(3, 'Polyster'),
(4, 'Arylic'),
(5, 'Wool'),
(6, 'Loop pile'),
(7, 'Cut pile'),
(8, 'Saxony cut');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(7, 'Carpet', 'Rugs and Textile products', '2020-09-12 06:38:42', NULL),
(8, 'Mat', 'Rugs and for small carpets', '2020-09-12 06:39:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(200) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `state_id`) VALUES
(1, 'bhadohi', 1),
(2, 'Lucknow', 1),
(3, 'Rae bareli', 1),
(4, 'Meerut', 1),
(5, 'Ghazipur', 1),
(11, 'Indore', 2),
(12, 'Bhopal', 2),
(13, 'Jabalpur', 2),
(14, 'Gwalior', 2),
(15, 'Banda', 2),
(21, 'Arrah', 3),
(22, 'Bagaha', 3),
(23, 'Muzzaffarpur', 3),
(24, 'Gaya', 3),
(25, 'Bhagalpur', 3),
(31, 'Ahmedabad', 7),
(32, 'Surat', 7),
(33, 'Rajkot', 7),
(34, 'Vadodara', 7),
(35, 'Junagarh', 7),
(41, 'kochi', 9),
(42, 'kozhikode', 9),
(43, 'kollam', 9),
(44, 'Thiruvananthapuram', 9),
(45, 'Koyilandi', 9),
(46, 'kochi', 9),
(47, 'kozhikode', 9),
(48, 'kollam', 9),
(49, 'Thiruvananthapuram', 9),
(50, 'Koyilandi', 9);

-- --------------------------------------------------------

--
-- Table structure for table `log_attempt`
--

CREATE TABLE `log_attempt` (
  `id` int(11) NOT NULL,
  `usermail` varchar(150) NOT NULL,
  `try_time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_attempt`
--

INSERT INTO `log_attempt` (`id`, `usermail`, `try_time`) VALUES
(1, 'Nitin.sinha9178@gmail.com', 1598763109),
(2, 'Nitin.sinha9178@gmail.com', 1598763117),
(3, 'Nitin.sinha9178@gmail.com', 1598763120),
(4, 'Nitin.sinha9178@gmail.com', 1599750343),
(5, 'Nitin.sinha9178@gmail.com', 1599750358),
(6, 'Nitin.sinha9178@gmail.com', 1599750373),
(7, 'admin', 1599807882),
(8, 'admin', 1599807890),
(9, 'test', 1599807898),
(10, 'test', 1599807918),
(11, 'admin', 1599807929),
(12, 'admin', 1599807938),
(13, 'admin', 1599807944),
(14, 'admin', 1599807951),
(15, 'admin', 1599808047),
(16, 'admin', 1599824747),
(17, 'admin', 1599827381),
(18, 'admin', 1599827726),
(19, 'admin', 1599831266),
(20, 'admin', 1599838460),
(21, 'admin', 1599838463),
(22, '', 1599839865),
(23, '', 1599840024),
(24, '', 1599840046),
(25, '', 1599840140),
(26, '', 1599840270),
(27, '', 1599844509),
(28, '', 1599844702),
(29, '', 1599844822),
(30, '', 1599844846),
(31, '', 1599845464),
(32, '', 1599845495);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `payment` double NOT NULL,
  `card_num` char(100) NOT NULL,
  `cvv` char(10) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `userId`, `productId`, `quantity`, `state`, `city`, `address`, `payment`, `card_num`, `cvv`, `orderDate`, `orderStatus`) VALUES
(151, 4, '1', 1, '3', '21', 'Azimullah chauraha', 139900, '378282246310006', '1234', '2020-09-07 17:18:53', '0'),
(152, 4, '1', 1, '3', '21', 'Azimullah chauraha', 139900, '378282246310006', '1234', '2020-09-07 17:19:57', '0'),
(153, 4, '17', 1, '3', '24', 'Azimullah chauraha', 32566, '378282246310006', '1234', '2020-09-08 07:36:41', '1'),
(154, 4, NULL, 2, '1', '1', 'Azimullah chauraha', 46000, '370000000000002', '3241', '2020-09-19 07:13:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(5, 153, 'Delivered', 'This product is delivered', '2020-09-08 12:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productreviews`
--

INSERT INTO `productreviews` (`id`, `productId`, `quality`, `price`, `value`, `name`, `summary`, `review`, `reviewDate`) VALUES
(5, 17, 3, 3, 3, 'Nitin Sinha', 'It looks too old', 'It looks too old', '2020-09-03 17:44:17'),
(6, 1, 4, 4, 3, 'Nitin Sinha', 'ABout its look', 'Well it is looking awesome', '2020-09-06 05:58:17'),
(7, 2, 4, 3, 4, 'Nitin Sinha', 'Phone look', 'What a look of the phone', '2020-09-07 08:18:04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productPriceBeforeDiscount` int(11) DEFAULT NULL,
  `productDescription` longtext DEFAULT NULL,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`) VALUES
(22, 7, 13, 'Nylon Made Skin Floor Carpet', 'Rupesh Carpets and Sons', 23000, 25000, '<font face=\"comic sans ms\">&nbsp; Size&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : 10*7 ft.</font><div><font face=\"comic sans ms\">&nbsp; Yarn&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Nylon,</font></div><div><font face=\"comic sans ms\">&nbsp; Color&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Wheat Color,</font></div><div><font face=\"comic sans ms\">&nbsp; Description : It is a non-waterproof carpet. It can be used in hall or&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;under the tables. Make sure to not to fill any stains.</font></div>', '2.jpg', '2.jpg', '2.jpg', 1200, 'In Stock', '2020-09-12 07:25:57', NULL),
(23, 7, 13, 'Nylon made Floor Carpet', 'Bhadohi Enterprise', 43000, 45000, '&nbsp; Size : 25*15 ft,<div>&nbsp; Color : Brown Color</div><div>&nbsp; Yarn : Nylon,</div><div>&nbsp; Description : It is completely made with nylon and can be used&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;inside the hall. It is not-waterproof carpet.</div>', '10.jpg', '10.jpg', '10.jpg', 1200, 'In Stock', '2020-09-12 07:31:53', NULL),
(24, 7, 13, 'Red Carpet', 'Bhadohi Enterprise', 23000, 0, '&nbsp;<font face=\"comic sans ms\"> Size&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: 7*7 ft,</font><div><font face=\"comic sans ms\">&nbsp; Color&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Red,</font></div><div><font face=\"comic sans ms\">&nbsp; Wool&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Nylon,</font></div><div><font face=\"comic sans ms\">&nbsp; Description : It is made for home. This product is non-waterproof and can be used in your home, office , or anywhere you want.</font></div>', '23.jpg', '23.jpg', '23.jpg', 1400, 'In Stock', '2020-09-12 07:37:12', NULL),
(25, 7, 13, 'Red Egyptian Design Carpet', 'Excellent Carpet', 45000, 0, '<ul><li><font face=\"comic sans ms\"><b>size :</b> 8*5 ft,</font></li><li><font face=\"comic sans ms\"><b>color :</b> Red, black , White , light blue and yellow,</font></li><li><font face=\"comic sans ms\"><b>Yarn :</b> Frieze-cute Pile</font></li><li><font face=\"comic sans ms\"><b>Description : </b>It is a well structured Egyptian method designed carpet.Different colors and shapes used inside this carpet are making this awesome and can be used inside the home. It is non-waterproof carpet.</font>&nbsp;</li></ul>', '15.jpg', '15.jpg', '15.jpg', 1500, 'In Stock', '2020-09-12 07:46:28', NULL),
(26, 7, 15, 'Dark blue Outdoor Carpets', 'Bhadohi Enterprise', 44000, 45000, '<ul style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 0px; list-style: none; color: rgb(102, 102, 102); font-family: Roboto, sans-serif;\"><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">size :</span>&nbsp;10*6 ft,</font></li><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">color :</span>&nbsp;White , Dark blue, yellow, and&nbsp; Grey</font></li><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">Yarn :</span>&nbsp;Frieze-cute Pile, Nylon</font></li><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">Description :&nbsp;</span>It is a well designed carpet.Different colors and shapes used inside this carpet are making this awesome. Specially its blue color. Leaves and flowers shape in light pink color is used to make it awesome. It is water-proof also.</font></li></ul>', 'CI4.PNG', 'CI4.PNG', 'CI4.PNG', 2500, 'In Stock', '2020-09-12 07:55:02', NULL),
(27, 7, 15, 'Dark Blue Carpet', 'The Modern Rugs', 26500, 27000, '<ul style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 0px; list-style: none; color: rgb(102, 102, 102); font-family: Roboto, sans-serif;\"><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">size :</span>&nbsp;5*5 ft,</font></li><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">color :</span>&nbsp;Red, black , White , light blue and yellow,</font></li><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">Yarn :</span>&nbsp;Pet Polyester, Nylon</font></li><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">Description :&nbsp;</span><span style=\"box-sizing: border-box;\">This carpet is used for the outside of the home and can be used anywhere like office, home. It is water-proof and easy to clean.</span></font></li></ul>', 'OC_001.PNG', 'OC_001.PNG', 'OC_001.PNG', 500, 'In Stock', '2020-09-12 10:25:13', NULL),
(28, 7, 15, 'HTYD Printed Carpet', 'Ni-Carpets', 43000, 45000, '<ul style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 0px; list-style: none; color: rgb(102, 102, 102); font-family: Roboto, sans-serif;\"><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">size :</span>&nbsp;8*5 ft,</font></li><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">color :</span>&nbsp;Red, black , White , light blue and yellow,</font></li><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">Yarn :</span>&nbsp;Pet yarn , Nylon , and mixer of another yarns</font></li><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">Description :&nbsp;</span><span style=\"box-sizing: border-box;\">This design is taken from the movie HTYD. It is uses at home and can be used at your shop and another places.It is Water-proof and dragon design make it standard.</span></font></li></ul>', 'Dragon.png', 'Dragon.png', 'Dragon.png', 2000, 'In Stock', '2020-09-12 10:34:11', NULL),
(31, 7, 15, 'Flower Printed Carpets', 'Ni-Carpets', 35500, 36000, '<ul style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 0px; list-style: none; color: rgb(102, 102, 102); font-family: Roboto, sans-serif;\"><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">size :</span>&nbsp;6*5 ft,</font></li><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">color :</span>&nbsp;Pink, light green</font></li><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">Yarn :</span>&nbsp;Pet Yarn, Nylon</font></li><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">Description :&nbsp;</span><span style=\"box-sizing: border-box;\">Flowers on this carpet make are making it awesome and adorable. Different combination colors have been used but mostly Pink.</span></font></li></ul>', 'roseFlower.PNG', 'PC_003.PNG', 'PC_003.PNG', 1200, 'In Stock', '2020-09-12 10:46:32', NULL),
(32, 7, 15, 'Red Rose Carpet', 'Ni-Carpets', 35500, 36600, '<ul style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 0px; list-style: none; color: rgb(102, 102, 102); font-family: Roboto, sans-serif;\"><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">size :</span>&nbsp;6*5 ft,</font></li><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">color :</span>&nbsp;Red</font></li><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">Yarn :</span>&nbsp;Pet Yarn, Nylon</font></li><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">Description :&nbsp;</span><span style=\"box-sizing: border-box;\">Flowers on this carpet make are making it awesome and adorable. Red colors have been used. This can be used inside the home, or at your workspace.</span></font></li></ul>', 'Red Rose.PNG', 'Red Rose.PNG', 'Red Rose.PNG', 1200, 'In Stock', '2020-09-12 10:49:45', NULL),
(33, 7, 15, 'Skull Printed Carpets', 'Ni-Carpets', 36000, 37000, '<ul style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 0px; list-style: none; color: rgb(102, 102, 102); font-family: Roboto, sans-serif;\"><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">size :</span>&nbsp;6*5 ft,</font></li><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">color :</span>&nbsp;Black, white</font></li><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">Yarn :</span>&nbsp;Pet Yarn, Nylon</font></li><li style=\"box-sizing: border-box;\"><font face=\"comic sans ms\" style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-weight: 700;\">Description :&nbsp;</span><span style=\"box-sizing: border-box;\">It is mostly used at home and for the youth boys.</span></font></li></ul>', 'Skull1.PNG', 'Skull1.PNG', 'Skull1.PNG', 1200, 'In Stock', '2020-09-12 10:53:40', NULL),
(34, 8, 14, 'Grey Mat', 'Vaishanavi Rugs', 3600, 0, '&nbsp;<font face=\"comic sans ms\"><b>size : 3*2 ft;</b></font><div><font face=\"comic sans ms\"><b>&nbsp;Yarn : </b><font color=\"#555555\"><b>Saxony</b></font><b>&nbsp;Cut;</b></font></div><div><font face=\"comic sans ms\"><b>&nbsp;color : Grey;</b></font></div><div><font face=\"comic sans ms\"><b>&nbsp;Description: it is very useful for inside the home. it is non water-proof. Can be used outside of the room or inside of the room, depends on user.&nbsp;</b></font></div><div>&nbsp;</div>', 'images6.jfif', 'images6.jfif', 'images6.jfif', 500, 'In Stock', '2020-09-15 12:53:58', NULL),
(38, 8, 14, 'Circle Star printed mats', 'Vaishanavi Rugs', 4500, 0, '&nbsp;size : 5r;<div>&nbsp;color : white, orange;</div><div>&nbsp;yarn : Nylon, Cut pile;</div><div>&nbsp;Description : This mat is made in circle. Our best makers have prepared this design and can be used anywhere you want to use. It gives your home look awesome and adorable.</div>', 'circle.PNG', 'circle.PNG', 'circle.PNG', 350, 'In Stock', '2020-09-15 13:29:58', NULL),
(41, 8, 14, 'Ocean Printed Mat', 'Excellent Carpets', 4500, 0, '&nbsp;<font face=\"comic sans ms\"><b>size : 3*3 ft;</b></font><div><font face=\"comic sans ms\"><b>&nbsp;yarn : pet yarn, Nylon;</b></font></div><div><font face=\"comic sans ms\"><b>&nbsp;color :white, black, blue, orange, grey;</b></font></div><div><font face=\"comic sans ms\"><b>&nbsp;description : This mat can be used both inside or outside of the house. Basically it is made mostly use for inside the rooms. Its design is very impressive and attractive.</b></font></div>', '25.PNG', '25.PNG', '25.PNG', 360, 'In Stock', '2020-09-15 15:35:12', NULL),
(42, 8, 14, 'Heart Shape Handmade Carpet', 'Vaishanavi Rugs', 5500, 0, '<font face=\"comic sans ms\"><b>&nbsp;size : 4*2 ft;</b></font><div><font face=\"comic sans ms\"><b>&nbsp;yarn : Saxony yarn;</b></font></div><div><font face=\"comic sans ms\"><b>&nbsp;colors : Brown;</b></font></div><div><font face=\"comic sans ms\"><b>&nbsp;Description : It is very impressive and best design. The heart shape of this mat is making it adorable. It is non water-proof and specially made for he uses inside the living rooms or bed room.</b></font></div>', '26.jpg', '26.jpg', '26.jpg', 450, 'In Stock', '2020-09-15 15:42:22', NULL),
(43, 8, 14, 'Red handmade Mat', 'Excellent Carpets', 4000, 0, '&nbsp;size : 2*4 ft;<div>&nbsp;color : red;</div><div>&nbsp;yarn : wool;</div><div>&nbsp;description : It can be used inside the home. it is non water-proof and be careful to get it spotted. It can be used anywhere as like to your home or in room or in your working space.&nbsp;</div>', '27.jfif', '27.jfif', '27.jfif', 250, 'In Stock', '2020-09-15 15:47:50', NULL),
(44, 8, 16, 'Hello Printed mat', 'Excellent Carpets', 3700, 0, '<font face=\"comic sans ms\">&nbsp;size : 2*3 ft;</font><div><font face=\"comic sans ms\">&nbsp;color :wheat, black;</font></div><div><font face=\"comic sans ms\">&nbsp;yarn : Pet yarn;</font></div><div><font face=\"comic sans ms\">&nbsp;description : This is mostly used outside the door to welcome the guests and widely used mat. Colors are used to make it standard and it is water-proof mat.</font></div>', '24.jpg', '24.jpg', '24.jpg', 350, 'In Stock', '2020-09-15 17:04:21', NULL),
(45, 8, 16, 'Whale Printed Carpet', 'Excellent Carpets', 6500, 0, '<font face=\"comic sans ms\"><b>&nbsp;size : 4*2 ft;</b></font><div><font face=\"comic sans ms\"><b>&nbsp;color : violet, black, white;</b></font></div><div><font face=\"comic sans ms\"><b>&nbsp;yarn : pat yarn and nylon;</b></font></div><div><font face=\"comic sans ms\"><b>&nbsp;description : It is specially made for the kids. The whale printing image is giving this awesome look and making it interactive.</b></font>&nbsp;</div>', '28.PNG', '28.PNG', '28.PNG', 350, 'In Stock', '2020-09-15 17:17:27', NULL),
(46, 8, 16, 'PUBG printed mat', 'Excellent Carpets', 6500, 0, '<font face=\"comic sans ms\"><b>&nbsp;size : 3*3 ft;</b></font><div><font face=\"comic sans ms\"><b>&nbsp;color : Multi-colors have been used;</b></font></div><div><font face=\"comic sans ms\"><b>&nbsp;yarn : Pet-yarn and Nylon;</b></font></div><div><font face=\"comic sans ms\"><b>&nbsp;description : This is widely used game and mostly liked mat. This mat is highly demand in market. This is water-proof and can be used anywhere you want;</b></font></div>', '30.jpg', '30.jpg', '30.jpg', 350, 'In Stock', '2020-09-15 17:24:55', NULL),
(47, 8, 16, 'Coffee Printed Mat', 'Vaishanavi Rugs', 3900, 0, '&nbsp;&nbsp;<b><font face=\"comic sans ms\">size : 3*3 ft;</font></b><div><b><font face=\"comic sans ms\">&nbsp;color : yellow, red, and so on;</font></b></div><div><b><font face=\"comic sans ms\">&nbsp;yarn : Pet yarn, Nylon;</font></b></div><div><b><font face=\"comic sans ms\">&nbsp;Description : The coffee cups are making this cool and awesome. This is water-proof carpet and can be used both inside and outside of the home.</font></b>&nbsp;</div>', '29.PNG', '29.PNG', '29.PNG', 250, 'In Stock', '2020-09-15 17:33:30', NULL),
(48, 8, 16, 'Message Printed Mat', 'Vaishanavi Rugs', 4000, 0, '&nbsp;size : 3*4 ft;<div>&nbsp;color : multi-colors;</div><div>&nbsp;yarn : pet yarn and Nylon;</div><div>&nbsp;description : This mat is a message printed mat and water-proof;</div>', '31.PNG', '31.PNG', '31.PNG', 100, 'In Stock', '2020-09-15 17:38:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `special_order`
--

CREATE TABLE `special_order` (
  `s_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `width` float NOT NULL,
  `height` float NOT NULL,
  `qty` int(11) NOT NULL,
  `yarn` int(11) NOT NULL,
  `Amount` double NOT NULL,
  `description` varchar(200) NOT NULL,
  `order_status` char(10) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ship_address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `special_order`
--

INSERT INTO `special_order` (`s_id`, `user_id`, `product_img`, `width`, `height`, `qty`, `yarn`, `Amount`, `description`, `order_status`, `request_date`, `ship_address`) VALUES
(22, 4, '4337.jpg', 6, 6, 1, 8, 26200, 'I want you to design this as it is looking in the image', '1', '2020-09-16 14:11:13', '');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`) VALUES
(1, 'Uttar Pradesh'),
(2, 'Madhya Pradesh'),
(3, 'Bihar'),
(7, 'Gujarat '),
(9, 'Keral');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(13, 7, 'HandMade Carpets', '2020-09-12 06:39:39', '12-09-2020 04:30:33 PM'),
(14, 8, 'Handmade mats', '2020-09-12 06:39:52', NULL),
(15, 7, ' Printed Carpets', '2020-09-12 06:40:17', '12-09-2020 04:25:04 PM'),
(16, 8, 'Printed mats', '2020-09-12 06:40:26', NULL),
(17, 7, '  3D printed Carpets', '2020-09-15 17:41:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `s_id` int(11) NOT NULL,
  `s_user` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`s_id`, `s_user`) VALUES
(1, 'Nitinofficial231@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `otp` int(10) NOT NULL,
  `otp_date` date NOT NULL DEFAULT current_timestamp(),
  `is_expire` char(10) NOT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `otp`, `otp_date`, `is_expire`, `loginTime`, `logout`, `status`) VALUES
(41, 'Nitin.sinha9178@gmail.com', 47297, '2020-08-30', '0', '2020-08-30 05:31:27', NULL, '0'),
(42, 'Nitin.sinha9178@gmail.com', 64852, '2020-08-30', '1', '2020-08-30 05:48:07', NULL, 'active'),
(43, 'Nitin.sinha9178@gmail.com', 71079, '2020-08-30', '1', '2020-08-30 06:21:59', NULL, 'active'),
(44, 'Nitin.sinha9178@gmail.com', 12189, '2020-08-30', '1', '2020-08-30 13:15:09', NULL, 'active'),
(45, 'Nitin.sinha9178@gmail.com', 23816, '2020-08-30', '1', '2020-08-30 13:25:32', NULL, 'active'),
(46, 'Nitin.sinha9178@gmail.com', 40581, '2020-09-03', '1', '2020-09-03 06:14:34', NULL, 'active'),
(47, 'Nitin.sinha9178@gmail.com', 20453, '2020-09-03', '1', '2020-09-03 06:25:59', NULL, 'active'),
(48, 'Nitin.sinha9178@gmail.com', 40393, '2020-09-03', '1', '2020-09-03 13:00:48', NULL, 'active'),
(49, 'Nitin.sinha9178@gmail.com', 62867, '2020-09-03', '1', '2020-09-03 14:15:56', NULL, 'active'),
(50, 'Nitin.sinha9178@gmail.com', 28930, '2020-09-03', '1', '2020-09-03 15:51:11', NULL, 'active'),
(51, 'Nitin.sinha9178@gmail.com', 74924, '2020-09-04', '1', '2020-09-04 04:30:05', NULL, 'active'),
(52, 'Nitin.sinha9178@gmail.com', 57141, '2020-09-04', '1', '2020-09-04 05:01:58', NULL, 'active'),
(53, 'Nitin.sinha9178@gmail.com', 69594, '2020-09-04', '1', '2020-09-04 05:28:34', NULL, 'active'),
(54, 'Nitin.sinha9178@gmail.com', 96814, '2020-09-04', '1', '2020-09-04 07:55:43', NULL, 'active'),
(55, 'Nitin.sinha9178@gmail.com', 52863, '2020-09-04', '1', '2020-09-04 08:22:57', NULL, 'active'),
(56, 'Nitin.sinha9178@gmail.com', 79661, '2020-09-04', '1', '2020-09-04 08:29:40', NULL, 'active'),
(57, 'Nitin.sinha9178@gmail.com', 31453, '2020-09-04', '1', '2020-09-04 12:24:23', NULL, 'active'),
(58, 'Nitin.sinha9178@gmail.com', 52453, '2020-09-04', '1', '2020-09-04 12:47:23', NULL, 'active'),
(59, 'Nitin.sinha9178@gmail.com', 22763, '2020-09-05', '1', '2020-09-05 04:19:53', NULL, 'active'),
(60, 'Nitin.sinha9178@gmail.com', 88945, '2020-09-05', '1', '2020-09-05 04:57:36', NULL, 'active'),
(61, 'Nitin.sinha9178@gmail.com', 30987, '2020-09-05', '1', '2020-09-05 06:52:07', NULL, 'active'),
(62, 'Nitin.sinha9178@gmail.com', 61411, '2020-09-05', '1', '2020-09-05 07:34:04', NULL, 'active'),
(63, 'Nitin.sinha9178@gmail.com', 56543, '2020-09-06', '1', '2020-09-06 04:45:39', NULL, 'active'),
(64, 'Nitin.sinha9178@gmail.com', 82536, '2020-09-05', '1', '2020-09-05 14:55:29', NULL, 'active'),
(65, 'Nitin.sinha9178@gmail.com', 32276, '2020-09-05', '1', '2020-09-05 15:03:26', NULL, 'active'),
(66, 'Nitin.sinha9178@gmail.com', 24783, '2020-09-05', '1', '2020-09-05 15:33:34', NULL, 'active'),
(67, 'Nitin.sinha9178@gmail.com', 70214, '2020-09-05', '1', '2020-09-05 15:45:43', NULL, 'active'),
(68, 'Nitin.sinha9178@gmail.com', 12137, '2020-09-05', '1', '2020-09-05 15:53:23', NULL, 'active'),
(69, 'Nitin.sinha9178@gmail.com', 55082, '2020-09-05', '1', '2020-09-05 15:56:45', NULL, 'active'),
(70, 'Nitin.sinha9178@gmail.com', 42613, '2020-09-06', '1', '2020-09-06 05:59:29', NULL, 'active'),
(71, 'Nitin.sinha9178@gmail.com', 94428, '2020-09-07', '1', '2020-09-07 05:15:47', NULL, 'active'),
(72, 'Nitin.sinha9178@gmail.com', 43447, '2020-09-07', '1', '2020-09-07 11:49:17', NULL, 'active'),
(73, 'Nitin.sinha9178@gmail.com', 14849, '2020-09-08', '1', '2020-09-08 05:14:57', NULL, 'active'),
(74, 'Nitin.sinha9178@gmail.com', 75338, '2020-09-08', '1', '2020-09-08 05:28:04', NULL, 'active'),
(75, 'Nitin.sinha9178@gmail.com', 67578, '2020-09-08', '1', '2020-09-08 05:36:24', NULL, 'active'),
(76, 'Nitin.sinha9178@gmail.com', 31929, '2020-09-08', '1', '2020-09-08 17:02:05', NULL, 'active'),
(77, 'Nitin.sinha9178@gmail.com', 24974, '2020-09-09', '1', '2020-09-09 13:47:01', NULL, 'active'),
(83, 'Nitin.sinha9178@gmail.com', 56703, '2020-09-10', '1', '2020-09-10 15:20:31', '10-09-2020 09:01:12 PM', 'inactive'),
(84, 'Nitin.sinha9178@gmail.com', 57641, '2020-09-10', '1', '2020-09-10 15:40:38', '10-09-2020 09:11:15 PM', 'inactive'),
(85, 'Nitin.sinha9178@gmail.com', 20777, '2020-09-14', '1', '2020-09-14 06:04:59', '14-09-2020 11:43:00 AM', 'inactive'),
(86, 'Nitin.sinha9178@gmail.com', 98346, '2020-09-16', '1', '2020-09-16 13:48:33', NULL, 'active'),
(87, 'Nitin.sinha9178@gmail.com', 88311, '2020-09-16', '1', '2020-09-16 13:56:40', NULL, 'active'),
(88, 'nitin.sinha9178@gmail.com', 78477, '2020-09-16', '1', '2020-09-16 13:59:27', '16-09-2020 07:34:45 PM', 'inactive'),
(89, 'Nitin.sinha9178@gmail.com', 24811, '2020-09-16', '1', '2020-09-16 14:05:36', NULL, 'active'),
(90, 'Nitin.sinha9178@gmail.com', 62251, '2020-09-19', '1', '2020-09-19 04:13:06', NULL, 'active'),
(91, 'Nitin.sinha9178@gmail.com', 36270, '2020-09-19', '1', '2020-09-19 07:46:18', NULL, 'active'),
(92, 'Nitin.sinha9178@gmail.com', 55070, '2020-09-19', '1', '2020-09-19 10:54:18', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `token` varchar(100) NOT NULL,
  `u_status` char(10) NOT NULL,
  `shippingAddress` longtext DEFAULT NULL,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `billingAddress` longtext DEFAULT NULL,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `token`, `u_status`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `updationDate`) VALUES
(4, 'Nitin Sinha', 'Nitin.sinha9178@gmail.com', 9170928320, '$2y$10$cV.autWQQcfqCQq3oaMb2uDkPrAt09aX6C7f7fWb7sMxus1BxLK4W', 'a1c9278f822163b1953c2cc2be4c1e', 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-27 14:02:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userId`, `productId`, `postingDate`) VALUES
(5, 4, 9, '2020-08-29 05:45:48'),
(6, 4, 3, '2020-08-29 05:46:07'),
(7, 4, 4, '2020-08-29 05:46:25'),
(8, 4, 12, '2020-08-29 05:47:04'),
(9, 4, 13, '2020-08-29 05:48:01'),
(11, 4, 2, '2020-09-07 10:28:42'),
(12, 4, 15, '2020-09-07 11:07:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `available_yarn`
--
ALTER TABLE `available_yarn`
  ADD PRIMARY KEY (`yarn_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `log_attempt`
--
ALTER TABLE `log_attempt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_order`
--
ALTER TABLE `special_order`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `available_yarn`
--
ALTER TABLE `available_yarn`
  MODIFY `yarn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `log_attempt`
--
ALTER TABLE `log_attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `special_order`
--
ALTER TABLE `special_order`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
