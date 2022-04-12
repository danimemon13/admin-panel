-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2022 at 02:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `me_crm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `me_brands`
--

CREATE TABLE `me_brands` (
  `BrandsID` int(11) NOT NULL,
  `CompanyID` int(11) NOT NULL,
  `TeamID` int(11) NOT NULL,
  `RegionID` int(11) NOT NULL,
  `MarketingID` int(11) NOT NULL,
  `BrandsName` varchar(225) NOT NULL,
  `BrandsLogo` varchar(225) NOT NULL,
  `BrandsStatus` int(11) NOT NULL DEFAULT 1,
  `Brandscreated` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `me_company`
--

CREATE TABLE `me_company` (
  `CompanyID` int(11) NOT NULL,
  `CompanyName` varchar(255) NOT NULL,
  `CompanyLogo` varchar(255) DEFAULT NULL,
  `CompanyAddress` varchar(255) DEFAULT NULL,
  `CompanyStatus` int(11) NOT NULL DEFAULT 1,
  `CompanyCreated` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `me_company`
--

INSERT INTO `me_company` (`CompanyID`, `CompanyName`, `CompanyLogo`, `CompanyAddress`, `CompanyStatus`, `CompanyCreated`) VALUES
(1, 'ABC', 'company/abc.jpg', 'ABC', 1, '2022-04-07'),
(2, 'ABC', 'company/abc.jpg', 'ABC', 1, '2022-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `me_currency`
--

CREATE TABLE `me_currency` (
  `CurrencyID` int(11) NOT NULL,
  `CurrencyName` varchar(255) NOT NULL,
  `CurrencySign` varchar(255) NOT NULL,
  `CurrencyShortCode` varchar(255) NOT NULL,
  `CurrencyStatus` int(11) NOT NULL DEFAULT 1,
  `Currencycreated` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `me_currency`
--

INSERT INTO `me_currency` (`CurrencyID`, `CurrencyName`, `CurrencySign`, `CurrencyShortCode`, `CurrencyStatus`, `Currencycreated`) VALUES
(1, 'Dollar', '$', 'USD', 1, '2022-04-05'),
(2, 'Pound', '£', 'GBP', 1, '2022-04-05'),
(3, 'Canadian Dollar', 'CAD', 'CAD', 1, '2022-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `me_customers`
--

CREATE TABLE `me_customers` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(255) NOT NULL,
  `CustomerEmail` varchar(255) NOT NULL,
  `CustomerNumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `me_department`
--

CREATE TABLE `me_department` (
  `DeparmentID` int(11) NOT NULL,
  `DepartmentName` varchar(255) NOT NULL,
  `DeparmentStatus` int(11) NOT NULL DEFAULT 1,
  `DeparmentCreated` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `me_department`
--

INSERT INTO `me_department` (`DeparmentID`, `DepartmentName`, `DeparmentStatus`, `DeparmentCreated`) VALUES
(1, 'Management', 1, '2022-04-05'),
(2, 'Human Resource', 1, '2022-04-05'),
(3, 'Operation', 1, '2022-04-05'),
(4, 'Finance', 1, '2022-04-05'),
(5, 'QA', 1, '2022-04-05'),
(6, 'Marketing', 1, '2022-04-05'),
(7, 'Sales', 1, '2022-04-05'),
(8, 'Support', 1, '2022-04-05'),
(9, 'Production', 1, '2022-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `me_ip_address`
--

CREATE TABLE `me_ip_address` (
  `IPID` int(11) NOT NULL,
  `IPAddress` varchar(255) NOT NULL,
  `IPStatus` int(11) NOT NULL DEFAULT 1,
  `IPcreated` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `me_marketing_reference`
--

CREATE TABLE `me_marketing_reference` (
  `MarketingID` int(11) NOT NULL,
  `MarketingName` varchar(255) NOT NULL,
  `MarketingStatus` int(11) NOT NULL DEFAULT 1,
  `Marketingcreated` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `me_menu`
--

CREATE TABLE `me_menu` (
  `MenuID` int(11) NOT NULL,
  `MenuName` varchar(25) NOT NULL,
  `MenuLink` varchar(25) NOT NULL,
  `MenuIcon` varchar(25) NOT NULL,
  `MenuParent` int(11) NOT NULL,
  `MenuChild` int(11) NOT NULL,
  `add_access` int(11) NOT NULL,
  `edit_access` int(11) NOT NULL,
  `delete_access` int(11) NOT NULL,
  `view_access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `me_menu`
--

INSERT INTO `me_menu` (`MenuID`, `MenuName`, `MenuLink`, `MenuIcon`, `MenuParent`, `MenuChild`, `add_access`, `edit_access`, `delete_access`, `view_access`) VALUES
(1, 'Dashboard', 'dashboard', 'home', 0, 0, 1, 1, 1, 1),
(2, 'Customers', 'customers', ' dripicons-user-group', 0, 0, 0, 0, 0, 1),
(3, 'Show All Customers', 'customers', '', 2, 0, 0, 0, 0, 1),
(4, 'Leads', 'leads', '', 0, 0, 0, 0, 0, 1),
(5, 'Invoice', 'invoice', '', 0, 0, 0, 0, 0, 1),
(6, 'Payments', 'payments', '', 0, 0, 0, 0, 0, 1),
(7, 'Orders', 'orders', '', 0, 0, 0, 0, 0, 1),
(8, 'Reporting', 'reporting', 'far fa-file', 0, 0, 0, 0, 0, 1),
(9, 'Setting', 'setting', 'dripicons-gear', 0, 0, 0, 0, 0, 1),
(10, 'Show All Leads', '0', '0', 4, 0, 0, 0, 0, 0),
(11, 'Add New Leads', '0', '0', 4, 0, 0, 0, 0, 0),
(12, 'Show All Invoice', '0', '0', 5, 0, 0, 0, 0, 0),
(13, 'Add New Invoice', '0', '0', 5, 0, 0, 0, 0, 0),
(14, 'Show All Payments', '0', '0', 6, 0, 0, 0, 0, 0),
(15, 'Add New Payments', '0', '0', 6, 0, 0, 0, 0, 0),
(16, 'Show All Orders', '0', '0', 7, 0, 0, 0, 0, 0),
(17, 'Add New Orders', '0', '0', 7, 0, 0, 0, 0, 0),
(18, 'Company', 'company', '0', 9, 0, 0, 0, 0, 1),
(19, 'Department', 'department', '0', 9, 0, 0, 0, 0, 1),
(20, 'Role', 'role', '0', 9, 0, 0, 0, 0, 1),
(21, 'Team', 'team', '0', 9, 0, 0, 0, 0, 1),
(22, 'Permission', 'permission', '0', 9, 0, 0, 0, 0, 1),
(23, 'Users', 'users', '0', 9, 0, 0, 0, 0, 1),
(24, 'Region', 'region', '0', 9, 0, 0, 0, 0, 1),
(25, 'Marketing Reference', 'marketing-reference', '0', 9, 0, 0, 0, 0, 1),
(26, 'Brands', 'brands', '0', 9, 0, 0, 0, 0, 1),
(27, 'Currency', 'currency', '0', 9, 0, 0, 0, 0, 1),
(28, 'Shift Timings', 'shift-timing', '0', 9, 0, 0, 0, 0, 1),
(29, 'IP Address', 'IP-address', '0', 9, 0, 0, 0, 0, 1),
(30, 'Menu', 'menu', '0', 9, 0, 0, 0, 0, 1),
(31, 'Back Up', 'back-up', '0', 9, 0, 0, 0, 0, 1),
(32, 'Restore', 'restore', '0', 9, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `me_menu_access`
--

CREATE TABLE `me_menu_access` (
  `AccessID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `MenuID` int(11) NOT NULL,
  `add_access` int(11) NOT NULL,
  `edit_access` int(11) NOT NULL,
  `delete_access` int(11) NOT NULL,
  `view_access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `me_menu_access`
--

INSERT INTO `me_menu_access` (`AccessID`, `RoleID`, `MenuID`, `add_access`, `edit_access`, `delete_access`, `view_access`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1, 1),
(3, 1, 3, 1, 1, 1, 1),
(4, 1, 4, 1, 1, 1, 1),
(5, 1, 5, 1, 1, 1, 1),
(6, 1, 6, 1, 1, 1, 1),
(7, 1, 7, 1, 1, 1, 1),
(8, 1, 8, 1, 1, 1, 1),
(9, 1, 9, 1, 1, 1, 1),
(10, 1, 10, 1, 1, 1, 1),
(11, 1, 11, 1, 1, 1, 1),
(12, 1, 12, 1, 1, 1, 1),
(13, 1, 13, 1, 1, 1, 1),
(14, 1, 14, 1, 1, 1, 1),
(15, 1, 15, 1, 1, 1, 1),
(16, 1, 16, 1, 1, 1, 1),
(17, 1, 17, 1, 1, 1, 1),
(18, 1, 18, 1, 1, 1, 1),
(19, 1, 19, 1, 1, 1, 1),
(20, 1, 20, 1, 1, 1, 1),
(21, 1, 21, 1, 1, 1, 1),
(22, 1, 22, 1, 1, 1, 1),
(23, 1, 23, 1, 1, 1, 1),
(24, 1, 24, 1, 1, 1, 1),
(25, 1, 25, 1, 1, 1, 1),
(26, 1, 26, 1, 1, 1, 1),
(27, 1, 27, 1, 1, 1, 1),
(28, 1, 28, 1, 1, 1, 1),
(29, 1, 29, 1, 1, 1, 1),
(30, 1, 30, 1, 1, 1, 1),
(31, 1, 31, 1, 1, 1, 1),
(32, 1, 32, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `me_payment_method`
--

CREATE TABLE `me_payment_method` (
  `MethodID` int(11) NOT NULL,
  `MethodName` varchar(255) NOT NULL,
  `MethodStatus` int(11) NOT NULL DEFAULT 1,
  `Methodcreated` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `me_region`
--

CREATE TABLE `me_region` (
  `RegionID` int(11) NOT NULL,
  `RegionName` varchar(255) NOT NULL,
  `RegionStatus` int(11) NOT NULL DEFAULT 1,
  `Regioncreated` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `me_region`
--

INSERT INTO `me_region` (`RegionID`, `RegionName`, `RegionStatus`, `Regioncreated`) VALUES
(1, 'US', 1, '2022-04-05'),
(2, 'UK', 1, '2022-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `me_role`
--

CREATE TABLE `me_role` (
  `RoleID` int(11) NOT NULL,
  `DeparmentID` int(11) NOT NULL,
  `RoleName` varchar(255) NOT NULL,
  `RoleStatus` int(11) NOT NULL DEFAULT 1,
  `RoleCreated` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `me_role`
--

INSERT INTO `me_role` (`RoleID`, `DeparmentID`, `RoleName`, `RoleStatus`, `RoleCreated`) VALUES
(1, 1, 'Admin', 1, '2022-04-07'),
(2, 1, 'Semi Admin', 1, '2022-04-07'),
(3, 1, 'CEO', 1, '2022-04-07'),
(4, 2, 'HR Manager', 1, '2022-04-07'),
(5, 2, 'HR Executive', 1, '2022-04-07'),
(6, 3, 'Developer', 1, '2022-04-07'),
(7, 3, 'Designer', 1, '2022-04-07'),
(8, 4, 'Finance Manager', 1, '2022-04-07'),
(9, 6, 'PPC Specialist', 1, '2022-04-07'),
(10, 7, 'VP', 1, '2022-04-07'),
(11, 7, 'AVP', 1, '2022-04-07'),
(12, 7, 'Business Unit Head', 1, '2022-04-07'),
(13, 7, 'Sales Manager', 1, '2022-04-07'),
(14, 7, 'Sales Executive', 1, '2022-04-07'),
(15, 8, 'Support Manager', 1, '2022-04-07'),
(16, 8, 'Support Executive', 1, '2022-04-07'),
(17, 8, 'Refund Manager', 1, '2022-04-07'),
(18, 1, 'Procuction Manager', 1, '2022-04-07'),
(19, 9, 'Procuction Executive', 1, '2022-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `me_sales_target`
--

CREATE TABLE `me_sales_target` (
  `TargetID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TeamID` int(11) NOT NULL,
  `TargetMonth` date DEFAULT NULL,
  `TargetStatus` int(11) NOT NULL DEFAULT 1,
  `TargetCreated` date DEFAULT current_timestamp(),
  `CompanyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `me_shift`
--

CREATE TABLE `me_shift` (
  `ShiftID` int(11) NOT NULL,
  `ShiftName` varchar(255) NOT NULL,
  `ShiftStatus` int(11) NOT NULL DEFAULT 1,
  `ShiftCreated` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `me_shift`
--

INSERT INTO `me_shift` (`ShiftID`, `ShiftName`, `ShiftStatus`, `ShiftCreated`) VALUES
(1, '09:18', 1, '2022-04-05'),
(2, '10:19', 1, '2022-04-05'),
(3, '11:20', 1, '2022-04-05'),
(4, '12:21', 1, '2022-04-05'),
(5, '13:22', 1, '2022-04-05'),
(6, '14:23', 1, '2022-04-05'),
(7, '15:24', 1, '2022-04-05'),
(8, '16:01', 1, '2022-04-05'),
(9, '17:02', 1, '2022-04-05'),
(10, '18:03', 1, '2022-04-05'),
(11, '19:04', 1, '2022-04-05'),
(12, '20:05', 1, '2022-04-05'),
(13, '21:06', 1, '2022-04-05'),
(14, '22:07', 1, '2022-04-05'),
(15, '23:08', 1, '2022-04-05'),
(16, '00:09', 1, '2022-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `me_team`
--

CREATE TABLE `me_team` (
  `TeamID` int(11) NOT NULL,
  `DeparmentID` int(11) NOT NULL,
  `CompanyID` int(11) NOT NULL,
  `TeamName` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `me_team`
--

INSERT INTO `me_team` (`TeamID`, `DeparmentID`, `CompanyID`, `TeamName`) VALUES
(2, 7, 1, 'Team A'),
(3, 7, 1, 'Team B'),
(4, 8, 1, 'Team A'),
(5, 8, 1, 'Team B'),
(6, 9, 1, 'Team A'),
(7, 9, 1, 'Team B');

-- --------------------------------------------------------

--
-- Table structure for table `me_users`
--

CREATE TABLE `me_users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `UserPassword` varchar(255) NOT NULL,
  `MasterPassword` varchar(255) NOT NULL,
  `UserStatus` int(11) NOT NULL DEFAULT 1,
  `UserOutside` int(11) NOT NULL DEFAULT 0,
  `Usercreated` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `me_user_profile`
--

CREATE TABLE `me_user_profile` (
  `ProfileID` int(11) NOT NULL,
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
  `DrivingLicenseNum` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `me_brands`
--
ALTER TABLE `me_brands`
  ADD PRIMARY KEY (`BrandsID`),
  ADD KEY `TeamID` (`TeamID`),
  ADD KEY `CompanyID` (`CompanyID`),
  ADD KEY `RegionID` (`RegionID`),
  ADD KEY `MarketingID` (`MarketingID`);

--
-- Indexes for table `me_company`
--
ALTER TABLE `me_company`
  ADD PRIMARY KEY (`CompanyID`);

--
-- Indexes for table `me_currency`
--
ALTER TABLE `me_currency`
  ADD PRIMARY KEY (`CurrencyID`);

--
-- Indexes for table `me_customers`
--
ALTER TABLE `me_customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `me_department`
--
ALTER TABLE `me_department`
  ADD PRIMARY KEY (`DeparmentID`);

--
-- Indexes for table `me_ip_address`
--
ALTER TABLE `me_ip_address`
  ADD PRIMARY KEY (`IPID`);

--
-- Indexes for table `me_marketing_reference`
--
ALTER TABLE `me_marketing_reference`
  ADD PRIMARY KEY (`MarketingID`);

--
-- Indexes for table `me_menu`
--
ALTER TABLE `me_menu`
  ADD PRIMARY KEY (`MenuID`);

--
-- Indexes for table `me_menu_access`
--
ALTER TABLE `me_menu_access`
  ADD PRIMARY KEY (`AccessID`),
  ADD KEY `RoleID` (`RoleID`),
  ADD KEY `MenuID` (`MenuID`);

--
-- Indexes for table `me_payment_method`
--
ALTER TABLE `me_payment_method`
  ADD PRIMARY KEY (`MethodID`);

--
-- Indexes for table `me_region`
--
ALTER TABLE `me_region`
  ADD PRIMARY KEY (`RegionID`);

--
-- Indexes for table `me_role`
--
ALTER TABLE `me_role`
  ADD PRIMARY KEY (`RoleID`),
  ADD KEY `DeparmentID` (`DeparmentID`);

--
-- Indexes for table `me_sales_target`
--
ALTER TABLE `me_sales_target`
  ADD PRIMARY KEY (`TargetID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `TeamID` (`TeamID`),
  ADD KEY `CompanyID` (`CompanyID`);

--
-- Indexes for table `me_shift`
--
ALTER TABLE `me_shift`
  ADD PRIMARY KEY (`ShiftID`);

--
-- Indexes for table `me_team`
--
ALTER TABLE `me_team`
  ADD PRIMARY KEY (`TeamID`),
  ADD KEY `DeparmentID` (`DeparmentID`),
  ADD KEY `CompanyID` (`CompanyID`);

--
-- Indexes for table `me_users`
--
ALTER TABLE `me_users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `me_user_profile`
--
ALTER TABLE `me_user_profile`
  ADD PRIMARY KEY (`ProfileID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CompanyID` (`CompanyID`),
  ADD KEY `DeparmentID` (`DeparmentID`),
  ADD KEY `RoleID` (`RoleID`),
  ADD KEY `TeamID` (`TeamID`),
  ADD KEY `ShiftID` (`ShiftID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `me_brands`
--
ALTER TABLE `me_brands`
  MODIFY `BrandsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `me_company`
--
ALTER TABLE `me_company`
  MODIFY `CompanyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `me_currency`
--
ALTER TABLE `me_currency`
  MODIFY `CurrencyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `me_customers`
--
ALTER TABLE `me_customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `me_department`
--
ALTER TABLE `me_department`
  MODIFY `DeparmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `me_ip_address`
--
ALTER TABLE `me_ip_address`
  MODIFY `IPID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `me_marketing_reference`
--
ALTER TABLE `me_marketing_reference`
  MODIFY `MarketingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `me_menu`
--
ALTER TABLE `me_menu`
  MODIFY `MenuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `me_menu_access`
--
ALTER TABLE `me_menu_access`
  MODIFY `AccessID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `me_payment_method`
--
ALTER TABLE `me_payment_method`
  MODIFY `MethodID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `me_region`
--
ALTER TABLE `me_region`
  MODIFY `RegionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `me_role`
--
ALTER TABLE `me_role`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `me_sales_target`
--
ALTER TABLE `me_sales_target`
  MODIFY `TargetID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `me_shift`
--
ALTER TABLE `me_shift`
  MODIFY `ShiftID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `me_team`
--
ALTER TABLE `me_team`
  MODIFY `TeamID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `me_users`
--
ALTER TABLE `me_users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `me_user_profile`
--
ALTER TABLE `me_user_profile`
  MODIFY `ProfileID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `me_brands`
--
ALTER TABLE `me_brands`
  ADD CONSTRAINT `me_brands_ibfk_1` FOREIGN KEY (`TeamID`) REFERENCES `me_team` (`TeamID`),
  ADD CONSTRAINT `me_brands_ibfk_2` FOREIGN KEY (`CompanyID`) REFERENCES `me_company` (`CompanyID`),
  ADD CONSTRAINT `me_brands_ibfk_3` FOREIGN KEY (`RegionID`) REFERENCES `me_region` (`RegionID`),
  ADD CONSTRAINT `me_brands_ibfk_4` FOREIGN KEY (`MarketingID`) REFERENCES `me_marketing_reference` (`MarketingID`);

--
-- Constraints for table `me_menu_access`
--
ALTER TABLE `me_menu_access`
  ADD CONSTRAINT `me_menu_access_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `me_role` (`RoleID`),
  ADD CONSTRAINT `me_menu_access_ibfk_2` FOREIGN KEY (`MenuID`) REFERENCES `me_menu` (`MenuID`);

--
-- Constraints for table `me_role`
--
ALTER TABLE `me_role`
  ADD CONSTRAINT `me_role_ibfk_1` FOREIGN KEY (`DeparmentID`) REFERENCES `me_department` (`DeparmentID`);

--
-- Constraints for table `me_sales_target`
--
ALTER TABLE `me_sales_target`
  ADD CONSTRAINT `CompanyID` FOREIGN KEY (`CompanyID`) REFERENCES `me_company` (`CompanyID`),
  ADD CONSTRAINT `me_sales_target_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `me_users` (`UserID`),
  ADD CONSTRAINT `me_sales_target_ibfk_2` FOREIGN KEY (`TeamID`) REFERENCES `me_team` (`TeamID`);

--
-- Constraints for table `me_team`
--
ALTER TABLE `me_team`
  ADD CONSTRAINT `me_team_ibfk_1` FOREIGN KEY (`DeparmentID`) REFERENCES `me_department` (`DeparmentID`),
  ADD CONSTRAINT `me_team_ibfk_2` FOREIGN KEY (`CompanyID`) REFERENCES `me_company` (`CompanyID`);

--
-- Constraints for table `me_user_profile`
--
ALTER TABLE `me_user_profile`
  ADD CONSTRAINT `me_user_profile_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `me_users` (`UserID`),
  ADD CONSTRAINT `me_user_profile_ibfk_2` FOREIGN KEY (`CompanyID`) REFERENCES `me_company` (`CompanyID`),
  ADD CONSTRAINT `me_user_profile_ibfk_3` FOREIGN KEY (`DeparmentID`) REFERENCES `me_department` (`DeparmentID`),
  ADD CONSTRAINT `me_user_profile_ibfk_4` FOREIGN KEY (`RoleID`) REFERENCES `me_role` (`RoleID`),
  ADD CONSTRAINT `me_user_profile_ibfk_5` FOREIGN KEY (`TeamID`) REFERENCES `me_team` (`TeamID`),
  ADD CONSTRAINT `me_user_profile_ibfk_6` FOREIGN KEY (`ShiftID`) REFERENCES `me_shift` (`ShiftID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
