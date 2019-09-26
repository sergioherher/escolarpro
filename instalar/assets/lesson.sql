-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para lesson

-- Volcando estructura para tabla lesson.alert
CREATE TABLE IF NOT EXISTS `alert` (
  `alertID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `noticeID` int(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `usertype` varchar(128) NOT NULL,
  PRIMARY KEY (`alertID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.alert: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `alert` DISABLE KEYS */;
INSERT INTO `alert` (`alertID`, `noticeID`, `username`, `usertype`) VALUES
	(1, 1, 'admin', 'Administrador');
/*!40000 ALTER TABLE `alert` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.assignment
CREATE TABLE IF NOT EXISTS `assignment` (
  `assignmentID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `deadlinedate` date NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `originalfile` text NOT NULL,
  `file` text NOT NULL,
  `classesID` longtext NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `sectionID` longtext,
  `subjectID` longtext,
  `assignusertypeID` int(11) DEFAULT NULL,
  `assignuserID` int(11) DEFAULT NULL,
  PRIMARY KEY (`assignmentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.assignment: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `assignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `assignment` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.assignmentanswer
CREATE TABLE IF NOT EXISTS `assignmentanswer` (
  `assignmentanswerID` int(11) NOT NULL AUTO_INCREMENT,
  `assignmentID` int(11) NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `uploaderID` int(11) NOT NULL,
  `uploadertypeID` int(11) NOT NULL,
  `answerfile` text NOT NULL,
  `answerfileoriginal` text NOT NULL,
  `answerdate` date NOT NULL,
  PRIMARY KEY (`assignmentanswerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.assignmentanswer: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `assignmentanswer` DISABLE KEYS */;
/*!40000 ALTER TABLE `assignmentanswer` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.attendance
CREATE TABLE IF NOT EXISTS `attendance` (
  `attendanceID` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `schoolyearID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `monthyear` varchar(10) NOT NULL,
  `a1` varchar(3) DEFAULT NULL,
  `a2` varchar(3) DEFAULT NULL,
  `a3` varchar(3) DEFAULT NULL,
  `a4` varchar(3) DEFAULT NULL,
  `a5` varchar(3) DEFAULT NULL,
  `a6` varchar(3) DEFAULT NULL,
  `a7` varchar(3) DEFAULT NULL,
  `a8` varchar(3) DEFAULT NULL,
  `a9` varchar(3) DEFAULT NULL,
  `a10` varchar(3) DEFAULT NULL,
  `a11` varchar(3) DEFAULT NULL,
  `a12` varchar(3) DEFAULT NULL,
  `a13` varchar(3) DEFAULT NULL,
  `a14` varchar(3) DEFAULT NULL,
  `a15` varchar(3) DEFAULT NULL,
  `a16` varchar(3) DEFAULT NULL,
  `a17` varchar(3) DEFAULT NULL,
  `a18` varchar(3) DEFAULT NULL,
  `a19` varchar(3) DEFAULT NULL,
  `a20` varchar(3) DEFAULT NULL,
  `a21` varchar(3) DEFAULT NULL,
  `a22` varchar(3) DEFAULT NULL,
  `a23` varchar(3) DEFAULT NULL,
  `a24` varchar(3) DEFAULT NULL,
  `a25` varchar(3) DEFAULT NULL,
  `a26` varchar(3) DEFAULT NULL,
  `a27` varchar(3) DEFAULT NULL,
  `a28` varchar(3) DEFAULT NULL,
  `a29` varchar(3) DEFAULT NULL,
  `a30` varchar(3) DEFAULT NULL,
  `a31` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`attendanceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.attendance: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.automation_rec
CREATE TABLE IF NOT EXISTS `automation_rec` (
  `automation_recID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(3) NOT NULL,
  `month` varchar(3) NOT NULL,
  `year` year(4) NOT NULL,
  `nofmodule` int(11) NOT NULL,
  PRIMARY KEY (`automation_recID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.automation_rec: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `automation_rec` DISABLE KEYS */;
/*!40000 ALTER TABLE `automation_rec` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.automation_shudulu
CREATE TABLE IF NOT EXISTS `automation_shudulu` (
  `automation_shuduluID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `day` varchar(3) NOT NULL,
  `month` varchar(3) NOT NULL,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`automation_shuduluID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.automation_shudulu: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `automation_shudulu` DISABLE KEYS */;
INSERT INTO `automation_shudulu` (`automation_shuduluID`, `date`, `day`, `month`, `year`) VALUES
	(1, '2017-11-05', '05', '11', '2017');
/*!40000 ALTER TABLE `automation_shudulu` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.book
CREATE TABLE IF NOT EXISTS `book` (
  `bookID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `book` varchar(60) NOT NULL,
  `subject_code` tinytext NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `due_quantity` int(11) NOT NULL,
  `rack` tinytext NOT NULL,
  PRIMARY KEY (`bookID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.book: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
/*!40000 ALTER TABLE `book` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.category
CREATE TABLE IF NOT EXISTS `category` (
  `categoryID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hostelID` int(11) NOT NULL,
  `class_type` varchar(60) NOT NULL,
  `hbalance` varchar(20) NOT NULL,
  `note` text,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.category: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.classes
CREATE TABLE IF NOT EXISTS `classes` (
  `classesID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `classes` varchar(60) NOT NULL,
  `classes_numeric` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `studentmaxID` int(11) DEFAULT NULL,
  `note` text,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(40) NOT NULL,
  `create_usertype` varchar(20) NOT NULL,
  PRIMARY KEY (`classesID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.classes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.conversations
CREATE TABLE IF NOT EXISTS `conversations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) DEFAULT '0',
  `draft` int(11) DEFAULT '0',
  `fav_status` int(11) DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lesson.conversations: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `conversations` DISABLE KEYS */;
/*!40000 ALTER TABLE `conversations` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.conversation_msg
CREATE TABLE IF NOT EXISTS `conversation_msg` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `conversation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `msg` text NOT NULL,
  `attach` text,
  `attach_file_name` text,
  `usertypeID` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `start` int(11) DEFAULT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lesson.conversation_msg: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `conversation_msg` DISABLE KEYS */;
/*!40000 ALTER TABLE `conversation_msg` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.conversation_user
CREATE TABLE IF NOT EXISTS `conversation_user` (
  `conversation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `is_sender` int(11) DEFAULT '0',
  `trash` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lesson.conversation_user: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `conversation_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `conversation_user` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.eattendance
CREATE TABLE IF NOT EXISTS `eattendance` (
  `eattendanceID` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `schoolyearID` int(11) NOT NULL,
  `examID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `date` date NOT NULL,
  `studentID` int(11) DEFAULT NULL,
  `s_name` varchar(60) DEFAULT NULL,
  `eattendance` varchar(20) DEFAULT NULL,
  `year` year(4) NOT NULL,
  `eextra` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`eattendanceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.eattendance: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `eattendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `eattendance` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.event
CREATE TABLE IF NOT EXISTS `event` (
  `eventID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fdate` date NOT NULL,
  `ftime` time NOT NULL,
  `tdate` date NOT NULL,
  `ttime` time NOT NULL,
  `title` varchar(128) NOT NULL,
  `details` text NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`eventID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.event: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
/*!40000 ALTER TABLE `event` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.eventcounter
CREATE TABLE IF NOT EXISTS `eventcounter` (
  `eventcounterID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `eventID` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`eventcounterID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.eventcounter: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `eventcounter` DISABLE KEYS */;
INSERT INTO `eventcounter` (`eventcounterID`, `eventID`, `username`, `type`, `name`, `photo`, `status`, `create_date`) VALUES
	(1, 1, 'admin', 'Administrador', 'admin', 'defualt.png', 1, '2017-11-11 16:09:31');
/*!40000 ALTER TABLE `eventcounter` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.exam
CREATE TABLE IF NOT EXISTS `exam` (
  `examID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `exam` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `note` text,
  PRIMARY KEY (`examID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.exam: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `exam` DISABLE KEYS */;
INSERT INTO `exam` (`examID`, `exam`, `date`, `note`) VALUES
	(2, '4º semestre', '2017-12-20', ''),
	(3, '3º semestre', '2017-12-14', ''),
	(4, '1º semestre', '2017-11-08', ''),
	(7, '2º semestre', '2017-11-13', ''),
	(8, '5º semestre', '2017-11-09', '');
/*!40000 ALTER TABLE `exam` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.examschedule
CREATE TABLE IF NOT EXISTS `examschedule` (
  `examscheduleID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `examID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `edate` date NOT NULL,
  `examfrom` varchar(10) NOT NULL,
  `examto` varchar(10) NOT NULL,
  `room` tinytext,
  `schoolyearID` int(11) NOT NULL,
  PRIMARY KEY (`examscheduleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.examschedule: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `examschedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `examschedule` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.expense
CREATE TABLE IF NOT EXISTS `expense` (
  `expenseID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `create_date` date NOT NULL,
  `date` date NOT NULL,
  `expenseday` varchar(11) NOT NULL,
  `expensemonth` varchar(11) NOT NULL,
  `expenseyear` year(4) NOT NULL,
  `expense` varchar(128) NOT NULL,
  `amount` double NOT NULL,
  `userID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `note` text,
  PRIMARY KEY (`expenseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.expense: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `expense` DISABLE KEYS */;
/*!40000 ALTER TABLE `expense` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.feetypes
CREATE TABLE IF NOT EXISTS `feetypes` (
  `feetypesID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `feetypes` varchar(60) NOT NULL,
  `note` text,
  PRIMARY KEY (`feetypesID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.feetypes: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `feetypes` DISABLE KEYS */;
INSERT INTO `feetypes` (`feetypesID`, `feetypes`, `note`) VALUES
	(1, 'Transporte', ''),
	(2, 'Comedor', ''),
	(3, 'Sala de computacion', ''),
	(4, 'Libros', ''),
	(6, 'baile', NULL),
	(7, 'clas', NULL),
	(8, 'inglés', NULL),
	(10, 'Clases de verano', NULL),
	(11, 'Transporte', NULL),
	(12, 'Cuota para el examen', NULL);
/*!40000 ALTER TABLE `feetypes` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.grade
CREATE TABLE IF NOT EXISTS `grade` (
  `gradeID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `grade` varchar(60) NOT NULL,
  `point` varchar(11) NOT NULL,
  `gradefrom` int(11) NOT NULL,
  `gradeupto` int(11) NOT NULL,
  `note` text,
  PRIMARY KEY (`gradeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.grade: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;
/*!40000 ALTER TABLE `grade` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.hmember
CREATE TABLE IF NOT EXISTS `hmember` (
  `hmemberID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hostelID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `hbalance` varchar(20) DEFAULT NULL,
  `hjoindate` date NOT NULL,
  PRIMARY KEY (`hmemberID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.hmember: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `hmember` DISABLE KEYS */;
/*!40000 ALTER TABLE `hmember` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.holiday
CREATE TABLE IF NOT EXISTS `holiday` (
  `holidayID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `schoolyearID` int(11) NOT NULL,
  `fdate` date NOT NULL,
  `tdate` date NOT NULL,
  `title` varchar(128) NOT NULL,
  `details` text NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`holidayID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.holiday: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `holiday` DISABLE KEYS */;
/*!40000 ALTER TABLE `holiday` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.hostel
CREATE TABLE IF NOT EXISTS `hostel` (
  `hostelID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `htype` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` text,
  PRIMARY KEY (`hostelID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.hostel: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `hostel` DISABLE KEYS */;
/*!40000 ALTER TABLE `hostel` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.idmanager
CREATE TABLE IF NOT EXISTS `idmanager` (
  `idmanagerID` int(11) NOT NULL AUTO_INCREMENT,
  `schooltype` varchar(20) NOT NULL,
  `idtitle` varchar(128) NOT NULL,
  `idtype` varchar(128) NOT NULL,
  PRIMARY KEY (`idmanagerID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.idmanager: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `idmanager` DISABLE KEYS */;
INSERT INTO `idmanager` (`idmanagerID`, `schooltype`, `idtitle`, `idtype`) VALUES
	(1, 'semesterbase', 'Year+Semester Code+Department Code+Student Max ID', 'schoolyear+semestercode+classes_numeric+studentmaxID'),
	(2, 'semesterbase', 'Year+Department Code+Semester Code+Student Max ID', 'schoolyear+classes_numeric+semestercode+studentmaxID'),
	(3, 'semesterbase', 'Year+Semester Code+Student Max ID', 'schoolyear+semestercode+studentmaxID'),
	(4, 'semesterbase', 'Year+Department Code+Student Max ID', 'schoolyear+classes_numeric+studentmaxID'),
	(5, 'semesterbase', 'Student Max ID+Year+Semester Code+Department Code', 'studentmaxID+schoolyear+semestercode+classes_numeric'),
	(6, 'semesterbase', 'Student Max ID+Semester Code+Department Code+Year', 'studentmaxID+semestercode+classes_numeric+schoolyear'),
	(7, 'semesterbase', 'Student Max ID+Semester Code+Department Code', 'studentmaxID+semestercode+classes_numeric'),
	(8, 'semesterbase', 'Student Max ID+Department Code+Semester Code', 'studentmaxID+classes_numeric+semestercode'),
	(9, 'semesterbase', 'Semester Code+Department Code+Student Max ID', 'semestercode+classes_numeric+studentmaxID'),
	(10, 'semesterbase', 'Department Code+Semester Code+Student Max ID', 'classes_numeric+semestercode+studentmaxID'),
	(11, 'semesterbase', 'Semester Code+Student Max ID', 'semestercode+studentmaxID'),
	(12, 'semesterbase', 'Department Code+Student Max ID', 'classes_numeric+studentmaxID'),
	(13, 'semesterbase', 'Student Max ID', 'studentmaxID'),
	(14, 'classbase', 'Year+Class Numeric+Student Max ID', 'schoolyear+classes_numeric+studentmaxID'),
	(15, 'Classbase', 'Class Numeric+Year+Student Max ID', 'classes_numeric+schoolyear+studentmaxID'),
	(16, 'classbase', 'Year+Student Max ID', 'schoolyear+studentmaxID'),
	(17, 'classbase', 'Class Numeric+Student Max ID', 'classes_numeric+studentmaxID'),
	(18, 'classbase', 'Student Max ID', 'studentmaxID'),
	(19, 'semesterbase', 'None', 'none'),
	(20, 'classbase', 'None', 'none');
/*!40000 ALTER TABLE `idmanager` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.ini_config
CREATE TABLE IF NOT EXISTS `ini_config` (
  `configID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `config_key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`configID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.ini_config: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `ini_config` DISABLE KEYS */;
INSERT INTO `ini_config` (`configID`, `type`, `config_key`, `value`) VALUES
	(6, 'stripe', 'stripe_secret', ''),
	(8, 'stripe', 'stripe_demo', ''),
	(13, 'stripe', 'stripe_status', '');
/*!40000 ALTER TABLE `ini_config` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoiceID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `schoolyearID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `feetype` varchar(128) NOT NULL,
  `amount` double NOT NULL,
  `discount` double NOT NULL DEFAULT '0',
  `userID` int(11) DEFAULT NULL,
  `usertypeID` int(11) DEFAULT NULL,
  `uname` varchar(60) DEFAULT NULL,
  `date` date NOT NULL,
  `create_date` date NOT NULL,
  `day` varchar(20) DEFAULT NULL,
  `month` varchar(20) DEFAULT NULL,
  `year` year(4) NOT NULL,
  `paidstatus` int(11) DEFAULT NULL,
  `deleted_at` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`invoiceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.invoice: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.issue
CREATE TABLE IF NOT EXISTS `issue` (
  `issueID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lID` varchar(128) NOT NULL,
  `bookID` int(11) NOT NULL,
  `serial_no` varchar(40) NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `note` text,
  PRIMARY KEY (`issueID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.issue: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `issue` DISABLE KEYS */;
/*!40000 ALTER TABLE `issue` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.leaveapp
CREATE TABLE IF NOT EXISTS `leaveapp` (
  `leaveID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fdate` date NOT NULL,
  `tdate` date NOT NULL,
  `title` varchar(128) NOT NULL,
  `details` text NOT NULL,
  `touserID` int(11) NOT NULL,
  `tousertypeID` int(11) NOT NULL,
  `fromuserID` int(11) NOT NULL,
  `fromusertypeID` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `schoolyearID` int(11) NOT NULL,
  PRIMARY KEY (`leaveID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.leaveapp: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `leaveapp` DISABLE KEYS */;
/*!40000 ALTER TABLE `leaveapp` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.lmember
CREATE TABLE IF NOT EXISTS `lmember` (
  `lmemberID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lID` varchar(40) NOT NULL,
  `studentID` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `lbalance` varchar(20) DEFAULT NULL,
  `ljoindate` date NOT NULL,
  PRIMARY KEY (`lmemberID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.lmember: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `lmember` DISABLE KEYS */;
/*!40000 ALTER TABLE `lmember` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.loginlog
CREATE TABLE IF NOT EXISTS `loginlog` (
  `loginlogID` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(45) NOT NULL,
  `browser` varchar(128) NOT NULL,
  `operatingsystem` varchar(128) NOT NULL,
  `login` int(11) unsigned NOT NULL,
  `logout` int(11) unsigned DEFAULT NULL,
  `usertypeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`loginlogID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.loginlog: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `loginlog` DISABLE KEYS */;
/*!40000 ALTER TABLE `loginlog` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.mailandsms
CREATE TABLE IF NOT EXISTS `mailandsms` (
  `mailandsmsID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usertypeID` int(11) NOT NULL,
  `users` text NOT NULL,
  `type` varchar(10) NOT NULL,
  `senderusertypeID` int(11) NOT NULL,
  `senderID` int(11) NOT NULL,
  `message` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`mailandsmsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.mailandsms: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `mailandsms` DISABLE KEYS */;
/*!40000 ALTER TABLE `mailandsms` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.mailandsmstemplate
CREATE TABLE IF NOT EXISTS `mailandsmstemplate` (
  `mailandsmstemplateID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `template` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mailandsmstemplateID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.mailandsmstemplate: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `mailandsmstemplate` DISABLE KEYS */;
/*!40000 ALTER TABLE `mailandsmstemplate` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.mailandsmstemplatetag
CREATE TABLE IF NOT EXISTS `mailandsmstemplatetag` (
  `mailandsmstemplatetagID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usertypeID` int(11) NOT NULL,
  `tagname` varchar(128) NOT NULL,
  `mailandsmstemplatetag_extra` varchar(255) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mailandsmstemplatetagID`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.mailandsmstemplatetag: ~42 rows (aproximadamente)
/*!40000 ALTER TABLE `mailandsmstemplatetag` DISABLE KEYS */;
INSERT INTO `mailandsmstemplatetag` (`mailandsmstemplatetagID`, `usertypeID`, `tagname`, `mailandsmstemplatetag_extra`, `create_date`) VALUES
	(1, 1, '[nombre]', NULL, '2016-12-11 14:36:33'),
	(2, 1, '[dob]', NULL, '2016-12-11 14:37:31'),
	(3, 1, '[genero]', NULL, '2016-12-11 14:37:31'),
	(4, 1, '[religion]', NULL, '2016-12-11 14:39:51'),
	(5, 1, '[email]', NULL, '2016-12-11 14:39:51'),
	(6, 1, '[telefono]', NULL, '2016-12-11 14:39:51'),
	(7, 1, '[direccion]', NULL, '2016-12-11 14:39:51'),
	(8, 1, '[trabajo]', NULL, '2016-12-11 14:39:51'),
	(9, 1, '[usuario]', NULL, '2016-12-11 14:39:51'),
	(10, 2, '[nombre]', NULL, '2016-12-11 14:40:50'),
	(11, 2, '[designacion]', NULL, '2016-12-11 14:43:27'),
	(12, 2, '[dob]', NULL, '2016-12-11 14:46:21'),
	(13, 2, '[genero]', NULL, '2016-12-11 14:46:21'),
	(14, 2, '[religion]', NULL, '2016-12-11 14:46:21'),
	(15, 2, '[email]', NULL, '2016-12-11 14:46:21'),
	(16, 2, '[telefono]', NULL, '2016-12-11 14:46:21'),
	(17, 2, '[direccion]', NULL, '2016-12-11 14:46:21'),
	(18, 2, '[jod]', NULL, '2016-12-11 14:46:21'),
	(19, 2, '[usuario]', NULL, '2016-12-11 14:46:21'),
	(20, 3, '[nombre]', NULL, '2016-12-11 14:47:09'),
	(21, 3, '[clase/departamento]', NULL, '2016-12-19 15:34:20'),
	(22, 3, '[roll]', NULL, '2017-02-12 12:22:56'),
	(23, 3, '[dob]', NULL, '2016-12-11 14:55:54'),
	(24, 3, '[genero]', NULL, '2016-12-11 14:55:54'),
	(25, 3, '[religion]', NULL, '2016-12-11 14:55:54'),
	(26, 3, '[email]', NULL, '2016-12-11 14:55:54'),
	(27, 3, '[telefono]', NULL, '2016-12-11 14:55:54'),
	(28, 3, '[seccion]', NULL, '2016-12-11 14:55:54'),
	(29, 3, '[usuario]', NULL, '2016-12-11 14:55:54'),
	(30, 3, '[result_table]', NULL, '2016-12-11 14:55:54'),
	(31, 4, '[nombre]', NULL, '2016-12-11 14:57:31'),
	(32, 4, '[nombre_padre]', NULL, '2016-12-11 15:04:19'),
	(33, 4, '[nombre_madre]', NULL, '2016-12-11 15:04:19'),
	(34, 4, '[profesion_padre]', NULL, '2016-12-11 15:04:19'),
	(35, 4, '[profesion_madre]', NULL, '2016-12-11 15:04:19'),
	(36, 4, '[email]', NULL, '2016-12-11 15:04:19'),
	(37, 4, '[telefono]', NULL, '2016-12-11 15:04:19'),
	(38, 4, '[direccion]', NULL, '2016-12-11 15:04:19'),
	(39, 4, '[usuario]', NULL, '2016-12-11 15:04:19'),
	(40, 3, '[ciudad]', NULL, '2017-02-12 12:21:27'),
	(41, 3, '[no_registro]', NULL, '2017-02-12 12:21:27'),
	(42, 3, '[estado]', NULL, '2017-02-12 12:21:49');
/*!40000 ALTER TABLE `mailandsmstemplatetag` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.mark
CREATE TABLE IF NOT EXISTS `mark` (
  `markID` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `schoolyearID` int(11) NOT NULL,
  `examID` int(11) NOT NULL,
  `exam` varchar(60) NOT NULL,
  `studentID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `year` year(4) NOT NULL,
  PRIMARY KEY (`markID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.mark: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `mark` DISABLE KEYS */;
/*!40000 ALTER TABLE `mark` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.markpercentage
CREATE TABLE IF NOT EXISTS `markpercentage` (
  `markpercentageID` int(11) NOT NULL AUTO_INCREMENT,
  `markpercentagetype` varchar(100) NOT NULL,
  `percentage` double NOT NULL,
  `examID` int(11) DEFAULT NULL,
  `classesID` int(11) DEFAULT NULL,
  `subjectID` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(40) NOT NULL,
  `create_usertype` varchar(40) NOT NULL,
  PRIMARY KEY (`markpercentageID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.markpercentage: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `markpercentage` DISABLE KEYS */;
INSERT INTO `markpercentage` (`markpercentageID`, `markpercentagetype`, `percentage`, `examID`, `classesID`, `subjectID`, `create_date`, `modify_date`, `create_userID`, `create_username`, `create_usertype`) VALUES
	(1, 'Practicas', 100, NULL, NULL, NULL, '2017-01-05 06:11:54', '2017-11-11 04:24:21', 1, 'admin', 'Admin'),
	(2, 'Presentaciones', 100, NULL, NULL, NULL, '2017-11-07 01:42:57', '2017-11-11 04:24:45', 1, 'admin', 'Administrador'),
	(3, 'Examenes', 100, NULL, NULL, NULL, '2017-11-11 04:24:59', '2017-11-11 04:24:59', 1, 'admin', 'Administrador');
/*!40000 ALTER TABLE `markpercentage` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.markrelation
CREATE TABLE IF NOT EXISTS `markrelation` (
  `markrelationID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `markID` int(11) NOT NULL,
  `markpercentageID` int(11) NOT NULL,
  `mark` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`markrelationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.markrelation: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `markrelation` DISABLE KEYS */;
/*!40000 ALTER TABLE `markrelation` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.media
CREATE TABLE IF NOT EXISTS `media` (
  `mediaID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `mcategoryID` int(11) NOT NULL DEFAULT '0',
  `file_name` varchar(255) NOT NULL,
  `file_name_display` varchar(255) NOT NULL,
  PRIMARY KEY (`mediaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.media: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
/*!40000 ALTER TABLE `media` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.media_category
CREATE TABLE IF NOT EXISTS `media_category` (
  `mcategoryID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mcategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.media_category: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `media_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_category` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.media_share
CREATE TABLE IF NOT EXISTS `media_share` (
  `shareID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `classesID` int(11) NOT NULL,
  `public` int(11) NOT NULL,
  `file_or_folder` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`shareID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.media_share: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `media_share` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_share` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `menuID` int(11) NOT NULL AUTO_INCREMENT,
  `menuName` varchar(128) NOT NULL,
  `link` varchar(512) NOT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `pullRight` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `parentID` int(11) NOT NULL DEFAULT '0',
  `priority` int(11) NOT NULL DEFAULT '1000',
  PRIMARY KEY (`menuID`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.menu: ~66 rows (aproximadamente)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`menuID`, `menuName`, `link`, `icon`, `pullRight`, `status`, `parentID`, `priority`) VALUES
	(1, 'dashboard', 'dashboard', 'fa-laptop', NULL, 1, 0, 1000),
	(2, 'student', 'student', 'icon-student', NULL, 1, 0, 1000),
	(3, 'parents', 'parents', 'fa-user', NULL, 1, 0, 1000),
	(4, 'teacher', 'teacher', 'icon-teacher', NULL, 1, 0, 1000),
	(5, 'user', 'user', 'fa-users', NULL, 1, 0, 1000),
	(6, 'main_academic', '#', 'icon-academicmain', NULL, 1, 0, 1000),
	(7, 'main_attendance', '#', 'icon-attendance', NULL, 1, 0, 1000),
	(8, 'main_exam', '#', 'icon-exam', NULL, 1, 0, 1000),
	(9, 'main_mark', '#', 'icon-markmain', NULL, 1, 0, 1000),
	(10, 'conversation', 'conversation', 'fa-envelope', NULL, 1, 0, 1000),
	(11, 'media', 'media', 'fa-film', NULL, 1, 0, 1000),
	(12, 'mailandsms', 'mailandsms', 'icon-mailandsms', NULL, 1, 0, 1000),
	(13, 'main_library', '#', 'icon-library', NULL, 1, 0, 1000),
	(14, 'main_transport', '#', 'icon-bus', NULL, 1, 0, 1000),
	(15, 'main_hostel', '#', 'icon-hhostel', NULL, 1, 0, 1000),
	(16, 'main_account', '#', 'icon-account', NULL, 1, 0, 1000),
	(17, 'main_announcement', '#', 'icon-noticemain', NULL, 1, 0, 1000),
	(18, 'main_report', '#', 'fa-clipboard', NULL, 1, 0, 1000),
	(19, 'other', 'other', 'other', NULL, 1, 0, 1000),
	(20, 'main_administrator', '#', 'icon-administrator', NULL, 1, 0, 1000),
	(21, 'main_settings', '#', 'fa-gavel', NULL, 1, 0, 1000),
	(22, 'classes', 'classes', 'fa-sitemap', NULL, 1, 6, 5000),
	(23, 'section', 'section', 'fa-star', NULL, 1, 6, 4000),
	(24, 'subject', 'subject', 'icon-subject', NULL, 1, 6, 4500),
	(25, 'routine', 'routine', 'icon-routine', NULL, 1, 6, 1000),
	(26, 'syllabus', 'syllabus', 'icon-syllabus', NULL, 1, 6, 3500),
	(27, 'assignment', 'assignment', 'icon-assignment', NULL, 1, 6, 3000),
	(28, 'sattendance', 'sattendance', 'icon-sattendance', NULL, 1, 7, 1000),
	(29, 'tattendance', 'tattendance', 'icon-tattendance', NULL, 1, 7, 1000),
	(30, 'exam', 'exam', 'fa-pencil', NULL, 1, 8, 1000),
	(31, 'examschedule', 'examschedule', 'fa-puzzle-piece', NULL, 1, 8, 1000),
	(32, 'grade', 'grade', 'fa-signal', NULL, 1, 8, 1000),
	(33, 'eattendance', 'eattendance', 'icon-eattendance', NULL, 1, 8, 1000),
	(34, 'mark', 'mark', 'fa-flask', NULL, 1, 9, 1000),
	(35, 'markpercentage', 'markpercentage', 'icon-markpercentage', NULL, 1, 9, 1000),
	(36, 'promotion', 'promotion', 'icon-promotion', NULL, 1, 9, 1000),
	(37, 'notice', 'notice', 'fa-calendar', NULL, 1, 17, 1000),
	(38, 'event', 'event', 'fa-calendar-check-o', NULL, 1, 17, 1000),
	(39, 'holiday', 'holiday', 'icon-holiday', NULL, 1, 17, 1000),
	(40, 'classreport', 'report/classreport', 'icon-classreport', NULL, 1, 18, 1000),
	(41, 'attendancereport', 'report/attendancereport', 'icon-attendancereport', NULL, 1, 18, 1000),
	(42, 'studentreport', 'report/studentreport', 'icon-studentreport', NULL, 1, 18, 1000),
	(43, 'schoolyear', 'schoolyear', 'fa fa-calendar-plus-o', NULL, 1, 20, 5000),
	(44, 'mailandsmstemplate', 'mailandsmstemplate', 'icon-template', NULL, 1, 20, 3500),
	(46, 'backup', 'backup', 'fa-download', NULL, 1, 20, 2500),
	(47, 'systemadmin', 'systemadmin', 'icon-systemadmin', NULL, 1, 20, 4500),
	(48, 'resetpassword', 'resetpassword', 'icon-reset_password', NULL, 1, 20, 4000),
	(49, 'permission', 'permission', 'icon-permission', NULL, 1, 20, 1000),
	(50, 'usertype', 'usertype', 'icon-role', NULL, 1, 20, 2000),
	(51, 'setting', 'setting', 'fa-gears', NULL, 1, 21, 1000),
	(52, 'other', 'other', 'other', NULL, 1, 21, 1000),
	(53, 'other', 'other', 'other', NULL, 1, 21, 1000),
	(54, 'invoice', 'invoice', 'icon-invoice', NULL, 1, 16, 100),
	(55, 'paymenthistory', 'paymenthistory', 'icon-payment', NULL, 1, 16, 99),
	(56, 'transport', 'transport', 'icon-sbus', NULL, 1, 14, 5000),
	(57, 'member', 'tmember', 'icon-member', NULL, 1, 14, 1000),
	(58, 'hostel', 'hostel', 'icon-hostel', NULL, 1, 15, 1000),
	(59, 'category', 'category', 'fa-leaf', NULL, 1, 15, 1000),
	(61, 'member', 'hmember', 'icon-member', NULL, 1, 15, 1000),
	(62, 'feetypes', 'feetypes', 'icon-feetypes', NULL, 1, 16, 1000),
	(63, 'expense', 'expense', 'icon-expense', NULL, 1, 16, 98),
	(64, 'member', 'lmember', 'icon-member', NULL, 1, 13, 1000),
	(65, 'books', 'book', 'icon-lbooks', NULL, 1, 13, 1000),
	(66, 'issue', 'issue', 'icon-issue', NULL, 1, 13, 1000),
	(69, 'other', 'other', 'other', NULL, 1, 20, 3000),
	(70, 'other', 'other', 'other', NULL, 1, 20, 1000);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.message
CREATE TABLE IF NOT EXISTS `message` (
  `messageID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `receiverID` int(11) NOT NULL,
  `receiverType` varchar(20) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `attach` text,
  `attach_file_name` text,
  `userID` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `useremail` varchar(40) NOT NULL,
  `year` year(4) NOT NULL,
  `date` date NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `read_status` tinyint(1) NOT NULL,
  `from_status` int(11) NOT NULL,
  `to_status` int(11) NOT NULL,
  `fav_status` tinyint(1) NOT NULL,
  `fav_status_sent` tinyint(1) NOT NULL,
  `reply_status` int(11) NOT NULL,
  PRIMARY KEY (`messageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.message: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `version` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.migrations: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`version`) VALUES
	(1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.notice
CREATE TABLE IF NOT EXISTS `notice` (
  `noticeID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `notice` text NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `date` date NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`noticeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.notice: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `notice` DISABLE KEYS */;
/*!40000 ALTER TABLE `notice` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.parents
CREATE TABLE IF NOT EXISTS `parents` (
  `parentsID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dni` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `father_name` varchar(60) NOT NULL,
  `mother_name` varchar(60) NOT NULL,
  `father_profession` varchar(40) NOT NULL,
  `mother_profession` varchar(40) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `photo` varchar(200) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(40) NOT NULL,
  `create_usertype` varchar(20) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`parentsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.parents: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `parents` DISABLE KEYS */;
/*!40000 ALTER TABLE `parents` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.payment
CREATE TABLE IF NOT EXISTS `payment` (
  `paymentID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `schoolyearID` int(11) NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `paymentamount` double NOT NULL,
  `paymenttype` varchar(128) NOT NULL,
  `paymentdate` date NOT NULL,
  `paymentday` varchar(11) NOT NULL,
  `paymentmonth` varchar(10) NOT NULL,
  `paymentyear` year(4) NOT NULL,
  `userID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `transactionID` text,
  PRIMARY KEY (`paymentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.payment: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `permissionID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'In most cases, this should be the name of the module (e.g. news)',
  `active` enum('yes','no') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`permissionID`)
) ENGINE=InnoDB AUTO_INCREMENT=680 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.permissions: ~179 rows (aproximadamente)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`permissionID`, `description`, `name`, `active`) VALUES
	(501, 'Dashboard', 'dashboard', 'yes'),
	(502, 'Estudiante', 'student', 'yes'),
	(503, 'Agregar estudiante', 'student_add', 'yes'),
	(504, 'Editar estudiante', 'student_edit', 'yes'),
	(505, 'Borrar estudiante', 'student_delete', 'yes'),
	(506, 'Visualizar estudiante', 'student_view', 'yes'),
	(507, 'Padres', 'parents', 'yes'),
	(508, 'Agregar padres', 'parents_add', 'yes'),
	(509, 'Editar padres', 'parents_edit', 'yes'),
	(510, 'Borrar padres', 'parents_delete', 'yes'),
	(511, 'Visualizar padres', 'parents_view', 'yes'),
	(512, 'Docente', 'teacher', 'yes'),
	(513, 'Agregar docente', 'teacher_add', 'yes'),
	(514, 'Editar docente', 'teacher_edit', 'yes'),
	(515, 'Borrar docente', 'teacher_delete', 'yes'),
	(516, 'Visualizar docente', 'teacher_view', 'yes'),
	(517, 'Usuario', 'user', 'yes'),
	(518, 'Agregar usuario', 'user_add', 'yes'),
	(519, 'Editar usuario', 'user_edit', 'yes'),
	(520, 'Borrar usuario', 'user_delete', 'yes'),
	(521, 'Visualizar usuario', 'user_view', 'yes'),
	(522, 'Clases', 'classes', 'yes'),
	(523, 'Agregar clases', 'classes_add', 'yes'),
	(524, 'Editar clases', 'classes_edit', 'yes'),
	(525, 'Borrar clases', 'classes_delete', 'yes'),
	(526, 'Tema', 'subject', 'yes'),
	(527, 'Agregar tema', 'subject_add', 'yes'),
	(528, 'Editar tema', 'subject_edit', 'yes'),
	(529, 'Borrar tema', 'subject_delete', 'yes'),
	(530, 'Seccion', 'section', 'yes'),
	(531, 'Agregar sección', 'section_add', 'yes'),
	(532, 'Editar sección', 'section_edit', 'yes'),
	(533, 'Borrar semestre', 'semester_delete', 'yes'),
	(534, 'Borrar sección', 'section_delete', 'yes'),
	(535, 'Plan de estudios', 'syllabus', 'yes'),
	(536, 'Agregar plan de estudios', 'syllabus_add', 'yes'),
	(537, 'Editar plan de estudios', 'syllabus_edit', 'yes'),
	(538, 'Borrar plan de estudios', 'syllabus_delete', 'yes'),
	(539, 'Asignación', 'assignment', 'yes'),
	(540, 'Agregar asignación', 'assignment_add', 'yes'),
	(541, 'Editar asignación', 'assignment_edit', 'yes'),
	(542, 'Borrar asignación', 'assignment_delete', 'yes'),
	(543, 'Visualizar asignación', 'assignment_view', 'yes'),
	(544, 'Horario', 'routine', 'yes'),
	(545, 'Agregar horario', 'routine_add', 'yes'),
	(546, 'Editar horario', 'routine_edit', 'yes'),
	(547, 'Borrar horario', 'routine_delete', 'yes'),
	(548, 'Asistencia de estudiante', 'sattendance', 'yes'),
	(549, 'Agregar asistencia estudiante', 'sattendance_add', 'yes'),
	(550, 'Visualizar asistencia estudiante', 'sattendance_view', 'yes'),
	(551, 'Asistencia docente', 'tattendance', 'yes'),
	(552, 'Agregar asistencia docente', 'tattendance_add', 'yes'),
	(553, 'Visualizar asistencia docente', 'tattendance_view', 'yes'),
	(554, 'Examen', 'exam', 'yes'),
	(555, 'Agregar examen', 'exam_add', 'yes'),
	(556, 'Editar examen', 'exam_edit', 'yes'),
	(557, 'Borrar examen', 'exam_delete', 'yes'),
	(558, 'Horario de examen', 'examschedule', 'yes'),
	(559, 'Agregar horario examen', 'examschedule_add', 'yes'),
	(560, 'Editar horario examen', 'examschedule_edit', 'yes'),
	(561, 'Borrar horario examen', 'examschedule_delete', 'yes'),
	(562, 'Grado', 'grade', 'yes'),
	(563, 'Agregar grado', 'grade_add', 'yes'),
	(564, 'Editar grado', 'grade_edit', 'yes'),
	(565, 'Borrar grado', 'grade_delete', 'yes'),
	(566, 'Asistencia examen', 'eattendance', 'yes'),
	(567, 'Agregar asistencia examen', 'eattendance_add', 'yes'),
	(568, 'Promedio', 'mark', 'yes'),
	(569, 'Agregar promedio', 'mark_add', 'yes'),
	(570, 'Visualizar promedio', 'mark_view', 'yes'),
	(571, 'Porcentaje promedio', 'markpercentage', 'yes'),
	(572, 'Agregar porcentaje promedio', 'markpercentage_add', 'yes'),
	(573, 'Editar porcentaje promedio', 'markpercentage_edit', 'yes'),
	(574, 'Borrar porcentaje promedio', 'markpercentage_delete', 'yes'),
	(575, 'Promoción', 'promotion', 'yes'),
	(576, 'Conversación', 'conversation', 'yes'),
	(577, 'Multimedia', 'media', 'yes'),
	(578, 'Agregar multimedia', 'media_add', 'yes'),
	(579, 'Borrar multimedia', 'media_delete', 'yes'),
	(580, 'Correo', 'mailandsms', 'yes'),
	(581, 'Agregar correo', 'mailandsms_add', 'yes'),
	(582, 'Visualizar correo', 'mailandsms_view', 'yes'),
	(583, 'Miembro de la biblioteca', 'lmember', 'yes'),
	(584, 'Agregar miembro biblioteca', 'lmember_add', 'yes'),
	(585, 'Editar miembro biblioteca', 'lmember_edit', 'yes'),
	(586, 'Borrar miembro biblioteca', 'lmember_delete', 'yes'),
	(587, 'Visualizar miembro biblioteca', 'lmember_view', 'yes'),
	(588, 'Libros', 'book', 'yes'),
	(589, 'Agregar libros', 'book_add', 'yes'),
	(590, 'Editar libros', 'book_edit', 'yes'),
	(591, 'Borrar libros', 'book_delete', 'yes'),
	(592, 'Libro de publicación', 'issue', 'yes'),
	(593, 'Agregar libro de publicación', 'issue_add', 'yes'),
	(594, 'Editar libro de publicación', 'issue_edit', 'yes'),
	(595, 'Visualizar libro de publicación', 'issue_view', 'yes'),
	(596, 'Transporte', 'transport', 'yes'),
	(597, 'Agregar transporte', 'transport_add', 'yes'),
	(598, 'Editar transporte', 'transport_edit', 'yes'),
	(599, 'Borrar transporte', 'transport_delete', 'yes'),
	(600, 'Miembro transporte', 'tmember', 'yes'),
	(601, 'Agregar miembro transporte', 'tmember_add', 'yes'),
	(602, 'Editar miembro transporte', 'tmember_edit', 'yes'),
	(603, 'Borrar miembro transporte', 'tmember_delete', 'yes'),
	(604, 'Visualizar miembro transporte', 'tmember_view', 'yes'),
	(605, 'Hospedaje', 'hostel', 'yes'),
	(606, 'Agregar hospedaje', 'hostel_add', 'yes'),
	(607, 'Editar hospedaje', 'hostel_edit', 'yes'),
	(608, 'Borrar hospedaje', 'hostel_delete', 'yes'),
	(609, 'Categoría hospedaje', 'category', 'yes'),
	(610, 'Agregar categoría hospedaje', 'category_add', 'yes'),
	(611, 'Editar categoría hospedaje', 'category_edit', 'yes'),
	(612, 'Borrar categoría hospedaje', 'category_delete', 'yes'),
	(613, 'Miembro hospedaje', 'hmember', 'yes'),
	(614, 'Agregar miembro hospedaje', 'hmember_add', 'yes'),
	(615, 'Editar miembro hospedaje', 'hmember_edit', 'yes'),
	(616, 'Borrar miembro hospedaje', 'hmember_delete', 'yes'),
	(617, 'Visualizar miembro hospedaje', 'hmember_view', 'yes'),
	(618, 'Tipo de tarifa', 'feetypes', 'yes'),
	(619, 'Agregar tipo de tarifa', 'feetypes_add', 'yes'),
	(620, 'Editar tipo de tarifa', 'feetypes_edit', 'yes'),
	(621, 'Borrar tipo de tarifa', 'feetypes_delete', 'yes'),
	(622, 'Factura', 'invoice', 'yes'),
	(623, 'Agregar factura', 'invoice_add', 'yes'),
	(624, 'Editar factura', 'invoice_edit', 'yes'),
	(625, 'Borrar factura', 'invoice_delete', 'yes'),
	(626, 'Visualizar factura', 'invoice_view', 'yes'),
	(627, 'Historial de pago', 'paymenthistory', 'yes'),
	(628, 'Editar historial de pago', 'paymenthistory_edit', 'yes'),
	(629, 'Borrar historial de pago', 'paymenthistory_delete', 'yes'),
	(630, 'Gasto', 'expense', 'yes'),
	(631, 'Agregar gasto', 'expense_add', 'yes'),
	(632, 'Editar gasto', 'expense_edit', 'yes'),
	(633, 'Borrar gasto', 'expense_delete', 'yes'),
	(634, 'Noticias', 'notice', 'yes'),
	(635, 'Agregar noticias', 'notice_add', 'yes'),
	(636, 'Editar noticias', 'notice_edit', 'yes'),
	(637, 'Borrar noticias', 'notice_delete', 'yes'),
	(638, 'Visualizar noticias', 'notice_view', 'yes'),
	(639, 'Evento', 'event', 'yes'),
	(640, 'Agregar evento', 'event_add', 'yes'),
	(641, 'Editar evento', 'event_edit', 'yes'),
	(642, 'Borrar evento', 'event_delete', 'yes'),
	(643, 'Visualizar evento', 'event_view', 'yes'),
	(644, 'Vacaciones', 'holiday', 'yes'),
	(645, 'Agregar vacaciones', 'holiday_add', 'yes'),
	(646, 'Editar vacaciones', 'holiday_edit', 'yes'),
	(647, 'Borrar vacaciones', 'holiday_delete', 'yes'),
	(648, 'Visualizar vacaciones', 'holiday_view', 'yes'),
	(649, 'Reportes', 'report', 'yes'),
	(650, 'informacion del visitante', 'visitorinfo', 'yes'),
	(651, 'Visitor Information Delete', 'visitorinfo_delete', 'yes'),
	(652, 'Visitor Infomation View', 'visitorinfo_view', 'yes'),
	(653, 'Año académico', 'schoolyear', 'yes'),
	(654, 'Agregar año académico', 'schoolyear_add', 'yes'),
	(655, 'Editar año académico', 'schoolyear_edit', 'yes'),
	(656, 'Borrar año académico', 'schoolyear_delete', 'yes'),
	(657, 'Administrador del sistema', 'systemadmin', 'yes'),
	(658, 'Agregar administrador del sistema', 'systemadmin_add', 'yes'),
	(659, 'Editar administrador del sistema', 'systemadmin_edit', 'yes'),
	(660, 'Borrar administrador del sistema', 'systemadmin_delete', 'yes'),
	(661, 'Visualizar administrador del sistema', 'systemadmin_view', 'yes'),
	(662, 'Reiniciar contraseña', 'resetpassword', 'yes'),
	(663, 'Plantilla mail', 'mailandsmstemplate', 'yes'),
	(664, 'Agregar plantilla mail', 'mailandsmstemplate_add', 'yes'),
	(665, 'Editar plantilla mail', 'mailandsmstemplate_edit', 'yes'),
	(666, 'Borrar plantilla mail', 'mailandsmstemplate_delete', 'yes'),
	(667, 'Visualizar plantilla', 'mailandsmstemplate_view', 'yes'),
	(668, 'Importar', 'bulkimport ', 'yes'),
	(669, 'Backup', 'backup', 'yes'),
	(670, 'usuarios/rol', 'usertype', 'yes'),
	(671, 'Agregar usuarios/rol', 'usertype_add', 'yes'),
	(672, 'Editar usuarios/rol', 'usertype_edit', 'yes'),
	(673, 'Borrar usuarios/rol', 'usertype_delete', 'yes'),
	(674, 'Permiso', 'permission', 'yes'),
	(675, 'Actualizacion', 'update', 'yes'),
	(676, 'Configuación general', 'setting', 'yes'),
	(677, 'Editar Configuación', 'setting_edit', 'yes'),
	(678, 'Configuación de pago', 'paymentsettings', 'yes'),
	(679, 'Configuación sms', 'smssettings', 'yes');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.permission_relationships
CREATE TABLE IF NOT EXISTS `permission_relationships` (
  `permission_id` int(11) NOT NULL,
  `usertype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla lesson.permission_relationships: ~379 rows (aproximadamente)
/*!40000 ALTER TABLE `permission_relationships` DISABLE KEYS */;
INSERT INTO `permission_relationships` (`permission_id`, `usertype_id`) VALUES
	(501, 1),
	(502, 1),
	(503, 1),
	(504, 1),
	(505, 1),
	(506, 1),
	(507, 1),
	(508, 1),
	(509, 1),
	(510, 1),
	(511, 1),
	(512, 1),
	(513, 1),
	(514, 1),
	(515, 1),
	(516, 1),
	(517, 1),
	(518, 1),
	(519, 1),
	(520, 1),
	(521, 1),
	(522, 1),
	(523, 1),
	(524, 1),
	(525, 1),
	(526, 1),
	(527, 1),
	(528, 1),
	(529, 1),
	(530, 1),
	(531, 1),
	(532, 1),
	(534, 1),
	(535, 1),
	(536, 1),
	(537, 1),
	(538, 1),
	(539, 1),
	(540, 1),
	(541, 1),
	(542, 1),
	(543, 1),
	(544, 1),
	(545, 1),
	(546, 1),
	(547, 1),
	(548, 1),
	(549, 1),
	(550, 1),
	(551, 1),
	(552, 1),
	(553, 1),
	(554, 1),
	(555, 1),
	(556, 1),
	(557, 1),
	(558, 1),
	(559, 1),
	(560, 1),
	(561, 1),
	(562, 1),
	(563, 1),
	(564, 1),
	(565, 1),
	(566, 1),
	(567, 1),
	(568, 1),
	(569, 1),
	(570, 1),
	(571, 1),
	(572, 1),
	(573, 1),
	(574, 1),
	(575, 1),
	(576, 1),
	(577, 1),
	(578, 1),
	(579, 1),
	(580, 1),
	(581, 1),
	(582, 1),
	(583, 1),
	(584, 1),
	(585, 1),
	(586, 1),
	(587, 1),
	(588, 1),
	(589, 1),
	(590, 1),
	(591, 1),
	(592, 1),
	(593, 1),
	(594, 1),
	(595, 1),
	(596, 1),
	(597, 1),
	(598, 1),
	(599, 1),
	(600, 1),
	(601, 1),
	(602, 1),
	(603, 1),
	(604, 1),
	(605, 1),
	(606, 1),
	(607, 1),
	(608, 1),
	(609, 1),
	(610, 1),
	(611, 1),
	(612, 1),
	(613, 1),
	(614, 1),
	(615, 1),
	(616, 1),
	(617, 1),
	(618, 1),
	(619, 1),
	(620, 1),
	(621, 1),
	(622, 1),
	(623, 1),
	(624, 1),
	(625, 1),
	(626, 1),
	(627, 1),
	(628, 1),
	(629, 1),
	(630, 1),
	(631, 1),
	(632, 1),
	(633, 1),
	(634, 1),
	(635, 1),
	(636, 1),
	(637, 1),
	(638, 1),
	(639, 1),
	(640, 1),
	(641, 1),
	(642, 1),
	(643, 1),
	(644, 1),
	(645, 1),
	(646, 1),
	(647, 1),
	(648, 1),
	(649, 1),
	(650, 1),
	(651, 1),
	(652, 1),
	(653, 1),
	(654, 1),
	(655, 1),
	(656, 1),
	(657, 1),
	(658, 1),
	(659, 1),
	(660, 1),
	(661, 1),
	(662, 1),
	(663, 1),
	(664, 1),
	(665, 1),
	(666, 1),
	(667, 1),
	(668, 1),
	(669, 1),
	(670, 1),
	(671, 1),
	(672, 1),
	(673, 1),
	(674, 1),
	(675, 1),
	(676, 1),
	(677, 1),
	(678, 1),
	(679, 1),
	(501, 2),
	(502, 2),
	(506, 2),
	(512, 2),
	(516, 2),
	(526, 2),
	(535, 2),
	(536, 2),
	(537, 2),
	(538, 2),
	(539, 2),
	(540, 2),
	(541, 2),
	(542, 2),
	(543, 2),
	(544, 2),
	(548, 2),
	(549, 2),
	(550, 2),
	(551, 2),
	(553, 2),
	(558, 2),
	(566, 2),
	(567, 2),
	(568, 2),
	(569, 2),
	(570, 2),
	(576, 2),
	(577, 2),
	(578, 2),
	(579, 2),
	(588, 2),
	(596, 2),
	(605, 2),
	(609, 2),
	(634, 2),
	(638, 2),
	(639, 2),
	(643, 2),
	(644, 2),
	(648, 2),
	(501, 4),
	(512, 4),
	(516, 4),
	(526, 4),
	(535, 4),
	(544, 4),
	(548, 4),
	(550, 4),
	(558, 4),
	(568, 4),
	(570, 4),
	(576, 4),
	(577, 4),
	(583, 4),
	(587, 4),
	(588, 4),
	(592, 4),
	(595, 4),
	(596, 4),
	(600, 4),
	(604, 4),
	(605, 4),
	(609, 4),
	(613, 4),
	(617, 4),
	(622, 4),
	(626, 4),
	(627, 4),
	(634, 4),
	(638, 4),
	(639, 4),
	(643, 4),
	(644, 4),
	(648, 4),
	(501, 5),
	(512, 5),
	(516, 5),
	(576, 5),
	(577, 5),
	(596, 5),
	(600, 5),
	(601, 5),
	(602, 5),
	(603, 5),
	(604, 5),
	(605, 5),
	(609, 5),
	(613, 5),
	(614, 5),
	(615, 5),
	(616, 5),
	(617, 5),
	(618, 5),
	(619, 5),
	(620, 5),
	(621, 5),
	(622, 5),
	(623, 5),
	(624, 5),
	(625, 5),
	(626, 5),
	(627, 5),
	(628, 5),
	(629, 5),
	(630, 5),
	(631, 5),
	(632, 5),
	(633, 5),
	(634, 5),
	(638, 5),
	(639, 5),
	(643, 5),
	(644, 5),
	(648, 5),
	(501, 6),
	(512, 6),
	(516, 6),
	(526, 6),
	(576, 6),
	(577, 6),
	(583, 6),
	(584, 6),
	(585, 6),
	(586, 6),
	(587, 6),
	(588, 6),
	(589, 6),
	(590, 6),
	(591, 6),
	(592, 6),
	(593, 6),
	(594, 6),
	(595, 6),
	(596, 6),
	(605, 6),
	(609, 6),
	(634, 6),
	(638, 6),
	(639, 6),
	(643, 6),
	(644, 6),
	(648, 6),
	(501, 7),
	(512, 7),
	(516, 7),
	(576, 7),
	(577, 7),
	(605, 7),
	(609, 7),
	(613, 7),
	(617, 7),
	(634, 7),
	(638, 7),
	(639, 7),
	(643, 7),
	(644, 7),
	(648, 7),
	(650, 7),
	(651, 7),
	(652, 7),
	(502, 8),
	(503, 8),
	(504, 8),
	(505, 8),
	(506, 8),
	(507, 8),
	(508, 8),
	(509, 8),
	(510, 8),
	(511, 8),
	(501, 3),
	(512, 3),
	(526, 3),
	(535, 3),
	(539, 3),
	(543, 3),
	(548, 3),
	(558, 3),
	(568, 3),
	(576, 3),
	(577, 3),
	(583, 3),
	(588, 3),
	(592, 3),
	(595, 3),
	(596, 3),
	(600, 3),
	(605, 3),
	(609, 3),
	(613, 3),
	(622, 3),
	(626, 3),
	(627, 3),
	(634, 3),
	(638, 3),
	(639, 3),
	(643, 3),
	(644, 3),
	(648, 3),
	(544, 3);
/*!40000 ALTER TABLE `permission_relationships` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.promotionlog
CREATE TABLE IF NOT EXISTS `promotionlog` (
  `promotionLogID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `promotionType` varchar(50) DEFAULT NULL,
  `classesID` int(11) NOT NULL,
  `jumpClassID` int(11) NOT NULL,
  `schoolYearID` int(11) NOT NULL,
  `jumpSchoolYearID` int(11) NOT NULL,
  `subjectandsubjectcodeandmark` longtext,
  `exams` longtext,
  `markpercentages` longtext,
  `promoteStudents` longtext,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  PRIMARY KEY (`promotionLogID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.promotionlog: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `promotionlog` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotionlog` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.reply_msg
CREATE TABLE IF NOT EXISTS `reply_msg` (
  `replyID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `messageID` int(11) NOT NULL,
  `reply_msg` text NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`replyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.reply_msg: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reply_msg` DISABLE KEYS */;
/*!40000 ALTER TABLE `reply_msg` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.reset
CREATE TABLE IF NOT EXISTS `reset` (
  `resetID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `keyID` varchar(128) NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`resetID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.reset: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reset` DISABLE KEYS */;
/*!40000 ALTER TABLE `reset` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.routine
CREATE TABLE IF NOT EXISTS `routine` (
  `routineID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `day` varchar(60) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `room` tinytext NOT NULL,
  PRIMARY KEY (`routineID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.routine: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `routine` DISABLE KEYS */;
/*!40000 ALTER TABLE `routine` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.schoolyear
CREATE TABLE IF NOT EXISTS `schoolyear` (
  `schoolyearID` int(11) NOT NULL AUTO_INCREMENT,
  `schooltype` varchar(40) DEFAULT NULL,
  `schoolyear` varchar(128) NOT NULL,
  `schoolyeartitle` varchar(128) DEFAULT NULL,
  `semestercode` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(100) NOT NULL,
  `create_usertype` varchar(100) NOT NULL,
  PRIMARY KEY (`schoolyearID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.schoolyear: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `schoolyear` DISABLE KEYS */;
INSERT INTO `schoolyear` (`schoolyearID`, `schooltype`, `schoolyear`, `schoolyeartitle`, `semestercode`, `create_date`, `modify_date`, `create_userID`, `create_username`, `create_usertype`) VALUES
	(1, 'classbase', '2017', 'primera gestion', 0, '2017-01-01 06:21:11', '2017-11-19 05:14:15', 1, 'admin', 'Admin'),
	(2, 'semesterbase', '2017-2018', 'Spring', 11, '2017-01-01 08:19:17', '2017-01-06 08:23:15', 1, 'admin', 'Admin');
/*!40000 ALTER TABLE `schoolyear` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.school_sessions
CREATE TABLE IF NOT EXISTS `school_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla lesson.school_sessions: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `school_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `school_sessions` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.section
CREATE TABLE IF NOT EXISTS `section` (
  `sectionID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `section` varchar(60) NOT NULL,
  `category` varchar(128) NOT NULL,
  `capacity` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `note` text,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(40) NOT NULL,
  `create_usertype` varchar(20) NOT NULL,
  PRIMARY KEY (`sectionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.section: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
/*!40000 ALTER TABLE `section` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.setting
CREATE TABLE IF NOT EXISTS `setting` (
  `fieldoption` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`fieldoption`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.setting: ~25 rows (aproximadamente)
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` (`fieldoption`, `value`) VALUES
	('address', 'c/ direccion'),
	('attendance', 'subject'),
	('automation', '1'),
	('auto_invoice_generate', '1'),
	('backend_theme', 'basic'),
	('currency_code', 'USD'),
	('currency_symbol', '$'),
	('email', 'micorreo@gmail.com'),
	('fontendorbackend', '0'),
	('fontend_theme', 'basic'),
	('footer', 'Copyright &copy;Lesson'),
	('language', 'spanish'),
	('language_id', '1'),
	('mark_1', '0'),
	('mark_2', '0'),
	('mark_3', '1'),
	('mark_4', '0'),
	('modify_date', '2017-11-08 10:06:00'),
	('note', '1'),
	('phone', '1110077'),
	('photo', 'site.png'),
	('school_type', 'classbase'),
	('school_year', '1'),
	('sname', 'lesson'),
	('student_ID_format', '1');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.student
CREATE TABLE IF NOT EXISTS `student` (
  `studentID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dni` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `dob` date DEFAULT NULL,
  `sex` varchar(10) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `bloodgroup` varchar(5) DEFAULT NULL,
  `country` varchar(128) DEFAULT NULL,
  `registerNO` varchar(128) DEFAULT NULL,
  `state` varchar(128) DEFAULT NULL,
  `library` int(11) NOT NULL,
  `hostel` int(11) NOT NULL,
  `transport` int(11) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `parentID` int(11) DEFAULT NULL,
  `createschoolyearID` int(11) NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(40) NOT NULL,
  `create_usertype` varchar(20) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.student: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
/*!40000 ALTER TABLE `student` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.studentextend
CREATE TABLE IF NOT EXISTS `studentextend` (
  `studentID` int(11) DEFAULT NULL,
  `Columna 2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lesson.studentextend: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `studentextend` DISABLE KEYS */;
/*!40000 ALTER TABLE `studentextend` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.studentgroup
CREATE TABLE IF NOT EXISTS `studentgroup` (
  `studentgroupID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla lesson.studentgroup: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `studentgroup` DISABLE KEYS */;
/*!40000 ALTER TABLE `studentgroup` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.studentrelation
CREATE TABLE IF NOT EXISTS `studentrelation` (
  `studentrelationID` int(11) NOT NULL AUTO_INCREMENT,
  `srstudentID` int(11) DEFAULT NULL,
  `srname` varchar(40) NOT NULL,
  `srclassesID` int(11) DEFAULT NULL,
  `srclasses` varchar(40) DEFAULT NULL,
  `srroll` int(11) DEFAULT NULL,
  `srregisterNO` varchar(128) DEFAULT NULL,
  `srsectionID` int(11) DEFAULT NULL,
  `srsection` varchar(40) DEFAULT NULL,
  `srschoolyearID` int(11) DEFAULT NULL,
  PRIMARY KEY (`studentrelationID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.studentrelation: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `studentrelation` DISABLE KEYS */;
/*!40000 ALTER TABLE `studentrelation` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.subject
CREATE TABLE IF NOT EXISTS `subject` (
  `subjectID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `classesID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `type` int(100) NOT NULL,
  `passmark` int(11) NOT NULL,
  `finalmark` int(11) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `subject_author` varchar(100) DEFAULT NULL,
  `subject_code` tinytext NOT NULL,
  `teacher_name` varchar(60) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(40) NOT NULL,
  `create_usertype` varchar(20) NOT NULL,
  PRIMARY KEY (`subjectID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.subject: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.sub_attendance
CREATE TABLE IF NOT EXISTS `sub_attendance` (
  `attendanceID` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `schoolyearID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `monthyear` varchar(10) NOT NULL,
  `a1` varchar(3) DEFAULT NULL,
  `a2` varchar(3) DEFAULT NULL,
  `a3` varchar(3) DEFAULT NULL,
  `a4` varchar(3) DEFAULT NULL,
  `a5` varchar(3) DEFAULT NULL,
  `a6` varchar(3) DEFAULT NULL,
  `a7` varchar(3) DEFAULT NULL,
  `a8` varchar(3) DEFAULT NULL,
  `a9` varchar(3) DEFAULT NULL,
  `a10` varchar(3) DEFAULT NULL,
  `a11` varchar(3) DEFAULT NULL,
  `a12` varchar(3) DEFAULT NULL,
  `a13` varchar(3) DEFAULT NULL,
  `a14` varchar(3) DEFAULT NULL,
  `a15` varchar(3) DEFAULT NULL,
  `a16` varchar(3) DEFAULT NULL,
  `a17` varchar(3) DEFAULT NULL,
  `a18` varchar(3) DEFAULT NULL,
  `a19` varchar(3) DEFAULT NULL,
  `a20` varchar(3) DEFAULT NULL,
  `a21` varchar(3) DEFAULT NULL,
  `a22` varchar(3) DEFAULT NULL,
  `a23` varchar(3) DEFAULT NULL,
  `a24` varchar(3) DEFAULT NULL,
  `a25` varchar(3) DEFAULT NULL,
  `a26` varchar(3) DEFAULT NULL,
  `a27` varchar(3) DEFAULT NULL,
  `a28` varchar(3) DEFAULT NULL,
  `a29` varchar(3) DEFAULT NULL,
  `a30` varchar(3) DEFAULT NULL,
  `a31` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`attendanceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.sub_attendance: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sub_attendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `sub_attendance` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.syllabus
CREATE TABLE IF NOT EXISTS `syllabus` (
  `syllabusID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` text,
  `date` date NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `originalfile` text NOT NULL,
  `file` text,
  `classesID` int(11) NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  PRIMARY KEY (`syllabusID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.syllabus: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `syllabus` DISABLE KEYS */;
/*!40000 ALTER TABLE `syllabus` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.systemadmin
CREATE TABLE IF NOT EXISTS `systemadmin` (
  `systemadminID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dni` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `jod` date NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(40) NOT NULL,
  `create_usertype` varchar(20) NOT NULL,
  `active` int(11) NOT NULL,
  `systemadminextra1` varchar(128) DEFAULT NULL,
  `systemadminextra2` varchar(128) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`systemadminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.systemadmin: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `systemadmin` DISABLE KEYS */;
INSERT INTO `systemadmin` (`systemadminID`, `dni`, `name`, `dob`, `sex`, `email`, `phone`, `address`, `jod`, `photo`, `username`, `password`, `usertypeID`, `create_date`, `modify_date`, `create_userID`, `create_username`, `create_usertype`, `active`, `systemadminextra1`, `systemadminextra2`, `status`) VALUES
	(1, '00000000', 'admin', '2015-11-05', 'Masculino', 'edu45@gmail.com', '000777711', 'c/ direccion', '2017-11-05', 'defualt.png', 'admin', '0aabca54ed36e6dd7e11f37899af0329406b95a472e0ca129166290c1728f5c0eb17b536ee78c04e745a23fa8b4a5afc7365edcd7c57d01679fb4989500ebf67', 1, '2017-11-05 03:09:19', '2017-11-05 03:09:19', 0, 'admin', 'Admin', 1, '', '', NULL);
/*!40000 ALTER TABLE `systemadmin` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.tattendance
CREATE TABLE IF NOT EXISTS `tattendance` (
  `tattendanceID` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `schoolyearID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `monthyear` varchar(10) NOT NULL,
  `a1` varchar(3) DEFAULT NULL,
  `a2` varchar(3) DEFAULT NULL,
  `a3` varchar(3) DEFAULT NULL,
  `a4` varchar(3) DEFAULT NULL,
  `a5` varchar(3) DEFAULT NULL,
  `a6` varchar(3) DEFAULT NULL,
  `a7` varchar(3) DEFAULT NULL,
  `a8` varchar(3) DEFAULT NULL,
  `a9` varchar(3) DEFAULT NULL,
  `a10` varchar(3) DEFAULT NULL,
  `a11` varchar(3) DEFAULT NULL,
  `a12` varchar(3) DEFAULT NULL,
  `a13` varchar(3) DEFAULT NULL,
  `a14` varchar(3) DEFAULT NULL,
  `a15` varchar(3) DEFAULT NULL,
  `a16` varchar(3) DEFAULT NULL,
  `a17` varchar(3) DEFAULT NULL,
  `a18` varchar(3) DEFAULT NULL,
  `a19` varchar(3) DEFAULT NULL,
  `a20` varchar(3) DEFAULT NULL,
  `a21` varchar(3) DEFAULT NULL,
  `a22` varchar(3) DEFAULT NULL,
  `a23` varchar(3) DEFAULT NULL,
  `a24` varchar(3) DEFAULT NULL,
  `a25` varchar(3) DEFAULT NULL,
  `a26` varchar(3) DEFAULT NULL,
  `a27` varchar(3) DEFAULT NULL,
  `a28` varchar(3) DEFAULT NULL,
  `a29` varchar(3) DEFAULT NULL,
  `a30` varchar(3) DEFAULT NULL,
  `a31` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`tattendanceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.tattendance: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tattendance` DISABLE KEYS */;
/*!40000 ALTER TABLE `tattendance` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.teacher
CREATE TABLE IF NOT EXISTS `teacher` (
  `teacherID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dni` varchar(50) DEFAULT NULL,
  `name` varchar(60) NOT NULL,
  `designation` varchar(128) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `jod` date NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(40) NOT NULL,
  `create_usertype` varchar(20) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`teacherID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.teacher: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.tmember
CREATE TABLE IF NOT EXISTS `tmember` (
  `tmemberID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `studentID` int(11) NOT NULL,
  `transportID` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `tbalance` varchar(11) DEFAULT NULL,
  `tjoindate` date NOT NULL,
  PRIMARY KEY (`tmemberID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.tmember: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tmember` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmember` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.transport
CREATE TABLE IF NOT EXISTS `transport` (
  `transportID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `route` text NOT NULL,
  `vehicle` int(11) NOT NULL,
  `fare` varchar(11) NOT NULL,
  `note` text,
  PRIMARY KEY (`transportID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.transport: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `transport` DISABLE KEYS */;
/*!40000 ALTER TABLE `transport` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.user
CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dni` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `jod` date NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(40) NOT NULL,
  `create_usertype` varchar(20) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.user: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Volcando estructura para tabla lesson.usertype
CREATE TABLE IF NOT EXISTS `usertype` (
  `usertypeID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usertype` varchar(60) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(40) NOT NULL,
  `create_usertype` varchar(20) NOT NULL,
  PRIMARY KEY (`usertypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla lesson.usertype: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `usertype` DISABLE KEYS */;
INSERT INTO `usertype` (`usertypeID`, `usertype`, `create_date`, `modify_date`, `create_userID`, `create_username`, `create_usertype`) VALUES
	(1, 'Administrador', '2016-06-24 07:12:49', '2017-11-07 02:04:49', 1, 'admin', 'Super Admin'),
	(2, 'Docente', '2016-06-24 07:13:13', '2016-06-24 07:13:13', 1, 'admin', 'Super Admin'),
	(3, 'Estudiante', '2016-06-24 07:13:27', '2017-11-18 04:48:05', 1, 'admin', 'Super Admin'),
	(4, 'Padres', '2016-06-24 07:13:42', '2016-10-25 01:12:52', 1, 'admin', 'Super Admin'),
	(5, 'Secretaria', '2016-06-24 07:13:54', '2016-06-24 07:13:54', 1, 'admin', 'Super Admin'),
	(6, 'Bibliotecario', '2016-06-24 09:09:43', '2016-06-24 09:09:43', 1, 'admin', 'Super Admin'),
	(7, 'Recepcionista', '2016-10-30 06:24:41', '2016-10-30 06:24:41', 1, 'admin', 'Admin'),
	(8, 'Moderado', '2016-10-30 07:00:20', '2016-12-06 06:08:38', 1, 'admin', 'Admin'),
	(9, 'Temporal', '2017-11-09 02:02:23', '2017-11-09 02:53:27', 1, 'admin', 'Administrador');
/*!40000 ALTER TABLE `usertype` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
