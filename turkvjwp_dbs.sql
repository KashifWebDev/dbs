-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2021 at 01:32 AM
-- Server version: 10.3.31-MariaDB-log-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `turkvjwp_dbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `custom_add_sections`
--

CREATE TABLE `custom_add_sections` (
  `id` int(11) NOT NULL,
  `device_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `sec1` varchar(200) NOT NULL,
  `sec1_type` varchar(200) NOT NULL,
  `sec2` varchar(200) NOT NULL,
  `sec2_type` varchar(200) NOT NULL,
  `sec3` varchar(200) NOT NULL,
  `sec3_type` varchar(200) NOT NULL,
  `sec4` varchar(200) NOT NULL,
  `sec4_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom_add_sections`
--

INSERT INTO `custom_add_sections` (`id`, `device_id`, `name`, `type`, `sec1`, `sec1_type`, `sec2`, `sec2_type`, `sec3`, `sec3_type`, `sec4`, `sec4_type`) VALUES
(1, 56, '', '', '11', '22', '22', 'Bar', '33', 'Meter', '44', 'Light'),
(2, 57, '', '', '', '', '', '', '', '', '', ''),
(3, 58, '', '', '', '', '', '', '', '', '', ''),
(4, 59, '', '', '', '', '', '', '', '', '', ''),
(5, 60, '', '', '', '', '', '', '', '', '', ''),
(6, 61, '', '', '', '', '', '', '', '', '', ''),
(7, 62, '', '', '', '', '', '', '', '', '', ''),
(8, 63, '', '', '', '', '', '', '', '', '', ''),
(9, 64, '', '', '', '', '', '', '', '', '', ''),
(10, 65, '', '', '', '', '', 'Light', '', 'Light', '', 'Light');

-- --------------------------------------------------------

--
-- Table structure for table `custom_alerts`
--

CREATE TABLE `custom_alerts` (
  `id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `today_check` varchar(50) NOT NULL DEFAULT 'on',
  `today_title` varchar(50) NOT NULL DEFAULT 'Today',
  `last_7_check` varchar(50) NOT NULL DEFAULT 'on',
  `last_7_title` varchar(50) NOT NULL DEFAULT 'Last 7 Days',
  `last_mnth_check` varchar(50) NOT NULL DEFAULT 'on',
  `last_mnth_title` varchar(50) NOT NULL DEFAULT 'Last Month',
  `last_6mnth_check` varchar(50) NOT NULL DEFAULT 'on',
  `last_6mnth_title` varchar(50) NOT NULL DEFAULT 'Last Six Months'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custom_alerts`
--

INSERT INTO `custom_alerts` (`id`, `device_id`, `today_check`, `today_title`, `last_7_check`, `last_7_title`, `last_mnth_check`, `last_mnth_title`, `last_6mnth_check`, `last_6mnth_title`) VALUES
(1, 0, 'on', 'Todayx', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(10, 40, 'on', 'Todayx', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(11, 41, '', '<br /><b>Warning</b>:  Trying to access array offs', '', '<br /><b>Warning</b>:  Trying to access array offs', '', '<br /><b>Warning</b>:  Trying to access array offs', '', '<br /><b>Warning</b>:  Trying to access array offs'),
(12, 42, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(13, 43, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(14, 44, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(15, 45, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(16, 46, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(17, 47, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(18, 48, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(19, 49, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(20, 50, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(21, 51, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(22, 52, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(23, 53, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(24, 54, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(25, 55, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(26, 56, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(27, 57, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(28, 58, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(29, 59, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(30, 60, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(31, 61, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(32, 62, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(33, 63, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(34, 64, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months'),
(35, 65, 'on', 'Today', 'on', 'Last 7 Days', 'on', 'Last Month', 'on', 'Last Six Months');

-- --------------------------------------------------------

--
-- Table structure for table `custom_conditions`
--

CREATE TABLE `custom_conditions` (
  `id` int(11) NOT NULL,
  `device_id` int(10) NOT NULL,
  `tempGreater` int(10) NOT NULL DEFAULT 1,
  `tempLoss` int(10) NOT NULL DEFAULT 0,
  `alarmGreater` int(10) NOT NULL DEFAULT 1,
  `alarmLess` int(10) NOT NULL DEFAULT 0,
  `waterInOilGreater` int(10) NOT NULL DEFAULT 1,
  `waterInOilLess` int(10) NOT NULL DEFAULT 0,
  `lossMotionGreater` int(10) NOT NULL DEFAULT 1,
  `lossMotionLess` int(10) NOT NULL DEFAULT 0,
  `liftPositionGreater` int(10) NOT NULL DEFAULT 1,
  `liftPositionLower` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom_conditions`
--

INSERT INTO `custom_conditions` (`id`, `device_id`, `tempGreater`, `tempLoss`, `alarmGreater`, `alarmLess`, `waterInOilGreater`, `waterInOilLess`, `lossMotionGreater`, `lossMotionLess`, `liftPositionGreater`, `liftPositionLower`) VALUES
(1, 46, 1, 2, 3, 4, 5, 6, 7, 8, 9, 0),
(2, 47, 1, 0, 1, 0, 1, 5, 1, 0, 1, 0),
(3, 48, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(4, 49, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(5, 50, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(6, 51, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(7, 52, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(8, 53, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(9, 54, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(10, 55, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(11, 56, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(12, 57, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(13, 58, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(14, 59, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(15, 60, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(16, 61, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(17, 62, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(18, 63, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(19, 64, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0),
(20, 65, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `custom_dashboards`
--

CREATE TABLE `custom_dashboards` (
  `id` int(11) NOT NULL,
  `device_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `dashboardName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `email1` varchar(200) NOT NULL,
  `email2` varchar(200) NOT NULL,
  `email3` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom_dashboards`
--

INSERT INTO `custom_dashboards` (`id`, `device_id`, `user_id`, `dashboardName`, `email`, `email1`, `email2`, `email3`) VALUES
(20, 44, 2, 'dashboard Name Here', 'kashifkhan@loketa.com', '', '', ''),
(21, 45, 0, '', '', '', '', ''),
(22, 46, 2, 'dashboard Name Here', 'kashifkhan@loketa.com', '', '', ''),
(23, 47, 2, 'dashboard Name Here', 'kashifkhan@loketa.com', '', '', ''),
(24, 48, 2, 'dashboard Name Here', 'kashifkhan@loketa.com', '', '', ''),
(25, 49, 0, '', '', '', '', ''),
(26, 50, 0, '', '', '', '', ''),
(27, 51, 0, '', '', '', '', ''),
(28, 52, 0, '', '', '', '', ''),
(29, 53, 0, '', '', '', '', ''),
(30, 54, 0, '', '1', '2', '3', '4'),
(31, 55, 0, '', '', '', '', ''),
(32, 56, 0, 'sadfsadfasdfasd', '', '', '', ''),
(33, 57, 0, '', '', '', '', ''),
(34, 58, 0, '', '', '', '', ''),
(35, 59, 0, '', '', '', '', ''),
(36, 60, 0, '', '', '', '', ''),
(37, 61, 0, '', '', '', '', ''),
(38, 62, 0, '', '', '', '', ''),
(39, 63, 0, '', '', '', '', ''),
(40, 64, 0, '', '', '', '', ''),
(41, 65, 0, 'Testing Device', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `custom_devicestatus`
--

CREATE TABLE `custom_devicestatus` (
  `id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `a1` varchar(2) NOT NULL DEFAULT 'on',
  `a2` varchar(2) NOT NULL DEFAULT 'on',
  `a3` varchar(2) NOT NULL DEFAULT 'on',
  `a4` varchar(2) NOT NULL DEFAULT 'on',
  `a5` varchar(2) NOT NULL DEFAULT 'on',
  `a6` varchar(2) NOT NULL DEFAULT 'on',
  `a7` varchar(2) NOT NULL DEFAULT 'on',
  `a8` varchar(2) NOT NULL DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custom_devicestatus`
--

INSERT INTO `custom_devicestatus` (`id`, `device_id`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`) VALUES
(1, 0, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(10, 40, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(11, 41, '', '', '', '', '', '', '', ''),
(12, 42, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(13, 43, '', '', '', '', '', '', '', ''),
(14, 44, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(15, 45, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(16, 46, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(17, 47, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(18, 48, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(19, 49, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(20, 50, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(21, 51, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(22, 52, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(23, 53, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(24, 54, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(25, 55, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(26, 56, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(27, 57, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(28, 58, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(29, 59, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(30, 60, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(31, 61, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(32, 62, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(33, 63, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(34, 64, 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'on'),
(35, 65, 'on', '', '', '', '', '', '', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `custom_graph`
--

CREATE TABLE `custom_graph` (
  `id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `graph_title` varchar(30) NOT NULL DEFAULT 'TORQUE HISTORY',
  `line_color` varchar(20) NOT NULL DEFAULT '#009cde',
  `line_name` varchar(20) NOT NULL DEFAULT 'Torque',
  `y_unit` varchar(20) NOT NULL DEFAULT 'FT-LBS',
  `line1` varchar(50) NOT NULL,
  `line1_value` int(50) NOT NULL,
  `line2` varchar(50) NOT NULL,
  `line2_value` int(50) NOT NULL,
  `line3` varchar(500) NOT NULL,
  `line3_value` int(50) NOT NULL,
  `line4` varchar(500) NOT NULL,
  `line4_value` int(50) NOT NULL,
  `line1_clr` varchar(50) NOT NULL DEFAULT '#FF0000',
  `line2_clr` varchar(50) NOT NULL DEFAULT '#FF0000',
  `line3_clr` varchar(50) NOT NULL DEFAULT '#FF0000',
  `line4_clr` varchar(50) NOT NULL DEFAULT '#FF0000',
  `show_legends` varchar(10) NOT NULL,
  `legends1` varchar(10) NOT NULL,
  `legends2` varchar(10) NOT NULL,
  `legends3` varchar(10) NOT NULL,
  `legends4` varchar(10) NOT NULL,
  `legends5` varchar(10) NOT NULL,
  `legends6` varchar(10) NOT NULL,
  `legends1_txt` varchar(1000) DEFAULT '',
  `legends2_txt` varchar(1000) DEFAULT '',
  `legends3_txt` varchar(1000) NOT NULL DEFAULT '',
  `legends4_txt` varchar(1000) NOT NULL,
  `legends5_txt` varchar(1000) NOT NULL DEFAULT '',
  `legends6_txt` varchar(10) NOT NULL DEFAULT '',
  `legends1_type` varchar(1000) NOT NULL DEFAULT '',
  `legends2_type` varchar(1000) NOT NULL DEFAULT '',
  `legends3_type` varchar(1000) NOT NULL DEFAULT '',
  `legends4_type` varchar(1000) NOT NULL DEFAULT '',
  `legends5_type` varchar(1000) NOT NULL DEFAULT '',
  `legends6_type` varchar(10) NOT NULL DEFAULT '',
  `analogue1` varchar(11) NOT NULL,
  `analogue2` varchar(11) NOT NULL,
  `analogue3` varchar(11) NOT NULL,
  `analogue4` varchar(11) NOT NULL,
  `analogue5` varchar(11) NOT NULL,
  `analogue6` varchar(11) NOT NULL,
  `analogue1_txt` varchar(11) NOT NULL DEFAULT '',
  `analogue2_txt` varchar(11) NOT NULL DEFAULT '',
  `analogue3_txt` varchar(11) NOT NULL DEFAULT '',
  `analogue4_txt` varchar(11) NOT NULL DEFAULT '',
  `analogue5_txt` varchar(11) NOT NULL DEFAULT '',
  `analogue6_txt` varchar(11) NOT NULL DEFAULT '',
  `analogue1_type` varchar(11) NOT NULL DEFAULT '',
  `analogue2_type` varchar(11) NOT NULL DEFAULT '',
  `analogue3_type` varchar(11) NOT NULL DEFAULT '',
  `analogue4_type` varchar(11) NOT NULL DEFAULT '',
  `analogue5_type` varchar(11) NOT NULL DEFAULT '',
  `analogue6_type` varchar(11) NOT NULL DEFAULT '',
  `analoge_unit_1` varchar(20) NOT NULL,
  `analoge_unit_2` varchar(20) NOT NULL,
  `analoge_unit_3` varchar(20) NOT NULL,
  `analoge_unit_4` varchar(20) NOT NULL,
  `analoge_unit_5` varchar(20) NOT NULL,
  `analoge_unit_6` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custom_graph`
--

INSERT INTO `custom_graph` (`id`, `device_id`, `graph_title`, `line_color`, `line_name`, `y_unit`, `line1`, `line1_value`, `line2`, `line2_value`, `line3`, `line3_value`, `line4`, `line4_value`, `line1_clr`, `line2_clr`, `line3_clr`, `line4_clr`, `show_legends`, `legends1`, `legends2`, `legends3`, `legends4`, `legends5`, `legends6`, `legends1_txt`, `legends2_txt`, `legends3_txt`, `legends4_txt`, `legends5_txt`, `legends6_txt`, `legends1_type`, `legends2_type`, `legends3_type`, `legends4_type`, `legends5_type`, `legends6_type`, `analogue1`, `analogue2`, `analogue3`, `analogue4`, `analogue5`, `analogue6`, `analogue1_txt`, `analogue2_txt`, `analogue3_txt`, `analogue4_txt`, `analogue5_txt`, `analogue6_txt`, `analogue1_type`, `analogue2_type`, `analogue3_type`, `analogue4_type`, `analogue5_type`, `analogue6_type`, `analoge_unit_1`, `analoge_unit_2`, `analoge_unit_3`, `analoge_unit_4`, `analoge_unit_5`, `analoge_unit_6`) VALUES
(27, 57, 'TORQUE HISTORY', '#009cde', 'Torque', 'FT-LBS', '', 0, '', 0, '', 0, '', 0, '#FF0000', '#FF0000', '#FF0000', '#FF0000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, 58, 'TORQUE HISTORY', '#009cde', 'Torque', 'FT-LBS', '', 0, '', 0, '', 0, '', 0, '#FF0000', '#FF0000', '#FF0000', '#FF0000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(29, 59, 'TORQUE HISTORY', '#009cde', 'Torque', 'FT-LBS', '', 0, '', 0, '', 0, '', 0, '#FF0000', '#FF0000', '#FF0000', '#FF0000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(30, 60, 'TORQUE HISTORY', '#009cde', 'Torque', 'FT-LBS', '', 0, '', 0, '', 0, '', 0, '#FF0000', '#FF0000', '#FF0000', '#FF0000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(31, 61, 'TORQUE HISTORY', '#009cde', 'Torque', 'FT-LBS', '', 0, '', 0, '', 0, '', 0, '#FF0000', '#FF0000', '#FF0000', '#FF0000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(32, 62, 'TORQUE HISTORY', '#009cde', 'Torque', 'FT-LBS', '', 0, '', 0, '', 0, '', 0, '#FF0000', '#FF0000', '#FF0000', '#FF0000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(33, 63, 'TORQUE HISTORY', '#009cde', 'Torque', 'FT-LBS', '', 0, '', 0, '', 0, '', 0, '#FF0000', '#FF0000', '#FF0000', '#FF0000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(34, 64, 'TORQUE HISTORY', '#009cde', 'Torque', 'FT-LBS', '', 0, '', 0, '', 0, '', 0, '#FF0000', '#FF0000', '#FF0000', '#FF0000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(35, 65, 'Graph', '#009cde', 'Torque', 'FT-LBS', 'marker1', 1000, 'marker2', 2000, 'marker3', 3000, 'marker4', 8000, '#ff0000', '#00ff08', '#1100ff', '#ff00f7', 'on', 'on', 'on', 'on', 'on', 'on', 'on', 'Digital 1', 'Digital 4', 'Digital 2', 'Digital 5', 'Digital 3', 'Digital 6', 'legends1', 'legends2', 'legends3', 'legends4', 'legends5', 'legends6', 'on', 'on', 'on', 'on', 'on', 'on', '11', '22', '33', '44', '55', '66', 'analogue1', 'analogue2', 'analogue3', 'analogue4', 'analogue5', 'analogue6', 'Nm', 'Amp', '', 'in', 'ft-Lbs', 'mm');

-- --------------------------------------------------------

--
-- Table structure for table `custom_installation_info`
--

CREATE TABLE `custom_installation_info` (
  `id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `drive_model_check` varchar(20) NOT NULL DEFAULT 'on',
  `drive_model_title` varchar(50) NOT NULL DEFAULT 'Drive Model',
  `drive_rating_check` varchar(20) NOT NULL DEFAULT 'on',
  `drive_rating_title` varchar(50) NOT NULL DEFAULT 'Driver Continuous Rating',
  `drive_speed_check` varchar(20) NOT NULL DEFAULT 'on',
  `drive_speed_title` varchar(50) NOT NULL DEFAULT 'Output Speed',
  `drive_motor_check` varchar(20) NOT NULL DEFAULT 'on',
  `drive_motor_title` varchar(50) NOT NULL DEFAULT 'Electric Motor Rake',
  `drive_lift_check` varchar(20) NOT NULL DEFAULT 'on',
  `drive_lift_title` varchar(50) NOT NULL DEFAULT 'Electric Motor Lift',
  `drive_service_check` varchar(20) NOT NULL DEFAULT 'on',
  `drive_service_title` varchar(50) NOT NULL DEFAULT 'In Service Since',
  `driver_sn_check` varchar(20) NOT NULL DEFAULT 'on',
  `driver_sn_title` varchar(50) NOT NULL DEFAULT 'Driver SN',
  `driver_user_check` varchar(20) NOT NULL DEFAULT 'on',
  `driver_user_title` varchar(50) NOT NULL DEFAULT 'End User',
  `driver_installation_check` varchar(20) NOT NULL DEFAULT 'on',
  `driver_installation_title` varchar(50) NOT NULL DEFAULT 'Installation',
  `driver_process_check` varchar(20) NOT NULL DEFAULT 'on',
  `driver_process_title` varchar(50) NOT NULL DEFAULT 'Process',
  `driver_size_check` varchar(20) NOT NULL DEFAULT 'on',
  `driver_size_title` varchar(50) NOT NULL DEFAULT 'Basin Size (diameter)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custom_installation_info`
--

INSERT INTO `custom_installation_info` (`id`, `device_id`, `drive_model_check`, `drive_model_title`, `drive_rating_check`, `drive_rating_title`, `drive_speed_check`, `drive_speed_title`, `drive_motor_check`, `drive_motor_title`, `drive_lift_check`, `drive_lift_title`, `drive_service_check`, `drive_service_title`, `driver_sn_check`, `driver_sn_title`, `driver_user_check`, `driver_user_title`, `driver_installation_check`, `driver_installation_title`, `driver_process_check`, `driver_process_title`, `driver_size_check`, `driver_size_title`) VALUES
(1, 0, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(15, 45, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(16, 46, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(17, 47, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(18, 48, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(19, 49, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(20, 50, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(21, 51, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(22, 52, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(23, 53, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(24, 54, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(25, 55, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(26, 56, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(27, 57, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(28, 58, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(29, 59, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(30, 60, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(31, 61, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(32, 62, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(33, 63, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(34, 64, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)'),
(35, 65, 'on', 'Drive Model', 'on', 'Driver Continuous Rating', 'on', 'Output Speed', 'on', 'Electric Motor Rake', 'on', 'Electric Motor Lift', 'on', 'In Service Since', 'on', 'Driver SN', 'on', 'End User', 'on', 'Installation', 'on', 'Process', 'on', 'Basin Size (diameter)');

-- --------------------------------------------------------

--
-- Table structure for table `custom_maintenance`
--

CREATE TABLE `custom_maintenance` (
  `id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `last_oil_change_main_check` varchar(50) NOT NULL DEFAULT 'on',
  `last_oil_change_main_title` varchar(50) NOT NULL DEFAULT ' Last Oil Change (main gear)',
  `next_oil_change_main_check` varchar(50) NOT NULL DEFAULT 'on',
  `next_oil_change_main_title` varchar(50) NOT NULL DEFAULT 'Next Oil Change (main gear)',
  `last_oil_lift_check` varchar(50) NOT NULL DEFAULT 'on',
  `last_oil_lift_title` varchar(50) NOT NULL DEFAULT 'Last Oil Change (lift PU)',
  `next_oil_lift_check` varchar(50) NOT NULL DEFAULT 'on',
  `next_oil_lift_title` varchar(50) NOT NULL DEFAULT 'Next Oil Change (lift PU)',
  `next_service_check` varchar(50) NOT NULL DEFAULT 'on',
  `next_service_title` varchar(50) NOT NULL DEFAULT 'Next Schedule Service',
  `dbs_warranty_check` varchar(50) NOT NULL DEFAULT 'on',
  `dbs_warranty_title` varchar(50) NOT NULL DEFAULT 'DBS Warranty',
  `last_repair_check` varchar(50) NOT NULL DEFAULT 'on',
  `last_repair_title` varchar(50) NOT NULL DEFAULT 'Last Repair(INC #)',
  `parts_repaired_check` varchar(50) NOT NULL DEFAULT 'on',
  `parts_repaired_title` varchar(50) NOT NULL DEFAULT 'Parts Repaired'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `custom_maintenance`
--

INSERT INTO `custom_maintenance` (`id`, `device_id`, `last_oil_change_main_check`, `last_oil_change_main_title`, `next_oil_change_main_check`, `next_oil_change_main_title`, `last_oil_lift_check`, `last_oil_lift_title`, `next_oil_lift_check`, `next_oil_lift_title`, `next_service_check`, `next_service_title`, `dbs_warranty_check`, `dbs_warranty_title`, `last_repair_check`, `last_repair_title`, `parts_repaired_check`, `parts_repaired_title`) VALUES
(1, 0, 'on', 'Next Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Driver Continuous Rating', 'on', 'days', 'on', 'Time Interval', 'on', 'DBS Warrantyr', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(10, 40, 'on', 'Next Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Driver Continuous Rating', 'on', 'days', 'on', 'Time Interval', 'on', 'DBS Warrantyr', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(11, 41, '', '<br /><b>Warning</b>:  Trying to access array offs', '', '<br /><b>Warning</b>:  Trying to access array offs', '', '<br /><b>Warning</b>:  Trying to access array offs', '', '<br /><b>Warning</b>:  Trying to access array offs', '', '<br /><b>Warning</b>:  Trying to access array offs', '', '<br /><b>Warning</b>:  Trying to access array offs', '', '<br /><b>Warning</b>:  Trying to access array offs', '', '<br /><b>Warning</b>:  Trying to access array offs'),
(12, 42, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(13, 43, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(14, 44, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(15, 45, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(16, 46, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(17, 47, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(18, 48, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(19, 49, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(20, 50, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(21, 51, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(22, 52, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(23, 53, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(24, 54, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(25, 55, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(26, 56, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(27, 57, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(28, 58, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(29, 59, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(30, 60, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(31, 61, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(32, 62, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(33, 63, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(34, 64, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired'),
(35, 65, 'on', ' Last Oil Change (main gear)', 'on', 'Next Oil Change (main gear)', 'on', 'Last Oil Change (lift PU)', 'on', 'Next Oil Change (lift PU)', 'on', 'Next Schedule Service', 'on', 'DBS Warranty', 'on', 'Last Repair(INC #)', 'on', 'Parts Repaired');

-- --------------------------------------------------------

--
-- Table structure for table `custom_sections`
--

CREATE TABLE `custom_sections` (
  `id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `device_settings_check` varchar(50) NOT NULL DEFAULT 'on',
  `torque_gauge_check` varchar(50) NOT NULL DEFAULT 'on',
  `graph_check` varchar(50) NOT NULL DEFAULT 'on',
  `installation_info_check` varchar(50) NOT NULL DEFAULT 'on',
  `alerts_check` varchar(50) NOT NULL DEFAULT 'on',
  `maintenance_check` varchar(50) NOT NULL DEFAULT 'on',
  `installation_info_title` varchar(50) NOT NULL DEFAULT 'INSTALLATION INFORMATION',
  `alerts_title` varchar(50) NOT NULL DEFAULT 'ALERTS',
  `maintenance_title` varchar(50) NOT NULL DEFAULT 'MAINTENANCE RECORD',
  `device_settings_title` varchar(50) NOT NULL DEFAULT 'Device Settings',
  `graph_title` varchar(50) NOT NULL DEFAULT 'Graph',
  `torque_title` varchar(50) NOT NULL DEFAULT 'Torque Gauge',
  `relays_title` varchar(1000) NOT NULL DEFAULT 'Relays Status',
  `relays_check` varchar(10) NOT NULL DEFAULT '',
  `vertical_bar_channel` varchar(100) NOT NULL DEFAULT 'analogue1',
  `temp_channel` varchar(100) NOT NULL DEFAULT 'analogue1',
  `torque_channel` varchar(100) NOT NULL DEFAULT 'tor1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custom_sections`
--

INSERT INTO `custom_sections` (`id`, `device_id`, `device_settings_check`, `torque_gauge_check`, `graph_check`, `installation_info_check`, `alerts_check`, `maintenance_check`, `installation_info_title`, `alerts_title`, `maintenance_title`, `device_settings_title`, `graph_title`, `torque_title`, `relays_title`, `relays_check`, `vertical_bar_channel`, `temp_channel`, `torque_channel`) VALUES
(1, 65, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFO', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', '', 'analogue1', 'analogue1', 'tor1'),
(11, 40, 'on', 'on', '', 'on', 'on', 'on', 'INSTALLATION INFO', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(12, 41, '', 'on', '', '', 'on', '', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(13, 42, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(14, 43, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(15, 44, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(16, 45, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(17, 46, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(18, 47, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(19, 48, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(20, 49, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(21, 50, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(22, 51, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(23, 52, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(24, 53, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(25, 54, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(26, 55, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(27, 56, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(28, 57, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(29, 58, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(30, 59, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(31, 60, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(32, 61, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(33, 62, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(34, 63, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(35, 64, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFORMATION', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', 'on', 'analogue1', 'analogue1', 'tor1'),
(36, 65, 'on', 'on', 'on', 'on', 'on', 'on', 'INSTALLATION INFO', 'ALERTS', 'MAINTENANCE RECORD', 'Device Settings', 'Graph', 'Torque Gauge', 'Relays Status', '', 'analogue1', 'analogue1', 'tor1');

-- --------------------------------------------------------

--
-- Table structure for table `custom_vertical_bar`
--

CREATE TABLE `custom_vertical_bar` (
  `id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT 'Lift Position',
  `maxRange` int(20) NOT NULL DEFAULT 100,
  `unit` varchar(10) NOT NULL DEFAULT '%'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custom_vertical_bar`
--

INSERT INTO `custom_vertical_bar` (`id`, `device_id`, `name`, `maxRange`, `unit`) VALUES
(1, 48, 'Lift Position', 24, 'nm'),
(2, 63, 'Lift Bar', 100, '%'),
(3, 64, 'Lift Bar', 100, '%'),
(4, 65, 'Lift Bar', 24, '%');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_units`
--

CREATE TABLE `dashboard_units` (
  `id` int(11) NOT NULL,
  `device_id` int(50) NOT NULL,
  `temp` varchar(50) NOT NULL DEFAULT 'f',
  `torque` varchar(50) NOT NULL DEFAULT 'ft-lbs',
  `pressure` varchar(50) NOT NULL DEFAULT 'bar',
  `distance` varchar(50) NOT NULL DEFAULT 'mm',
  `time_format` int(2) NOT NULL DEFAULT 12,
  `time_zone` varchar(100) NOT NULL DEFAULT 'Asia/Karachi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dashboard_units`
--

INSERT INTO `dashboard_units` (`id`, `device_id`, `temp`, `torque`, `pressure`, `distance`, `time_format`, `time_zone`) VALUES
(1, 0, 'c', 'ft-lbs', 'bar', 'in', 24, 'Asia/Karachi'),
(2, 40, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(3, 41, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(4, 42, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(5, 43, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(6, 44, 'c', 'nm', 'psi', 'in', 24, 'Asia/Karachi'),
(7, 45, 'c', 'nm', 'pa', 'in', 24, 'Asia/Karachi'),
(8, 46, 'f', 'nm', 'bar', 'in', 12, 'Asia/Karachi'),
(9, 47, 'c', 'nm', 'psi', 'in', 24, 'Asia/Karachi'),
(10, 48, 'c', 'ft-lbs', 'bar', 'mm', 24, 'Greenland'),
(11, 49, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(12, 50, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(13, 51, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(14, 52, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(15, 53, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(16, 54, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(17, 55, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(18, 56, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(19, 57, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(20, 58, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(21, 59, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(22, 60, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(23, 61, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(24, 62, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(25, 63, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(26, 64, 'f', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi'),
(27, 65, 'c', 'ft-lbs', 'bar', 'mm', 12, 'Asia/Karachi');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `mac` varchar(20) NOT NULL,
  `device_name` varchar(30) NOT NULL,
  `second_name` varchar(100) NOT NULL,
  `meter_ranges` varchar(100) NOT NULL,
  `meter_range_1` int(11) NOT NULL,
  `meter_range_2` int(11) NOT NULL,
  `meter_range_3` int(11) NOT NULL,
  `meter_color_1` varchar(20) NOT NULL,
  `meter_color_2` varchar(20) NOT NULL,
  `meter_color_3` varchar(20) NOT NULL,
  `manual` varchar(100) NOT NULL,
  `primary_logo` varchar(1000) NOT NULL DEFAULT 'dbs.png',
  `secondary_logo` varchar(1000) NOT NULL,
  `use_secondary_logo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `mac`, `device_name`, `second_name`, `meter_ranges`, `meter_range_1`, `meter_range_2`, `meter_range_3`, `meter_color_1`, `meter_color_2`, `meter_color_3`, `manual`, `primary_logo`, `secondary_logo`, `use_secondary_logo`) VALUES
(65, 'testing:mac', 'Testing Device', 'second name', '0, 2500, 5000, 7500, 10000, 12500, 15000, 17500, 20000', 6000, 12000, 18000, '#85ff89', '#7075ff', '#ff7575', 'add_student.png', 'dbs.png', 'add_student.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `installation_info`
--

CREATE TABLE `installation_info` (
  `id` int(11) NOT NULL,
  `mac` varchar(30) NOT NULL,
  `driver_model` varchar(30) NOT NULL,
  `driver_rating` varchar(30) NOT NULL,
  `speed` varchar(30) NOT NULL,
  `electric_rate` varchar(30) NOT NULL,
  `electric_lift` varchar(30) NOT NULL,
  `driver_sn` varchar(30) NOT NULL,
  `end_user` varchar(30) NOT NULL,
  `installation` varchar(30) NOT NULL,
  `process` varchar(30) NOT NULL,
  `basin_size` varchar(30) NOT NULL,
  `service_since` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `installation_info`
--

INSERT INTO `installation_info` (`id`, `mac`, `driver_model`, `driver_rating`, `speed`, `electric_rate`, `electric_lift`, `driver_sn`, `end_user`, `installation`, `process`, `basin_size`, `service_since`) VALUES
(1, 'testing:mac', 'S25-AE-L524F', '14,000 ft-lbs', '0.06', '1 HP', '1 HP', '123G768', 'Paper Mill of south', 'Rome, GA, USA', 'Mud Thickening', '30ft', '12/03/2004'),
(3, '3:4:511', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(4, 'esp32@esp32.com', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(5, '2222', '1', '2', '2', '2', '1', '2', '2', '1', '1', '1', '2'),
(6, '2222', '1', '2', '2', '2', '1', '2', '2', '1', '1', '1', '2'),
(7, '121212', '1212', '1212', '1212', '1221', '1221', '1212', '1221', '1212', '1221', '1212', '1212'),
(8, 'kkkk', 'kkkk', 'kkkk', 'kkkk', 'kkkk', 'kkkk', 'kkkk', 'kkkk', 'kkkk', 'kkkk', 'kkkk', 'kkkk'),
(9, 'kkkk', 'kkkk', '1', 'kkkk', 'kkkk', 'kkkk', 'kkkk', 'kkkk', 'kkkk', 'kkkk', 'kkkk', 'kkkk'),
(10, '11:22:33:44:55', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_record`
--

CREATE TABLE `maintenance_record` (
  `id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `last_oil_pdu` date NOT NULL,
  `next_oil_change_lift_pu` date NOT NULL,
  `next_schedule_service` date NOT NULL,
  `last_repair` varchar(50) NOT NULL,
  `last_oil_change_main_gear` date NOT NULL,
  `parts_prepaired` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maintenance_record`
--

INSERT INTO `maintenance_record` (`id`, `device_id`, `last_oil_pdu`, `next_oil_change_lift_pu`, `next_schedule_service`, `last_repair`, `last_oil_change_main_gear`, `parts_prepaired`) VALUES
(1, 0, '2021-04-28', '2021-04-27', '2021-04-26', '1234', '2021-04-02', 'na'),
(2, 0, '2021-04-01', '2021-04-03', '2021-04-04', 'N/A', '2021-04-02', 'N/A'),
(3, 0, '2021-04-01', '2021-04-03', '2021-04-04', 'N/A', '2021-04-02', 'N/A'),
(4, 0, '2021-04-01', '2021-04-03', '2021-04-04', 'N/A', '2021-04-02', 'N/A'),
(5, 0, '2021-04-09', '2021-04-11', '2021-04-12', 'abv', '2021-04-10', 'def'),
(6, 0, '2021-04-14', '2021-04-16', '2021-04-17', '333', '2021-04-15', '444'),
(7, 0, '2021-04-27', '0000-00-00', '0000-00-00', 'N/A', '0000-00-00', 'N/A'),
(8, 0, '0000-00-00', '0000-00-00', '2021-04-21', 'N/A', '0000-00-00', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `recorded_values`
--

CREATE TABLE `recorded_values` (
  `id` int(11) NOT NULL,
  `mac` varchar(20) NOT NULL,
  `legends1` int(10) NOT NULL,
  `legends2` int(10) NOT NULL,
  `legends3` int(10) NOT NULL,
  `legends4` int(10) NOT NULL,
  `legends5` int(10) NOT NULL,
  `legends6` int(10) NOT NULL,
  `t1` int(10) NOT NULL,
  `t2` int(10) NOT NULL,
  `T3` int(10) NOT NULL,
  `t4` int(10) NOT NULL,
  `r1` int(10) NOT NULL,
  `r2` int(10) NOT NULL,
  `r3` int(10) NOT NULL,
  `r4` int(10) NOT NULL,
  `l1` int(10) NOT NULL,
  `l2` int(10) NOT NULL,
  `l3` int(10) NOT NULL,
  `l4` int(10) NOT NULL,
  `analogue1` int(10) NOT NULL,
  `analogue2` int(10) NOT NULL,
  `analogue3` int(10) NOT NULL,
  `analogue4` int(10) NOT NULL,
  `analogue5` int(10) NOT NULL,
  `analogue6` int(10) NOT NULL,
  `c1` int(10) NOT NULL,
  `c2` int(10) NOT NULL,
  `co1` int(10) NOT NULL,
  `co2` int(10) NOT NULL,
  `col3` int(10) NOT NULL,
  `col4` int(10) NOT NULL,
  `tor1` int(100) NOT NULL,
  `tor2` int(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recorded_values`
--

INSERT INTO `recorded_values` (`id`, `mac`, `legends1`, `legends2`, `legends3`, `legends4`, `legends5`, `legends6`, `t1`, `t2`, `T3`, `t4`, `r1`, `r2`, `r3`, `r4`, `l1`, `l2`, `l3`, `l4`, `analogue1`, `analogue2`, `analogue3`, `analogue4`, `analogue5`, `analogue6`, `c1`, `c2`, `co1`, `co2`, `col3`, `col4`, `tor1`, `tor2`, `date_time`) VALUES
(1, 'testing:mac', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 8000, 1, '2021-08-18 07:22:38'),
(2, 'testing:mac', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 6000, 1, '2021-08-18 07:23:01'),
(3, 'testing:mac', 0, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 7000, 1, '2021-08-17 20:04:09'),
(4, '111', 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 5, 3, 7, 6, 5, 9, 1, 1, 0, 0, 0, 0, 9611, 4656, '2021-08-19 15:32:23'),
(5, 'testing:mac', 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 5, 3, 7, 6, 5, 9, 1, 1, 0, 0, 0, 0, 9611, 4656, '2021-08-19 15:32:52'),
(6, '0', 0, 1, 0, 0, 1, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1, 2, 3, 4, 5, 6, 0, 0, 1, 0, 0, 0, 5000, 6000, '2021-09-21 14:42:50'),
(7, 'testing:mac', 0, 1, 0, 0, 1, 1, 0, 1, 0, 1, 0, 1, 1, 1, 1, 0, 1, 0, 1, 2, 3, 4, 5, 6, 0, 0, 1, 0, 0, 0, 5000, 6000, '2021-09-21 14:43:39'),
(8, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 16:12:08'),
(9, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 16:13:15'),
(10, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 16:31:25'),
(11, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 16:34:22'),
(12, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 16:40:21'),
(13, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 16:43:26'),
(14, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 16:49:46'),
(15, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 16:58:55'),
(16, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 05:01:51'),
(17, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 05:10:58'),
(18, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 05:13:54'),
(19, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 05:16:49'),
(20, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 05:19:49'),
(21, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 05:22:45'),
(22, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 05:25:41'),
(23, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 05:28:38'),
(24, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 05:31:34'),
(25, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 05:34:32'),
(26, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 05:37:30'),
(27, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 05:40:26'),
(28, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 05:43:21'),
(29, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 05:46:19'),
(30, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 05:49:17'),
(31, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 05:52:13'),
(32, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 05:55:09'),
(33, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:01:18'),
(34, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:04:14'),
(35, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:07:12'),
(36, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:10:08'),
(37, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:13:05'),
(38, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:16:01'),
(39, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:18:58'),
(40, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:21:53'),
(41, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:24:49'),
(42, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:27:45'),
(43, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:30:40'),
(44, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:33:37'),
(45, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:36:33'),
(46, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:39:28'),
(47, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:42:25'),
(48, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:45:21'),
(49, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:48:18'),
(50, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:51:13'),
(51, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:54:10'),
(52, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 06:57:05'),
(53, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:00:00'),
(54, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:02:56'),
(55, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:05:53'),
(56, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:08:50'),
(57, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:11:45'),
(58, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:14:40'),
(59, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:17:36'),
(60, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:20:34'),
(61, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:23:30'),
(62, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:26:25'),
(63, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:29:20'),
(64, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:32:17'),
(65, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:35:13'),
(66, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:38:09'),
(67, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:41:06'),
(68, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:44:02'),
(69, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:50:00'),
(70, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:53:00'),
(71, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:55:56'),
(72, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 07:58:53'),
(73, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 08:01:49'),
(74, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 08:04:45'),
(75, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 08:07:41'),
(76, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 08:10:39'),
(77, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 08:13:34'),
(78, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 08:16:28'),
(79, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 08:19:27'),
(80, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 08:22:23'),
(81, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 08:25:20'),
(82, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 08:28:15'),
(83, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 08:31:11'),
(84, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 08:34:13'),
(85, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 08:40:08'),
(86, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 08:43:04'),
(87, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 08:46:01'),
(88, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 08:48:57'),
(89, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 08:51:53'),
(90, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 08:54:49'),
(91, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 08:57:46'),
(92, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 09:00:42'),
(93, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 09:03:37'),
(94, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 09:06:33'),
(95, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 09:09:29'),
(96, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 09:12:24'),
(97, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 09:15:20'),
(98, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 09:18:15'),
(99, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 09:24:10'),
(100, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 09:27:06'),
(101, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 09:30:05'),
(102, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 09:33:01'),
(103, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 09:35:58'),
(104, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 09:38:56'),
(105, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 09:41:52'),
(106, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 09:44:51'),
(107, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 09:50:48'),
(108, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 09:53:44'),
(109, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 09:56:40'),
(110, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 09:59:36'),
(111, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 10:02:32'),
(112, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 10:05:28'),
(113, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 10:08:25'),
(114, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 10:11:22'),
(115, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 10:14:18'),
(116, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 10:17:16'),
(117, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 10:20:12'),
(118, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 10:23:08'),
(119, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 10:26:04'),
(120, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 10:29:01'),
(121, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 10:32:02'),
(122, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 10:34:59'),
(123, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 10:37:55'),
(124, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 10:40:51'),
(125, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 10:46:45'),
(126, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 10:52:41'),
(127, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 10:58:48'),
(128, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:01:44'),
(129, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:04:40'),
(130, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:07:37'),
(131, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:10:33'),
(132, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:13:29'),
(133, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:16:25'),
(134, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:19:21'),
(135, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:22:17'),
(136, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:25:13'),
(137, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:28:10'),
(138, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:31:05'),
(139, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:34:00'),
(140, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:36:56'),
(141, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:39:52'),
(142, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:42:48'),
(143, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:45:43'),
(144, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:48:39'),
(145, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:51:36'),
(146, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:54:30'),
(147, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 11:57:27'),
(148, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 12:00:22'),
(149, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 12:03:19'),
(150, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 12:06:15'),
(151, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 12:15:10'),
(152, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 12:18:06'),
(153, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 12:21:02'),
(154, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 12:23:57'),
(155, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 12:26:52'),
(156, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 12:29:48'),
(157, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 12:32:44'),
(158, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 12:35:40'),
(159, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 12:38:35'),
(160, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 12:41:31'),
(161, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 12:44:25'),
(162, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 12:47:20'),
(163, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 12:50:18'),
(164, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 12:53:13'),
(165, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 12:56:08'),
(166, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 12:59:04'),
(167, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 13:04:59'),
(168, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 13:07:54'),
(169, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 13:10:51'),
(170, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 13:13:46'),
(171, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 13:16:41'),
(172, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 13:19:37'),
(173, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 13:22:31'),
(174, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 13:25:28'),
(175, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 13:28:24'),
(176, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 13:31:19'),
(177, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 13:34:17'),
(178, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 13:37:12'),
(179, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 13:40:09'),
(180, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 13:43:05'),
(181, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 13:46:02'),
(182, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 13:48:58'),
(183, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 13:51:53'),
(184, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 13:54:47'),
(185, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 13:57:42'),
(186, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 14:00:37'),
(187, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 14:03:32'),
(188, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 14:06:27'),
(189, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 14:09:23'),
(190, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 14:12:18'),
(191, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 14:15:12'),
(192, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 14:18:07'),
(193, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 14:21:05'),
(194, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 14:24:02'),
(195, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 14:26:57'),
(196, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 14:29:51'),
(197, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-10-06 14:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `reset_pass`
--

CREATE TABLE `reset_pass` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(1000) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reset_pass`
--

INSERT INTO `reset_pass` (`id`, `user_id`, `code`, `date_time`) VALUES
(1, 1, '0', '2021-06-12 12:03:34'),
(2, 1, 'Q1HwyTQMok5', '2021-06-12 12:03:55'),
(3, 1, '4vcP4eyoNNP', '2021-06-12 12:04:28'),
(4, 1, 'aAa93NWHzMY', '2021-06-12 12:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `blocked` tinyint(1) NOT NULL DEFAULT 0,
  `contact` varchar(50) DEFAULT NULL,
  `company_name` varchar(100) NOT NULL,
  `job_position` varchar(100) NOT NULL,
  `phone_2` varchar(100) NOT NULL,
  `secrete` varchar(1000) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `alert1` varchar(10) NOT NULL,
  `alert2` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`, `blocked`, `contact`, `company_name`, `job_position`, `phone_2`, `secrete`, `answer`, `alert1`, `alert2`) VALUES
(1, 'Administrator1', 'admin@admin.com', 'admin@123', 1, 0, '+123456793', '', '', '+321654978', 'Hometown', 'Pakistan', '', ''),
(2, 'User', 'user@user.com', 'user@123', 0, 0, '323232444', '', '', '', '', '', '', ''),
(19, 'Test User', 'kashifkhan@loketa.com', 'Test User', 0, 0, NULL, '', '', '', '', '', '', ''),
(29, 'admin', 'kashifkhan@loketa.comadsf', 'kashifkhan@loketa.comadsf', 0, 0, '', '', '', '', '', '', '', ''),
(31, '232', 'sdsdas33d@doc-mail.net', 'asdfadf', 0, 0, NULL, '', '', '', '', '', '', ''),
(43, '1', '4@fg.sfg', '555', 0, 0, '6', '2', '3', '7', '8', '9', '', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `user_and_devices`
--

CREATE TABLE `user_and_devices` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_and_devices`
--

INSERT INTO `user_and_devices` (`id`, `user_id`, `device_id`) VALUES
(83, 2, 65);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custom_add_sections`
--
ALTER TABLE `custom_add_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_alerts`
--
ALTER TABLE `custom_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_conditions`
--
ALTER TABLE `custom_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_dashboards`
--
ALTER TABLE `custom_dashboards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_devicestatus`
--
ALTER TABLE `custom_devicestatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_graph`
--
ALTER TABLE `custom_graph`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_installation_info`
--
ALTER TABLE `custom_installation_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_maintenance`
--
ALTER TABLE `custom_maintenance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_sections`
--
ALTER TABLE `custom_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_vertical_bar`
--
ALTER TABLE `custom_vertical_bar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard_units`
--
ALTER TABLE `dashboard_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `installation_info`
--
ALTER TABLE `installation_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_record`
--
ALTER TABLE `maintenance_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recorded_values`
--
ALTER TABLE `recorded_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_pass`
--
ALTER TABLE `reset_pass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_and_devices`
--
ALTER TABLE `user_and_devices`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custom_add_sections`
--
ALTER TABLE `custom_add_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `custom_alerts`
--
ALTER TABLE `custom_alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `custom_conditions`
--
ALTER TABLE `custom_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `custom_dashboards`
--
ALTER TABLE `custom_dashboards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `custom_devicestatus`
--
ALTER TABLE `custom_devicestatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `custom_graph`
--
ALTER TABLE `custom_graph`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `custom_installation_info`
--
ALTER TABLE `custom_installation_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `custom_maintenance`
--
ALTER TABLE `custom_maintenance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `custom_sections`
--
ALTER TABLE `custom_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `custom_vertical_bar`
--
ALTER TABLE `custom_vertical_bar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dashboard_units`
--
ALTER TABLE `dashboard_units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `installation_info`
--
ALTER TABLE `installation_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `maintenance_record`
--
ALTER TABLE `maintenance_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `recorded_values`
--
ALTER TABLE `recorded_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `reset_pass`
--
ALTER TABLE `reset_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user_and_devices`
--
ALTER TABLE `user_and_devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
