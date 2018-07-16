SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

 
CREATE TABLE IF NOT EXISTS `beedyschool` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code1` varchar(50) NOT NULL,
  `code2` varchar(50) NOT NULL,
  `codekey` varchar(30) NOT NULL,
  `dateFrom` varchar(50) NOT NULL,
  `dateTo` varchar(50) NOT NULL,
  `active` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `beedyapptips` (
  `tipsId` int(11) NOT NULL AUTO_INCREMENT,
  `tips` varchar(250) NOT NULL,
  PRIMARY KEY (`tipsId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `beedyapptips` (`tipsId`, `tips`) VALUES
(1, 'Always log out your session when you are not working with the system'),
(2, 'Do not reveal your password to anyone'),
(3, 'Do not grant access to non-admin staff'),
(4, 'Contact software vendor before making any changes to the system');


CREATE TABLE IF NOT EXISTS `beedyclasslist` (
  `classId` int(11) NOT NULL AUTO_INCREMENT,
  `className` varchar(20) NOT NULL,
  `groupId` int(11) NOT NULL,
  PRIMARY KEY (`classId`),
  KEY `groupId` (`groupId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `beedyexamtype` (
  `examTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `typeName` varchar(100) NOT NULL,
  PRIMARY KEY (`examTypeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `beedygroup` (
  `exambankId` int(11) NOT NULL AUTO_INCREMENT,
  `bankName` varchar(100) NOT NULL,
  PRIMARY KEY (`exambankId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `beedygroupsub` (
  `bankId` int(11) NOT NULL AUTO_INCREMENT,
  `subId` int(11) NOT NULL,
  `examTypeId` int(11) DEFAULT NULL,
  `exambankId` int(11) DEFAULT NULL,
  `Exam_Date` varchar(30) NOT NULL,
  `Exam_Instruction` varchar(100) DEFAULT 'Answer all question',
  `Exam_Duration` int(11) NOT NULL,
  `Total_Question` int(11) DEFAULT NULL,
  `Mark` varchar(5) DEFAULT '1',
  `faceId` int(11) DEFAULT NULL,
  `random` varchar(3) DEFAULT 'No',
  `Show_Result` varchar(3) DEFAULT 'No',
  `Active` varchar(3) DEFAULT '',
  PRIMARY KEY (`bankId`),
  KEY `subId` (`subId`),
  KEY `examTypeId` (`examTypeId`),
  KEY `exambankId` (`exambankId`),
  KEY `faceId` (`faceId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `beedyinterfaces` (
  `faceId` int(11) NOT NULL AUTO_INCREMENT,
  `faceName` varchar(50) NOT NULL,
  `Active` int(11) DEFAULT NULL,
  PRIMARY KEY (`faceId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `beedyinterfaces` (`faceId`, `faceName`, `Active`) VALUES
(1, 'beedy-quick', 1),
(2, 'beedy-one', 1),
(3, 'beedy-flexible', 0);


CREATE TABLE IF NOT EXISTS `beedyschooldata` (
  `beedySchoolName` varchar(60) NOT NULL,
  `beedySchoolMotto` varchar(60) NOT NULL,
  `beedySchoolLogo` varchar(60) DEFAULT NULL,
  `beedySchoolAddress` varchar(60) DEFAULT NULL,
  `beedySchoolEmail` varchar(50) DEFAULT NULL,
  `beedySchoolPhoneNum` varchar(50) NOT NULL,
  `beedySchoolWebsite` varchar(30) DEFAULT NULL,
  `CurrentSession` int(11) DEFAULT NULL,
  `CurrentTerm` int(11) DEFAULT NULL,
  `theme` varchar(20) DEFAULT NULL,
  KEY `currentTerm` (`CurrentTerm`),
  KEY `CurrentSession` (`CurrentSession`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `beedyschoolterm` (
  `SchoolTermId` int(11) NOT NULL AUTO_INCREMENT,
  `SchoolTermName` varchar(20) NOT NULL,
  PRIMARY KEY (`SchoolTermId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `beedystdgroup` (
  `groupId` int(11) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(20) NOT NULL,
  PRIMARY KEY (`groupId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `beedystudentprofile` (
  `stdAddNum` int(11) NOT NULL AUTO_INCREMENT,
  `stdSurname` varchar(25) NOT NULL,
  `stdFirstName` varchar(25) NOT NULL,
  `stdMiddleName` varchar(25) DEFAULT NULL,
  `stdDob` varchar(20) NOT NULL,
  `stdGender` varchar(8) NOT NULL,
  `stdPicture` varchar(50) DEFAULT NULL,
  `classId` int(11) NOT NULL,
  `stdEmail` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `genStdBatchId` int(11) NOT NULL,
  `Active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`stdAddNum`),
  KEY `genStdBatchId` (`genStdBatchId`),
  KEY `genStudentClassId` (`classId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Student profile ' AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `beedysubjectlist` (
  `subId` int(11) NOT NULL AUTO_INCREMENT,
  `subjectName` varchar(20) NOT NULL,
  `classId` int(11) NOT NULL,
  PRIMARY KEY (`subId`),
  KEY `classId` (`classId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `beedysystem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code1` varchar(50) NOT NULL,
  `code2` varchar(50) NOT NULL,
  `codekey` varchar(30) NOT NULL,
  `dateFrom` varchar(50) NOT NULL,
  `dateTo` varchar(50) NOT NULL,
  `active` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `beedy_exam_result` (
  `resultId` int(11) NOT NULL AUTO_INCREMENT,
  `bankId` int(11) NOT NULL,
  `stdAddNum` int(11) NOT NULL,
  `genStdBatchId` int(11) NOT NULL,
  `SchoolTermId` int(11) NOT NULL,
  `Score` varchar(20) NOT NULL,
  `Percentage` varchar(20) NOT NULL,
  `Date` varchar(20) NOT NULL,
  PRIMARY KEY (`resultId`),
  KEY `bankId` (`bankId`),
  KEY `stdAddNum` (`stdAddNum`),
  KEY `genStdBatchId` (`genStdBatchId`),
  KEY `SchoolTermId` (`SchoolTermId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;




CREATE TABLE IF NOT EXISTS `beedy_question_bank` (
  `Question_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Exam_Question` text NOT NULL,
  `Exam_Question_Logo` varchar(1230) DEFAULT NULL,
  `Exam_Option_A` varchar(100) NOT NULL,
  `Exam_Option_B` varchar(100) NOT NULL,
  `Exam_Option_C` varchar(100) DEFAULT NULL,
  `Exam_Option_D` varchar(100) DEFAULT NULL,
  `Exam_Answer` varchar(3) NOT NULL,
  `bankId` int(11) NOT NULL,
  PRIMARY KEY (`Question_Id`),
  KEY `bankId` (`bankId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `genstudentbatches` (
  `genStdBatchId` int(11) NOT NULL AUTO_INCREMENT,
  `genStdBatchesYear` varchar(20) NOT NULL,
  PRIMARY KEY (`genStdBatchId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `login` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `stdAddNum` int(11) DEFAULT NULL,
  `adminId` int(11) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `regId` (`adminId`),
  KEY `studentId` (`stdAddNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
 

CREATE TABLE IF NOT EXISTS `system` (
  `companyName` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `CompanyEmail` varchar(100) DEFAULT NULL,
  `CompanyPhoneNum` varchar(100) DEFAULT NULL,
  `version` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `permissions` (
  `permitId` int(11) NOT NULL AUTO_INCREMENT,
  `permissionGrp` varchar(50) NOT NULL,
  `allocations` varchar(500) NOT NULL,
  PRIMARY KEY (`permitId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


INSERT INTO `permissions` (`permitId`, `permissionGrp`, `allocations`) VALUES
(1, 'Super User', '1_1,1_2,1_2a,1_2b,1_3,1_3a,1_3b,2_1,2_1a,2_1b,3_1,3_1a,3_1b,4_1,4_1a,4_1b,5_1,5_2,5_2a,5_2b,6_1,6_2,6_3,7_1,7_2,7_3,7_4,7_5,7_6,8_1,8_2,8_3,8_4,8_5,8_6,9_1');


CREATE TABLE IF NOT EXISTS `systemadmin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `area_privilege` int(11) NOT NULL,
  `active` varchar(3) DEFAULT 'YES',
  PRIMARY KEY (`adminId`),
  KEY `area_privilege` (`area_privilege`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

 

CREATE TABLE IF NOT EXISTS `systemwindow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code1` varchar(50) NOT NULL,
  `code2` varchar(50) NOT NULL,
  `codekey` varchar(30) NOT NULL,
  `active` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;



ALTER TABLE `beedyclasslist`
  ADD CONSTRAINT `beedyclasslist_ibfk_1` FOREIGN KEY (`groupId`) REFERENCES `beedystdgroup` (`groupId`) ON DELETE CASCADE ON UPDATE CASCADE;

  ALTER TABLE `beedygroupsub`
  ADD CONSTRAINT `beedygroupsub_ibfk_1` FOREIGN KEY (`subId`) REFERENCES `beedysubjectlist` (`subId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beedygroupsub_ibfk_2` FOREIGN KEY (`examTypeId`) REFERENCES `beedyexamtype` (`examTypeId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beedygroupsub_ibfk_3` FOREIGN KEY (`exambankId`) REFERENCES `beedygroup` (`exambankId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beedygroupsub_ibfk_4` FOREIGN KEY (`faceId`) REFERENCES `beedyinterfaces` (`faceId`) ON DELETE CASCADE ON UPDATE CASCADE;

  
ALTER TABLE `beedyschooldata`
  ADD CONSTRAINT `beedyschooldata_ibfk_1` FOREIGN KEY (`CurrentSession`) REFERENCES `genstudentbatches` (`genStdBatchId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beedyschooldata_ibfk_2` FOREIGN KEY (`CurrentTerm`) REFERENCES `beedyschoolterm` (`SchoolTermId`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `beedystudentprofile`
  ADD CONSTRAINT `beedystudentprofile_ibfk_1` FOREIGN KEY (`classId`) REFERENCES `beedyclasslist` (`classId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beedystudentprofile_ibfk_2` FOREIGN KEY (`genStdBatchId`) REFERENCES `genstudentbatches` (`genStdBatchId`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `beedysubjectlist`
  ADD CONSTRAINT `beedysubjectlist_ibfk_1` FOREIGN KEY (`classId`) REFERENCES `beedyclasslist` (`classId`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `beedy_exam_result`
  ADD CONSTRAINT `beedy_exam_result_ibfk_1` FOREIGN KEY (`bankId`) REFERENCES `beedygroupsub` (`bankId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beedy_exam_result_ibfk_2` FOREIGN KEY (`stdAddNum`) REFERENCES `beedystudentprofile` (`stdAddNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beedy_exam_result_ibfk_3` FOREIGN KEY (`SchoolTermId`) REFERENCES `beedyschoolterm` (`SchoolTermId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beedy_exam_result_ibfk_4` FOREIGN KEY (`genStdBatchId`) REFERENCES `genstudentbatches` (`genStdBatchId`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `beedy_question_bank`
  ADD CONSTRAINT `beedy_question_bank_ibfk_1` FOREIGN KEY (`bankId`) REFERENCES `beedygroupsub` (`bankId`) ON DELETE CASCADE ON UPDATE CASCADE;

  ALTER TABLE `systemadmin`
   ADD CONSTRAINT `systemadmin_ibfk_1` FOREIGN KEY (`area_privilege`) REFERENCES `permissions` (`permitId`) ON DELETE CASCADE ON UPDATE CASCADE;

   ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`stdAddNum`) REFERENCES `beedystudentprofile` (`stdAddNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`adminId`) REFERENCES `systemadmin` (`adminId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
