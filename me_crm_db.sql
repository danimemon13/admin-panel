#
# TABLE STRUCTURE FOR: me_brands
#

DROP TABLE IF EXISTS `me_brands`;

CREATE TABLE `me_brands` (
  `BrandsID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyID` int(11) NOT NULL,
  `TeamID` int(11) NOT NULL,
  `RegionID` int(11) NOT NULL,
  `MarketingID` int(11) NOT NULL,
  `BrandsName` varchar(225) NOT NULL,
  `BrandsLogo` varchar(225) NOT NULL,
  `BrandsStatus` int(11) NOT NULL DEFAULT 1,
  `Brandscreated` date DEFAULT current_timestamp(),
  PRIMARY KEY (`BrandsID`),
  KEY `TeamID` (`TeamID`),
  KEY `CompanyID` (`CompanyID`),
  KEY `RegionID` (`RegionID`),
  KEY `MarketingID` (`MarketingID`),
  CONSTRAINT `me_brands_ibfk_1` FOREIGN KEY (`TeamID`) REFERENCES `me_team` (`TeamID`),
  CONSTRAINT `me_brands_ibfk_2` FOREIGN KEY (`CompanyID`) REFERENCES `me_company` (`CompanyID`),
  CONSTRAINT `me_brands_ibfk_3` FOREIGN KEY (`RegionID`) REFERENCES `me_region` (`RegionID`),
  CONSTRAINT `me_brands_ibfk_4` FOREIGN KEY (`MarketingID`) REFERENCES `me_marketing_reference` (`MarketingID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: me_company
#

DROP TABLE IF EXISTS `me_company`;

CREATE TABLE `me_company` (
  `CompanyID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyName` varchar(255) NOT NULL,
  `CompanyLogo` varchar(255) DEFAULT NULL,
  `CompanyAddress` varchar(255) DEFAULT NULL,
  `CompanyStatus` int(11) NOT NULL DEFAULT 1,
  `CompanyCreated` date DEFAULT current_timestamp(),
  PRIMARY KEY (`CompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO `me_company` (`CompanyID`, `CompanyName`, `CompanyLogo`, `CompanyAddress`, `CompanyStatus`, `CompanyCreated`) VALUES (1, 'ABC', 'ABC', 'ABC', 1, '2022-04-07');


#
# TABLE STRUCTURE FOR: me_currency
#

DROP TABLE IF EXISTS `me_currency`;

CREATE TABLE `me_currency` (
  `CurrencyID` int(11) NOT NULL AUTO_INCREMENT,
  `CurrencyName` varchar(255) NOT NULL,
  `CurrencySign` varchar(255) NOT NULL,
  `CurrencyShortCode` varchar(255) NOT NULL,
  `CurrencyStatus` int(11) NOT NULL DEFAULT 1,
  `Currencycreated` date DEFAULT current_timestamp(),
  PRIMARY KEY (`CurrencyID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO `me_currency` (`CurrencyID`, `CurrencyName`, `CurrencySign`, `CurrencyShortCode`, `CurrencyStatus`, `Currencycreated`) VALUES (1, 'Dollar', '$', 'USD', 1, '2022-04-05');
INSERT INTO `me_currency` (`CurrencyID`, `CurrencyName`, `CurrencySign`, `CurrencyShortCode`, `CurrencyStatus`, `Currencycreated`) VALUES (2, 'Pound', '£', 'GBP', 1, '2022-04-05');
INSERT INTO `me_currency` (`CurrencyID`, `CurrencyName`, `CurrencySign`, `CurrencyShortCode`, `CurrencyStatus`, `Currencycreated`) VALUES (3, 'Canadian Dollar', 'CAD', 'CAD', 1, '2022-04-05');


#
# TABLE STRUCTURE FOR: me_customers
#

DROP TABLE IF EXISTS `me_customers`;

CREATE TABLE `me_customers` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(255) NOT NULL,
  `CustomerEmail` varchar(255) NOT NULL,
  `CustomerNumber` varchar(255) NOT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: me_department
#

DROP TABLE IF EXISTS `me_department`;

CREATE TABLE `me_department` (
  `DeparmentID` int(11) NOT NULL AUTO_INCREMENT,
  `DepartmentName` varchar(255) NOT NULL,
  `DeparmentStatus` int(11) NOT NULL DEFAULT 1,
  `DeparmentCreated` date DEFAULT current_timestamp(),
  PRIMARY KEY (`DeparmentID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO `me_department` (`DeparmentID`, `DepartmentName`, `DeparmentStatus`, `DeparmentCreated`) VALUES (1, 'Management', 1, '2022-04-05');
INSERT INTO `me_department` (`DeparmentID`, `DepartmentName`, `DeparmentStatus`, `DeparmentCreated`) VALUES (2, 'Human Resource', 1, '2022-04-05');
INSERT INTO `me_department` (`DeparmentID`, `DepartmentName`, `DeparmentStatus`, `DeparmentCreated`) VALUES (3, 'Operation', 1, '2022-04-05');
INSERT INTO `me_department` (`DeparmentID`, `DepartmentName`, `DeparmentStatus`, `DeparmentCreated`) VALUES (4, 'Finance', 1, '2022-04-05');
INSERT INTO `me_department` (`DeparmentID`, `DepartmentName`, `DeparmentStatus`, `DeparmentCreated`) VALUES (5, 'QA', 1, '2022-04-05');
INSERT INTO `me_department` (`DeparmentID`, `DepartmentName`, `DeparmentStatus`, `DeparmentCreated`) VALUES (6, 'Marketing', 1, '2022-04-05');
INSERT INTO `me_department` (`DeparmentID`, `DepartmentName`, `DeparmentStatus`, `DeparmentCreated`) VALUES (7, 'Sales', 1, '2022-04-05');
INSERT INTO `me_department` (`DeparmentID`, `DepartmentName`, `DeparmentStatus`, `DeparmentCreated`) VALUES (8, 'Support', 1, '2022-04-05');
INSERT INTO `me_department` (`DeparmentID`, `DepartmentName`, `DeparmentStatus`, `DeparmentCreated`) VALUES (9, 'Production', 1, '2022-04-05');


#
# TABLE STRUCTURE FOR: me_ip_address
#

DROP TABLE IF EXISTS `me_ip_address`;

CREATE TABLE `me_ip_address` (
  `IPID` int(11) NOT NULL AUTO_INCREMENT,
  `IPAddress` varchar(255) NOT NULL,
  `IPStatus` int(11) NOT NULL DEFAULT 1,
  `IPcreated` date DEFAULT current_timestamp(),
  PRIMARY KEY (`IPID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# TABLE STRUCTURE FOR: me_marketing_reference
#

DROP TABLE IF EXISTS `me_marketing_reference`;

CREATE TABLE `me_marketing_reference` (
  `MarketingID` int(11) NOT NULL AUTO_INCREMENT,
  `MarketingName` varchar(255) NOT NULL,
  `MarketingStatus` int(11) NOT NULL DEFAULT 1,
  `Marketingcreated` date DEFAULT current_timestamp(),
  PRIMARY KEY (`MarketingID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# TABLE STRUCTURE FOR: me_menu
#

DROP TABLE IF EXISTS `me_menu`;

CREATE TABLE `me_menu` (
  `MenuID` int(11) NOT NULL AUTO_INCREMENT,
  `MenuName` varchar(25) NOT NULL,
  `MenuLink` varchar(25) NOT NULL,
  `MenuIcon` varchar(25) NOT NULL,
  `MenuParent` int(11) NOT NULL,
  `MenuChild` int(11) NOT NULL,
  `add_access` int(11) NOT NULL,
  `edit_access` int(11) NOT NULL,
  `delete_access` int(11) NOT NULL,
  `view_access` int(11) NOT NULL,
  PRIMARY KEY (`MenuID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# TABLE STRUCTURE FOR: me_menu_access
#

DROP TABLE IF EXISTS `me_menu_access`;

CREATE TABLE `me_menu_access` (
  `AccessID` int(11) NOT NULL AUTO_INCREMENT,
  `RoleID` int(11) NOT NULL,
  `MenuID` int(11) NOT NULL,
  `add_access` int(11) NOT NULL,
  `edit_access` int(11) NOT NULL,
  `delete_access` int(11) NOT NULL,
  `view_access` int(11) NOT NULL,
  PRIMARY KEY (`AccessID`),
  KEY `RoleID` (`RoleID`),
  KEY `MenuID` (`MenuID`),
  CONSTRAINT `me_menu_access_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `me_role` (`RoleID`),
  CONSTRAINT `me_menu_access_ibfk_2` FOREIGN KEY (`MenuID`) REFERENCES `me_menu` (`MenuID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: me_payment_method
#

DROP TABLE IF EXISTS `me_payment_method`;

CREATE TABLE `me_payment_method` (
  `MethodID` int(11) NOT NULL AUTO_INCREMENT,
  `MethodName` varchar(255) NOT NULL,
  `MethodStatus` int(11) NOT NULL DEFAULT 1,
  `Methodcreated` date DEFAULT current_timestamp(),
  PRIMARY KEY (`MethodID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: me_region
#

DROP TABLE IF EXISTS `me_region`;

CREATE TABLE `me_region` (
  `RegionID` int(11) NOT NULL AUTO_INCREMENT,
  `RegionName` varchar(255) NOT NULL,
  `RegionStatus` int(11) NOT NULL DEFAULT 1,
  `Regioncreated` date DEFAULT current_timestamp(),
  PRIMARY KEY (`RegionID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO `me_region` (`RegionID`, `RegionName`, `RegionStatus`, `Regioncreated`) VALUES (1, 'US', 1, '2022-04-05');
INSERT INTO `me_region` (`RegionID`, `RegionName`, `RegionStatus`, `Regioncreated`) VALUES (2, 'UK', 1, '2022-04-05');


#
# TABLE STRUCTURE FOR: me_role
#

DROP TABLE IF EXISTS `me_role`;

CREATE TABLE `me_role` (
  `RoleID` int(11) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(255) NOT NULL,
  `RoleStatus` int(11) NOT NULL DEFAULT 1,
  `RoleCreated` date DEFAULT current_timestamp(),
  PRIMARY KEY (`RoleID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

INSERT INTO `me_role` (`RoleID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES (1, 'Admin', 1, '2022-04-07');
INSERT INTO `me_role` (`RoleID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES (2, 'Semi Admin', 1, '2022-04-07');
INSERT INTO `me_role` (`RoleID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES (3, 'CEO', 1, '2022-04-07');
INSERT INTO `me_role` (`RoleID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES (4, 'HR Manager', 1, '2022-04-07');
INSERT INTO `me_role` (`RoleID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES (5, 'HR Executive', 1, '2022-04-07');
INSERT INTO `me_role` (`RoleID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES (6, 'Developer', 1, '2022-04-07');
INSERT INTO `me_role` (`RoleID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES (7, 'Designer', 1, '2022-04-07');
INSERT INTO `me_role` (`RoleID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES (8, 'Finance Manager', 1, '2022-04-07');
INSERT INTO `me_role` (`RoleID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES (9, 'PPC Specialist', 1, '2022-04-07');
INSERT INTO `me_role` (`RoleID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES (10, 'VP', 1, '2022-04-07');
INSERT INTO `me_role` (`RoleID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES (11, 'AVP', 1, '2022-04-07');
INSERT INTO `me_role` (`RoleID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES (12, 'Business Unit Head', 1, '2022-04-07');
INSERT INTO `me_role` (`RoleID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES (13, 'Sales Manager', 1, '2022-04-07');
INSERT INTO `me_role` (`RoleID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES (14, 'Sales Executive', 1, '2022-04-07');
INSERT INTO `me_role` (`RoleID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES (15, 'Support Manager', 1, '2022-04-07');
INSERT INTO `me_role` (`RoleID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES (16, 'Support Executive', 1, '2022-04-07');
INSERT INTO `me_role` (`RoleID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES (17, 'Refund Manager', 1, '2022-04-07');
INSERT INTO `me_role` (`RoleID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES (18, 'Procuction Manager', 1, '2022-04-07');
INSERT INTO `me_role` (`RoleID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES (19, 'Procuction Executive', 1, '2022-04-07');


#
# TABLE STRUCTURE FOR: me_sales_target
#

DROP TABLE IF EXISTS `me_sales_target`;

CREATE TABLE `me_sales_target` (
  `TargetID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `TeamID` int(11) NOT NULL,
  `TargetMonth` date DEFAULT NULL,
  `TargetStatus` int(11) NOT NULL DEFAULT 1,
  `TargetCreated` date DEFAULT current_timestamp(),
  `CompanyID` int(11) NOT NULL,
  PRIMARY KEY (`TargetID`),
  KEY `UserID` (`UserID`),
  KEY `TeamID` (`TeamID`),
  KEY `CompanyID` (`CompanyID`),
  CONSTRAINT `CompanyID` FOREIGN KEY (`CompanyID`) REFERENCES `me_company` (`CompanyID`),
  CONSTRAINT `me_sales_target_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `me_users` (`UserID`),
  CONSTRAINT `me_sales_target_ibfk_2` FOREIGN KEY (`TeamID`) REFERENCES `me_team` (`TeamID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: me_shift
#

DROP TABLE IF EXISTS `me_shift`;

CREATE TABLE `me_shift` (
  `ShiftID` int(11) NOT NULL AUTO_INCREMENT,
  `ShiftName` varchar(255) NOT NULL,
  `ShiftStatus` int(11) NOT NULL DEFAULT 1,
  `ShiftCreated` date DEFAULT current_timestamp(),
  PRIMARY KEY (`ShiftID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

INSERT INTO `me_shift` (`ShiftID`, `ShiftName`, `ShiftStatus`, `ShiftCreated`) VALUES (1, '09:18', 1, '2022-04-05');
INSERT INTO `me_shift` (`ShiftID`, `ShiftName`, `ShiftStatus`, `ShiftCreated`) VALUES (2, '10:19', 1, '2022-04-05');
INSERT INTO `me_shift` (`ShiftID`, `ShiftName`, `ShiftStatus`, `ShiftCreated`) VALUES (3, '11:20', 1, '2022-04-05');
INSERT INTO `me_shift` (`ShiftID`, `ShiftName`, `ShiftStatus`, `ShiftCreated`) VALUES (4, '12:21', 1, '2022-04-05');
INSERT INTO `me_shift` (`ShiftID`, `ShiftName`, `ShiftStatus`, `ShiftCreated`) VALUES (5, '13:22', 1, '2022-04-05');
INSERT INTO `me_shift` (`ShiftID`, `ShiftName`, `ShiftStatus`, `ShiftCreated`) VALUES (6, '14:23', 1, '2022-04-05');
INSERT INTO `me_shift` (`ShiftID`, `ShiftName`, `ShiftStatus`, `ShiftCreated`) VALUES (7, '15:24', 1, '2022-04-05');
INSERT INTO `me_shift` (`ShiftID`, `ShiftName`, `ShiftStatus`, `ShiftCreated`) VALUES (8, '16:01', 1, '2022-04-05');
INSERT INTO `me_shift` (`ShiftID`, `ShiftName`, `ShiftStatus`, `ShiftCreated`) VALUES (9, '17:02', 1, '2022-04-05');
INSERT INTO `me_shift` (`ShiftID`, `ShiftName`, `ShiftStatus`, `ShiftCreated`) VALUES (10, '18:03', 1, '2022-04-05');
INSERT INTO `me_shift` (`ShiftID`, `ShiftName`, `ShiftStatus`, `ShiftCreated`) VALUES (11, '19:04', 1, '2022-04-05');
INSERT INTO `me_shift` (`ShiftID`, `ShiftName`, `ShiftStatus`, `ShiftCreated`) VALUES (12, '20:05', 1, '2022-04-05');
INSERT INTO `me_shift` (`ShiftID`, `ShiftName`, `ShiftStatus`, `ShiftCreated`) VALUES (13, '21:06', 1, '2022-04-05');
INSERT INTO `me_shift` (`ShiftID`, `ShiftName`, `ShiftStatus`, `ShiftCreated`) VALUES (14, '22:07', 1, '2022-04-05');
INSERT INTO `me_shift` (`ShiftID`, `ShiftName`, `ShiftStatus`, `ShiftCreated`) VALUES (15, '23:08', 1, '2022-04-05');
INSERT INTO `me_shift` (`ShiftID`, `ShiftName`, `ShiftStatus`, `ShiftCreated`) VALUES (16, '00:09', 1, '2022-04-05');


#
# TABLE STRUCTURE FOR: me_team
#

DROP TABLE IF EXISTS `me_team`;

CREATE TABLE `me_team` (
  `TeamID` int(11) NOT NULL AUTO_INCREMENT,
  `DeparmentID` int(11) NOT NULL,
  `CompanyID` int(11) NOT NULL,
  `TeamName` varchar(225) NOT NULL,
  PRIMARY KEY (`TeamID`),
  KEY `DeparmentID` (`DeparmentID`),
  KEY `CompanyID` (`CompanyID`),
  CONSTRAINT `me_team_ibfk_1` FOREIGN KEY (`DeparmentID`) REFERENCES `me_department` (`DeparmentID`),
  CONSTRAINT `me_team_ibfk_2` FOREIGN KEY (`CompanyID`) REFERENCES `me_company` (`CompanyID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `me_team` (`TeamID`, `DeparmentID`, `CompanyID`, `TeamName`) VALUES (2, 7, 1, 'Team A');
INSERT INTO `me_team` (`TeamID`, `DeparmentID`, `CompanyID`, `TeamName`) VALUES (3, 7, 1, 'Team B');
INSERT INTO `me_team` (`TeamID`, `DeparmentID`, `CompanyID`, `TeamName`) VALUES (4, 8, 1, 'Team A');
INSERT INTO `me_team` (`TeamID`, `DeparmentID`, `CompanyID`, `TeamName`) VALUES (5, 8, 1, 'Team B');
INSERT INTO `me_team` (`TeamID`, `DeparmentID`, `CompanyID`, `TeamName`) VALUES (6, 9, 1, 'Team A');
INSERT INTO `me_team` (`TeamID`, `DeparmentID`, `CompanyID`, `TeamName`) VALUES (7, 9, 1, 'Team B');


#
# TABLE STRUCTURE FOR: me_user_profile
#

DROP TABLE IF EXISTS `me_user_profile`;

CREATE TABLE `me_user_profile` (
  `ProfileID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `CompanyID` int(11) NOT NULL,
  `DeparmentID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `TeamID` int(11) NOT NULL,
  `ShiftID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `ProfilePicture` varchar(255) NOT NULL,
  `Age` int(11) NOT NULL,
  `MobileNumber` int(11) NOT NULL,
  `DoB` date DEFAULT NULL,
  `Address` longtext DEFAULT NULL,
  `EmailAddress` varchar(255) NOT NULL,
  `EmployeeID` varchar(255) NOT NULL,
  `JoiningDate` date DEFAULT NULL,
  `Salary` int(11) NOT NULL,
  `NicNum` int(18) NOT NULL,
  `DrivingLicenseNum` int(18) NOT NULL,
  PRIMARY KEY (`ProfileID`),
  KEY `UserID` (`UserID`),
  KEY `CompanyID` (`CompanyID`),
  KEY `DeparmentID` (`DeparmentID`),
  KEY `RoleID` (`RoleID`),
  KEY `TeamID` (`TeamID`),
  KEY `ShiftID` (`ShiftID`),
  CONSTRAINT `me_user_profile_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `me_users` (`UserID`),
  CONSTRAINT `me_user_profile_ibfk_2` FOREIGN KEY (`CompanyID`) REFERENCES `me_company` (`CompanyID`),
  CONSTRAINT `me_user_profile_ibfk_3` FOREIGN KEY (`DeparmentID`) REFERENCES `me_department` (`DeparmentID`),
  CONSTRAINT `me_user_profile_ibfk_4` FOREIGN KEY (`RoleID`) REFERENCES `me_role` (`RoleID`),
  CONSTRAINT `me_user_profile_ibfk_5` FOREIGN KEY (`TeamID`) REFERENCES `me_team` (`TeamID`),
  CONSTRAINT `me_user_profile_ibfk_6` FOREIGN KEY (`ShiftID`) REFERENCES `me_shift` (`ShiftID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: me_users
#

DROP TABLE IF EXISTS `me_users`;

CREATE TABLE `me_users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(255) NOT NULL,
  `UserPassword` varchar(255) NOT NULL,
  `MasterPassword` varchar(255) NOT NULL,
  `UserStatus` int(11) NOT NULL DEFAULT 1,
  `UserOutside` int(11) NOT NULL DEFAULT 0,
  `Usercreated` date DEFAULT current_timestamp(),
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

