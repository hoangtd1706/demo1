-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 19, 2020 lúc 12:35 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `admin_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_id`, `dep_id`, `admin_phone`, `status`, `created_at`, `updated_at`, `admin_email`) VALUES
(7, 'Trần Văn A', 19, 58, '0987654321', 1, 1603102092, 1603102092, 'atranvan1123@gmail.com'),
(8, 'Trần Thị B', 20, 59, '0987654123', 1, 1603102101, 1603102101, 'btranthi1223@gmail.com'),
(9, 'Nguyễn Văn C', 21, 60, '0987651234', 1, 1603102110, 1603102110, 'cnv1234@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `club`
--

CREATE TABLE `club` (
  `id` int(11) NOT NULL,
  `club_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `club_description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `club`
--

INSERT INTO `club` (`id`, `club_name`, `club_description`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Bóng đá', 'Câu lạc bộ bóng đá', 1, 1603103071, 1603103071),
(6, 'Bóng chuyền', 'Câu lạc bộ bóng chuyền', 1, 1603103099, 1603103099),
(7, 'Bóng bàn', 'Câu lạc bộ bóng bàn', 1, 1603103176, 1603103176),
(8, 'Bóng rổ', 'Câu lạc bộ bóng rổ', 1, 1603103196, 1603103196),
(9, 'Cầu lông', 'Câu lạc bộ cầu lông', 2, 1603103219, 1603103219);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `dep_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dep_desciption` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `department`
--

INSERT INTO `department` (`id`, `dep_name`, `dep_desciption`, `status`, `created_at`, `updated_at`) VALUES
(58, 'Phòng nhân sự', 'Phòng nhân sự', 1, 1603099569, 1603099569),
(59, 'Phòng kế toán', 'Phòng kế toán', 1, 1603099589, 1603099589),
(60, 'Phòng công nghệ', 'Phòng công nghệ', 1, 1603099616, 1603099624),
(61, 'Phòng điều hành', 'Phòng điều hành', 1, 1603099644, 1603099644),
(62, 'Phòng kinh doanh', 'Phòng kinh doanh', 1, 1603099689, 1603099689),
(63, 'Phòng tổ chức hành chính', 'Phòng tổ chức hành chính', 1, 1603099725, 1603102075),
(64, 'Phòng marketing', 'Phòng marketing', 0, 1603099769, 1603099769);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1601438932),
('m130524_201442_init', 1601438935),
('m190124_110200_add_verification_token_column_to_user_table', 1601438935),
('m201001_035050_staff', 1602580184),
('m201013_025949_admin', 1602580250),
('m201013_030007_club', 1602580250),
('m201013_030120_staffNclub', 1602580253);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `query` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `col_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `col_type` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `col_length` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `col_default` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `settings_data` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `export_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `template_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `template_data` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `tables` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `item_type` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `db_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `table_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `tables` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Recently accessed tables';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `db_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `table_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `prefs` text COLLATE utf8_unicode_ci NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `table_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_unicode_ci NOT NULL,
  `schema_sql` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_unicode_ci DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='User preferences storage for phpMyAdmin';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `tab` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Users and their assignments to user groups';

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `staff_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `staff_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `staff_tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dep_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`id`, `staff_name`, `staff_email`, `staff_tel`, `dep_id`, `status`, `created_at`, `updated_at`) VALUES
(19, 'Trần Văn A', 'atranvan1123@gmail.com', '0987654321', 58, 1, 1603099837, 1603099837),
(20, 'Trần Thị B', 'btranthi1223@gmail.com', '0987654123', 59, 1, 1603100507, 1603100507),
(21, 'Nguyễn Văn C', 'cnv1234@gmail.com', '0987651234', 60, 1, 1603100547, 1603100555),
(22, 'Trần Văn D', 'dlv2234@gmail.com', '0987612354', 60, 1, 1603100590, 1603102281),
(23, 'Phạm Bảo A', 'aphambao2334@gmail.com', '0912345678', 61, 1, 1603100957, 1603100957),
(24, 'Lại Huy H', 'hlaihuy@gmail.com', '0912345687', 62, 1, 1603101004, 1603102328),
(25, 'Phan Gia G', 'gphangia3324@gmail.com', '0912387456', 62, 1, 1603101710, 1603102344),
(26, 'Hoàng Thị I', 'iht5564@gmail.com', '0918273345', 63, 1, 1603102225, 1603102365);
(27, 'Hoàng Thị A', 'aht5564@gmail.com', '0918273634', 63, 1, 1603102225, 1603102365);
(28, 'Hoàng Thị S', 'sht5564@gmail.com', '0918273325', 63, 1, 1603102225, 1603102365);
(29, 'Hoàng Thị F', 'fht5564@gmail.com', '0918273565', 63, 1, 1603102225, 1603102365);
(30, 'Hoàng Thị D', 'dht5564@gmail.com', '0918273567', 63, 1, 1603102225, 1603102365);
(31, 'Hoàng Thị G', 'ght5564@gmail.com', '0918273677', 63, 1, 1603102225, 1603102365);
(32, 'Hoàng Thị H', 'hht5564@gmail.com', '0918273666', 63, 1, 1603102225, 1603102365);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staffnclub`
--

CREATE TABLE `staffnclub` (
  `id` int(11) NOT NULL,
  `club_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `staffnclub`
--

INSERT INTO `staffnclub` (`id`, `club_id`, `staff_id`, `created_at`, `updated_at`) VALUES
(62, 5, 19, 1603103111, 1603103111),
(63, 6, 19, 1603103111, 1603103111),
(64, 7, 19, 1603103313, 1603103313),
(65, 8, 19, 1603103313, 1603103313),
(66, 9, 19, 1603103313, 1603103313),
(67, 5, 22, 1603103435, 1603103435),
(68, 7, 22, 1603103435, 1603103435),
(69, 9, 22, 1603103435, 1603103435),
(70, 6, 24, 1603103453, 1603103453),
(71, 8, 24, 1603103453, 1603103453),
(72, 9, 24, 1603103453, 1603103453);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'hoang', 's_ERWU06fugjl2HXypDOmuX4ayg6wCTc', '$2y$13$CpLEOgrC9NILW9GFGiAbHu58yIk4j1Gy.AcvXDZxjFjcKPgTOdTs2', NULL, 'hoangtd1706@gmail.com', 10, 1601438979, 1601438979, 'Nz_g8a08ZpueDoGUucvkUg8P9W-EDoA-_1601438979'),
(2, 'admin', 'hd_T16Cn6yH7EnFvhV2xcgf5SO4qLGcN', '$2y$13$pB/tAw2jNYx2tBUzMWml9OPXO65v7DgXwcZ21WPVR1PbNUz7Wt78u', NULL, 'hoang@gmail.com', 10, 1601439123, 1601439123, 'tcDedZk3Et3aaHWLuCFYe_1KnsgpA1ex_1601439123'),
(3, 'hoangne', 'EvzWhcgGT09SSgsRgRbmpmYIIeFocq5f', '$2y$13$mB4UjQsC3e7ZyfOq.//EWO2MnvZ/7kTLy9kkgken8JRGwHYetKnUq', NULL, 'trananhhoang6699@gmail.com', 10, 1601957931, 1601957963, 'WuQ7xwKN6Av_hDWHdtkik2n4w3HkkNhJ_1601957931');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_id` (`admin_id`),
  ADD UNIQUE KEY `dep_id` (`dep_id`);

--
-- Chỉ mục cho bảng `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dep_name` (`dep_name`);

--
-- Chỉ mục cho bảng `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Chỉ mục cho bảng `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Chỉ mục cho bảng `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Chỉ mục cho bảng `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Chỉ mục cho bảng `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Chỉ mục cho bảng `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Chỉ mục cho bảng `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Chỉ mục cho bảng `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Chỉ mục cho bảng `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Chỉ mục cho bảng `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Chỉ mục cho bảng `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Chỉ mục cho bảng `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Chỉ mục cho bảng `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Chỉ mục cho bảng `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Chỉ mục cho bảng `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_email` (`staff_email`),
  ADD KEY `fk_staff_department` (`dep_id`);

--
-- Chỉ mục cho bảng `staffnclub`
--
ALTER TABLE `staffnclub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_staffnclub_club` (`club_id`),
  ADD KEY `FK_staffnclub_staff` (`staff_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `club`
--
ALTER TABLE `club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `staffnclub`
--
ALTER TABLE `staffnclub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_department` FOREIGN KEY (`dep_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `fk_admin_staff` FOREIGN KEY (`admin_id`) REFERENCES `staff` (`id`);

--
-- Các ràng buộc cho bảng `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `fk_staff_department` FOREIGN KEY (`dep_id`) REFERENCES `department` (`id`);

--
-- Các ràng buộc cho bảng `staffnclub`
--
ALTER TABLE `staffnclub`
  ADD CONSTRAINT `FK_staffnclub_club` FOREIGN KEY (`club_id`) REFERENCES `club` (`id`),
  ADD CONSTRAINT `FK_staffnclub_staff` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
