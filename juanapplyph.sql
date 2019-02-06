-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2019 at 01:25 AM
-- Server version: 10.1.34-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juanapplyph`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_info`
--

CREATE TABLE `additional_info` (
  `id_addinfo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `expected_salary` varchar(255) NOT NULL,
  `preferred_location` varchar(255) NOT NULL,
  `other_info` varchar(500) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `additional_info`
--

INSERT INTO `additional_info` (`id_addinfo`, `id_user`, `expected_salary`, `preferred_location`, `other_info`, `address`, `nationality`) VALUES
(1, 1, '20000', 'Makati', '', 'Makati City', 'Filipino'),
(8, 10, '22000', 'Manila', '', 'Manila', 'Filipino');

-- --------------------------------------------------------

--
-- Table structure for table `company_info`
--

CREATE TABLE `company_info` (
  `id_companyinfo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `company_type` varchar(255) NOT NULL,
  `registration_num` varchar(255) NOT NULL,
  `business_add` varchar(255) NOT NULL,
  `city_business` varchar(255) NOT NULL,
  `postcode` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `educational_bg`
--

CREATE TABLE `educational_bg` (
  `id_educ_bg` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `graduated_month` varchar(255) NOT NULL,
  `graduated_year` int(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `school_location` varchar(255) NOT NULL,
  `field_study` varchar(255) NOT NULL,
  `grade` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `educational_bg`
--

INSERT INTO `educational_bg` (`id_educ_bg`, `id_user`, `school_name`, `graduated_month`, `graduated_year`, `qualification`, `school_location`, `field_study`, `grade`) VALUES
(1, 1, 'University Of Makati', 'May', 2017, 'Vocational Diploma/Short Course Certificate', 'J.P Rizal Ext West Rembo', 'Information Technology', ''),
(7, 10, 'UMAK', 'Mar', 2018, 'Bachelor\'s /College Degree', 'makati', 'IT Comsci', ''),
(8, 10, 'STI', 'Mar', 2016, 'Vocational Diploma/Short Course Certificate', 'STI', 'IT', '');

-- --------------------------------------------------------

--
-- Table structure for table `job_description`
--

CREATE TABLE `job_description` (
  `id_jobdesc` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `job_desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_details`
--

CREATE TABLE `job_details` (
  `id_jobdet` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `position_title` varchar(255) NOT NULL,
  `employement_type` varchar(255) NOT NULL,
  `position_level` varchar(255) NOT NULL,
  `work_location` varchar(255) NOT NULL,
  `month_sal_min` int(111) NOT NULL,
  `month_sal_max` int(111) NOT NULL,
  `display_ad` varchar(200) NOT NULL,
  `specializaton_jb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_requirements`
--

CREATE TABLE `job_requirements` (
  `id_jobreq` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `educ_level` varchar(255) NOT NULL,
  `field_study` varchar(255) NOT NULL,
  `years_exp` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `languages` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id_skills` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `profiency` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'non-active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `firstname`, `lastname`, `email`, `password`, `contact_num`, `address`, `user_type`, `status`) VALUES
(1, 'mary', 'teoxon', 'maryme@gmail.com', 'yesido', '09384560161', 'Makati', 'applicant', ''),
(3, 'mau', 'reen', 'maureen@gmail.com', 'maureen', ' 09212121212', '', 'employer', 'notactive'),
(8, 'mau', 'reen', 'maureen@gmail.com', '3131', ' 09212121212', '', 'applicant', ''),
(9, 'mau', 'reen', 'maureen@gmail.com', '3131231', ' 09212121212', '', 'applicant', ''),
(10, 'jane', 'jane', 'jane@gmail.com', 'jane', '2131', '', 'applicant', 'active'),
(11, 'teoxy', 'teoxy', 'teoxy@gmail.com', 'teoxy', 'teoxy', '', 'applicant', 'notactive'),
(12, 'jane', 'jane', 'janejane@gmail.com', 'janejane', '123131313', '', 'applicant', 'notactive');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `id_workexp` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_location` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `position_level` varchar(255) NOT NULL,
  `joined_year` int(111) NOT NULL,
  `joined_month` varchar(255) NOT NULL,
  `joined_year_to` int(11) NOT NULL,
  `joined_month_to` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `since_year` int(111) NOT NULL,
  `since_month` varchar(255) NOT NULL,
  `experience_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`id_workexp`, `id_user`, `company_name`, `company_location`, `position`, `position_level`, `joined_year`, `joined_month`, `joined_year_to`, `joined_month_to`, `specialization`, `role`, `industry`, `since_year`, `since_month`, `experience_level`) VALUES
(2, 10, 'Harte Hanks', 'Taguig Market Market', 'TSR', '5', 2016, 'Apr', 2015, 'Jul', 'Technical Support Desk', 'It support', 'BPO Industry', 0, '', 'Fresh graduate seeking my first job'),
(4, 10, 'Pahiram', 'Guadalupe', 'Web Dev', '5', 2014, 'Jul', 2019, 'Oct', 'PHP Dev', 'developer', 'IT', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_info`
--
ALTER TABLE `additional_info`
  ADD PRIMARY KEY (`id_addinfo`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `company_info`
--
ALTER TABLE `company_info`
  ADD PRIMARY KEY (`id_companyinfo`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `educational_bg`
--
ALTER TABLE `educational_bg`
  ADD PRIMARY KEY (`id_educ_bg`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `job_description`
--
ALTER TABLE `job_description`
  ADD PRIMARY KEY (`id_jobdesc`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `job_details`
--
ALTER TABLE `job_details`
  ADD PRIMARY KEY (`id_jobdet`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `job_requirements`
--
ALTER TABLE `job_requirements`
  ADD PRIMARY KEY (`id_jobreq`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id_skills`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`id_workexp`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `additional_info`
--
ALTER TABLE `additional_info`
  MODIFY `id_addinfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `company_info`
--
ALTER TABLE `company_info`
  MODIFY `id_companyinfo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `educational_bg`
--
ALTER TABLE `educational_bg`
  MODIFY `id_educ_bg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `job_description`
--
ALTER TABLE `job_description`
  MODIFY `id_jobdesc` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job_details`
--
ALTER TABLE `job_details`
  MODIFY `id_jobdet` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `job_requirements`
--
ALTER TABLE `job_requirements`
  MODIFY `id_jobreq` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id_skills` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `id_workexp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `additional_info`
--
ALTER TABLE `additional_info`
  ADD CONSTRAINT `additional_info_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `company_info`
--
ALTER TABLE `company_info`
  ADD CONSTRAINT `company_info_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `educational_bg`
--
ALTER TABLE `educational_bg`
  ADD CONSTRAINT `educational_bg_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `job_description`
--
ALTER TABLE `job_description`
  ADD CONSTRAINT `job_description_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `job_details`
--
ALTER TABLE `job_details`
  ADD CONSTRAINT `job_details_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `job_requirements`
--
ALTER TABLE `job_requirements`
  ADD CONSTRAINT `job_requirements_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD CONSTRAINT `work_experience_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
