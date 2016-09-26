-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2016 at 10:59 AM
-- Server version: 5.5.52-0+deb8u1
-- PHP Version: 5.6.24-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `story_mosaic`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`) VALUES
(1, 'Proyecto Mercator'),
(2, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `story_images`
--

CREATE TABLE IF NOT EXISTS `story_images` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `source_name` varchar(255) NOT NULL,
  `sha1` varchar(100) NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(5) NOT NULL,
  `user` varchar(50) NOT NULL,
  `project` varchar(255) NOT NULL,
  `pid` int(5) NOT NULL,
  `scene` varchar(4) NOT NULL,
  `shot` varchar(20) NOT NULL,
  `dialog` text NOT NULL,
  `filetype` varchar(4) NOT NULL,
  `list` int(1) NOT NULL COMMENT '0: bin, 1: page',
  `sort_order` int(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `story_images`
--

INSERT INTO `story_images` (`id`, `name`, `description`, `source_name`, `sha1`, `date`, `time`, `user`, `project`, `pid`, `scene`, `shot`, `dialog`, `filetype`, `list`, `sort_order`) VALUES
(1, 'e01t01.jpeg', 'Probando la descripciÃ³n\r\ntambiÃ©n con 3 lineas\r\nesta es la Ãºltima', 'e01t01.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '12/02/2008', '15:22', 'digitalh', 'Proyecto Mercator', 1, '01', '01', 'En el pasado, eramos monos', 'jpeg', 0, 2),
(2, 'e01t02.jpeg', 'Si vemos esto, ajax andÃ³\ny que pasa con el enter?\nÃ± para vos, Ã¡ para mi\n													', 'e01t02.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '12/02/2008', '15:23', 'digitalh', 'Proyecto Mercator', 1, '01', '01 (continuaciÃ³n)', '" ..Si... la recuedas"', 'jpeg', 0, 3),
(63, '.jpeg', ' Salen de camarote ', 'salen_camarote2.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '17:13', 'digitalh', 'Proyecto Mercator', 1, '02', '02', '', 'jpeg', 0, 0),
(61, '.jpeg', ' La entrada del camarote congelada', 'salen_camarote_hielo.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '17:09', 'digitalh', 'Proyecto Mercator', 1, '02', '01', '', 'jpeg', 0, 5),
(62, '.jpeg', ' transicion por elementos', 'salen_camarote_hielo_trans.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '17:09', 'digitalh', 'Proyecto Mercator', 1, '02', '02', '', 'jpeg', 0, 6),
(3, 'e01t03.jpeg', 'test', 'e01t03.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/28/2008', '10:39', 'digitalh', 'Proyecto Mercator', 1, '01', '03', '\n							A la pelota, que chiflete...\ndada\n\n																			', 'jpeg', 0, 1),
(4, 'e01t04.jpeg', 'Flashback a cuando pierde los calzones porque no habia papel?\n							 						', 'e01t04.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/28/2008', '10:39', 'digitalh', 'Proyecto Mercator', 1, '01', '04', '\n							Y yo sin calzones...\n																			', 'jpeg', 0, 4),
(5, 'e02t01.jpeg', ' ', 'e02t01.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/28/2008', '10:40', 'digitalh', 'Proyecto Mercator', 1, '02', '01', '', 'jpeg', 0, 9999),
(6, 'e02t02.jpeg', ' ', 'e02t02.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/28/2008', '10:40', 'digitalh', 'Proyecto Mercator', 1, '02', '02', '', 'jpeg', 0, 9999),
(7, 'e02t03.jpeg', ' ', 'e02t03.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/28/2008', '10:40', 'digitalh', 'Proyecto Mercator', 1, '02', '03', '', 'jpeg', 0, 8),
(8, 'e02t04.jpeg', ' ', 'e02t04.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/28/2008', '10:41', 'digitalh', 'Proyecto Mercator', 1, '02', '04', '', 'jpeg', 0, 9),
(9, 'e03t01.jpeg', ' ', 'e03t01.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:27', 'digitalh', 'Proyecto Mercator', 1, '03', '01', '', 'jpeg', 0, 10),
(10, 'e03t02.jpeg', ' ', 'e03t02.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:28', 'digitalh', 'Proyecto Mercator', 1, '03', '02', '', 'jpeg', 0, 11),
(11, 'e03t03.jpeg', ' ', 'e03t03.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:28', 'digitalh', 'Proyecto Mercator', 1, '03', '03', '', 'jpeg', 0, 12),
(12, 'e03t04.jpeg', ' ', 'e03t04.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:28', 'digitalh', 'Proyecto Mercator', 1, '03', '04', '', 'jpeg', 0, 13),
(13, 'e04t01.jpeg', ' ', 'e04t01.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:28', 'digitalh', 'Proyecto Mercator', 1, '04', '01', '', 'jpeg', 0, 17),
(14, 'e04t02.jpeg', ' ', 'e04t02.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:29', 'digitalh', 'Proyecto Mercator', 1, '04', '02', '', 'jpeg', 0, 18),
(15, 'e04t03.jpeg', ' ', 'e04t03.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:29', 'digitalh', 'Proyecto Mercator', 1, '04', '03', '', 'jpeg', 0, 9999),
(16, 'e04t04.jpeg', ' ', 'e04t04.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:30', 'digitalh', 'Proyecto Mercator', 1, '04', '04', '', 'jpeg', 0, 20),
(17, 'e05t01.jpeg', ' ', 'e05-06t01.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:30', 'digitalh', 'Proyecto Mercator', 1, '05', '01', '', 'jpeg', 0, 21),
(18, 'e05t02.jpeg', ' ', 'e05-06t02.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:30', 'digitalh', 'Proyecto Mercator', 1, '05', '02', '', 'jpeg', 0, 22),
(19, 'e05t03.jpeg', ' ', 'e05-06t03.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:31', 'digitalh', 'Proyecto Mercator', 1, '05', '03', '', 'jpeg', 0, 23),
(20, 'e07t01.jpeg', ' ', 'e07t01.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:31', 'digitalh', 'Proyecto Mercator', 1, '07', '01', '', 'jpeg', 0, 24),
(21, 'e08t01.jpeg', ' ', 'e08t01.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:31', 'digitalh', 'Proyecto Mercator', 1, '08', '01', '', 'jpeg', 0, 25),
(22, 'e09t01.jpeg', ' ', 'e09t01.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:32', 'digitalh', 'Proyecto Mercator', 1, '09', '01', '', 'jpeg', 0, 26),
(23, 'e09t02.jpeg', ' ', 'e09t02.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:32', 'digitalh', 'Proyecto Mercator', 1, '09', '02', '', 'jpeg', 0, 27),
(24, 'e10t01.jpeg', ' ', 'e10t01.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:32', 'digitalh', 'Proyecto Mercator', 1, '10', '01', '', 'jpeg', 0, 28),
(25, 'e10t02.jpeg', ' ', 'e10t02.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:33', 'digitalh', 'Proyecto Mercator', 1, '10', '02', '', 'jpeg', 0, 29),
(26, 'e10t03.jpeg', ' ', 'e10t03.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:33', 'digitalh', 'Proyecto Mercator', 1, '10', '03', '', 'jpeg', 0, 30),
(27, 'e10t04.jpeg', ' ', 'e10t04.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:33', 'digitalh', 'Proyecto Mercator', 1, '10', '04', '', 'jpeg', 0, 31),
(28, 'e10t05.jpeg', ' ', 'e10t05.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:33', 'digitalh', 'Proyecto Mercator', 1, '10', '05', '', 'jpeg', 0, 32),
(29, 'e10t06.jpeg', ' ', 'e10t06.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:34', 'digitalh', 'Proyecto Mercator', 1, '10', '06', '', 'jpeg', 0, 33),
(30, 'e10t07.jpeg', ' ', 'e10t07.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:34', 'digitalh', 'Proyecto Mercator', 1, '10', '07', '', 'jpeg', 0, 34),
(31, 'e10t08.jpeg', ' ', 'e10t08.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:34', 'digitalh', 'Proyecto Mercator', 1, '10', '08', '', 'jpeg', 0, 35),
(32, 'e10t09.jpeg', ' ', 'e10t09.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:35', 'digitalh', 'Proyecto Mercator', 1, '10', '09', '', 'jpeg', 0, 36),
(33, 'e10t10.jpeg', ' ', 'e10t10.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:35', 'digitalh', 'Proyecto Mercator', 1, '10', '10', '', 'jpeg', 0, 37),
(34, 'e10t11.jpeg', ' ', 'e10t11.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:35', 'digitalh', 'Proyecto Mercator', 1, '10', '11', '', 'jpeg', 0, 38),
(35, 'e111t01.jpeg', ' ', 'e11t01.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:36', 'digitalh', 'Proyecto Mercator', 1, '11', '01', '', 'jpeg', 0, 39),
(36, 'e11t02.jpeg', ' ', 'e11t02.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:36', 'digitalh', 'Proyecto Mercator', 1, '11', '02', '', 'jpeg', 0, 40),
(37, 'e11t03.jpeg', ' ', 'e11t03.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:36', 'digitalh', 'Proyecto Mercator', 1, '11', '03', '', 'jpeg', 0, 41),
(38, 'e11t04.jpeg', ' ', 'e11t04.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:37', 'digitalh', 'Proyecto Mercator', 1, '11', '04', '', 'jpeg', 0, 42),
(39, 'e11t05.jpeg', ' ', 'e11t05.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:37', 'digitalh', 'Proyecto Mercator', 1, '11', '05', '', 'jpeg', 0, 43),
(40, 'e11t06.jpeg', ' ', 'e11t06.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:37', 'digitalh', 'Proyecto Mercator', 1, '11', '06', '', 'jpeg', 0, 44),
(41, 'e12t01.jpeg', ' ', 'e12t01.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:38', 'digitalh', 'Proyecto Mercator', 1, '12', '01', '', 'jpeg', 0, 45),
(42, 'e12t02.jpeg', ' ', 'e12t02.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:38', 'digitalh', 'Proyecto Mercator', 1, '12', '02', '', 'jpeg', 0, 46),
(43, 'e12t03.jpeg', ' ', 'e12t03.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:38', 'digitalh', 'Proyecto Mercator', 1, '12', '03', '', 'jpeg', 0, 47),
(44, 'e12t04.jpeg', ' ', 'e12t04.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:38', 'digitalh', 'Proyecto Mercator', 1, '12', '04', '', 'jpeg', 0, 48),
(45, 'e12t05.jpeg', ' ', 'e12t05.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:39', 'digitalh', 'Proyecto Mercator', 1, '12', '05', '', 'jpeg', 0, 49),
(46, 'e12t06.jpeg', ' ', 'e12t06.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:39', 'digitalh', 'Proyecto Mercator', 1, '12', '06', '', 'jpeg', 0, 50),
(47, 'e13t01.jpeg', ' ', 'e13t01.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:39', 'digitalh', 'Proyecto Mercator', 1, '13', '01', '', 'jpeg', 0, 51),
(48, 'e13t02.jpeg', ' ', 'e13t02.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:40', 'digitalh', 'Proyecto Mercator', 1, '13', '02', '', 'jpeg', 0, 52),
(49, 'e13t03.jpeg', ' ', 'e13t03.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:40', 'digitalh', 'Proyecto Mercator', 1, '13', '03', '', 'jpeg', 0, 53),
(50, 'e13t04.jpeg', ' ', 'e13t04.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:40', 'digitalh', 'Proyecto Mercator', 1, '13', '04', '', 'jpeg', 0, 54),
(51, 'e13t05.jpeg', ' ', 'e13t05.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:40', 'digitalh', 'Proyecto Mercator', 1, '13', '05', '', 'jpeg', 0, 55),
(52, 'e13t06.jpeg', ' ', 'e13t06.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:41', 'digitalh', 'Proyecto Mercator', 1, '13', '06', '', 'jpeg', 0, 56),
(53, 'e13t07.jpeg', ' ', 'e13t07.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:41', 'digitalh', 'Proyecto Mercator', 1, '13', '07', '', 'jpeg', 0, 57),
(54, 'e13t08.jpeg', ' ', 'e13t08.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:41', 'digitalh', 'Proyecto Mercator', 1, '13', '08', '', 'jpeg', 0, 58),
(55, 'e13t09.jpeg', ' ', 'e13t09.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:42', 'digitalh', 'Proyecto Mercator', 1, '13', '09', '', 'jpeg', 0, 59),
(56, 'e13t10.jpeg', ' ', 'e13t10.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:42', 'digitalh', 'Proyecto Mercator', 1, '13', '10', '', 'jpeg', 0, 60),
(57, 'e13t11.jpeg', ' ', 'e13t11.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:42', 'digitalh', 'Proyecto Mercator', 1, '13', '11', '', 'jpeg', 0, 61),
(58, 'e13t12.jpeg', ' ', 'e13t12.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:43', 'digitalh', 'Proyecto Mercator', 1, '13', '12', '', 'jpeg', 0, 62),
(59, 'e13t13.jpeg', ' ', 'e13t13.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:43', 'digitalh', 'Proyecto Mercator', 1, '13', '13', '', 'jpeg', 0, 63),
(60, 'e13t14.jpeg', ' ', 'e13t14.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '16:43', 'digitalh', 'Proyecto Mercator', 1, '13', '14', '', 'jpeg', 0, 64),
(64, '.jpeg', ' ', 'salen_camarote.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '17:13', 'digitalh', 'Proyecto Mercator', 1, '02', '02', '', 'jpeg', 0, 7),
(65, '.jpeg', ' Virginia baila despreocupada', 'virgina_bailando.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '17:51', 'digitalh', 'Proyecto Mercator', 1, '04', '01', '', 'jpeg', 0, 16),
(66, '.jpeg', ' ', 'amotinados.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '19:45', 'digitalh', 'Proyecto Mercator', 1, '', '', '', 'jpeg', 0, 65),
(67, '.jpeg', ' ', 'poseido.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '19:45', 'digitalh', 'Proyecto Mercator', 1, '', '', '', 'jpeg', 0, 66),
(68, '.jpeg', ' ', 'batalla.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/27/2008', '19:45', 'digitalh', 'Proyecto Mercator', 1, '', '', '', 'jpeg', 0, 68),
(69, '.jpeg', ' Ciego de furia', 'endemoniado.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/28/2008', '16:41', 'digitalh', 'Proyecto Mercator', 1, '08', '03', '', 'jpeg', 0, 67),
(70, '.jpeg', ' ', 'muerte_trans.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/28/2008', '17:39', 'digitalh', 'Proyecto Mercator', 1, '', '', '', 'jpeg', 0, 15),
(71, '.jpeg', ' ', 'piel_muerte.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/28/2008', '17:40', 'digitalh', 'Proyecto Mercator', 1, '', '', '', 'jpeg', 0, 14),
(72, '.jpeg', ' ', 'mano_peste.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '11/28/2008', '17:40', 'digitalh', 'Proyecto Mercator', 1, '', '', '', 'jpeg', 0, 19),
(83, 'Prueba.jpeg', ' prueba', '2672879712_44a91b93f2.jpg', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '12/02/2008', '14:18', 'digitalh', 'Proyecto Mercator', 1, '99', '99', 'prueba', 'jpeg', 0, 9999);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `story_images`
--
ALTER TABLE `story_images`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `story_images`
--
ALTER TABLE `story_images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=84;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
