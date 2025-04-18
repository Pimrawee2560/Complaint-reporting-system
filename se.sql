-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2025 at 02:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrative_form`
--

CREATE TABLE `administrative_form` (
  `id` int(255) NOT NULL,
  `Date` datetime NOT NULL,
  `Administrative` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Career` varchar(255) NOT NULL,
  `Evaluate_1` varchar(255) NOT NULL,
  `Evaluate_2` varchar(255) NOT NULL,
  `Evaluate_3` varchar(255) NOT NULL,
  `Evaluate_4` varchar(255) NOT NULL,
  `Evaluate_5` varchar(255) NOT NULL,
  `Suggestion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrative_form`
--

INSERT INTO `administrative_form` (`id`, `Date`, `Administrative`, `Gender`, `Age`, `Career`, `Evaluate_1`, `Evaluate_2`, `Evaluate_3`, `Evaluate_4`, `Evaluate_5`, `Suggestion`) VALUES
(1, '2024-03-26 19:10:40', 'การขออนุญาตใช้สถานที่', 'เพศชาย', '20-30ปี', 'รับราชการ/รัฐวิสาหกิจ', 'มากที่สุด', 'มากที่สุด', 'มากที่สุด', 'ปานกลาง', 'มาก', ''),
(2, '2024-03-26 19:11:03', 'การขออนุญาตใช้สถานที่', 'เพศชาย', '20-30ปี', 'รับราชการ/รัฐวิสาหกิจ', 'มากที่สุด', 'มากที่สุด', 'มากที่สุด', 'ปานกลาง', 'มาก', ''),
(3, '2024-03-26 19:13:55', 'การขออนุญาตใช้สถานที่', 'เพศชาย', 'ต่ำกว่า20ปี', 'รับจ้าง', 'มากที่สุด', 'น้อย', 'มากที่สุด', 'มาก', 'น้อย', '');

-- --------------------------------------------------------

--
-- Table structure for table `building_control_form`
--

CREATE TABLE `building_control_form` (
  `id` int(255) NOT NULL,
  `Date` datetime NOT NULL,
  `Building` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Career` varchar(255) NOT NULL,
  `Evaluate_1` varchar(255) NOT NULL,
  `Evaluate_2` varchar(255) NOT NULL,
  `Evaluate_3` varchar(255) NOT NULL,
  `Evaluate_4` varchar(255) NOT NULL,
  `Evaluate_5` varchar(255) NOT NULL,
  `Suggestion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `community_development_form`
--

CREATE TABLE `community_development_form` (
  `id` int(255) NOT NULL,
  `Date` datetime NOT NULL,
  `Communitydevelopment` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Career` varchar(255) NOT NULL,
  `Evaluate_1` varchar(255) NOT NULL,
  `Evaluate_2` varchar(255) NOT NULL,
  `Evaluate_3` varchar(255) NOT NULL,
  `Evaluate_4` varchar(255) NOT NULL,
  `Evaluate_5` varchar(255) NOT NULL,
  `Suggestion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(11) NOT NULL,
  `Problems` varchar(255) NOT NULL,
  `Name_user` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `Problem_type` varchar(255) NOT NULL,
  `Problem_details` varchar(255) NOT NULL,
  `Image_file` varchar(255) NOT NULL,
  `Problem_location` point NOT NULL,
  `Problem_Date` date NOT NULL,
  `Problem_update` varchar(255) NOT NULL,
  `Responsible_position` varchar(255) NOT NULL,
  `who_Responsible` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `Problems`, `Name_user`, `id_user`, `Problem_type`, `Problem_details`, `Image_file`, `Problem_location`, `Problem_Date`, `Problem_update`, `Responsible_position`, `who_Responsible`) VALUES
(42, 'ถนนชำรุด', 'วุฒิพงษ์ ', 8, 'option1', 'ถนนชำรุดเสียหาย พังทลาย เดินทางไม่ได้', 'road.jpg ', 0x, '2024-04-11', 'option2', 'กองสาธารณสุขและสิ่งแวดล้อม', 'นายอนุสรณ์ เจือมณี');

-- --------------------------------------------------------

--
-- Table structure for table `disaster_prevention_and_relief_form`
--

CREATE TABLE `disaster_prevention_and_relief_form` (
  `id` int(255) NOT NULL,
  `Date` datetime NOT NULL,
  `Disaster` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Career` varchar(255) NOT NULL,
  `Evaluate_1` varchar(255) NOT NULL,
  `Evaluate_2` varchar(255) NOT NULL,
  `Evaluate_3` varchar(255) NOT NULL,
  `Evaluate_4` varchar(255) NOT NULL,
  `Evaluate_5` varchar(255) NOT NULL,
  `Suggestion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `educationform`
--

CREATE TABLE `educationform` (
  `id` int(255) NOT NULL,
  `Date` datetime NOT NULL,
  `Education` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Career` varchar(255) NOT NULL,
  `Evaluate_1` varchar(255) NOT NULL,
  `Evaluate_2` varchar(255) NOT NULL,
  `Evaluate_3` varchar(255) NOT NULL,
  `Evaluate_4` varchar(255) NOT NULL,
  `Evaluate_5` varchar(255) NOT NULL,
  `Suggestion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `electrical_form`
--

CREATE TABLE `electrical_form` (
  `id` int(255) NOT NULL,
  `Date` datetime NOT NULL,
  `Electrical` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Career` varchar(255) NOT NULL,
  `Evaluate_1` varchar(255) NOT NULL,
  `Evaluate_2` varchar(255) NOT NULL,
  `Evaluate_3` varchar(255) NOT NULL,
  `Evaluate_4` varchar(255) NOT NULL,
  `Evaluate_5` varchar(255) NOT NULL,
  `Suggestion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `electrical_form`
--

INSERT INTO `electrical_form` (`id`, `Date`, `Electrical`, `Gender`, `Age`, `Career`, `Evaluate_1`, `Evaluate_2`, `Evaluate_3`, `Evaluate_4`, `Evaluate_5`, `Suggestion`) VALUES
(1, '2024-04-10 22:49:07', 'แจ้งซ่อมบำรุงไฟฟ้าสาธารณะ', 'เพศชาย', '20 - 30 ปี', 'เกษตรกรรม', 'มาก', 'มากที่สุด', 'มากที่สุด', 'ปานกลาง', 'มากที่สุด', '');

-- --------------------------------------------------------

--
-- Table structure for table `finance_and_accounting_form`
--

CREATE TABLE `finance_and_accounting_form` (
  `id` int(255) NOT NULL,
  `Date` datetime NOT NULL,
  `Financeandaccounting` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Career` varchar(255) NOT NULL,
  `Evaluate_1` varchar(255) NOT NULL,
  `Evaluate_2` varchar(255) NOT NULL,
  `Evaluate_3` varchar(255) NOT NULL,
  `Evaluate_4` varchar(255) NOT NULL,
  `Evaluate_5` varchar(255) NOT NULL,
  `Suggestion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `legal_form`
--

CREATE TABLE `legal_form` (
  `id` int(255) NOT NULL,
  `Date` datetime NOT NULL,
  `Legal` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Career` varchar(255) NOT NULL,
  `Evaluate_1` varchar(255) NOT NULL,
  `Evaluate_2` varchar(255) NOT NULL,
  `Evaluate_3` varchar(255) NOT NULL,
  `Evaluate_4` varchar(255) NOT NULL,
  `Evaluate_5` varchar(255) NOT NULL,
  `Suggestion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `officer_form`
--

CREATE TABLE `officer_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `position` text NOT NULL,
  `officer_image` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officer_form`
--

INSERT INTO `officer_form` (`id`, `name`, `gender`, `username`, `password`, `phone`, `position`, `officer_image`, `user_type`) VALUES
(1, 'นายชำนาญ จารุเสนีย์', 'ชาย', 'Chumnan', '1122', '0881481068', 'รองนายก องค์การบริหารส่วนตำบล', 'chumnan.jpg', 'ceo'),
(2, 'นางสุรี ทิพย์ประสาตร์', 'หญิง', 'Suree', '1122', '0817852901', 'รองนายก องค์การบริหารส่วนตำบล', 'suree.jpg', 'ceo'),
(3, 'นายอนุชิต แสนสุข', 'ชาย', 'Anusit', '1111', '1234567890', 'เจ้าหน้าที่ป้องกันและบรรเทาสาธารณภัย', 'anuchit', 'officer'),
(4, 'นางสาววิภาวรรณ เกิดผา', 'หญิง', 'Wipawan', '1111', '1234567890', 'นักวิเคราะห์นโยบายและแผน', 'wipawan', 'officer'),
(5, 'นายอนุสรณ์ เจือมณี', 'ชาย', 'Anusorn', '1111', '0635416698', 'เจ้าหน้าที่กองช่าง', 'anusorn', 'officer'),
(6, 'นายจิรศักดิ์ อำนาจ', 'ชาย', 'Jirasak', '1111', '', 'เจ้าหน้าที่กองช่าง', 'jirasuk', 'officer'),
(7, 'นายรัฐกุล ยางสวย', 'ชาย', 'Ratkurn', '1111', '', 'เจ้าหน้าที่กองช่าง', 'ratakun', 'officer\r\n'),
(8, 'นายพงศกร กันนิกา', 'ชาย', 'Pongsakorn', '1111', '', 'เจ้าหน้าที่กองช่าง', 'pongsakorn', 'officer'),
(9, 'นางสาวแววตา กระต่ายทอง', 'หญิง', 'Vewta', '1111', '', 'เจ้าหน้าที่กองช่าง', 'vaewta', 'officer\r\n'),
(10, 'นางสาวภครพร นาคคุ้ม', '', 'Pakkaporn', '1111', '', 'เจ้าหน้าที่กองช่าง', '', 'officer'),
(11, 'นางสาวอรุณลักษณ์ ทำจันทรทา', 'หญิง', 'Arunrak', '1111', '', 'กองสาธารณสุขและสิ่งแวดล้อม', 'arunruk', 'officer');

-- --------------------------------------------------------

--
-- Table structure for table `public_health_form`
--

CREATE TABLE `public_health_form` (
  `id` int(255) NOT NULL,
  `Date` datetime NOT NULL,
  `Publichealth` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Career` varchar(255) NOT NULL,
  `Evaluate_1` varchar(255) NOT NULL,
  `Evaluate_2` varchar(255) NOT NULL,
  `Evaluate_3` varchar(255) NOT NULL,
  `Evaluate_4` varchar(255) NOT NULL,
  `Evaluate_5` varchar(255) NOT NULL,
  `Suggestion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `public_health_form`
--

INSERT INTO `public_health_form` (`id`, `Date`, `Publichealth`, `Gender`, `Age`, `Career`, `Evaluate_1`, `Evaluate_2`, `Evaluate_3`, `Evaluate_4`, `Evaluate_5`, `Suggestion`) VALUES
(1, '2024-03-26 19:05:34', 'การขอสนับสนุนวัสดุ/อุปกรณ์ สารเคมีในการป้องกัน ควบคุมโรคไข้เลือดออ', 'เพศชาย', '20 - 30 ปี', 'อื่นๆ', 'มาก', 'มาก', 'มาก', 'มาก', 'ปานกลาง', 'ดีมากน้จ้พ');

-- --------------------------------------------------------

--
-- Table structure for table `supplies_form`
--

CREATE TABLE `supplies_form` (
  `id` int(255) NOT NULL,
  `Date` datetime NOT NULL,
  `Supplies` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Career` varchar(255) NOT NULL,
  `Evaluate_1` varchar(255) NOT NULL,
  `Evaluate_2` varchar(255) NOT NULL,
  `Evaluate_3` varchar(255) NOT NULL,
  `Evaluate_4` varchar(255) NOT NULL,
  `Evaluate_5` varchar(255) NOT NULL,
  `Suggestion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tax_collection_form`
--

CREATE TABLE `tax_collection_form` (
  `id` int(255) NOT NULL,
  `Date` datetime NOT NULL,
  `Tax_collection` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Age` varchar(255) NOT NULL,
  `Career` varchar(255) NOT NULL,
  `Evaluate_1` varchar(255) NOT NULL,
  `Evaluate_2` varchar(255) NOT NULL,
  `Evaluate_3` varchar(255) NOT NULL,
  `Evaluate_4` varchar(255) NOT NULL,
  `Evaluate_5` varchar(255) NOT NULL,
  `Suggestion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tax_collection_form`
--

INSERT INTO `tax_collection_form` (`id`, `Date`, `Tax_collection`, `Gender`, `Age`, `Career`, `Evaluate_1`, `Evaluate_2`, `Evaluate_3`, `Evaluate_4`, `Evaluate_5`, `Suggestion`) VALUES
(1, '2024-03-26 19:20:01', 'ภาษีป้าย', 'เพศชาย', '20 - 30 ปี', 'เกษตรกรรม', 'มาก', 'ปานกลาง', 'มาก', 'ปานกลาง', 'น้อย', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `user_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`, `username`, `phone`, `address`, `user_image`) VALUES
(8, 'rukwonggot  wongwises', 'dantru@gmail.com', '12345', 'user', 'dant', '0973303148', '45/1 ม.8', 'img/tiw.jpg'),
(9, 'foden', 'apisarata64@nu.ac.th', '1234', 'user', 'Chumnan', '0825869878', '56 ม.5 ', 'img/tiw.jpg'),
(10, 'ฮาแลนด์', 'dantrukwonggod@gmail.com', '12345', 'user', 'haaland', '0813793794', '45/1 ม.8', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrative_form`
--
ALTER TABLE `administrative_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `building_control_form`
--
ALTER TABLE `building_control_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `community_development_form`
--
ALTER TABLE `community_development_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disaster_prevention_and_relief_form`
--
ALTER TABLE `disaster_prevention_and_relief_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educationform`
--
ALTER TABLE `educationform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electrical_form`
--
ALTER TABLE `electrical_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finance_and_accounting_form`
--
ALTER TABLE `finance_and_accounting_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `legal_form`
--
ALTER TABLE `legal_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officer_form`
--
ALTER TABLE `officer_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_health_form`
--
ALTER TABLE `public_health_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplies_form`
--
ALTER TABLE `supplies_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_collection_form`
--
ALTER TABLE `tax_collection_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrative_form`
--
ALTER TABLE `administrative_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `building_control_form`
--
ALTER TABLE `building_control_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `community_development_form`
--
ALTER TABLE `community_development_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `disaster_prevention_and_relief_form`
--
ALTER TABLE `disaster_prevention_and_relief_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `educationform`
--
ALTER TABLE `educationform`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `electrical_form`
--
ALTER TABLE `electrical_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `finance_and_accounting_form`
--
ALTER TABLE `finance_and_accounting_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `legal_form`
--
ALTER TABLE `legal_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `officer_form`
--
ALTER TABLE `officer_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `public_health_form`
--
ALTER TABLE `public_health_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplies_form`
--
ALTER TABLE `supplies_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_collection_form`
--
ALTER TABLE `tax_collection_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
