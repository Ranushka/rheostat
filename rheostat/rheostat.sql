-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 10, 2013 at 11:27 PM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `rheostat`
--

-- --------------------------------------------------------

--
-- Table structure for table `cp_customer`
--

CREATE TABLE IF NOT EXISTS `cp_customer` (
  `Customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `Title` varchar(10) DEFAULT NULL,
  `First_name` varchar(20) DEFAULT NULL,
  `Last_name` varchar(20) DEFAULT NULL,
  `NIC_no` varchar(10) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `Address1` varchar(100) DEFAULT NULL,
  `Address2` varchar(100) DEFAULT 'None',
  `Contact_no1` int(20) DEFAULT NULL,
  `Contact_no2` int(20) DEFAULT NULL,
  `Contact_no3` varchar(20) DEFAULT 'None',
  `Email` varchar(20) DEFAULT NULL,
  `User_name` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `User_type` varchar(50) NOT NULL DEFAULT 'Members',
  `Date_of_register` date NOT NULL,
  `User_profile_image` varchar(100) DEFAULT 'openlib_defaultUser.gif 	',
  `Image_path` varchar(100) NOT NULL DEFAULT './uploads/ProfileImage/',
  `Customer_status` varchar(20) DEFAULT 'active',
  PRIMARY KEY (`Customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cp_customer`
--

INSERT INTO `cp_customer` (`Customer_id`, `Title`, `First_name`, `Last_name`, `NIC_no`, `Gender`, `Address1`, `Address2`, `Contact_no1`, `Contact_no2`, `Contact_no3`, `Email`, `User_name`, `Password`, `User_type`, `Date_of_register`, `User_profile_image`, `Image_path`, `Customer_status`) VALUES
(4, 'Mr', 'Anoj', 'Saranga', '893182500V', 'Male', 'Ragama', '', 779103035, 727817707, '0', 'webkit.anoj@gmail.co', NULL, NULL, 'Members', '2013-07-04', 'openlib_defaultUser.gif 	', './uploads/ProfileImage/', 'active'),
(5, 'Miss', 'Dinelka', 'Nayanie', '885421822V', 'Female ', 'Horana, Handapangoda', '', 779103035, 727817707, '0', 'anoj@openarc.lk', NULL, NULL, 'Members', '2013-07-04', 'openlib_defaultUser.gif 	', './uploads/ProfileImage/', 'active'),
(6, 'Mr', 'Ranushka', 'Goonasekara', '916235800V', 'Male', 'Piliyandala', '', 779856482, 727875757, '', 'ranushka@openarc.lk', NULL, NULL, 'Members', '2013-07-04', 'openlib_defaultUser.gif 	', './uploads/ProfileImage/', 'active'),
(7, 'Mrs', 'Namali', 'Abyerathna', '758463500V', 'Female ', 'Athurugiriya', '', 775648265, 2147483647, '', 'nnn@gmail.com', NULL, NULL, 'Members', '2012-07-04', 'openlib_defaultUser.gif 	', './uploads/ProfileImage/', 'active'),
(8, 'Mr', 'Suren ', 'Shanaka', '895486500V', 'Male', 'Matara', '', 789526563, 727817761, '', 'surenshanaka@gmail.c', NULL, NULL, 'Members', '0000-00-00', 'openlib_defaultUser.gif 	', './uploads/ProfileImage/', 'active'),
(9, 'Mr', 'Waruna', 'Lakmal', '123456789V', 'Male', 'Test', '', 776740237, 776548523, '', 'www@gmail.com', NULL, NULL, 'Members', '0000-00-00', 'openlib_defaultUser.gif 	', './uploads/ProfileImage/', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `cp_dessert`
--

CREATE TABLE IF NOT EXISTS `cp_dessert` (
  `Dessert_id` int(11) NOT NULL AUTO_INCREMENT,
  `Dessert_name` varchar(50) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Dessert_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cp_dessert`
--

INSERT INTO `cp_dessert` (`Dessert_id`, `Dessert_name`, `Description`) VALUES
(1, 'Ice-Cream', NULL),
(2, 'Watalappan', NULL),
(3, 'Jelly', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cp_employee`
--

CREATE TABLE IF NOT EXISTS `cp_employee` (
  `Employee_id` int(100) NOT NULL AUTO_INCREMENT,
  `Employee_name` varchar(255) NOT NULL,
  `Employee_NIC` varchar(10) NOT NULL,
  `Employee_address` varchar(255) NOT NULL,
  `Contact_No` int(10) NOT NULL,
  PRIMARY KEY (`Employee_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cp_employee`
--


-- --------------------------------------------------------

--
-- Table structure for table `cp_events`
--

CREATE TABLE IF NOT EXISTS `cp_events` (
  `Event_id` int(255) NOT NULL AUTO_INCREMENT,
  `Event_title` varchar(30) DEFAULT NULL,
  `Event_date` date DEFAULT NULL,
  `Event_crowd` int(255) DEFAULT NULL,
  `Event_description` varchar(255) DEFAULT NULL,
  `No_of_employees` int(50) DEFAULT NULL,
  `Event_comments` varchar(255) DEFAULT NULL,
  `Event_type` varchar(50) DEFAULT NULL,
  `Event_lightnint` int(10) DEFAULT NULL,
  `Light_arrangement` varchar(10) DEFAULT NULL,
  `Light_description` varchar(255) DEFAULT NULL,
  `Liquor` varchar(10) DEFAULT NULL,
  `Liquor_description` varchar(255) DEFAULT NULL,
  `Menu_id` int(10) DEFAULT NULL,
  `Menu_comments` varchar(255) DEFAULT NULL,
  `Hall_id` int(10) DEFAULT NULL,
  `Hall_arrangements` varchar(20) DEFAULT NULL,
  `Arrangement_type` varchar(20) DEFAULT NULL,
  `Arrangement_description` varchar(255) DEFAULT NULL,
  `Hall_ac` varchar(50) DEFAULT NULL,
  `Special_comments` varchar(255) DEFAULT NULL,
  `Band` varchar(20) DEFAULT NULL,
  `Band_type` varchar(50) DEFAULT NULL,
  `Event_status` varchar(50) DEFAULT NULL,
  `Customer_id` int(10) NOT NULL,
  `Employee_id` int(100) NOT NULL,
  `Date_create` date DEFAULT NULL,
  PRIMARY KEY (`Event_id`),
  KEY `cp_events_ibfk_1` (`Menu_id`),
  KEY `cp_events_ibfk_2` (`Hall_id`),
  KEY `cp_events_ibfk_3` (`Customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cp_events`
--

INSERT INTO `cp_events` (`Event_id`, `Event_title`, `Event_date`, `Event_crowd`, `Event_description`, `No_of_employees`, `Event_comments`, `Event_type`, `Event_lightnint`, `Light_arrangement`, `Light_description`, `Liquor`, `Liquor_description`, `Menu_id`, `Menu_comments`, `Hall_id`, `Hall_arrangements`, `Arrangement_type`, `Arrangement_description`, `Hall_ac`, `Special_comments`, `Band`, `Band_type`, `Event_status`, `Customer_id`, `Employee_id`, `Date_create`) VALUES
(1, 'Wedding', '2013-07-30', 100, 'Test description', 5, '', 'Day', 0, '', '', 'No', '', 1, '', 1, 'Yes', 'Default', '', 'Yes', '', 'Yes', 'One Man', 'Temporary', 5, 0, '2013-07-06'),
(2, 'Birth Day Party', '2013-07-06', 50, 'new test not working', 5, '', 'Night', 0, 'Default', '', 'Yes', 'Provide bites and beer mugs.', 1, '', 1, 'No', '', '', 'Yes', '', 'Yes', 'One Man', 'Temporary', 5, 0, '2013-07-06'),
(3, 'Home Comming', '2013-08-26', 200, 'Hello world', 4, '', 'Night', 0, 'Default', '', 'Yes', 'Bite and mugs', 2, '', 1, 'Yes', 'Default', '', 'Yes', '', 'Yes', 'Dj', 'Temporary', 8, 0, '2013-07-06'),
(5, 'Home Comming', '2013-07-06', 0, '', 0, '', 'Day', 0, '', '', 'No', '', 1, '', 1, '', '', '', '', '', '', '', 'Temporary', 5, 0, NULL),
(6, 'Wedding', '2013-07-30', 0, '', 0, '', 'Day', 0, '', '', 'No', '', 2, '', 1, '', '', '', '', '', '', '', 'Temporary', 4, 0, NULL),
(7, 'Birth Day Party', '2013-07-30', 0, '', 0, '', 'Night', 0, 'Default', '', 'No', '', 2, '', 1, '', '', '', '', '', '', '', 'Temporary', 4, 0, NULL),
(8, 'Home Comming', '2013-07-31', 0, '', 0, '', 'Day', 0, '', '', 'No', '', 2, '', 1, '', '', '', '', '', '', '', 'Temporary', 6, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cp_foods`
--

CREATE TABLE IF NOT EXISTS `cp_foods` (
  `food_id` int(10) NOT NULL AUTO_INCREMENT,
  `Food_name` varchar(20) DEFAULT NULL,
  `Description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cp_foods`
--

INSERT INTO `cp_foods` (`food_id`, `Food_name`, `Description`) VALUES
(1, 'Fried rice', NULL),
(2, 'Dhal', NULL),
(3, 'Devil Chicken', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cp_hall`
--

CREATE TABLE IF NOT EXISTS `cp_hall` (
  `Hall_id` int(10) NOT NULL AUTO_INCREMENT,
  `Hall_name` varchar(100) DEFAULT NULL,
  `Hall_capacity` int(100) DEFAULT NULL,
  `Hall_aircondition` varchar(10) DEFAULT NULL,
  `Hall_status` varchar(10) DEFAULT NULL,
  `Hall_arrangements` varchar(100) DEFAULT NULL,
  `Description` varchar(10) DEFAULT NULL,
  `Date_create` date DEFAULT NULL,
  PRIMARY KEY (`Hall_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cp_hall`
--

INSERT INTO `cp_hall` (`Hall_id`, `Hall_name`, `Hall_capacity`, `Hall_aircondition`, `Hall_status`, `Hall_arrangements`, `Description`, `Date_create`) VALUES
(1, 'CP Upper Hall', 350, 'Yes', 'Available', 'Yes', NULL, '2013-07-08'),
(2, 'CP Down Hall', 300, 'Yes', 'Available', 'Yes', NULL, '2013-07-07'),
(3, 'CP Hall', 250, 'Not Availa', 'Available', 'Not Available', 'Older Hall', '2013-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `cp_menu`
--

CREATE TABLE IF NOT EXISTS `cp_menu` (
  `Menu_id` int(10) NOT NULL AUTO_INCREMENT,
  `Menu_name` varchar(10) DEFAULT NULL,
  `Food_id` int(10) DEFAULT NULL,
  `Menu_price` varchar(100) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Dessert_id` int(11) DEFAULT NULL,
  `Menu_items` varchar(255) DEFAULT NULL,
  `Date_create` date DEFAULT NULL,
  PRIMARY KEY (`Menu_id`),
  KEY `food_id` (`Description`),
  KEY `cp_menu_ibfk_1` (`Food_id`),
  KEY `cp_menu_ibfk_2` (`Dessert_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cp_menu`
--

INSERT INTO `cp_menu` (`Menu_id`, `Menu_name`, `Food_id`, `Menu_price`, `Description`, `Dessert_id`, `Menu_items`, `Date_create`) VALUES
(1, 'Menu01', 1, '750', NULL, 1, NULL, '2013-07-07'),
(2, 'Menu02', 2, '800', NULL, 2, NULL, '2013-07-05'),
(3, 'Menu03', NULL, '1000', '', NULL, 'test menu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cp_payments`
--

CREATE TABLE IF NOT EXISTS `cp_payments` (
  `Payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `Total_amount` int(100) DEFAULT NULL,
  `Amount_paid` int(100) DEFAULT NULL,
  `Date_paid` date DEFAULT NULL,
  `Due_amound` int(100) DEFAULT NULL,
  `Due_date` date DEFAULT NULL,
  `Customer_id` int(10) NOT NULL,
  `Advance_amount` int(255) NOT NULL DEFAULT '10000',
  `Due_advance_amount` int(255) DEFAULT NULL,
  `Event_id` int(255) NOT NULL,
  `For_ac` int(255) DEFAULT NULL,
  `Numberof_lights` int(255) DEFAULT NULL,
  `For_lights` int(255) DEFAULT NULL,
  `Other_description` varchar(255) DEFAULT NULL,
  `Other_amount` int(255) NOT NULL,
  `Payment_status` varchar(100) NOT NULL,
  PRIMARY KEY (`Payment_id`),
  KEY `cp_payments_ibfk_1` (`Customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `cp_payments`
--

INSERT INTO `cp_payments` (`Payment_id`, `Total_amount`, `Amount_paid`, `Date_paid`, `Due_amound`, `Due_date`, `Customer_id`, `Advance_amount`, `Due_advance_amount`, `Event_id`, `For_ac`, `Numberof_lights`, `For_lights`, `Other_description`, `Other_amount`, `Payment_status`) VALUES
(2, 90600, 0, '2013-07-08', 80600, '0000-00-00', 5, 10000, 0, 0, 0, 0, 0, 'test', 0, ''),
(3, 175600, NULL, '2013-07-08', 165600, NULL, 8, 10000, NULL, 3, NULL, NULL, NULL, NULL, 0, ''),
(4, 62500, 10000, '2013-07-08', 52500, '2013-06-29', 5, 10000, 0, 2, 12500, 10, 12, '', 0, 'Active'),
(5, 62500, 10000, '2013-07-08', 52500, '2013-06-29', 5, 10000, 0, 2, 12500, 10, 12, '', 0, 'Active'),
(6, 37500, 10000, '2013-07-08', 27500, '2013-06-29', 5, 10000, 0, 2, 20000, 0, 0, '', 0, 'Active'),
(7, 85000, 10000, '2013-07-08', 75000, '2013-06-29', 5, 10000, 0, 2, 15000, 10000, 12500, '', 30000, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE IF NOT EXISTS `privileges` (
  `Privilege_id` int(20) NOT NULL AUTO_INCREMENT,
  `Privilege_name` varchar(255) NOT NULL,
  `Privilege_description` varchar(255) NOT NULL,
  PRIMARY KEY (`Privilege_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`Privilege_id`, `Privilege_name`, `Privilege_description`) VALUES
(1, 'Add account', 'Create a new account for a  user.'),
(2, 'Remove account', 'Deactivate a user account of the library system.'),
(3, 'Update account', 'Update the details of existing user account.'),
(5, 'Borrowing materials', 'This is allows to borrow the library materials.'),
(6, 'Calculate fine', 'This allows to calculate the fine for delayed returns.'),
(7, 'Add book category', 'This allows to add new book category to the system.'),
(8, 'Remove book category', 'This allows to remove a book category from the system.'),
(9, 'Update book category', 'This allows to update a book category of the system.'),
(10, 'Add membership type', 'This allow to add new membership type to the system.'),
(11, 'Remove membership type.', 'This allows to remove a membership type of the system.'),
(12, 'Update membership type.', 'This allows to update a membership type of the system.'),
(13, 'Add new role', 'This allows to add new role to the system.'),
(14, 'Remove role', 'This allows to remove a role from the system.'),
(15, 'Update role', 'This allows to update a role of the system.'),
(16, 'Add content', 'This allow to add new content to the system.'),
(17, 'Remove content', 'This allows to remove a content of the system.'),
(18, 'Set privileges.', 'This allow to set privileges to other roles.'),
(19, 'Remove privileges', 'This allows to remove privileges of the roles.'),
(20, 'Update privileges.', 'This allows to update privileges of the roles.'),
(21, 'Add fine type', 'This allows to add new fine types to the system.'),
(22, 'Remove fine type', 'This allows to remove a fine type of the system.'),
(23, 'Update fine type', 'This allows to update a fine type of the system.'),
(24, 'Search contents', 'This allows to search available contents of the library.'),
(25, 'Reserve contents', 'This allows to reserve contents of the library.'),
(26, 'Generate reporst', 'This allows to generate reports.'),
(27, 'View reports', 'This allows to view reports of the system.'),
(28, 'Approve reservation.', 'This allows to approve the content reservations of members.'),
(29, 'Search econtente', 'This allows to search available econtents fo the library.'),
(30, 'Download econtents', 'This allows to download econtent of the library.'),
(31, 'Read e books online.', 'This allows to read e books online.'),
(32, 'Order content', 'This allows to order library contents.');

-- --------------------------------------------------------

--
-- Table structure for table `privilegetype`
--

CREATE TABLE IF NOT EXISTS `privilegetype` (
  `PrivilegeType_id` int(20) NOT NULL AUTO_INCREMENT,
  `PrivilegeType_name` varchar(100) NOT NULL,
  `PrivilegeType_description` varchar(255) NOT NULL,
  `Privileges` mediumtext NOT NULL,
  `Privilege_id` int(20) NOT NULL,
  PRIMARY KEY (`PrivilegeType_id`),
  KEY `privilegetype_ibfk_1` (`Privilege_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `privilegetype`
--

INSERT INTO `privilegetype` (`PrivilegeType_id`, `PrivilegeType_name`, `PrivilegeType_description`, `Privileges`, `Privilege_id`) VALUES
(51, 'Full Access', 'This privilege type contain all the privileges that user can do with the library system.', 'Create a new account for a  user, Deactivate a user account of the library system, Update the details of existing user account, This is allows to borrow the library materials, This allows to calculate the fine for delayed returns, This allows to add new book category to the system, This allows to remove a book category from the system, This allows to update a book category of the system, This allow to add new membership type to the system, This allows to remove a membership type of the system, This allows to update a membership type of the system.', 0),
(52, 'Basic Access', 'Individuals or organizations that have borrowing privileges have a BASIC access to library services', 'This is allows to borrow the library materials, This allows to search available contents of the library., This allows to reserve contents of the library, This allows to search available econtents fo the library, This allows to download econtent of the library, This allows to read e books online.', 0),
(53, 'Cascadia Access', 'Current Cascadia faculty and staff have CASCADIA level access to library services.', 'Create a new account for a  user, Deactivate a user account of the library system, This allows to calculate the fine for delayed returns, This allows to add new book category to the system, This allows to remove a book category from the system, This allows to update a book category of the system, This allow to add new content to the system, This allows to remove a content of the system, This allows to search available contents of the library, This allows to reserve contents of the library, This allows to approve the content reservations of members, This allows to search available econtents fo the library, This allows to download econtent of the library.', 0),
(54, 'Visitor Access', 'All visitors to the library system can have the set of privileges.', 'This allows to search available contents of the library, This allows to search available econtents fo the library, This allows to read e books online.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `Reserve_id` int(11) NOT NULL AUTO_INCREMENT,
  `Reserved_date` date NOT NULL,
  `Reserved_period` varchar(20) NOT NULL,
  `Customer_id` int(10) NOT NULL,
  `Reserve_status` varchar(50) NOT NULL,
  PRIMARY KEY (`Reserve_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `reservation`
--


-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `Role_id` int(10) NOT NULL AUTO_INCREMENT,
  `Role_name` varchar(50) NOT NULL,
  `Role_description` varchar(255) NOT NULL,
  `Comments` varchar(255) NOT NULL,
  `PrivilegeType_id` int(20) NOT NULL,
  PRIMARY KEY (`Role_id`),
  KEY `role_ibfk_1` (`PrivilegeType_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Role_id`, `Role_name`, `Role_description`, `Comments`, `PrivilegeType_id`) VALUES
(1, 'Administrator', 'Administrators perform a multifunctional job. Their jobs entail managing, coordinating with managerial staff', '', 51),
(2, 'Librarian', 'Perform all the library related works in the system.', '', 53),
(3, 'Visitor', 'Outside peoples who are interesting about the library.', '', 54),
(4, 'Members', 'Members of the library system including the OSM staff members and the OSBT students.', '', 52);

-- --------------------------------------------------------

--
-- Table structure for table `systemsettings`
--

CREATE TABLE IF NOT EXISTS `systemsettings` (
  `System_Settings_id` int(255) NOT NULL AUTO_INCREMENT,
  `Reservation_active_period` varchar(255) NOT NULL,
  `Lending_period` varchar(255) NOT NULL,
  PRIMARY KEY (`System_Settings_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `systemsettings`
--

INSERT INTO `systemsettings` (`System_Settings_id`, `Reservation_active_period`, `Lending_period`) VALUES
(2, '', '4');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE IF NOT EXISTS `userrole` (
  `Userrole_id` int(20) NOT NULL AUTO_INCREMENT,
  `Role_id` int(10) NOT NULL,
  `User_name` varchar(100) NOT NULL,
  PRIMARY KEY (`Userrole_id`),
  KEY `userrole_ibfk_1` (`Role_id`),
  KEY `userrole_ibfk_2` (`User_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `userrole`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Title` varchar(10) DEFAULT NULL,
  `User_profile_image` varchar(200) DEFAULT 'openlib_defaultUser.gif',
  `First_name` char(50) DEFAULT NULL,
  `Last_name` char(50) DEFAULT NULL,
  `User_name` varchar(100) NOT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `NIC_No` varchar(10) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Date_of_birth` date DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Contact_No` int(20) DEFAULT NULL,
  `Date_of_register` date DEFAULT NULL,
  `User_status` varchar(11) DEFAULT 'Active',
  `User_type` varchar(100) DEFAULT 'Members',
  `Image_path` varchar(100) DEFAULT './uploads/ProfileImage/',
  PRIMARY KEY (`User_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Title`, `User_profile_image`, `First_name`, `Last_name`, `User_name`, `Password`, `NIC_No`, `Address`, `Gender`, `Date_of_birth`, `Email`, `Contact_No`, `Date_of_register`, `User_status`, `User_type`, `Image_path`) VALUES
('null', 'openlib_defaultUser.gif', 'Administrator', '', 'admin', 'admin123', 'null', '', NULL, '2013-07-03', 'webkit.anoj@gmail.com', 727817707, '2013-07-03', 'Active', 'Administrator', './uploads/ProfileImage/'),
('Mr', 'openlib_defaultUser.gif', 'Anoj', 'Saranga', 'anoj', 'p56ykbha', '893182500V', '', 'Male', '0000-00-00', 'anoj@openarc.lk', 779103035, '2013-07-04', 'Active', 'NULL', './uploads/ProfileImage/'),
('Mr', 'openlib_defaultUser.gif', 'Chirantha', 'Sirikumara', 'chirantha', 'zghyp9', '', '', 'Male', '0000-00-00', 'anoj@openarc.lk', 779103035, '2013-07-04', 'Active', 'Manager', './uploads/ProfileImage/'),
('Mr', 'openlib_defaultUser.gif', 'Sachintha', 'Sirikumara', 'sachintha', 'eurs4q2s', '', '', 'Male', '0000-00-00', 'anoj@openarc.lk', 779103035, '2013-07-04', 'Active', 'Manager', './uploads/ProfileImage/'),
('Mr', 'openlib_defaultUser.gif', 'saminda', 'rukmal', 'saminda', '16siq6s', '', '', 'Male', '0000-00-00', 'anojsarangachandraratne@gmail.com', 779103035, '2013-07-04', 'Active', 'Manager', './uploads/ProfileImage/'),
('Miss', 'openlib_defaultUser.gif', 'Senali', 'jayarathna', 'senali', '0debwj8v', '893182500V', 'Nugegoda', 'Female ', '2013-07-15', 'senalijayarathna@gmail.com', 777464768, '2013-07-07', 'Active', 'Manager', './uploads/ProfileImage/'),
('Mr', 'openlib_defaultUser.gif', 'Sunil', 'Amarasinghe', 'sunil', '9ose9h', '', '', 'Male', '0000-00-00', 'anoj@openarc.lk', 779103035, '2013-07-04', 'Active', 'Manager', './uploads/ProfileImage/');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cp_events`
--
ALTER TABLE `cp_events`
  ADD CONSTRAINT `cp_events_ibfk_1` FOREIGN KEY (`Menu_id`) REFERENCES `cp_menu` (`Menu_id`),
  ADD CONSTRAINT `cp_events_ibfk_2` FOREIGN KEY (`Hall_id`) REFERENCES `cp_hall` (`Hall_id`),
  ADD CONSTRAINT `cp_events_ibfk_3` FOREIGN KEY (`Customer_id`) REFERENCES `cp_customer` (`Customer_id`);

--
-- Constraints for table `cp_menu`
--
ALTER TABLE `cp_menu`
  ADD CONSTRAINT `cp_menu_ibfk_1` FOREIGN KEY (`Food_id`) REFERENCES `cp_foods` (`food_id`),
  ADD CONSTRAINT `cp_menu_ibfk_2` FOREIGN KEY (`Dessert_id`) REFERENCES `cp_dessert` (`Dessert_id`);

--
-- Constraints for table `cp_payments`
--
ALTER TABLE `cp_payments`
  ADD CONSTRAINT `cp_payments_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `cp_customer` (`Customer_id`);

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`PrivilegeType_id`) REFERENCES `privilegetype` (`PrivilegeType_id`);

--
-- Constraints for table `userrole`
--
ALTER TABLE `userrole`
  ADD CONSTRAINT `userrole_ibfk_1` FOREIGN KEY (`Role_id`) REFERENCES `role` (`Role_id`),
  ADD CONSTRAINT `userrole_ibfk_2` FOREIGN KEY (`User_name`) REFERENCES `users` (`User_name`);
