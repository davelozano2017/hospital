-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2018 at 09:15 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `accounts_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accounts_id`, `image`, `name`, `contact`, `email`, `gender`, `address`, `username`, `password`, `role`, `status`) VALUES
(1, 'my picture.jpg', 'John David Lozano', '09555773952', 'lozanojohndavid@gmail.com', 'Male', 'Quezon City5345353534534', 'Administrator', '$2y$10$kFtdMa3t.JMHaxdXQRgH5.CENCEcZ1Qt4CSRnYvZ61UAVq5q8c8rS', 0, 0),
(5, '21739969_832946646870749_5682883968502257100_n.jpg', 'Jeddahlyn Cabuga', '09265691158', 'cabugajeddahlyn@gmail.com', 'Female', 'Quezon City', 'jeddah', '$2y$10$rddRx8kzut27CEASuXSfUectym65HHgFN8oOXNMGtX/x01kxnIXcS', 1, 0),
(6, '18447118_1751904378170105_7854398647292800290_n.jpg', 'Judilyn Abcede', '09555773952', 'judilynabcede@gmail.com', 'Female', 'Bulacan City', 'judilyn', '$2y$10$B2RF9SfTfrOVlb.rowuh.eCPuKzXDc1A8XqYH61/AR2Sn2YLZvHxm', 2, 0),
(9, '', 'Janice Millanes', '09555773952', 'janicemillanes@gmail.com', 'Female', 'Bagong Silang Caloocan City', 'janice', '$2y$10$iWGTi0LUlFIK3WJ6rOhBhe3NOWy3fJNjTOoU9p/sl7cYEvbxtreRm', 2, 0),
(10, '', 'Jansel May Conception', '09555773952', 'janselmayconception@gmail.com', 'Female', 'Bagong Silang Caloocan City', 'jansel', '$2y$10$E2pzoa90wGOJUQge/8EmeuDr7W4oApDugs9w73v7UX17iqlSM7aGe', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `admissions_id` int(11) NOT NULL,
  `patient_code` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civil_status` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `name1` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `contact1` varchar(255) NOT NULL,
  `name2` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `contact2` varchar(255) NOT NULL,
  `name3` varchar(255) NOT NULL,
  `address3` varchar(255) NOT NULL,
  `contact3` varchar(255) NOT NULL,
  `hospital_code` varchar(255) NOT NULL,
  `medical_record_number` varchar(255) NOT NULL,
  `room` int(11) NOT NULL,
  `admission_date` varchar(255) NOT NULL,
  `admission_time` varchar(255) NOT NULL,
  `discharged_date` varchar(255) NOT NULL,
  `discharged_time` varchar(255) NOT NULL,
  `days` varchar(255) NOT NULL,
  `admitting_personnel` varchar(255) NOT NULL,
  `attending_physicians` int(11) NOT NULL,
  `referred_by` varchar(255) NOT NULL,
  `alert` varchar(255) NOT NULL,
  `allergic` varchar(255) NOT NULL,
  `admission_type` varchar(255) NOT NULL,
  `health_insurance` varchar(255) NOT NULL,
  `philhealth` varchar(255) NOT NULL,
  `data_furnished` varchar(255) NOT NULL,
  `informant` varchar(255) NOT NULL,
  `patient_relation` varchar(255) NOT NULL,
  `admission_diagnosis` varchar(255) NOT NULL,
  `final_diagnosis` varchar(255) NOT NULL,
  `icd` varchar(255) NOT NULL,
  `principal_operation` varchar(255) NOT NULL,
  `disposition` varchar(255) NOT NULL,
  `outcome` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date_today` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`admissions_id`, `patient_code`, `surname`, `firstname`, `middlename`, `birthday`, `address`, `birthplace`, `age`, `gender`, `civil_status`, `nationality`, `religion`, `occupation`, `name1`, `address1`, `contact1`, `name2`, `address2`, `contact2`, `name3`, `address3`, `contact3`, `hospital_code`, `medical_record_number`, `room`, `admission_date`, `admission_time`, `discharged_date`, `discharged_time`, `days`, `admitting_personnel`, `attending_physicians`, `referred_by`, `alert`, `allergic`, `admission_type`, `health_insurance`, `philhealth`, `data_furnished`, `informant`, `patient_relation`, `admission_diagnosis`, `final_diagnosis`, `icd`, `principal_operation`, `disposition`, `outcome`, `status`, `date_today`) VALUES
(1, 531084, 'Lozano', 'John David', 'Sadia', '1994-03-03', 'Blk.1  L.50', 'Quezon City', '23', 'Male', 'Single', 'Philippine, Filipino', 'Islam', 'Developer', '', '', '', 'David James Lozano Sr', 'Blk.1  L.50', '2819734', 'Adora Lozano', 'Blk.1  L.50', '2819734', '10002920290', '10-10-20', 20, '2018-03-15', '08:30', '2018-03-16', '08:45', '1', 'unknown', 5, 'unknown', 'unknown', 'unknown', 'New', 'Indigent', 'Formal (GSIS/PS)', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'Discharged', 'Recovered', 1, '2018-03-15'),
(2, 531084, 'Lozano', 'John David', 'Sadia', '1994-03-03', 'Blk.1  L.50', 'Quezon City', '23', 'Male', 'Single', 'Philippine, Filipino', 'Islam', 'Developer', '', '', '', 'David James Lozano Sr', 'Blk.1  L.50', '2819734', 'Adora Lozano', 'Blk.1  L.50', '2819734', '10002920290', '10-10-20', 20, '2018-03-15', '08:30', '2018-03-16', '08:45', '1', 'unknown', 10, 'unknown', 'unknown', 'unknown', 'New', 'Indigent', 'Formal (GSIS/PS)', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'Discharged', 'Recovered', 1, '2018-03-15'),
(3, 198703, 'Lozano', 'John David', 'Sadia', '1994-03-03', 'Blk.1  L.50', 'Quezon City', '23', 'Male', 'Single', 'Philippine, Filipino', 'Islam', 'Developer', '', '', '', 'David James Lozano Sr', 'Blk.1  L.50', '2819734', 'Adora Lozano', 'Blk.1  L.50', '2819734', '10022252588', '10-11-51', 17, '2018-04-03', '09:30', '2018-04-14', '18:00', '31', 'unknown', 5, 'unknown', 'unknown', 'unknown', 'Old', 'Indigent', 'Formal (GSIS/PS)', 'unknown', 'unknown', 'unknown', 'blablabla', 'unknown', 'unknown', 'unknown', 'Discharged', 'Recovered', 1, '2018-04-03'),
(4, 907470, 'Lozano', 'John David', 'Sadia', '1994-03-03', 'Blk.1  L.50', 'Quezon City', '23', 'Male', 'Single', 'Philippine, Filipino', 'Islam', 'Developer', '', '', '', 'David James Lozano Sr', 'Blk.1  L.50', '2819734', 'Adora Lozano', 'Blk.1  L.50', '2819734', '100244151', '10-23-51', 17, '2018-04-13', '05:00', '2018-04-14', '06:00', '31', 'unknown', 5, 'unknown', 'unknown', 'unknown', 'New', 'Indigent', 'Formal (GSIS/PS)', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'Discharged', 'Recovered', 1, '2018-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `num_code` int(3) NOT NULL DEFAULT '0',
  `alpha_2_code` varchar(2) DEFAULT NULL,
  `alpha_3_code` varchar(3) DEFAULT NULL,
  `en_short_name` varchar(52) DEFAULT NULL,
  `nationality` varchar(39) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`num_code`, `alpha_2_code`, `alpha_3_code`, `en_short_name`, `nationality`) VALUES
(4, 'AF', 'AFG', 'Afghanistan', 'Afghan'),
(8, 'AL', 'ALB', 'Albania', 'Albanian'),
(10, 'AQ', 'ATA', 'Antarctica', 'Antarctic'),
(12, 'DZ', 'DZA', 'Algeria', 'Algerian'),
(16, 'AS', 'ASM', 'American Samoa', 'American Samoan'),
(20, 'AD', 'AND', 'Andorra', 'Andorran'),
(24, 'AO', 'AGO', 'Angola', 'Angolan'),
(28, 'AG', 'ATG', 'Antigua and Barbuda', 'Antiguan or Barbudan'),
(31, 'AZ', 'AZE', 'Azerbaijan', 'Azerbaijani, Azeri'),
(32, 'AR', 'ARG', 'Argentina', 'Argentine'),
(36, 'AU', 'AUS', 'Australia', 'Australian'),
(40, 'AT', 'AUT', 'Austria', 'Austrian'),
(44, 'BS', 'BHS', 'Bahamas', 'Bahamian'),
(48, 'BH', 'BHR', 'Bahrain', 'Bahraini'),
(50, 'BD', 'BGD', 'Bangladesh', 'Bangladeshi'),
(51, 'AM', 'ARM', 'Armenia', 'Armenian'),
(52, 'BB', 'BRB', 'Barbados', 'Barbadian'),
(56, 'BE', 'BEL', 'Belgium', 'Belgian'),
(60, 'BM', 'BMU', 'Bermuda', 'Bermudian, Bermudan'),
(64, 'BT', 'BTN', 'Bhutan', 'Bhutanese'),
(68, 'BO', 'BOL', 'Bolivia (Plurinational State of)', 'Bolivian'),
(70, 'BA', 'BIH', 'Bosnia and Herzegovina', 'Bosnian or Herzegovinian'),
(72, 'BW', 'BWA', 'Botswana', 'Motswana, Botswanan'),
(74, 'BV', 'BVT', 'Bouvet Island', 'Bouvet Island'),
(76, 'BR', 'BRA', 'Brazil', 'Brazilian'),
(84, 'BZ', 'BLZ', 'Belize', 'Belizean'),
(86, 'IO', 'IOT', 'British Indian Ocean Territory', 'BIOT'),
(90, 'SB', 'SLB', 'Solomon Islands', 'Solomon Island'),
(92, 'VG', 'VGB', 'Virgin Islands (British)', 'British Virgin Island'),
(96, 'BN', 'BRN', 'Brunei Darussalam', 'Bruneian'),
(100, 'BG', 'BGR', 'Bulgaria', 'Bulgarian'),
(104, 'MM', 'MMR', 'Myanmar', 'Burmese'),
(108, 'BI', 'BDI', 'Burundi', 'Burundian'),
(112, 'BY', 'BLR', 'Belarus', 'Belarusian'),
(116, 'KH', 'KHM', 'Cambodia', 'Cambodian'),
(120, 'CM', 'CMR', 'Cameroon', 'Cameroonian'),
(124, 'CA', 'CAN', 'Canada', 'Canadian'),
(132, 'CV', 'CPV', 'Cabo Verde', 'Cabo Verdean'),
(136, 'KY', 'CYM', 'Cayman Islands', 'Caymanian'),
(140, 'CF', 'CAF', 'Central African Republic', 'Central African'),
(144, 'LK', 'LKA', 'Sri Lanka', 'Sri Lankan'),
(148, 'TD', 'TCD', 'Chad', 'Chadian'),
(152, 'CL', 'CHL', 'Chile', 'Chilean'),
(156, 'CN', 'CHN', 'China', 'Chinese'),
(158, 'TW', 'TWN', 'Taiwan, Province of China', 'Chinese, Taiwanese'),
(162, 'CX', 'CXR', 'Christmas Island', 'Christmas Island'),
(166, 'CC', 'CCK', 'Cocos (Keeling) Islands', 'Cocos Island'),
(170, 'CO', 'COL', 'Colombia', 'Colombian'),
(174, 'KM', 'COM', 'Comoros', 'Comoran, Comorian'),
(175, 'YT', 'MYT', 'Mayotte', 'Mahoran'),
(178, 'CG', 'COG', 'Congo (Republic of the)', 'Congolese'),
(180, 'CD', 'COD', 'Congo (Democratic Republic of the)', 'Congolese'),
(184, 'CK', 'COK', 'Cook Islands', 'Cook Island'),
(188, 'CR', 'CRI', 'Costa Rica', 'Costa Rican'),
(191, 'HR', 'HRV', 'Croatia', 'Croatian'),
(192, 'CU', 'CUB', 'Cuba', 'Cuban'),
(196, 'CY', 'CYP', 'Cyprus', 'Cypriot'),
(203, 'CZ', 'CZE', 'Czech Republic', 'Czech'),
(204, 'BJ', 'BEN', 'Benin', 'Beninese, Beninois'),
(208, 'DK', 'DNK', 'Denmark', 'Danish'),
(212, 'DM', 'DMA', 'Dominica', 'Dominican'),
(214, 'DO', 'DOM', 'Dominican Republic', 'Dominican'),
(218, 'EC', 'ECU', 'Ecuador', 'Ecuadorian'),
(222, 'SV', 'SLV', 'El Salvador', 'Salvadoran'),
(226, 'GQ', 'GNQ', 'Equatorial Guinea', 'Equatorial Guinean, Equatoguinean'),
(231, 'ET', 'ETH', 'Ethiopia', 'Ethiopian'),
(232, 'ER', 'ERI', 'Eritrea', 'Eritrean'),
(233, 'EE', 'EST', 'Estonia', 'Estonian'),
(234, 'FO', 'FRO', 'Faroe Islands', 'Faroese'),
(238, 'FK', 'FLK', 'Falkland Islands (Malvinas)', 'Falkland Island'),
(239, 'GS', 'SGS', 'South Georgia and the South Sandwich Islands', 'South Georgia or South Sandwich Islands'),
(242, 'FJ', 'FJI', 'Fiji', 'Fijian'),
(246, 'FI', 'FIN', 'Finland', 'Finnish'),
(248, 'AX', 'ALA', 'Åland Islands', 'Åland Island'),
(250, 'FR', 'FRA', 'France', 'French'),
(254, 'GF', 'GUF', 'French Guiana', 'French Guianese'),
(258, 'PF', 'PYF', 'French Polynesia', 'French Polynesian'),
(260, 'TF', 'ATF', 'French Southern Territories', 'French Southern Territories'),
(262, 'DJ', 'DJI', 'Djibouti', 'Djiboutian'),
(266, 'GA', 'GAB', 'Gabon', 'Gabonese'),
(268, 'GE', 'GEO', 'Georgia', 'Georgian'),
(270, 'GM', 'GMB', 'Gambia', 'Gambian'),
(275, 'PS', 'PSE', 'Palestine, State of', 'Palestinian'),
(276, 'DE', 'DEU', 'Germany', 'German'),
(288, 'GH', 'GHA', 'Ghana', 'Ghanaian'),
(292, 'GI', 'GIB', 'Gibraltar', 'Gibraltar'),
(296, 'KI', 'KIR', 'Kiribati', 'I-Kiribati'),
(300, 'GR', 'GRC', 'Greece', 'Greek, Hellenic'),
(304, 'GL', 'GRL', 'Greenland', 'Greenlandic'),
(308, 'GD', 'GRD', 'Grenada', 'Grenadian'),
(312, 'GP', 'GLP', 'Guadeloupe', 'Guadeloupe'),
(316, 'GU', 'GUM', 'Guam', 'Guamanian, Guambat'),
(320, 'GT', 'GTM', 'Guatemala', 'Guatemalan'),
(324, 'GN', 'GIN', 'Guinea', 'Guinean'),
(328, 'GY', 'GUY', 'Guyana', 'Guyanese'),
(332, 'HT', 'HTI', 'Haiti', 'Haitian'),
(334, 'HM', 'HMD', 'Heard Island and McDonald Islands', 'Heard Island or McDonald Islands'),
(336, 'VA', 'VAT', 'Vatican City State', 'Vatican'),
(340, 'HN', 'HND', 'Honduras', 'Honduran'),
(344, 'HK', 'HKG', 'Hong Kong', 'Hong Kong, Hong Kongese'),
(348, 'HU', 'HUN', 'Hungary', 'Hungarian, Magyar'),
(352, 'IS', 'ISL', 'Iceland', 'Icelandic'),
(356, 'IN', 'IND', 'India', 'Indian'),
(360, 'ID', 'IDN', 'Indonesia', 'Indonesian'),
(364, 'IR', 'IRN', 'Iran', 'Iranian, Persian'),
(368, 'IQ', 'IRQ', 'Iraq', 'Iraqi'),
(372, 'IE', 'IRL', 'Ireland', 'Irish'),
(376, 'IL', 'ISR', 'Israel', 'Israeli'),
(380, 'IT', 'ITA', 'Italy', 'Italian'),
(384, 'CI', 'CIV', 'Côte d\'Ivoire', 'Ivorian'),
(388, 'JM', 'JAM', 'Jamaica', 'Jamaican'),
(392, 'JP', 'JPN', 'Japan', 'Japanese'),
(398, 'KZ', 'KAZ', 'Kazakhstan', 'Kazakhstani, Kazakh'),
(400, 'JO', 'JOR', 'Jordan', 'Jordanian'),
(404, 'KE', 'KEN', 'Kenya', 'Kenyan'),
(408, 'KP', 'PRK', 'Korea (Democratic People\'s Republic of)', 'North Korean'),
(410, 'KR', 'KOR', 'Korea (Republic of)', 'South Korean'),
(414, 'KW', 'KWT', 'Kuwait', 'Kuwaiti'),
(417, 'KG', 'KGZ', 'Kyrgyzstan', 'Kyrgyzstani, Kyrgyz, Kirgiz, Kirghiz'),
(418, 'LA', 'LAO', 'Lao People\'s Democratic Republic', 'Lao, Laotian'),
(422, 'LB', 'LBN', 'Lebanon', 'Lebanese'),
(426, 'LS', 'LSO', 'Lesotho', 'Basotho'),
(428, 'LV', 'LVA', 'Latvia', 'Latvian'),
(430, 'LR', 'LBR', 'Liberia', 'Liberian'),
(434, 'LY', 'LBY', 'Libya', 'Libyan'),
(438, 'LI', 'LIE', 'Liechtenstein', 'Liechtenstein'),
(440, 'LT', 'LTU', 'Lithuania', 'Lithuanian'),
(442, 'LU', 'LUX', 'Luxembourg', 'Luxembourg, Luxembourgish'),
(446, 'MO', 'MAC', 'Macao', 'Macanese, Chinese'),
(450, 'MG', 'MDG', 'Madagascar', 'Malagasy'),
(454, 'MW', 'MWI', 'Malawi', 'Malawian'),
(458, 'MY', 'MYS', 'Malaysia', 'Malaysian'),
(462, 'MV', 'MDV', 'Maldives', 'Maldivian'),
(466, 'ML', 'MLI', 'Mali', 'Malian, Malinese'),
(470, 'MT', 'MLT', 'Malta', 'Maltese'),
(474, 'MQ', 'MTQ', 'Martinique', 'Martiniquais, Martinican'),
(478, 'MR', 'MRT', 'Mauritania', 'Mauritanian'),
(480, 'MU', 'MUS', 'Mauritius', 'Mauritian'),
(484, 'MX', 'MEX', 'Mexico', 'Mexican'),
(492, 'MC', 'MCO', 'Monaco', 'Monégasque, Monacan'),
(496, 'MN', 'MNG', 'Mongolia', 'Mongolian'),
(498, 'MD', 'MDA', 'Moldova (Republic of)', 'Moldovan'),
(499, 'ME', 'MNE', 'Montenegro', 'Montenegrin'),
(500, 'MS', 'MSR', 'Montserrat', 'Montserratian'),
(504, 'MA', 'MAR', 'Morocco', 'Moroccan'),
(508, 'MZ', 'MOZ', 'Mozambique', 'Mozambican'),
(512, 'OM', 'OMN', 'Oman', 'Omani'),
(516, 'NA', 'NAM', 'Namibia', 'Namibian'),
(520, 'NR', 'NRU', 'Nauru', 'Nauruan'),
(524, 'NP', 'NPL', 'Nepal', 'Nepali, Nepalese'),
(528, 'NL', 'NLD', 'Netherlands', 'Dutch, Netherlandic'),
(531, 'CW', 'CUW', 'Curaçao', 'Curaçaoan'),
(533, 'AW', 'ABW', 'Aruba', 'Aruban'),
(534, 'SX', 'SXM', 'Sint Maarten (Dutch part)', 'Sint Maarten'),
(535, 'BQ', 'BES', 'Bonaire, Sint Eustatius and Saba', 'Bonaire'),
(540, 'NC', 'NCL', 'New Caledonia', 'New Caledonian'),
(548, 'VU', 'VUT', 'Vanuatu', 'Ni-Vanuatu, Vanuatuan'),
(554, 'NZ', 'NZL', 'New Zealand', 'New Zealand, NZ'),
(558, 'NI', 'NIC', 'Nicaragua', 'Nicaraguan'),
(562, 'NE', 'NER', 'Niger', 'Nigerien'),
(566, 'NG', 'NGA', 'Nigeria', 'Nigerian'),
(570, 'NU', 'NIU', 'Niue', 'Niuean'),
(574, 'NF', 'NFK', 'Norfolk Island', 'Norfolk Island'),
(578, 'NO', 'NOR', 'Norway', 'Norwegian'),
(580, 'MP', 'MNP', 'Northern Mariana Islands', 'Northern Marianan'),
(581, 'UM', 'UMI', 'United States Minor Outlying Islands', 'American'),
(583, 'FM', 'FSM', 'Micronesia (Federated States of)', 'Micronesian'),
(584, 'MH', 'MHL', 'Marshall Islands', 'Marshallese'),
(585, 'PW', 'PLW', 'Palau', 'Palauan'),
(586, 'PK', 'PAK', 'Pakistan', 'Pakistani'),
(591, 'PA', 'PAN', 'Panama', 'Panamanian'),
(598, 'PG', 'PNG', 'Papua New Guinea', 'Papua New Guinean, Papuan'),
(600, 'PY', 'PRY', 'Paraguay', 'Paraguayan'),
(604, 'PE', 'PER', 'Peru', 'Peruvian'),
(608, 'PH', 'PHL', 'Philippines', 'Philippine, Filipino'),
(612, 'PN', 'PCN', 'Pitcairn', 'Pitcairn Island'),
(616, 'PL', 'POL', 'Poland', 'Polish'),
(620, 'PT', 'PRT', 'Portugal', 'Portuguese'),
(624, 'GW', 'GNB', 'Guinea-Bissau', 'Bissau-Guinean'),
(626, 'TL', 'TLS', 'Timor-Leste', 'Timorese'),
(630, 'PR', 'PRI', 'Puerto Rico', 'Puerto Rican'),
(634, 'QA', 'QAT', 'Qatar', 'Qatari'),
(638, 'RE', 'REU', 'Réunion', 'Réunionese, Réunionnais'),
(642, 'RO', 'ROU', 'Romania', 'Romanian'),
(643, 'RU', 'RUS', 'Russian Federation', 'Russian'),
(646, 'RW', 'RWA', 'Rwanda', 'Rwandan'),
(652, 'BL', 'BLM', 'Saint Barthélemy', 'Barthélemois'),
(654, 'SH', 'SHN', 'Saint Helena, Ascension and Tristan da Cunha', 'Saint Helenian'),
(659, 'KN', 'KNA', 'Saint Kitts and Nevis', 'Kittitian or Nevisian'),
(660, 'AI', 'AIA', 'Anguilla', 'Anguillan'),
(662, 'LC', 'LCA', 'Saint Lucia', 'Saint Lucian'),
(663, 'MF', 'MAF', 'Saint Martin (French part)', 'Saint-Martinoise'),
(666, 'PM', 'SPM', 'Saint Pierre and Miquelon', 'Saint-Pierrais or Miquelonnais'),
(670, 'VC', 'VCT', 'Saint Vincent and the Grenadines', 'Saint Vincentian, Vincentian'),
(674, 'SM', 'SMR', 'San Marino', 'Sammarinese'),
(678, 'ST', 'STP', 'Sao Tome and Principe', 'São Toméan'),
(682, 'SA', 'SAU', 'Saudi Arabia', 'Saudi, Saudi Arabian'),
(686, 'SN', 'SEN', 'Senegal', 'Senegalese'),
(688, 'RS', 'SRB', 'Serbia', 'Serbian'),
(690, 'SC', 'SYC', 'Seychelles', 'Seychellois'),
(694, 'SL', 'SLE', 'Sierra Leone', 'Sierra Leonean'),
(702, 'SG', 'SGP', 'Singapore', 'Singaporean'),
(703, 'SK', 'SVK', 'Slovakia', 'Slovak'),
(704, 'VN', 'VNM', 'Vietnam', 'Vietnamese'),
(705, 'SI', 'SVN', 'Slovenia', 'Slovenian, Slovene'),
(706, 'SO', 'SOM', 'Somalia', 'Somali, Somalian'),
(710, 'ZA', 'ZAF', 'South Africa', 'South African'),
(716, 'ZW', 'ZWE', 'Zimbabwe', 'Zimbabwean'),
(724, 'ES', 'ESP', 'Spain', 'Spanish'),
(728, 'SS', 'SSD', 'South Sudan', 'South Sudanese'),
(729, 'SD', 'SDN', 'Sudan', 'Sudanese'),
(732, 'EH', 'ESH', 'Western Sahara', 'Sahrawi, Sahrawian, Sahraouian'),
(740, 'SR', 'SUR', 'Suriname', 'Surinamese'),
(744, 'SJ', 'SJM', 'Svalbard and Jan Mayen', 'Svalbard'),
(748, 'SZ', 'SWZ', 'Swaziland', 'Swazi'),
(752, 'SE', 'SWE', 'Sweden', 'Swedish'),
(756, 'CH', 'CHE', 'Switzerland', 'Swiss'),
(760, 'SY', 'SYR', 'Syrian Arab Republic', 'Syrian'),
(762, 'TJ', 'TJK', 'Tajikistan', 'Tajikistani'),
(764, 'TH', 'THA', 'Thailand', 'Thai'),
(768, 'TG', 'TGO', 'Togo', 'Togolese'),
(772, 'TK', 'TKL', 'Tokelau', 'Tokelauan'),
(776, 'TO', 'TON', 'Tonga', 'Tongan'),
(780, 'TT', 'TTO', 'Trinidad and Tobago', 'Trinidadian or Tobagonian'),
(784, 'AE', 'ARE', 'United Arab Emirates', 'Emirati, Emirian, Emiri'),
(788, 'TN', 'TUN', 'Tunisia', 'Tunisian'),
(792, 'TR', 'TUR', 'Turkey', 'Turkish'),
(795, 'TM', 'TKM', 'Turkmenistan', 'Turkmen'),
(796, 'TC', 'TCA', 'Turks and Caicos Islands', 'Turks and Caicos Island'),
(798, 'TV', 'TUV', 'Tuvalu', 'Tuvaluan'),
(800, 'UG', 'UGA', 'Uganda', 'Ugandan'),
(804, 'UA', 'UKR', 'Ukraine', 'Ukrainian'),
(807, 'MK', 'MKD', 'Macedonia (the former Yugoslav Republic of)', 'Macedonian'),
(818, 'EG', 'EGY', 'Egypt', 'Egyptian'),
(826, 'GB', 'GBR', 'United Kingdom of Great Britain and Northern Ireland', 'British, UK'),
(831, 'GG', 'GGY', 'Guernsey', 'Channel Island'),
(832, 'JE', 'JEY', 'Jersey', 'Channel Island'),
(833, 'IM', 'IMN', 'Isle of Man', 'Manx'),
(834, 'TZ', 'TZA', 'Tanzania, United Republic of', 'Tanzanian'),
(840, 'US', 'USA', 'United States of America', 'American'),
(850, 'VI', 'VIR', 'Virgin Islands (U.S.)', 'U.S. Virgin Island'),
(854, 'BF', 'BFA', 'Burkina Faso', 'Burkinabé'),
(858, 'UY', 'URY', 'Uruguay', 'Uruguayan'),
(860, 'UZ', 'UZB', 'Uzbekistan', 'Uzbekistani, Uzbek'),
(862, 'VE', 'VEN', 'Venezuela (Bolivarian Republic of)', 'Venezuelan'),
(876, 'WF', 'WLF', 'Wallis and Futuna', 'Wallis and Futuna, Wallisian or Futunan'),
(882, 'WS', 'WSM', 'Samoa', 'Samoan'),
(887, 'YE', 'YEM', 'Yemen', 'Yemeni'),
(894, 'ZM', 'ZMB', 'Zambia', 'Zambian');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logs_id` int(11) NOT NULL,
  `accounts_id` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logs_id`, `accounts_id`, `content`, `created_at`) VALUES
(1, '6', 'changed his / her account password', '2018-03-08 18:53:04'),
(2, '6', 'updated his / her account details', '2018-03-08 18:54:20'),
(3, '1', 'updated his / her account details', '2018-03-08 19:03:18'),
(4, '1', 'updated his / her account details', '2018-03-08 19:11:54'),
(5, '1', 'updated his / her account password', '2018-03-08 19:11:59'),
(6, '1', 'updated his / her account details', '2018-03-09 16:01:11'),
(7, '1', 'updated his / her account details', '2018-03-09 16:01:12'),
(8, '1', 'updated his / her account details', '2018-03-09 16:01:12'),
(9, '1', 'updated his / her account details', '2018-03-09 16:01:13'),
(10, '5', 'updated his / her account details', '2018-03-09 16:09:48'),
(11, '9', 'updated his / her account details', '2018-03-09 16:10:41'),
(12, '9', 'updated his / her account details', '2018-03-09 16:10:44'),
(13, '9', 'updated his / her account details', '2018-03-09 16:10:48'),
(14, '1', 'updated his / her account details', '2018-03-10 03:53:52');

-- --------------------------------------------------------

--
-- Table structure for table `medical_record_out_patient`
--

CREATE TABLE `medical_record_out_patient` (
  `outpatients_id` int(11) NOT NULL,
  `patient_code` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `chief_complaints` varchar(255) NOT NULL,
  `opd_case_number` varchar(255) NOT NULL,
  `physicians_id` int(11) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `pulse_rate` varchar(255) NOT NULL,
  `respiratory_rate` varchar(255) NOT NULL,
  `temperature` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `impression` varchar(255) NOT NULL,
  `treatment` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_record_out_patient`
--

INSERT INTO `medical_record_out_patient` (`outpatients_id`, `patient_code`, `surname`, `firstname`, `middlename`, `birthday`, `age`, `gender`, `address`, `chief_complaints`, `opd_case_number`, `physicians_id`, `hp`, `pulse_rate`, `respiratory_rate`, `temperature`, `weight`, `impression`, `treatment`, `date`, `type`, `time`) VALUES
(2, 954169, 'Lozano', 'John David', 'Sadia', '2018-03-15', '21', 'Male', 'Blk.1  L.50', '10002', '10002', 5, '100', '90', '100', '35', '190', '10002', '10002', '2018-04-13', 'New Patient', '05:30'),
(3, 528493, 'Nino', 'Juffrey', 'De Guzman', '1994-03-31', '23', 'Male', 'Quezon City', 'unknown', '100222155', 5, '100', '70', '100', '35', '190', 'unknown', 'unknown', '2018-03-12', 'Revisit', '13:00'),
(4, 421196, 'Broncano', 'Sajer', 'Se', '1994-03-31', '23', 'Male', 'Quezon City', 'unknown', '10020010', 5, '100', '70', '100', '35', '190', 'unknown', 'unknown', '2018-04-13', 'Revisit', '05:30'),
(6, 886486, 'Lozano', 'John David', 'Sadia', '1994-03-03', '23', 'Male', 'Blk.1  L.50', 'unknown', '100292029', 5, '100', '100', '100', '35', '190', 'unknown', 'unknown', '2018-03-15', 'Revisit', '09:55');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `rooms_id` int(11) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `room_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rooms_id`, `room_type`, `floor`, `room_number`) VALUES
(17, 'Ward', '1st Floor', '101'),
(19, 'Ward', '1st Floor', '102'),
(22, 'Ward', '1st Floor', '105'),
(23, 'Ward', '1st Floor', '104'),
(25, 'Ward', '1st Floor', '103');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accounts_id`);

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`admissions_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`num_code`),
  ADD UNIQUE KEY `alpha_2_code` (`alpha_2_code`),
  ADD UNIQUE KEY `alpha_3_code` (`alpha_3_code`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logs_id`);

--
-- Indexes for table `medical_record_out_patient`
--
ALTER TABLE `medical_record_out_patient`
  ADD PRIMARY KEY (`outpatients_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`rooms_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `accounts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `admissions_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `medical_record_out_patient`
--
ALTER TABLE `medical_record_out_patient`
  MODIFY `outpatients_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `rooms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
