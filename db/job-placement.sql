-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 26, 2019 at 06:20 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job-placement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `name`, `email`, `password`) VALUES
(1, 'admin', 'Mahfuja Akter', 'mahfujatani75@gmail.com', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(10) NOT NULL,
  `student_username` varchar(50) NOT NULL,
  `company_username` varchar(50) NOT NULL,
  `offer_id` varchar(10) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `recommended` varchar(50) NOT NULL,
  `teacher_username` varchar(50) NOT NULL,
  `approval` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `student_username`, `company_username`, `offer_id`, `job_title`, `date`, `recommended`, `teacher_username`, `approval`) VALUES
(2, 'arman3472', 'anttech', '1', 'Web Developer [PHP]', '26 Jan 2019', '', '', ''),
(3, 'emon', 'amberit', '3', '', '26 Jan 2019', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `collages`
--

CREATE TABLE `collages` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `board` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collages`
--

INSERT INTO `collages` (`id`, `name`, `location`, `phone`, `email`, `url`, `board`) VALUES
(1, 'Khulna Polytechnic Institute', 'Khulna', 'N/A', 'principal@kpi.edu', 'https://kpi.edu', 'bteb'),
(2, 'Al-Haz Sarowar Khal Degree Collage', 'Khulna', '1234567890', 'email@gmail.com', '', 'general'),
(3, 'Govt. BL Collage', 'Khulna', 'N/A', 'principal@blcollage.com', '', 'genaral'),
(4, 'City Polytechnic Institute', 'Khulna', '1234567890', 'email@gmail.com', '', 'bteb');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `type`, `location`, `phone`, `email`, `username`, `password`, `url`) VALUES
(1, 'Amber IT', 'Networking', 'Dhaka', '12345678911', 'amberit@aol.com', 'amberit', 'pass', 'https://amberit.com'),
(3, 'eShopBD : a online eCommerce shop', 'Online Shop', 'Khulna', 'N/A', 'contact@eshopbd.com', 'eshopbd', 'pass', ''),
(4, 'Ruchishil.com', 'Ecommerce shop', 'Khulna', '1234567', 'support@ruchishil.com', 'ruchishil.com', 'pass', ''),
(5, 'Sunsabil', 'IT', 'Khulna', '1234567890', 'support@sunsubil.com', 'sunsabil', '1234', ''),
(6, 'Ant-Tech (sister concern of SKYLAB)', 'IT', 'Dhaka', '1234567890', 'anttech@email.com', 'anttech', '1234', '');

-- --------------------------------------------------------

--
-- Table structure for table `company_list`
--

CREATE TABLE `company_list` (
  `id` int(10) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `location` varchar(25) NOT NULL,
  `url` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_list`
--

INSERT INTO `company_list` (`id`, `company_name`, `location`, `url`) VALUES
(1, 'eShopBD', 'Khulna', 'https://eshopbd.com'),
(2, 'Ruchishil.com', 'Khulna', 'http://ruchishil.com'),
(4, 'Arong', 'Khulna', 'https://aarong.com.bd');

-- --------------------------------------------------------

--
-- Table structure for table `joboffer`
--

CREATE TABLE `joboffer` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `location` varchar(20) NOT NULL,
  `requirement` varchar(100) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `deadline` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joboffer`
--

INSERT INTO `joboffer` (`id`, `title`, `company`, `location`, `requirement`, `experience`, `phone`, `email`, `deadline`, `username`) VALUES
(1, 'Web Developer [PHP]', 'Ant-Tech (sister concern of SKYLAB)', 'Mirpur, Dhaka', 'PHP, MYSQL, HTML, CSS', '2 years', '123456789', 'anttech@email.com', '05-Dec-2018', 'anttech'),
(2, 'Job Title', 'Company', 'Location', 'Requirements', 'Experience', '01000000000', 'company@email.com', 'Deadline', 'company'),
(3, 'Network Associate', 'Amber IT', 'Dhaka', 'Networking', '2 years', '12345678911', 'amberit@aol.com', '23-2-18', 'amberit');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `images` varchar(100) NOT NULL,
  `position` varchar(50) NOT NULL,
  `visibility` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `images`, `position`, `visibility`) VALUES
(1, 'Job Placement', 'Job placement is a service that educational institutions, employment agencies and recruiters offer to help individuals find work. Examples of placement programs include a university helping students find internships and practice interviewing, an employment agency offering vocational counseling and job leads to job seekers, and the military helping prepare soldiers for suitable careers during and after their service. Depending on where you receive placement services, the program may be free, or you may be responsible to pay for some or all of the cost.', 'img-1.gif', 'home', 1),
(2, 'Educational Job Placement Departments', 'Colleges and universities typically have a placement program, meaning a placement officer will meet with students prior to graduation to discuss employment strategies. This placement offers helps you develop an appropriate job-seeking approach, depending on your education, skill levels and personal circumstances. This usually includes writing a resume, practicing interview techniques and going out on job leads the placement officer has already vetted. Employment placement departments may also help students and graduates secure internships, work-study opportunities and part-time employment.', '2.jpg', 'home', 1),
(3, 'Employment Placement Agencies', 'Employment placement agencies work to create relationships with a number of large employers for whom they screen and place employees for both temporary and permanent positions. Signing up with an agency to help with your job search usually means working with a placement representative to discuss your career goals and objectives. Based on the information you supply and your credentials, the agency will arrange for you to interview with suitable employers they have contracts with for positions for which you\'re qualified.', 'h2.jpg', 'home', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `district` varchar(15) NOT NULL,
  `department` varchar(50) NOT NULL,
  `session` varchar(10) NOT NULL,
  `passed` varchar(5) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `username`, `email`, `phone`, `district`, `department`, `session`, `passed`, `password`) VALUES
(1, 'Mahfuja Akter', 'mahfuja', 'mahfujatani75@gmail.com', '012345678910', 'Khulna', 'Computer', '15-16', '2019', 'pass'),
(2, 'Arman Arif', 'arman3472', 'arman3472rmn@gmail.com', '01755900055', 'Khulna', 'Computer', '15-16', '2019', 'pass'),
(3, 'Imran Hossain', 'imran', 'imranir789@gmail.com', '01764444655', 'Khulna', 'Business Studies', '2015', '2017', '1234'),
(5, 'Ahmed Emon', 'emon', 'emon@gmail.com', '1234567890', 'Khulna', 'Computer', '14-15', '2018', '123');

-- --------------------------------------------------------

--
-- Table structure for table `students_information`
--

CREATE TABLE `students_information` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `board_roll` varchar(50) NOT NULL,
  `registration_no` varchar(100) NOT NULL,
  `collage_name` varchar(255) NOT NULL,
  `session` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_cv`
--

CREATE TABLE `student_cv` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `fathers_name` varchar(100) NOT NULL,
  `mothers_name` varchar(100) NOT NULL,
  `date_of_birth` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `village` varchar(20) NOT NULL,
  `post_office` varchar(20) NOT NULL,
  `post_code` varchar(20) NOT NULL,
  `upazilla` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `present_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `religion` varchar(20) NOT NULL,
  `marital_status` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `results` text NOT NULL,
  `experience` text NOT NULL,
  `picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_cv`
--

INSERT INTO `student_cv` (`id`, `username`, `first_name`, `last_name`, `fathers_name`, `mothers_name`, `date_of_birth`, `gender`, `village`, `post_office`, `post_code`, `upazilla`, `district`, `present_address`, `permanent_address`, `religion`, `marital_status`, `nationality`, `mobile_number`, `email`, `results`, `experience`, `picture`) VALUES
(1, 'arman3472', 'Arman', 'Arif', 'Md. Abdus Salam Molla', 'Beautiy Begum', '17 Mar 1998', 'Male', '', '', '', '', '', '[\"Hazigram\",\"Hazigram\",\"9222\",\"Dighalia\",\"Khulna\"]', '[\"Hazigram\",\"Hazigram\",\"9222\",\"Dighalia\",\"Khulna\"]', 'Islam', 'Single', 'Bangladeshi', '01755900055', 'arman3472@aol.com', '{\"ssc\":{\"group\":\"Science\",\"session\":\"2013\",\"passed\":\"2015\",\"board\":\"Jessore\",\"result\":\"4.50\"},\"hsc\":{\"group\":\"Diploma in Computer\",\"session\":\"15-16\",\"passed\":\"2019\",\"board\":\"BTEB\",\"result\":\"3.00\"},\"bachelor\":{\"group\":\"N/A\",\"session\":\"N/A\",\"passed\":\"N/A\",\"board\":\"N/A\",\"result\":\"N/A\"},\"masters\":{\"group\":\"N/A\",\"session\":\"N/A\",\"passed\":\"N/A\",\"board\":\"N/A\",\"result\":\"N/A\"}}', 'No Experience Yet', ''),
(5, 'imran', 'Md. Imran', 'Hossain', 'Md. Abdus Salam', 'Beautiy Begum', '7 Dec 1992', 'Male', '', '', '', '', '', '{\"house_road_vill\":\"Hazigram\",\"post_office\":\"\",\"post_code\":\"\",\"upazilla\":\"\",\"present_district\":\"Select District\"}', '{\"p_house_road_vill\":\"Hazigram\",\"p_post_office\":\"\",\"p_post_code\":\"\",\"p_upazilla\":\"\",\"permanent_district\":\"Select District\"}', '', 'Single', '', '', '', '{\"ssc\":{\"group\":\"Select Group\",\"session\":\"\",\"passed\":\"\",\"board\":\"\",\"result\":\"\"},\"hsc\":{\"group\":\"Select Group\",\"session\":\"\",\"passed\":\"\",\"board\":\"\",\"result\":\"\"},\"bachelor\":{\"group\":\"Select Group\",\"session\":\"\",\"passed\":\"\",\"board\":\"\",\"result\":\"\"},\"masters\":{\"group\":\"Select Group\",\"session\":\"\",\"passed\":\"\",\"board\":\"\",\"result\":\"\"}}', '', ''),
(6, 'emon', 'Ahmed', 'Emon', 'Bla', 'Bla', '27 Jan 2019', 'Male', '', '', '', '', '', '[\"abc\",\"\",\"\",\"\",\"Select District\"]', '[\"\",\"\",\"\",\"\",\"Select District\"]', 'Islam', 'Single', 'Bangladeshi', '01755900055', 'support@sunsubil.com', '{\"ssc\":{\"group\":\"Select Group\",\"session\":\"\",\"passed\":\"\",\"board\":\"\",\"result\":\"\"},\"hsc\":{\"group\":\"Select Group\",\"session\":\"\",\"passed\":\"\",\"board\":\"\",\"result\":\"\"},\"bachelor\":{\"group\":\"Select Group\",\"session\":\"\",\"passed\":\"\",\"board\":\"\",\"result\":\"\"},\"masters\":{\"group\":\"Select Group\",\"session\":\"\",\"passed\":\"\",\"board\":\"\",\"result\":\"\"}}', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `district` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `username`, `district`, `department`, `title`, `phone`, `email`, `password`) VALUES
(1, 'Mr. Sabuj Mondal', 'sabuj', 'Khulna', 'Computer', 'Junior Instructor', '12345678901', 'sabujcse@gmail.com', 'pass'),
(2, 'Md Ibrahim', 'ibrahim', 'Barisal', 'Computer', 'Guest Teacher', '01234567890', 'ibrahim@gmail.com', '1234'),
(3, 'Prodip Ghosh', 'prodip', 'Satkhira', 'Computer', '', '1234567890', 'prodip@gmail.com', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collages`
--
ALTER TABLE `collages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_list`
--
ALTER TABLE `company_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joboffer`
--
ALTER TABLE `joboffer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_information`
--
ALTER TABLE `students_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_cv`
--
ALTER TABLE `student_cv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `collages`
--
ALTER TABLE `collages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company_list`
--
ALTER TABLE `company_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `joboffer`
--
ALTER TABLE `joboffer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students_information`
--
ALTER TABLE `students_information`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_cv`
--
ALTER TABLE `student_cv`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
