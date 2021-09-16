-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 06:15 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `radzi_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 93),
(2, 'AL', 'ALBANIA', 355),
(3, 'DZ', 'ALGERIA', 213),
(4, 'AS', 'AMERICAN SAMOA', 1684),
(5, 'AD', 'ANDORRA', 376),
(6, 'AO', 'ANGOLA', 244),
(7, 'AI', 'ANGUILLA', 1264),
(8, 'AQ', 'ANTARCTICA', 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 1268),
(10, 'AR', 'ARGENTINA', 54),
(11, 'AM', 'ARMENIA', 374),
(12, 'AW', 'ARUBA', 297),
(13, 'AU', 'AUSTRALIA', 61),
(14, 'AT', 'AUSTRIA', 43),
(15, 'AZ', 'AZERBAIJAN', 994),
(16, 'BS', 'BAHAMAS', 1242),
(17, 'BH', 'BAHRAIN', 973),
(18, 'BD', 'BANGLADESH', 880),
(19, 'BB', 'BARBADOS', 1246),
(20, 'BY', 'BELARUS', 375),
(21, 'BE', 'BELGIUM', 32),
(22, 'BZ', 'BELIZE', 501),
(23, 'BJ', 'BENIN', 229),
(24, 'BM', 'BERMUDA', 1441),
(25, 'BT', 'BHUTAN', 975),
(26, 'BO', 'BOLIVIA', 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 387),
(28, 'BW', 'BOTSWANA', 267),
(29, 'BV', 'BOUVET ISLAND', 0),
(30, 'BR', 'BRAZIL', 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 673),
(33, 'BG', 'BULGARIA', 359),
(34, 'BF', 'BURKINA FASO', 226),
(35, 'BI', 'BURUNDI', 257),
(36, 'KH', 'CAMBODIA', 855),
(37, 'CM', 'CAMEROON', 237),
(38, 'CA', 'CANADA', 1),
(39, 'CV', 'CAPE VERDE', 238),
(40, 'KY', 'CAYMAN ISLANDS', 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 236),
(42, 'TD', 'CHAD', 235),
(43, 'CL', 'CHILE', 56),
(44, 'CN', 'CHINA', 86),
(45, 'CX', 'CHRISTMAS ISLAND', 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 672),
(47, 'CO', 'COLOMBIA', 57),
(48, 'KM', 'COMOROS', 269),
(49, 'CG', 'CONGO', 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 242),
(51, 'CK', 'COOK ISLANDS', 682),
(52, 'CR', 'COSTA RICA', 506),
(53, 'CI', 'COTE D\'IVOIRE', 225),
(54, 'HR', 'CROATIA', 385),
(55, 'CU', 'CUBA', 53),
(56, 'CY', 'CYPRUS', 357),
(57, 'CZ', 'CZECH REPUBLIC', 420),
(58, 'DK', 'DENMARK', 45),
(59, 'DJ', 'DJIBOUTI', 253),
(60, 'DM', 'DOMINICA', 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 1809),
(62, 'EC', 'ECUADOR', 593),
(63, 'EG', 'EGYPT', 20),
(64, 'SV', 'EL SALVADOR', 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 240),
(66, 'ER', 'ERITREA', 291),
(67, 'EE', 'ESTONIA', 372),
(68, 'ET', 'ETHIOPIA', 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 500),
(70, 'FO', 'FAROE ISLANDS', 298),
(71, 'FJ', 'FIJI', 679),
(72, 'FI', 'FINLAND', 358),
(73, 'FR', 'FRANCE', 33),
(74, 'GF', 'FRENCH GUIANA', 594),
(75, 'PF', 'FRENCH POLYNESIA', 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 0),
(77, 'GA', 'GABON', 241),
(78, 'GM', 'GAMBIA', 220),
(79, 'GE', 'GEORGIA', 995),
(80, 'DE', 'GERMANY', 49),
(81, 'GH', 'GHANA', 233),
(82, 'GI', 'GIBRALTAR', 350),
(83, 'GR', 'GREECE', 30),
(84, 'GL', 'GREENLAND', 299),
(85, 'GD', 'GRENADA', 1473),
(86, 'GP', 'GUADELOUPE', 590),
(87, 'GU', 'GUAM', 1671),
(88, 'GT', 'GUATEMALA', 502),
(89, 'GN', 'GUINEA', 224),
(90, 'GW', 'GUINEA-BISSAU', 245),
(91, 'GY', 'GUYANA', 592),
(92, 'HT', 'HAITI', 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 39),
(95, 'HN', 'HONDURAS', 504),
(96, 'HK', 'HONG KONG', 852),
(97, 'HU', 'HUNGARY', 36),
(98, 'IS', 'ICELAND', 354),
(99, 'IN', 'INDIA', 91),
(100, 'ID', 'INDONESIA', 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 98),
(102, 'IQ', 'IRAQ', 964),
(103, 'IE', 'IRELAND', 353),
(104, 'IL', 'ISRAEL', 972),
(105, 'IT', 'ITALY', 39),
(106, 'JM', 'JAMAICA', 1876),
(107, 'JP', 'JAPAN', 81),
(108, 'JO', 'JORDAN', 962),
(109, 'KZ', 'KAZAKHSTAN', 7),
(110, 'KE', 'KENYA', 254),
(111, 'KI', 'KIRIBATI', 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 82),
(114, 'KW', 'KUWAIT', 965),
(115, 'KG', 'KYRGYZSTAN', 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 856),
(117, 'LV', 'LATVIA', 371),
(118, 'LB', 'LEBANON', 961),
(119, 'LS', 'LESOTHO', 266),
(120, 'LR', 'LIBERIA', 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 218),
(122, 'LI', 'LIECHTENSTEIN', 423),
(123, 'LT', 'LITHUANIA', 370),
(124, 'LU', 'LUXEMBOURG', 352),
(125, 'MO', 'MACAO', 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 389),
(127, 'MG', 'MADAGASCAR', 261),
(128, 'MW', 'MALAWI', 265),
(129, 'MY', 'MALAYSIA', 60),
(130, 'MV', 'MALDIVES', 960),
(131, 'ML', 'MALI', 223),
(132, 'MT', 'MALTA', 356),
(133, 'MH', 'MARSHALL ISLANDS', 692),
(134, 'MQ', 'MARTINIQUE', 596),
(135, 'MR', 'MAURITANIA', 222),
(136, 'MU', 'MAURITIUS', 230),
(137, 'YT', 'MAYOTTE', 269),
(138, 'MX', 'MEXICO', 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 373),
(141, 'MC', 'MONACO', 377),
(142, 'MN', 'MONGOLIA', 976),
(143, 'MS', 'MONTSERRAT', 1664),
(144, 'MA', 'MOROCCO', 212),
(145, 'MZ', 'MOZAMBIQUE', 258),
(146, 'MM', 'MYANMAR', 95),
(147, 'NA', 'NAMIBIA', 264),
(148, 'NR', 'NAURU', 674),
(149, 'NP', 'NEPAL', 977),
(150, 'NL', 'NETHERLANDS', 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 599),
(152, 'NC', 'NEW CALEDONIA', 687),
(153, 'NZ', 'NEW ZEALAND', 64),
(154, 'NI', 'NICARAGUA', 505),
(155, 'NE', 'NIGER', 227),
(156, 'NG', 'NIGERIA', 234),
(157, 'NU', 'NIUE', 683),
(158, 'NF', 'NORFOLK ISLAND', 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 1670),
(160, 'NO', 'NORWAY', 47),
(161, 'OM', 'OMAN', 968),
(162, 'PK', 'PAKISTAN', 92),
(163, 'PW', 'PALAU', 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 970),
(165, 'PA', 'PANAMA', 507),
(166, 'PG', 'PAPUA NEW GUINEA', 675),
(167, 'PY', 'PARAGUAY', 595),
(168, 'PE', 'PERU', 51),
(169, 'PH', 'PHILIPPINES', 63),
(170, 'PN', 'PITCAIRN', 0),
(171, 'PL', 'POLAND', 48),
(172, 'PT', 'PORTUGAL', 351),
(173, 'PR', 'PUERTO RICO', 1787),
(174, 'QA', 'QATAR', 974),
(175, 'RE', 'REUNION', 262),
(176, 'RO', 'ROMANIA', 40),
(177, 'RU', 'RUSSIAN FEDERATION', 70),
(178, 'RW', 'RWANDA', 250),
(179, 'SH', 'SAINT HELENA', 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 1869),
(181, 'LC', 'SAINT LUCIA', 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 1784),
(184, 'WS', 'SAMOA', 684),
(185, 'SM', 'SAN MARINO', 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 239),
(187, 'SA', 'SAUDI ARABIA', 966),
(188, 'SN', 'SENEGAL', 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 381),
(190, 'SC', 'SEYCHELLES', 248),
(191, 'SL', 'SIERRA LEONE', 232),
(192, 'SG', 'SINGAPORE', 65),
(193, 'SK', 'SLOVAKIA', 421),
(194, 'SI', 'SLOVENIA', 386),
(195, 'SB', 'SOLOMON ISLANDS', 677),
(196, 'SO', 'SOMALIA', 252),
(197, 'ZA', 'SOUTH AFRICA', 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 0),
(199, 'ES', 'SPAIN', 34),
(200, 'LK', 'SRI LANKA', 94),
(201, 'SD', 'SUDAN', 249),
(202, 'SR', 'SURINAME', 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 47),
(204, 'SZ', 'SWAZILAND', 268),
(205, 'SE', 'SWEDEN', 46),
(206, 'CH', 'SWITZERLAND', 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 886),
(209, 'TJ', 'TAJIKISTAN', 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 255),
(211, 'TH', 'THAILAND', 66),
(212, 'TL', 'TIMOR-LESTE', 670),
(213, 'TG', 'TOGO', 228),
(214, 'TK', 'TOKELAU', 690),
(215, 'TO', 'TONGA', 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 1868),
(217, 'TN', 'TUNISIA', 216),
(218, 'TR', 'TURKEY', 90),
(219, 'TM', 'TURKMENISTAN', 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 1649),
(221, 'TV', 'TUVALU', 688),
(222, 'UG', 'UGANDA', 256),
(223, 'UA', 'UKRAINE', 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 971),
(225, 'GB', 'UNITED KINGDOM', 44),
(226, 'US', 'UNITED STATES', 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 1),
(228, 'UY', 'URUGUAY', 598),
(229, 'UZ', 'UZBEKISTAN', 998),
(230, 'VU', 'VANUATU', 678),
(231, 'VE', 'VENEZUELA', 58),
(232, 'VN', 'VIET NAM', 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 681),
(236, 'EH', 'WESTERN SAHARA', 212),
(237, 'YE', 'YEMEN', 967),
(238, 'ZM', 'ZAMBIA', 260),
(239, 'ZW', 'ZIMBABWE', 263),
(240, 'RS', 'SERBIA', 381),
(241, 'AP', 'ASIA PACIFIC REGION', 0),
(242, 'ME', 'MONTENEGRO', 382),
(243, 'AX', 'ALAND ISLANDS', 358),
(244, 'BQ', 'BONAIRE, SINT EUSTATIUS AND SABA', 599),
(245, 'CW', 'CURACAO', 599),
(246, 'GG', 'GUERNSEY', 44),
(247, 'IM', 'ISLE OF MAN', 44),
(248, 'JE', 'JERSEY', 44),
(249, 'XK', 'KOSOVO', 381),
(250, 'BL', 'SAINT BARTHELEMY', 590),
(251, 'MF', 'SAINT MARTIN', 590),
(252, 'SX', 'SINT MAARTEN', 1),
(253, 'SS', 'SOUTH SUDAN', 211);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email_id` varchar(200) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `login_address` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `first_name`, `last_name`, `email_id`, `password`, `login_time`, `login_address`) VALUES
(1, 'Admin', 'main', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-08-29 12:14:58', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `sms_history`
--

CREATE TABLE `sms_history` (
  `sms_id` int(11) NOT NULL,
  `account_sid` varchar(200) NOT NULL,
  `sid` varchar(200) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `send_to` varchar(200) DEFAULT NULL,
  `message_from` varchar(200) DEFAULT NULL,
  `body` longtext DEFAULT NULL,
  `num_segments` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL,
  `method` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(150) DEFAULT NULL,
  `mobile_number` varchar(50) DEFAULT NULL,
  `country_code` int(11) DEFAULT NULL,
  `actual_number` varchar(20) DEFAULT NULL,
  `remarks` longtext DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `update_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_history`
--
ALTER TABLE `sms_history`
  ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms_history`
--
ALTER TABLE `sms_history`
  MODIFY `sms_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
