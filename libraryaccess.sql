-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for libraryaccess
DROP DATABASE IF EXISTS `libraryaccess`;
CREATE DATABASE IF NOT EXISTS `libraryaccess` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `libraryaccess`;

-- Dumping structure for table libraryaccess.accounts
DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `status` varchar(1) DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table libraryaccess.accounts: ~0 rows (approximately)
DELETE FROM `accounts`;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` (`id`, `username`, `password`, `name`, `status`) VALUES
	(1, 'admin', 'admin', 'CPU Library', 'Y');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;

-- Dumping structure for table libraryaccess.courses
DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `course` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=latin1;

-- Dumping data for table libraryaccess.courses: ~149 rows (approximately)
DELETE FROM `courses`;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` (`id`, `department_id`, `course`) VALUES
	(1, 15, 'Grade 1'),
	(2, 15, 'Grade 2'),
	(3, 15, 'Grade 3'),
	(4, 15, 'Grade 4'),
	(5, 15, 'Grade 5'),
	(6, 15, 'Grade 6'),
	(7, 16, 'Grade 7'),
	(8, 16, 'Grade 8'),
	(9, 16, 'Grade 9'),
	(10, 16, 'Grade 10'),
	(11, 17, 'Grade 11'),
	(12, 17, 'Grade 12'),
	(13, 1, 'Bachelor of Science in Computer Science'),
	(14, 1, 'Bachelor of Science in Information Systems'),
	(15, 1, 'Bachelor of Science in Information Technology'),
	(16, 1, 'Bachelor of Science in Digital Media and Interactive Arts'),
	(17, 1, 'Alumni'),
	(18, 1, 'Faculty'),
	(19, 17, 'Alumni'),
	(20, 17, 'Faculty'),
	(21, 16, 'Alumni'),
	(22, 16, 'Faculty'),
	(23, 15, 'Alumni'),
	(24, 15, 'Faculty'),
	(25, 3, 'Bachelor Science in Software Engineering'),
	(26, 3, 'Bachelor of Science in Packaging Engineering'),
	(27, 3, 'Bachelor of Science in Mechanical Engineering'),
	(28, 3, 'Bachelor of Science in Electronics Engineering'),
	(29, 3, 'Bachelor of Science in Civil Engineering'),
	(30, 3, 'Bachelor of Science in Chemical Engineering'),
	(31, 3, 'Faculty'),
	(32, 3, 'Alumni'),
	(33, 9, 'Bachelor of Thelogy'),
	(34, 9, 'Faculty'),
	(35, 9, 'Alumni'),
	(36, 7, 'Alumni'),
	(37, 7, 'Faculty'),
	(38, 7, 'Bachelor of Arts in History'),
	(39, 7, 'Bachelor of Arts in Political Science'),
	(40, 7, 'Bachelor of Science in Biology'),
	(41, 7, 'Bachelor of Science in Psychology'),
	(42, 7, 'Bachelor of Arts Major in Political Science and Public Administration'),
	(43, 7, 'Bachelor of Science in Chemistry'),
	(44, 7, 'Bachelor of Science in Social Work'),
	(45, 7, 'Bachelor of Arts Major in English'),
	(46, 7, 'Bachelor of Arts Major in Mass Communication'),
	(47, 13, 'Faculty'),
	(48, 13, 'Alumni'),
	(49, 13, 'Bachelor of Science in Accounting Technology'),
	(50, 13, 'Bachelor of Science in Accountancy'),
	(51, 13, 'Bachelor of Science in Advertising'),
	(52, 13, 'Bachelor of Science in Business Administration Major in Business Management'),
	(53, 13, 'Bachelor of Science in Entrepreneurial Management'),
	(54, 13, 'Bachelor of Science in Business Adminisitration Major in Financial Management'),
	(55, 13, 'Bachelor of Science in Business Administration Major in Marketing Management'),
	(56, 13, 'Bachelor of Science in Real Estate Management'),
	(57, 1, 'Master of Science in Computer Science'),
	(58, 3, 'Bachelor of Science in Electrical Engineering'),
	(59, 3, 'Masters in Engineering'),
	(60, 9, 'Master of Divinity'),
	(61, 9, 'Master of Ministry'),
	(62, 9, 'Master of Theology'),
	(63, 9, 'Doctor of Ministry Majoring in Pastoral Counseling and Clinical Pastoral Supervision'),
	(64, 9, 'Doctor of Ministry Majoring in Church Management and Practical Studies'),
	(65, 6, 'Doctor of Medicine'),
	(66, 6, 'Bachelor of Science in Respiratory Therapy'),
	(67, 6, 'Bachelor of Science in Health, Fitness and Lifestyle Management'),
	(68, 6, 'Alumni'),
	(69, 6, 'Faculty'),
	(70, 4, 'Master of Science in Agriculture'),
	(71, 4, 'Bachelor of Science in Agriculture'),
	(72, 4, 'Bachelor of Science in Agriculture Engineering'),
	(73, 4, 'Bachelor of Science in Environmental Management'),
	(74, 2, 'Doctor of Education Majoring in Curriculum and Instruction'),
	(75, 2, 'Doctor of Education Majoring in Administrative and Supervision'),
	(76, 2, 'Doctor of Education Majoring in Guidance and Counseling'),
	(77, 2, 'Master of Arts in Education Majoring in Administrative and Supervision'),
	(78, 2, 'Master of Arts in Education Majoring in Guidance and Counseling'),
	(79, 2, 'Master of Arts in Education Majoring in Filipino'),
	(80, 2, 'Master of Arts in Education Majoring in Mathematics'),
	(81, 2, 'Master of Arts in Education Majoring in Physics'),
	(82, 2, 'Master of Arts in Education Majoring in Physical Education'),
	(83, 2, 'Master of Science in Guidance and Counseling'),
	(84, 2, 'Master in Library and Information Science'),
	(85, 2, 'Master in Library and Information Science Majoring in Thelogical Librarianship'),
	(86, 2, 'Master in Education Majoring in Filipino'),
	(87, 2, 'Bachelor of Elementary Education'),
	(88, 2, 'Bachelor of Elementary Education with Concentration in Pre-School Education'),
	(89, 2, 'Bachelor of Secondary Education Majoring in Biological Science'),
	(90, 2, 'Bachelor of Secondary Education Majoring in English'),
	(91, 2, 'Bachelor of Secondary Education Majoring in Filipino'),
	(92, 2, 'Bachelor of Secondary Education Majoring in Mathematics'),
	(93, 2, 'Bachelor of Secondary Education Majoring in MAPEH'),
	(94, 2, 'Bachelor of Secondary Education Majoring in Physical Science'),
	(95, 2, 'Bachelor of Secondary Education Majoring in Social Studies'),
	(96, 2, 'Bachelor of Library and Information Science'),
	(97, 2, 'Bachelor in Special Education'),
	(98, 2, 'Alumni'),
	(99, 2, 'Faculty'),
	(100, 5, 'Juris Doctor'),
	(101, 5, 'Alumni'),
	(102, 5, 'Faculty'),
	(103, 8, 'Doctor of Management with Concentration in Business Management'),
	(104, 8, 'Doctor of Management Majoring in Tourism and Hospitality Management'),
	(105, 8, 'Master of Business Administration Majoring in Tourism and Hospitality Management'),
	(106, 8, 'Master of Business Administration'),
	(107, 8, 'Bachelor of Science in Accountancy'),
	(108, 8, 'Bachelor of Science in Accounting Technology'),
	(109, 8, 'Bachelor of Science in Advertising'),
	(110, 8, 'Bachelor of Science in Business Administration Majoring in Business Management'),
	(111, 8, 'Bachelor of Science in Business Administration Majoring in Financial Management'),
	(112, 8, 'Bachelor of Science in Business Administration Majoring in Marketing Management'),
	(113, 8, 'Bachelor of Science in Business Administration Majoring in Entrepreneurial Management'),
	(114, 8, 'Bachelor of Science in Business Administration Majoring in Real Estate Management'),
	(115, 8, 'Alumni'),
	(116, 8, 'Faculty'),
	(117, 10, 'Bachelor in Medical Laboratory Science'),
	(118, 10, 'Alumni'),
	(119, 10, 'Faculty'),
	(120, 11, 'Master of Arts in Nursing'),
	(121, 11, 'Bachelor of Science in Nursing'),
	(122, 11, 'Alumni'),
	(123, 11, 'Faculty'),
	(124, 12, 'Bachelor of Science in Pharmacy'),
	(125, 12, 'Alumni'),
	(126, 12, 'Faculty'),
	(127, 14, 'K1'),
	(128, 14, 'K2'),
	(129, 14, 'Alumni'),
	(130, 14, 'Faculty'),
	(131, 4, 'Alumni'),
	(132, 4, 'Faculty'),
	(133, 4, 'Staff'),
	(134, 1, 'Staff'),
	(135, 2, 'Staff'),
	(136, 3, 'Staff'),
	(137, 5, 'Staff'),
	(138, 6, 'Staff'),
	(139, 7, 'Staff'),
	(140, 8, 'Staff'),
	(141, 9, 'Staff'),
	(142, 10, 'Stafff'),
	(143, 11, 'Staff'),
	(144, 12, 'Staff'),
	(145, 13, 'Staff'),
	(146, 14, 'Staff'),
	(147, 15, 'Staff'),
	(148, 16, 'Staff'),
	(149, 17, 'Staff');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;

-- Dumping structure for view libraryaccess.course_list
DROP VIEW IF EXISTS `course_list`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `course_list` (
	`id` INT(11) NOT NULL,
	`department` VARCHAR(150) NULL COLLATE 'latin1_swedish_ci',
	`course` VARCHAR(150) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for table libraryaccess.departments
DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(150) DEFAULT NULL,
  `acronym` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table libraryaccess.departments: ~17 rows (approximately)
DELETE FROM `departments`;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`id`, `department`, `acronym`) VALUES
	(1, 'College of Computer Studies', 'CCS'),
	(2, 'College of Education', 'COED'),
	(3, 'College of Engineering', 'COE'),
	(4, 'College of Agriculture Resources and Enviromental Sciences', 'CARES'),
	(5, 'College of Law', 'Law'),
	(6, 'College of Medicine', 'Medicine'),
	(7, 'College of Arts and Science', 'CAS'),
	(8, 'College of Hospitality and Management', 'CHM'),
	(9, 'College of Theology', 'Theology'),
	(10, 'College of Medical Lab Science', 'Med Lab Science'),
	(11, 'College of Nursing', 'Nursing'),
	(12, 'College of Pharmacy', 'Pharmacy'),
	(13, 'College of Business and Accountancy', 'CBA'),
	(14, 'University Kindergarten', 'Kindergarten'),
	(15, 'University Elementary School', 'Elementary'),
	(16, 'University Junior High School', 'JHS'),
	(17, 'University of Senior High School', 'SHS');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Dumping structure for table libraryaccess.logs
DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(50) NOT NULL,
  `name` varchar(300) NOT NULL,
  `department` varchar(300) NOT NULL,
  `section` varchar(150) NOT NULL,
  `course` varchar(50) NOT NULL,
  `log_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `log_out` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- Dumping data for table libraryaccess.logs: ~7 rows (approximately)
DELETE FROM `logs`;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` (`id`, `student_id`, `name`, `department`, `section`, `course`, `log_in`, `log_out`) VALUES
	(31, '13-0710-80', 'Joshua Ricarder Oducado', 'College of Computer Studies', 'Circulation', 'Bachelor of Science in Computer Science', '2017-08-22 18:02:52', '2017-08-22 18:02:56'),
	(32, '11-0001-12', 'James  Jaminez Jun', 'College of Engineering', 'Circulation', 'Faculty', '2017-08-22 19:45:54', '2017-08-22 19:46:00'),
	(33, '10-1000-12', 'Cassidy Mertyl Suplido', 'College of Engineering', 'Circulation', 'Bachelor of Science in Electronics Engineering', '2017-08-22 23:18:51', '2017-08-22 23:19:01'),
	(34, '13-0710-80', 'Joshua Ricarder Oducado', 'College of Computer Studies', 'Circulation', 'Bachelor of Science in Computer Science', '2017-08-23 22:45:42', '2017-08-23 22:45:45'),
	(35, '11-0001-12', 'James  Jaminez Jun', 'College of Engineering', 'Circulation', 'Faculty', '2017-08-23 22:46:57', '2017-08-23 22:47:02'),
	(36, '16-0669-21', 'Paulo Oducado Baylon', 'University Senior High School', 'Circulation', 'Grade 11', '2017-08-23 20:46:57', '2017-08-23 22:49:36'),
	(39, '13-0710-80', 'Joshua Ricarder Oducado', 'College of Computer Studies', 'Circulation', 'Bachelor of Science in Computer Science', '2017-09-11 21:46:29', NULL);
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;

-- Dumping structure for table libraryaccess.section
DROP TABLE IF EXISTS `section`;
CREATE TABLE IF NOT EXISTS `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table libraryaccess.section: ~5 rows (approximately)
DELETE FROM `section`;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` (`id`, `name`) VALUES
	(1, 'Circulation'),
	(2, 'Filipinana'),
	(3, 'General Reference'),
	(4, 'Graduate Studies'),
	(5, 'Theological Studies');
/*!40000 ALTER TABLE `section` ENABLE KEYS */;

-- Dumping structure for table libraryaccess.students
DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_number` varchar(50) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `middlename` varchar(150) NOT NULL,
  `department` varchar(50) NOT NULL,
  `courseyear` varchar(50) NOT NULL,
  `schoolyear` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `uid` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- Dumping data for table libraryaccess.students: ~7 rows (approximately)
DELETE FROM `students`;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`, `id_number`, `lastname`, `firstname`, `middlename`, `department`, `courseyear`, `schoolyear`, `semester`, `uid`) VALUES
	(1, '13-0710-80', 'Oducado', 'Joshua', 'Ricarder', 'College of Computer Studies', 'Bachelor of Science in Computer Science', '2017-2018', '1st Semester', '00-0000-01'),
	(2, '12-9910-20', 'Cruz', 'Miko', 'Richard', 'College of Engineering', 'Bachelor of Science in Software Engineering', '2017-2018', '1st Semester', '00-0000-02'),
	(3, '11-0001-12', 'Jun', 'James ', 'Jaminez', 'College of Engineering', 'Faculty', '2017-2018', '1st Semester', '00-0000-03'),
	(4, '12-0091-20', 'James ', 'Jonathon', 'Cruz', 'College of Business and Accountancy', 'Faculty', '2017-2018', '1st Semester', '00-0000-04'),
	(38, '10-1000-12', 'Suplido', 'Cassidy', 'Mertyl', 'College of Engineering', 'Bachelor of Science in Electronics Engineering', '2017-2018', '1st Semester', '00-0000-05'),
	(39, '10-0000-10', 'Oducado', 'Joshua', 'James', 'College of Law', 'Juris Doctor', '2017-2018', '1st Semester', '00-0000-06'),
	(40, '16-0669-21', 'Baylon', 'Paulo', 'Oducado', 'University Senior High School', 'Grade 11', '2017-2018', '1st Semester', '00-0000-07');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Dumping structure for view libraryaccess.course_list
DROP VIEW IF EXISTS `course_list`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `course_list`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `course_list` AS SELECT

courses.id,
departments.department,
courses.course

FROM courses
INNER JOIN departments
ON courses.department_id = departments.id

ORDER BY departments.department ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
