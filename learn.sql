-- Adminer 4.1.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `title` text NOT NULL,
  `data` text NOT NULL,
  `location` text NOT NULL,
  `hidden` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `lessons` (`id`, `category`, `title`, `data`, `location`, `hidden`) VALUES
(1,	1,	'SQL Injections 1',	'<p>Learn about the structure, purpose, and basic functions of an SQL database. Provides an introduction into SQL injections.</p>\r\n<p>By: Lujing Cen</p>',	'/web/sql/sql1.php',	0),
(2,	1,	'Google 101',	'<p>Just how powerful is the Google Search Engine? Learn how to fully utilize the power of Google.</p>\r\n<p>By: Oskar Wirga</p>',	'/web/google/google101.html',	1),
(3,	1,	'SQL Injections 2',	'<p>More advanced SQL Injection concepts. It is recommended that you first look at SQL Injections 1.</p>\r\n<p>By: Lujing Cen</p>',	'/web/sql/sql2.php',	0),
(4,	4,	'Introduction to Blender',	'<p>A introductory lesson into the basics of Blender.</p>\r\n<p>By: Oskar Wirga</p>',	'/software/blender/introtoblender.php',	0),
(5,	2,	'Steganography 1',	'<p>An introduction to image steganography and LSB techniques.</p>\r\n<p>By: Lujing Cen</p>',	'/forensics/steg1/steg1.php',	0),
(6,	3,	'Computer Hardware',	'<p>Learn about the basic components of a computer and their functions.</p>\r\n<p>By: Oskar Wirga</p>',	'/hardware/computerhw/computerhw.php',	0),
(7,	5,	'Binary 1: Overflow 1',	'<p>Get an introduction to assembly, registers, stacks, and vulnerable C functions. Learn how to perform a basic buffer overflow attack on a Linux binary.</p>\r\n<p>By: Lujing Cen</p>',	'/other/overflow1/overflow1.php',	0),
(8,	4,	'Linux 101',	'<p>An introduction to the different distributions of Linux.</p>\r\n<p>By: Oskar Wirga</p>',	'/software/linux/linux101.php',	0),
(9,	4,	'Web Browsers',	'<p>Learn about the powerful tools that browsers have to analyze web pages.<p>\r\n<p>By: Lujing Cen</p>',	'/software/browser/browser.php',	0),
(10,	0,	'Introduction to Learn',	'<p>Get an overview of the features and functionality of Learn.</p>\r\n<p>By: CAMS CSC</p>',	'/home/intro/home.php',	0),
(11,	1,	'Cookies',	'<p>Learn about how the web can be delicious too.</p>\r\n<p>By: Lujing Cen</p>',	'/web/cookies/cookies.php',	1),
(12,	4,	'Installing and Using Python',	'<p>Learn how to get started with Python on Windows and Linux.</p>\r\n<p>By: Lujing Cen</p>',	'/software/python/python.php',	0),
(13,	0,	'Calendar',	'<p>View our Google Calendar to find out about lesson plans and events!</p>\r\n<p>By: CAMS CSC</p>',	'/home/calendar/cal.php',	0),
(14,	5,	'Binary 1: Overflow 2',	'<p>Learn more about overflows and uncover the surface of return oriented programming. Discover the power of buffer overflow attacks and shellcodes through careful analysis using GDB.</p>\r\n<p>By: Lujing Cen</p>',	'/other/overflow2/overflow2.php',	0),
(15,	2,	'File Structure',	'<p>Learn about file headers and footers as well as how to analyze flies using binary signature analysis.</p>\r\n<p>By: Lujing Cen</p>',	'/forensics/headfoot/headfoot.php',	0),
(16,	0,	'Club Constitution',	'<p>View the club constitution.</p>\r\n<p>By: CAMS CSC</p>',	'/home/constitution/constitution.php',	0),
(17,	4,	'Image Editing 1',	'<p>An introduction to the different image editors and file types.</p>\r\n<p>By: Oskar Wirga</p>',	'/software/gimp/imageediting1.php',	0),
(18,	2,	'Exploring Linux Virtual Machine Files',	'<p>A lesson completely unrelated to CSAW.</p>\r\n<p>By: Lujing Cen</p>',	'/forensics/mount/mount.php',	0),
(19,	0,	'CSAW HSF',	'<p>Learn more about CSAW HSF, the competition that CAMS CSC will participate in yearly. Past reports are available for download here.</p>\r\n<p>By: CAMS CSC</p>',	'/home/hsf/hsf.php',	0),
(20,	2,	'File Carving 1',	'<p>Learn about the basics of file carving and how to use file carving tools.</p>\r\n<p>By: Lujing Cen</p>',	'/forensics/carve/carve.php',	0),
(21,	4,	'Image Editing 2',	'<p>Learn the basics of GIMP in this lesson.</p>\r\n<p>By: Oskar Wirga</p>',	'/software/gimp/imageediting2.php',	0),
(22,	0,	'CTF Write-ups',	'<p>View all CTF Write-ups by CAMS CSC club members.</p>\r\n<p>By: CAMS CSC</p>',	'/home/writeup/writeup.php',	0),
(23,	2,	'File System 1',	'<p>Learn about NTFS and ext file systems as well as ADS and file recovery on the aforementioned file systems.</p>\r\n<p>By: Lujing Cen</p>',	'/forensics/disk1/disk1.php',	0);

-- 2015-01-07 04:27:42
